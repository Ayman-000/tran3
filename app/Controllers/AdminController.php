<?php

namespace App\Controllers;

use App\Models\Transaction;
use App\Models\Visitor;
use App\Services\BotProtectionService;

class AdminController
{
    private $config;
    private $transactionModel;
    private $visitorModel;
    private $botProtection;

    public function __construct()
    {
        $this->config = require __DIR__ . '/../../config/config.php';
        $this->transactionModel = new Transaction();
        $this->visitorModel = new Visitor();
        $this->botProtection = new BotProtectionService();
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = $_POST['password'] ?? '';
            
            if (password_verify($password, $this->config['admin']['password'])) {
                $_SESSION['admin_logged_in'] = true;
                redirect('/admin/panel');
            } else {
                flash('Invalid password', 'error');
                redirect('/admin/login');
            }
        }
        
        require __DIR__ . '/../../templates/admin/login.php';
    }

    public function panel()
    {
        if (!isset($_SESSION['admin_logged_in'])) {
            redirect('/admin/login');
        }

        $transactions = $this->transactionModel->all();
        $visitors = $this->visitorModel->getActiveVisitors();
        $totalVisits = $this->visitorModel->getVisits();

        require __DIR__ . '/../../templates/admin/panel.php';
    }

    public function createTransaction()
    {
        if (!isset($_SESSION['admin_logged_in'])) {
            redirect('/admin/login');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'transaction_id' => $this->transactionModel->generateTransactionId(),
                'amount' => $_POST['amount'] ?? 0,
                'status' => 'pending',
                'created_at' => date('Y-m-d H:i:s')
            ];

            $this->transactionModel->create($data);
            flash('Transaction created successfully', 'success');
            redirect('/admin/panel');
        }

        require __DIR__ . '/../../templates/admin/create-transaction.php';
    }

    public function changePassword()
    {
        if (!isset($_SESSION['admin_logged_in'])) {
            redirect('/admin/login');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $currentPassword = $_POST['current_password'] ?? '';
            $newPassword = $_POST['new_password'] ?? '';
            $confirmPassword = $_POST['confirm_password'] ?? '';

            if (!password_verify($currentPassword, $this->config['admin']['password'])) {
                flash('Current password is incorrect', 'error');
            } elseif ($newPassword !== $confirmPassword) {
                flash('New passwords do not match', 'error');
            } else {
                $this->config['admin']['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
                flash('Password changed successfully', 'success');
            }
        }

        require __DIR__ . '/../../templates/admin/change-password.php';
    }

    public function logout()
    {
        unset($_SESSION['admin_logged_in']);
        redirect('/admin/login');
    }
} 