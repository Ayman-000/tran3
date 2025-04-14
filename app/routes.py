from flask import Blueprint, render_template, request, redirect, url_for, session, flash, jsonify, g, send_from_directory
from flask_socketio import emit
from functools import wraps
import os
import csv
import random
import string
from datetime import datetime, timezone
import requests
import json
import uuid
import time
from werkzeug.security import check_password_hash, generate_password_hash

main = Blueprint('main', __name__)

# Admin credentials (in production, use environment variables and proper password hashing)
ADMIN_PASSWORD = os.environ.get('ADMIN_PASSWORD', 'admin123')
ADMIN_PASSWORD_HASH = generate_password_hash(ADMIN_PASSWORD)

# CSV file paths
VISITORS_CSV = 'data/visitors.csv'
TRANSACTIONS_CSV = 'data/transactions.csv'
VISITS_TXT = 'data/visits.txt'

# Create data directory if it doesn't exist
os.makedirs('data', exist_ok=True)

# Create CSV files if they don't exist
def init_csv_files():
    if not os.path.exists(VISITORS_CSV):
        with open(VISITORS_CSV, 'w', newline='') as f:
            writer = csv.writer(f)
            writer.writerow(['id', 'ip_address', 'user_agent', 'timestamp'])
    
    if not os.path.exists(TRANSACTIONS_CSV):
        with open(TRANSACTIONS_CSV, 'w', newline='') as f:
            writer = csv.writer(f)
            writer.writerow(['id', 'tracking_number', 'transaction_id', 'operation_date', 'payment_method', 
                           'amount', 'status', 'receiver_mode', 'receiver_email', 'receiver_account',
                           'receiver_wallet', 'receiver_network', 'receiver_memo', 'bank_name',
                           'account_name', 'account_number', 'purpose', 'created_at'])

init_csv_files()

# Helper functions
def get_visitor_country(ip):
    try:
        response = requests.get(f'http://ip-api.com/json/{ip}')
        data = response.json()
        return data.get('country', 'Unknown'), data.get('countryCode', 'XX')
    except:
        return 'Unknown', 'XX'

def generate_tracking_number():
    return ''.join(random.choices(string.digits, k=6))

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
            return redirect(url_for('main.admin_login'))
        return f(*args, **kwargs)
    return decorated_function

@main.before_request
def track_visitor():
    if request.path.startswith('/admin'):
        return
    
    ip = request.remote_addr
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
    try:
        response = requests.get(f"https://ipqualityscore.com/json/ip/{os.environ.get('IPQS_API_KEY')}/{ip}")
        if response.status_code == 200:
            data = response.json()
            fraud_score = data.get('fraud_score', 0)
            country_code = data.get('country_code', 'Unknown')
        else:
            fraud_score = 0
            country_code = 'Unknown'
    except:
        fraud_score = 0
        country_code = 'Unknown'
    
    # Update visitors.csv
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
    
    current_time = datetime.now(timezone.utc)
    visitors = [
        v for v in visitors
        if v.get("timestamp") and v["timestamp"] != 'N/A' and v["timestamp"] != '100' and v["timestamp"] != 'Unknown' and
        (current_time - datetime.fromisoformat(str(v["timestamp"]))).total_seconds() < 300
    ]
    
    with open(VISITORS_CSV, "w", newline='') as f:
        writer = csv.DictWriter(f, fieldnames=["ip_address", "page", "timestamp", "fraud_score", "country_code"])
        writer.writeheader()
        writer.writerows(visitors)
    
    g.ipqs_data = {
        'fraud_score': fraud_score,
        'country_code': country_code
    }

# SocketIO events
@socketio.on('connect')
def handle_connect():
    if 'admin_logged_in' in session:
        emit('connected', {'status': 'connected'})

# Main routes
@main.route('/')
def index():
    return render_template('index.html')

@main.route('/about-us')
def about_us():
    return render_template('about-us.html')

@main.route('/our-team')
def our_team():
    return render_template('our-team.html')

@main.route('/contact')
def contact():
    return render_template('contact.html')

@main.route('/login')
def login():
    return render_template('login-2.html')

@main.route('/register')
def register():
    return render_template('register-2.html')

@main.route('/registered')
def registered():
    return render_template('registered.html')

@main.route('/privacy-policy')
def privacy_policy():
    return render_template('privacy-policy.html')

@main.route('/terms-conditions')
def terms_conditions():
    return render_template('terms-conditions.html')

# Admin routes
@main.route('/admin/login', methods=['GET', 'POST'])
def admin_login():
    if request.method == 'POST':
        password = request.form.get('password')
        if check_password_hash(ADMIN_PASSWORD_HASH, password):
            session['admin_logged_in'] = True
            flash('Successfully logged in!', 'success')
            return redirect(url_for('main.admin_dashboard'))
        else:
            flash('Invalid password. Please try again.', 'error')
    return render_template('admin-login.html')

@main.route('/admin/logout')
def admin_logout():
    session.pop('admin_logged_in', None)
    flash('Successfully logged out!', 'success')
    return redirect(url_for('main.admin_login'))

@main.route('/admin')
@login_required
def admin_dashboard():
    # Read visitors data
    visitors = []
    try:
        with open(VISITORS_CSV, 'r', newline='') as f:
            reader = csv.DictReader(f)
            visitors = list(reader)
    except:
        pass
    
    # Read total visits
    try:
        with open(VISITS_TXT, 'r') as f:
            total_visits = int(f.read().strip())
    except:
        total_visits = 0
    
    # Read transactions data
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
    except:
        pass
    
    return render_template('admin-dashboard.html',
                         visitors=visitors,
                         total_visits=total_visits,
                         transactions=transactions)

# Add all other routes from your original app.py here...
# (track, accept-transaction, decline-transaction, etc.)

# Password change function
def update_admin_password(current_password, new_password, confirm_password):
    global ADMIN_PASSWORD_HASH
    
    if not check_password_hash(ADMIN_PASSWORD_HASH, current_password):
        return False, 'Current password is incorrect.'
    elif new_password != confirm_password:
        return False, 'New passwords do not match.'
    elif len(new_password) < 8:
        return False, 'New password must be at least 8 characters long'
    
    os.environ['ADMIN_PASSWORD'] = new_password
    ADMIN_PASSWORD_HASH = generate_password_hash(new_password)
    
    return True, 'Password updated successfully!' 