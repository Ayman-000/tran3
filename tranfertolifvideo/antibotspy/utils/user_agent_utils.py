def normalize_user_agent(user_agent: str) -> str:
    """
    Normalize a user agent string for consistent checking
    """
    if not user_agent:
        return ''
        
    # Convert to lowercase
    user_agent = user_agent.lower()
    
    # Remove common noise
    noise = [
        'mozilla/5.0',
        'compatible',
        'like gecko',
        'webkit',
        'chrome',
        'safari'
    ]
    
    for n in noise:
        user_agent = user_agent.replace(n, '')
        
    # Remove extra spaces
    user_agent = ' '.join(user_agent.split())
    
    return user_agent

def is_suspicious_user_agent(user_agent: str) -> bool:
    """
    Check if a user agent string looks suspicious
    """
    if not user_agent:
        return True
        
    # Too short
    if len(user_agent) < 10:
        return True
        
    # Too long
    if len(user_agent) > 500:
        return True
        
    # Contains suspicious characters
    suspicious_chars = ['<', '>', ';', '|', '&', '$']
    return any(char in user_agent for char in suspicious_chars) 