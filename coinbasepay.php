<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate inputs
    $total = filter_var($_POST['total'], FILTER_VALIDATE_FLOAT);
    $customerEmail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ?: 'unknown@example.com';
    $orderId = uniqid('order_');

    if ($total === false || $total <= 0) {
        echo json_encode(['error' => 'Invalid total amount']);
        exit;
    }

    // Coinbase Commerce API URL and your API Key
    $url = 'https://api.commerce.coinbase.com/charges';
    $apiKey = 'xxxx';

    // Charge data
    $postData = [
        'name' => 'Cart Total Charge',
        'description' => 'Charge for items in cart',
        'pricing_type' => 'fixed_price',
        'local_price' => [
            'amount' => number_format($total, 2, '.', ''),
            'currency' => 'USD'
        ],
        'metadata' => [
            'order_id' => $orderId,
            'customer_email' => $customerEmail,
            'cart_hash' => md5($orderId . $total)
        ],
        'redirect_url' => './payment-success.html',
        'cancel_url' => './payment-cancel.html'
    ];

    // Initialize cURL session
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'X-CC-Api-Key: ' . $apiKey,
        'X-CC-Version: 2018-03-22'
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

    // Execute cURL request and capture the response
    $response = curl_exec($ch);
    curl_close($ch);

    // Decode the JSON response
    $responseData = json_decode($response, true);

    if (isset($responseData['data']['hosted_url'])) {
        // Optionally store order locally for reconciliation
        file_put_contents('orders.json', json_encode([
            'order_id' => $orderId,
            'amount' => $total,
            'email' => $customerEmail,
            'coinbase_charge_id' => $responseData['data']['id'],
            'status' => 'pending',
            'created_at' => date('c')
        ], JSON_PRETTY_PRINT), FILE_APPEND);

        echo json_encode(['checkoutUrl' => $responseData['data']['hosted_url']]);
    } else {
        echo json_encode(['error' => 'Failed to create charge']);
    }
}
?>
