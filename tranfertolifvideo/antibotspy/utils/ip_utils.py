import ipaddress
from typing import Optional

def is_proxy_ip(ip: str) -> bool:
    """Check if an IP is likely from a proxy service"""
    try:
        ip_obj = ipaddress.ip_address(ip)
        
        # Check if IP is private
        if ip_obj.is_private:
            return True
            
        # Known proxy/VPN ranges (example ranges, add more as needed)
        proxy_ranges = [
            '162.158.0.0/16',  # Cloudflare
            '103.21.244.0/22',  # Cloudflare
            '104.16.0.0/12',   # Cloudflare
            '108.162.192.0/18', # Cloudflare
            '131.0.72.0/22',    # Tor exit nodes
            '171.25.193.0/24',  # Tor exit nodes
            # Add more proxy/VPN ranges here
        ]
        
        # Check if IP is in any proxy range
        for proxy_range in proxy_ranges:
            if ip_obj in ipaddress.ip_network(proxy_range):
                return True
                
        return False
        
    except ValueError:
        # Invalid IP address
        return True  # Treat invalid IPs as suspicious

def is_rate_limited(ip: str, max_requests: int = 100, window_seconds: int = 60) -> bool:
    """
    Check if an IP should be rate limited
    Note: This is a basic implementation. In production, use Redis or similar for rate limiting
    """
    # Implement rate limiting logic here
    # For example, using a cache/database to track requests per IP
    return False 