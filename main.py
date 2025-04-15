# Initialize anti-bot protection
antibot = AntiBotMiddleware(app)  # Initialize without configuration

# Configure anti-bot settings
antibot.config.update({
    'strict_mode': False,  # Disable strict mode
    'rate_limit': 100,  # Increase rate limit
    'block_duration': 300,  # Reduce block duration to 5 minutes
    'whitelist_paths': ['/static', '/assets'],  # Whitelist static paths
    'debug': True  # Enable debug mode to see what's being blocked
}) 