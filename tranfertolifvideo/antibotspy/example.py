from flask import Flask, jsonify
from antibotspy.flask_antibot import protect_from_bots, AntiBotMiddleware

# Create Flask app
app = Flask(__name__)

# Initialize anti-bot middleware
antibot = AntiBotMiddleware(app)

# Example of protecting specific routes with decorator
@app.route('/api/sensitive')
@protect_from_bots
def sensitive_route():
    return jsonify({"message": "This is protected from bots"})

# Regular route (protected by middleware)
@app.route('/')
def home():
    return "Hello World!"

if __name__ == '__main__':
    app.run(debug=True) 