<?php
// subscribe.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize the email input
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('Invalid email format.');
    }

    // Define the path to the JSON file
    $file = 'subscribers.json';

    // Get the current data from the file
    $current_data = file_get_contents($file);
    $array_data = json_decode($current_data, true);

    // Append the new subscriber
    $array_data[] = array('email' => $email);

    // Encode back to JSON and write to file
    $final_data = json_encode($array_data, JSON_PRETTY_PRINT);
    if (!file_put_contents($file, $final_data)) {
        echo 'Subscription failed. Please try again.';
        exit; // Exit the script early if writing to the file fails
    }

    // Send welcome email
    $to = $email;
    $subject = 'Welcome to The Family';
    $message = 'You have subscribed to our newsletter. Please share our store with your friends and family. Visit us here: https://btcseedbank.com';
    $headers = 'From: admin@btcseedbank.com';

    if (mail($to, $subject, $message, $headers)) {
        echo 'Subscription successful. Welcome email sent.';
    } else {
        echo 'Subscription failed. Please try again.';
    }
}
?>
