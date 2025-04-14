from flask_socketio import emit
from flask import session
from datetime import datetime, timezone
from app import socketio, active_visitors

@socketio.on('connect')
def handle_connect():
    """Handle client connection"""
    if 'admin_logged_in' in session:
        # Send initial visitor data
        emit('visitor_count', {'count': len(active_visitors)})
        for visitor in active_visitors.values():
            emit('visitor_update', visitor)

@socketio.on('disconnect')
def handle_disconnect():
    """Handle client disconnection"""
    pass  # We don't need to do anything special here

@socketio.on('request_visitor_data')
def handle_visitor_data_request():
    """Handle request for current visitor data"""
    if 'admin_logged_in' in session:
        emit('visitor_count', {'count': len(active_visitors)})
        for visitor in active_visitors.values():
            emit('visitor_update', visitor)

@socketio.on('ping')
def handle_ping():
    """Handle ping from clients to keep their connection alive"""
    emit('pong', {'timestamp': datetime.now(timezone.utc).isoformat()}) 