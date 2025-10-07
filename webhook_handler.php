<?php
// webhook_handler.php

// Read the incoming webhook data
$payload = file_get_contents('php://input');
$event = json_decode($payload, true);

// Your webhook shared secret (from Coinbase Commerce dashboard)
$secret = '1e040491-b06a-4b23-b5df-d15494e5d02d';

// Verify the webhook signature
$headers = getallheaders();
$signature = $headers['X-Cc-Webhook-Signature'];
$computedSignature = hash_hmac('sha256', $payload, $secret);

if (hash_equals($signature, $computedSignature)) {
    // Check the event type and status
    if ($event['type'] == 'charge:confirmed') {
        // Payment confirmed
        // Perform actions, like updating the order status in your database

        // Redirect doesn't work in webhooks, so you might send an email, update the database, etc.
    } elseif ($event['type'] == 'charge:failed') {
        // Payment failed or canceled
        // Perform actions, like sending a notification or updating the database

        // Note: Redirects are not possible in webhook handling
    }

    // Respond with a 200 status code to acknowledge receipt of the event
    http_response_code(200);
} else {
    // Invalid signature: respond with a 400 error code
    http_response_code(400);
    echo 'Invalid signature';
}
?>
