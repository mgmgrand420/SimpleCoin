<?php
// File: create coinbase charge 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve total amount from the request
    $total = $_POST['total'];

    // Coinbase Commerce API URL and your API Key
    $url = 'https://api.commerce.coinbase.com/charges';
    $apiKey = 'xxxx';

    // Charge data
    $postData = [
        'name' => 'Cart Total Charge',
        'description' => 'Charge for items in cart',
        'pricing_type' => 'fixed_price',
        'local_price' => [
            'amount' => $total,
            'currency' => 'USD'
        ],
    'redirect_url' => 'https://bitcoin.cannabis-seed.us/payment-success.html',
    'cancel_url' => 'https://bitcoin.cannabis-seed.us/payment-cancel.html'
    ];

    // Initiate cURL session
    $ch = curl_init($url);

    // Set cURL options
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
        // Send checkout URL back to client
        echo json_encode(['checkoutUrl' => $responseData['data']['hosted_url']]);
    } else {
        // Handle errors (simplified)
        echo json_encode(['error' => 'Failed to create charge']);
    }
}
?>
