# List of known crawler/bot patterns
CRAWLERS = [
    # Search engine bots
    r'googlebot',
    r'bingbot',
    r'yandexbot',
    r'duckduckbot',
    r'baiduspider',
    
    # Generic bot patterns
    r'bot',
    r'crawler',
    r'spider',
    r'slurp',
    
    # Automation tools
    r'selenium',
    r'phantomjs',
    r'headless',
    r'puppeteer',
    r'playwright',
    
    # Cloud/hosting providers often used by bots
    r'amazonaws',
    r'digitalocean',
    r'googlecloud',
    r'azure',
    
    # Common scraping tools
    r'python-requests',
    r'curl',
    r'wget',
    r'scrapy',
    r'beautifulsoup',
    
    # Security scanners
    r'nmap',
    r'nikto',
    r'acunetix',
    r'burpsuite',
    
    # Known bad actors
    r'semrush',
    r'ahrefs',
    r'majestic',
    r'moz.com'
] 