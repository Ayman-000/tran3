from functools import wraps
from flask import request, abort, jsonify
from .detectors.bot_detector import BotDetector

def protect_from_bots(f):
    """
    Flask decorator to protect routes from bots
    Usage:
    @app.route('/')
    @protect_from_bots
    def home():
        return 'Hello World'
    """
    @wraps(f)
    def decorated_function(*args, **kwargs):
        detector = BotDetector()
        
        # Get request headers
        headers = dict(request.headers)
        
        # Get user agent
        user_agent = request.user_agent.string if request.user_agent else None
        
        # Get IP address
        ip_address = request.remote_addr
        if 'X-Forwarded-For' in request.headers:
            ip_address = request.headers['X-Forwarded-For'].split(',')[0].strip()
        
        # Check if it's a bot
        if detector.is_bot(user_agent=user_agent, headers=headers, ip_address=ip_address):
            # Return JSON response for API requests
            if request.is_json or request.path.startswith('/api/'):
                return jsonify({
                    'error': 'Access denied',
                    'message': 'Bot or suspicious activity detected'
                }), 403
            # Return HTML response for web requests
            abort(403, description="Access denied - Bot or suspicious activity detected")
            
        return f(*args, **kwargs)
    return decorated_function

class AntiBotMiddleware:
    """
    Flask middleware for bot protection
    Usage:
    app = Flask(__name__)
    antibot = AntiBotMiddleware(app)
    """
    def __init__(self, app=None):
        self.app = app
        if app is not None:
            self.init_app(app)
            
    def init_app(self, app):
        self.detector = BotDetector()
        
        @app.before_request
        def check_for_bots():
            # Skip for static files and whitelisted paths
            if request.path.startswith('/static') or request.path == '/favicon.ico':
                return
                
            # Get request headers
            headers = dict(request.headers)
            
            # Get user agent
            user_agent = request.user_agent.string if request.user_agent else None
            
            # Get IP address
            ip_address = request.remote_addr
            if 'X-Forwarded-For' in request.headers:
                ip_address = request.headers['X-Forwarded-For'].split(',')[0].strip()
            
            # Check if it's a bot
            if self.detector.is_bot(user_agent=user_agent, headers=headers, ip_address=ip_address):
                # Return JSON response for API requests
                if request.is_json or request.path.startswith('/api/'):
                    return jsonify({
                        'error': 'Access denied',
                        'message': 'Bot or suspicious activity detected'
                    }), 403
                # Return HTML response for web requests
                abort(403, description="Access denied - Bot or suspicious activity detected") 