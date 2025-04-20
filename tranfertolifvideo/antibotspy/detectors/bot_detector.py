import re
import os
import json
import requests
import logging
from typing import Dict, List, Optional
from datetime import datetime, timedelta
from ..fixtures.crawlers import CRAWLERS
from ..fixtures.exclusions import EXCLUSIONS
from ..fixtures.headers import HEADERS
from ..utils.ip_utils import is_proxy_ip
from ..utils.user_agent_utils import normalize_user_agent

# Configure logging
logging.basicConfig(
    filename='antibot.log',
    level=logging.INFO,
    format='%(asctime)s - %(levelname)s - %(message)s'
)
logger = logging.getLogger('antibot')

class BotDetector:
    def __init__(self):
        self.crawlers = CRAWLERS
        self.exclusions = EXCLUSIONS
        self.headers = HEADERS
        self.matches = []
        self.ip_cache = {}
        self.cache_duration = timedelta(minutes=30)  # Cache IP results for 30 minutes
        self.risk_threshold = 75  # IP risk score threshold
        self.local_ips = [
            '127.0.0.1',      # localhost
            '::1',            # localhost IPv6
            'localhost',      # localhost hostname
            '0.0.0.0',       # all interfaces
            '192.168.',      # local network
            '10.',           # local network
            '172.16.',       # local network
            '172.17.',       # Docker default
            '172.18.',       # local network
            '172.19.',       # local network
            '172.20.',       # local network
            '172.21.',       # local network
            '172.22.',       # local network
            '172.23.',       # local network
            '172.24.',       # local network
            '172.25.',       # local network
            '172.26.',       # local network
            '172.27.',       # local network
            '172.28.',       # local network
            '172.29.',       # local network
            '172.30.',       # local network
            '172.31.'        # local network
        ]
        self.block_count = 0
        logger.info("BotDetector initialized")

    def is_local_ip(self, ip_address: str) -> bool:
        """Check if the IP is a local/development IP"""
        is_local = any(ip_address.startswith(local) for local in self.local_ips)
        if is_local:
            logger.debug(f"IP {ip_address} identified as local")
        return is_local

    def is_bot(self, user_agent: Optional[str] = None, headers: Optional[Dict] = None, ip_address: Optional[str] = None) -> bool:
        """
        Check if the request is from a bot
        """
        request_info = {
            'ip': ip_address,
            'user_agent': user_agent,
            'headers': headers
        }
        
        # Always allow local/development IPs
        if ip_address and self.is_local_ip(ip_address):
            logger.debug(f"Allowing local IP: {ip_address}")
            return False

        if not user_agent and not headers:
            self.block_count += 1
            logger.warning(f"Blocked request: No user agent or headers provided\nRequest info: {json.dumps(request_info, indent=2)}")
            return True

        # Check IP risk score if IP is provided
        if ip_address:
            if self._check_ip_risk(ip_address):
                self.block_count += 1
                logger.warning(f"Blocked IP {ip_address} due to risk score or VPN/proxy detection")
                return True

        # Normalize user agent
        if user_agent:
            user_agent = normalize_user_agent(user_agent)

        # Check user agent against known bots
        if user_agent and self._check_user_agent(user_agent):
            self.block_count += 1
            logger.warning(f"Blocked bot user agent: {user_agent}\nMatched patterns: {self.matches}")
            return True

        # Check headers
        if headers and self._check_headers(headers):
            self.block_count += 1
            logger.warning(f"Blocked suspicious headers:\n{json.dumps(headers, indent=2)}")
            return True

        # Check for proxy usage
        if headers and 'X-Forwarded-For' in headers:
            forwarded_ip = headers['X-Forwarded-For'].split(',')[0].strip()
            if not self.is_local_ip(forwarded_ip) and is_proxy_ip(forwarded_ip):
                self.block_count += 1
                logger.warning(f"Blocked proxy IP: {forwarded_ip}")
                return True

        logger.debug(f"Allowed request from IP: {ip_address}")
        return False

    def _check_ip_risk(self, ip_address: str) -> bool:
        """
        Check IP risk score using IPScore API with caching
        """
        # Skip check for local IPs
        if self.is_local_ip(ip_address):
            return False

        # Check cache first
        now = datetime.now()
        if ip_address in self.ip_cache:
            cache_time, is_risky = self.ip_cache[ip_address]
            if now - cache_time < self.cache_duration:
                if is_risky:
                    logger.info(f"IP {ip_address} found risky in cache")
                return is_risky

        try:
            api_key = os.getenv('IPSCORE_API_KEY')
            if not api_key:
                logger.warning("No IPScore API key configured")
                return False

            # Make API request to IPScore
            url = f"https://api.ipscore.io/v1/score/{ip_address}"
            headers = {
                'Authorization': f'Bearer {api_key}',
                'Accept': 'application/json'
            }
            response = requests.get(url, headers=headers, timeout=5)
            
            if response.status_code == 200:
                data = response.json()
                
                # Check various risk factors
                is_risky = (
                    data.get('risk_score', 0) >= self.risk_threshold or
                    data.get('is_proxy', False) or
                    data.get('is_vpn', False) or
                    data.get('is_tor', False) or
                    data.get('is_datacenter', False)
                )
                
                # Log the risk factors if risky
                if is_risky:
                    risk_factors = {
                        'risk_score': data.get('risk_score', 0),
                        'is_proxy': data.get('is_proxy', False),
                        'is_vpn': data.get('is_vpn', False),
                        'is_tor': data.get('is_tor', False),
                        'is_datacenter': data.get('is_datacenter', False)
                    }
                    logger.warning(f"IP {ip_address} identified as risky:\n{json.dumps(risk_factors, indent=2)}")
                
                # Cache the result
                self.ip_cache[ip_address] = (now, is_risky)
                return is_risky
                
        except Exception as e:
            logger.error(f"IPScore API error for IP {ip_address}: {str(e)}")
            return False
            
        return False

    def _check_user_agent(self, user_agent: str) -> bool:
        """
        Check if the user agent matches known bot patterns
        """
        # Check exclusions first
        if any(exclusion in user_agent.lower() for exclusion in self.exclusions):
            return False

        # Check for bot patterns
        for pattern in self.crawlers:
            if re.search(pattern, user_agent, re.IGNORECASE):
                self.matches.append(pattern)
                return True
        return False

    def _check_headers(self, headers: Dict) -> bool:
        """
        Check headers for bot indicators
        """
        for header_name, header_value in headers.items():
            header_name = header_name.lower()
            if header_name in self.headers:
                if any(pattern in header_value.lower() for pattern in self.headers[header_name]):
                    return True
        return False

    def get_matches(self) -> List[str]:
        """
        Get the patterns that matched
        """
        return self.matches 

    def get_block_count(self) -> int:
        """Get the total number of blocked requests"""
        return self.block_count

    def get_cache_size(self) -> int:
        """Get the number of IPs in cache"""
        return len(self.ip_cache) 