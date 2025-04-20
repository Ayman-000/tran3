<?php

namespace App\Controllers;

use App\Models\Transaction;
use App\Services\BotProtectionService;

class TransactionController
{
    private $config;
    private $transactionModel;
    private $botProtection;

    public function __construct()
    {
        $this->config = require __DIR__ . '/../../config/config.php';
        $this->transactionModel = new Transaction();
        $this->botProtection = new BotProtectionService();
    }

    public function track()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $transactionId = $_POST['transaction_id'] ?? '';
            $transaction = $this->transactionModel->find($transactionId);

            if ($transaction) {
                echo json_encode([
                    'success' => true,
                    'transaction' => $transaction
                ]);
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => 'Transaction not found'
                ]);
            }
            exit;
        }

        require __DIR__ . '/../../templates/transactions/track.php';
    }

    public function accept($transactionId)
    {
        if ($this->botProtection->isBot($_SERVER['REMOTE_ADDR'])) {
            http_response_code(403);
            die('Access denied - Bot or suspicious activity detected');
        }

        $transaction = $this->transactionModel->find($transactionId);
        if ($transaction) {
            $this->transactionModel->update($transactionId, ['status' => 'accepted']);
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Transaction not found']);
        }
        exit;
    }

    public function decline($transactionId)
    {
        if ($this->botProtection->isBot($_SERVER['REMOTE_ADDR'])) {
            http_response_code(403);
            die('Access denied - Bot or suspicious activity detected');
        }

        $transaction = $this->transactionModel->find($transactionId);
        if ($transaction) {
            $this->transactionModel->update($transactionId, ['status' => 'declined']);
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Transaction not found']);
        }
        exit;
    }

    public function receipt($transactionId)
    {
        $transaction = $this->transactionModel->find($transactionId);
        if (!$transaction) {
            http_response_code(404);
            die('Transaction not found');
        }

        require __DIR__ . '/../../templates/transactions/receipt.php';
    }
} 