<?php

namespace App\Models;

use App\Services\CsvService;

class Visitor
{
    private $csvService;
    private $config;

    public function __construct()
    {
        $this->csvService = new CsvService();
        $this->config = require __DIR__ . '/../../config/config.php';
    }

    public function track($ip, $page)
    {
        $data = [
            'ip_address' => $ip,
            'page' => $page,
            'timestamp' => date('Y-m-d H:i:s'),
            'fraud_score' => 0,
            'country_code' => 'Unknown'
        ];

        $this->csvService->writeCsv($this->config['files']['visitors'], [$data]);
        $this->incrementVisits();
        
        return $data;
    }

    public function incrementVisits()
    {
        $visitsFile = $this->config['paths']['data'] . '/' . $this->config['files']['visits'];
        
        if (file_exists($visitsFile)) {
            $visits = (int)file_get_contents($visitsFile);
            file_put_contents($visitsFile, $visits + 1);
        } else {
            file_put_contents($visitsFile, '1');
        }
    }

    public function getVisits()
    {
        $visitsFile = $this->config['paths']['data'] . '/' . $this->config['files']['visits'];
        return file_exists($visitsFile) ? (int)file_get_contents($visitsFile) : 0;
    }

    public function all()
    {
        return $this->csvService->readCsv($this->config['files']['visitors']);
    }

    public function getActiveVisitors()
    {
        $visitors = $this->all();
        $activeVisitors = [];
        $now = time();
        
        foreach ($visitors as $visitor) {
            $timestamp = strtotime($visitor['timestamp']);
            if ($now - $timestamp < 300) { // 5 minutes
                $activeVisitors[] = $visitor;
            }
        }
        
        return $activeVisitors;
    }
} 