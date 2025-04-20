<?php

namespace App\Services;

class BotProtectionService
{
    private $config;
    private $ipqsApiKey;

    public function __construct()
    {
        $this->config = require __DIR__ . '/../../config/config.php';
        $this->ipqsApiKey = $this->config['ipqs']['api_key'];
    }

    public function checkIp($ip)
    {
        if (empty($this->ipqsApiKey)) {
            return [
                'success' => true,
                'fraud_score' => 0,
                'country_code' => 'Unknown'
            ];
        }

        try {
            $url = "https://www.ipqualityscore.com/api/json/ip/{$this->ipqsApiKey}/{$ip}";
            $response = file_get_contents($url);
            $data = json_decode($response, true);

            if ($data['success'] ?? false) {
                return [
                    'success' => true,
                    'fraud_score' => $data['fraud_score'] ?? 0,
                    'country_code' => $data['country_code'] ?? 'Unknown'
                ];
            }

            return [
                'success' => false,
                'fraud_score' => 0,
                'country_code' => 'Unknown'
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'fraud_score' => 0,
                'country_code' => 'Unknown'
            ];
        }
    }

    public function isBot($ip)
    {
        $result = $this->checkIp($ip);
        return $result['success'] && $result['fraud_score'] >= 85;
    }

    public function getProtectedRoutes()
    {
        return [
            '/admin/login',
            '/admin/panel',
            '/admin/create-transaction',
            '/track',
            '/accept-transaction',
            '/decline-transaction'
        ];
    }

    public function shouldProtectRoute($route)
    {
        return in_array($route, $this->getProtectedRoutes());
    }
} 