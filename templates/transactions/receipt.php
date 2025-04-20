<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Receipt - <?php echo htmlspecialchars($transaction['transaction_id']); ?></title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .receipt-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 40px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.08);
            border: 1px solid #eee;
        }
        .receipt-header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #4743c9;
        }
        .receipt-header h1 {
            color: #4743c9;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .receipt-header p {
            color: #6c757d;
            font-size: 0.95rem;
            max-width: 600px;
            margin: 0 auto 20px;
        }
        .receipt-section {
            margin-bottom: 30px;
        }
        .receipt-section h4 {
            color: #4743c9;
            margin-bottom: 15px;
            font-size: 1.1rem;
            font-weight: bold;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
        }
        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }
        .detail-label {
            color: #6c757d;
            width: 40%;
        }
        .detail-value {
            color: #212529;
            font-weight: 500;
            text-align: right;
            width: 60%;
        }
        .recipient-details {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .recipient-pic {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 15px;
            object-fit: cover;
            border: 2px solid #eee;
        }
        .recipient-name {
            font-weight: bold;
            font-size: 1rem;
            color: #343a40;
        }
        .custom-field-label {
            font-weight: bold;
            color: #555;
        }
        .action-required {
            margin-top: 30px;
            padding: 20px;
            border-radius: 8px;
            background-color: #fff3cd;
            border: 1px solid #ffeeba;
            color: #856404;
            font-size: 0.9rem;
        }
        .action-required strong {
            color: #000;
        }
        .action-buttons {
            margin-top: 20px;
            text-align: center;
        }
        .action-buttons .btn {
            margin: 0 10px;
        }
        .status-badge {
            padding: 0.3em 0.6em;
            font-size: 0.8em;
            border-radius: 0.25rem;
        }
        .status-completed { background-color: #d4edda; color: #155724; }
        .status-waiting { background-color: #fff3cd; color: #856404; }
        .status-declined { background-color: #f8d7da; color: #721c24; }
    </style>
</head>
<body>
    <div class="container">
        <div class="receipt-container">
            <div class="receipt-header">
                <h1>Transaction Receipt</h1>
                <p>Thank you for choosing Tranferto! Your payment has been processed successfully. Here are the details of your transaction. Please review them carefully and take the necessary action.</p>
            </div>

            <div class="receipt-section">
                <h4>Transaction Details</h4>
                <div class="detail-row">
                    <span class="detail-label">Transaction ID:</span>
                    <span class="detail-value"><?php echo htmlspecialchars($transaction['transaction_id']); ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Date:</span>
                    <span class="detail-value"><?php echo htmlspecialchars($transaction['operation_date']); ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Payment Method:</span>
                    <span class="detail-value"><?php echo htmlspecialchars($transaction['payment_method']); ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Payment Amount:</span>
                    <span class="detail-value"><?php echo htmlspecialchars($transaction['amount']); ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Payment Status:</span>
                    <span class="detail-value">
                        <?php
                        $status = $transaction['status'];
                        $statusClass = '';
                        if ($status === 'Completed') {
                            $statusClass = 'status-completed';
                        } elseif ($status === 'Declined') {
                            $statusClass = 'status-declined';
                        } elseif ($status === 'Waiting for Receiver Confirmation') {
                            $statusClass = 'status-waiting';
                            $status = 'Waiting Confirmation';
                        } else {
                            $statusClass = 'status-waiting';
                        }
                        ?>
                        <span class="status-badge <?php echo $statusClass; ?>"><?php echo htmlspecialchars($status); ?></span>
                    </span>
                </div>
            </div>

            <div class="receipt-section">
                <h4>Recipient Details</h4>
                <div class="recipient-details">
                    <?php if (!empty($transaction['profile_pic_filename'])): ?>
                        <?php if (!empty($transaction['profile_link'])): ?>
                            <a href="<?php echo htmlspecialchars($transaction['profile_link']); ?>" target="_blank">
                                <img src="/uploads/receipt_images/<?php echo htmlspecialchars($transaction['profile_pic_filename']); ?>" alt="Recipient Profile" class="recipient-pic">
                            </a>
                        <?php else: ?>
                            <img src="/uploads/receipt_images/<?php echo htmlspecialchars($transaction['profile_pic_filename']); ?>" alt="Recipient Profile" class="recipient-pic">
                        <?php endif; ?>
                    <?php else: ?>
                        <img src="/assets/img/default-avatar.png" alt="Recipient Profile" class="recipient-pic">
                    <?php endif; ?>
                    <div>
                        <?php if (!empty($transaction['profile_name'])): ?>
                            <div class="recipient-name"><?php echo htmlspecialchars($transaction['profile_name']); ?></div>
                        <?php else: ?>
                            <?php
                            $receiverMode = $transaction['receiver_mode'];
                            if ($receiverMode === 'email' && !empty($transaction['receiver_name'])) {
                                echo '<div class="recipient-name">' . htmlspecialchars($transaction['receiver_name']) . '</div>';
                                echo '<small>' . htmlspecialchars($transaction['receiver_email']) . '</small>';
                            } elseif ($receiverMode === 'account' && !empty($transaction['account_name'])) {
                                echo '<div class="recipient-name">' . htmlspecialchars($transaction['account_name']) . '</div>';
                                echo '<small>' . htmlspecialchars($transaction['receiver_account']) . '</small>';
                            } elseif ($receiverMode === 'wallet' && !empty($transaction['wallet_name'])) {
                                echo '<div class="recipient-name">' . htmlspecialchars($transaction['wallet_name']) . '</div>';
                                echo '<small>' . htmlspecialchars($transaction['receiver_wallet']) . '</small>';
                            } elseif ($receiverMode === 'bank' && !empty($transaction['account_name'])) {
                                echo '<div class="recipient-name">' . htmlspecialchars($transaction['account_name']) . '</div>';
                                echo '<small>' . htmlspecialchars($transaction['bank_name']) . ' - ' . htmlspecialchars($transaction['account_number']) . '</small>';
                            } else {
                                echo '<div class="recipient-name">Recipient</div>';
                            }
                            ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Receiving Method:</span>
                    <span class="detail-value"><?php echo ucfirst($transaction['receiver_mode']); ?></span>
                </div>

                <?php
                for ($i = 1; $i <= 5; $i++) {
                    $titleKey = 'custom_title_' . $i;
                    $valueKey = 'custom_value_' . $i;
                    if (!empty($transaction[$titleKey])) {
                        echo '<div class="detail-row">';
                        echo '<span class="detail-label custom-field-label">' . htmlspecialchars($transaction[$titleKey]) . ':</span>';
                        echo '<span class="detail-value">' . htmlspecialchars($transaction[$valueKey] ?? 'N/A') . '</span>';
                        echo '</div>';
                    }
                }
                ?>
            </div>

            <div class="receipt-section">
                <h4>Additional Information</h4>
                <div class="detail-row">
                    <span class="detail-label">Purpose of Transfer:</span>
                    <span class="detail-value"><?php echo htmlspecialchars($transaction['purpose'] ?? 'N/A'); ?></span>
                </div>
            </div>

            <div class="action-required">
                <strong>Action Required:</strong> Your payment is currently <strong>processing</strong>. The recipient must take action to <strong>complete</strong> or <strong>decline</strong> the transfer. If declined, an automatic refund will be issued to the sender.
                <br><strong>⚠ Please note:</strong> Once the transfer is initiated, only the recipient has the ability to accept or cancel the transaction.
            </div>

            <?php if ($transaction['status'] === 'Waiting for Receiver Confirmation'): ?>
                <div class="action-buttons">
                    <form action="/accept_transaction/<?php echo htmlspecialchars($transaction['transaction_id']); ?>" method="POST" class="d-inline">
                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Accept Transfer</button>
                    </form>
                    <form action="/decline_transaction/<?php echo htmlspecialchars($transaction['transaction_id']); ?>" method="POST" class="d-inline">
                        <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i> Decline Transfer</button>
                    </form>
                </div>
            <?php endif; ?>

            <div class="text-center mt-4">
                <a href="/" class="btn btn-outline-secondary btn-sm"><i class="fas fa-home"></i> Back to Home</a>
            </div>
        </div>
    </div>
</body>
</html> 