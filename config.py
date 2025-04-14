import os
from dotenv import load_dotenv

load_dotenv()

class Config:
    SECRET_KEY = os.environ.get('SECRET_KEY', 'your-secret-key-here')
    ADMIN_PASSWORD = os.environ.get('ADMIN_PASSWORD', 'admin123')
    IPQS_API_KEY = os.environ.get('IPQS_API_KEY', '')
    
    # File paths
    DATA_DIR = 'data'
    VISITORS_CSV = os.path.join(DATA_DIR, 'visitors.csv')
    TRANSACTIONS_CSV = os.path.join(DATA_DIR, 'transactions.csv')
    VISITS_TXT = os.path.join(DATA_DIR, 'visits.txt')
    
    # Ensure data directory exists
    os.makedirs(DATA_DIR, exist_ok=True) 