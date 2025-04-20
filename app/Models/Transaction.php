<?php

namespace App\Models;

use App\Services\CsvService;

class Transaction
{
    private $csvService;
    private $config;

    public function __construct()
    {
        $this->csvService = new CsvService();
        $this->config = require __DIR__ . '/../../config/config.php';
    }

    public function create($data)
    {
        $data['id'] = $this->csvService->getNextId($this->config['files']['transactions']);
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['status'] = 'pending';
        
        $this->csvService->writeCsv($this->config['files']['transactions'], [$data]);
        return $data;
    }

    public function find($id)
    {
        $transactions = $this->csvService->readCsv($this->config['files']['transactions']);
        foreach ($transactions as $transaction) {
            if ($transaction['id'] == $id) {
                return $transaction;
            }
        }
        return null;
    }

    public function update($id, $data)
    {
        return $this->csvService->updateCsv($this->config['files']['transactions'], $id, $data);
    }

    public function delete($id)
    {
        return $this->csvService->deleteFromCsv($this->config['files']['transactions'], $id);
    }

    public function all()
    {
        return $this->csvService->readCsv($this->config['files']['transactions']);
    }

    public function findByStatus($status)
    {
        $transactions = $this->all();
        return array_filter($transactions, function($transaction) use ($status) {
            return $transaction['status'] === $status;
        });
    }

    public function generateTransactionId()
    {
        return strtoupper(uniqid('TRX') . bin2hex(random_bytes(4)));
    }
} 