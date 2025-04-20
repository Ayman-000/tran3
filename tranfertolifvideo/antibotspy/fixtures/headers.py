# Dictionary of suspicious header patterns
HEADERS = {
    'user-agent': [
        'python',
        'curl',
        'wget',
        'phantomjs',
        'headless',
        'selenium',
        'webdriver'
    ],
    'accept': [
        '*/*',  # Too generic, often used by bots
        'text/plain'  # Unusual for browsers
    ],
    'connection': [
        'close'  # Bots often don't maintain connections
    ],
    'x-requested-with': [
        'XMLHttpRequest'  # Automated requests often use this
    ],
    'accept-language': [
        '',  # Empty accept-language is suspicious
        '*'  # Too generic, often used by bots
    ]
} 