<?php
// public/test_mail.php

// Enable error reporting to see any specific warnings
ini_set('display_errors', 1);
error_reporting(E_ALL);

$to = "priyushajobs@gmail.com"; // Your email
$subject = "Test Email from Localhost";
$message = "This is a test email to verify PHP mail() configuration.";
$headers = "From: noreply@localhost";

echo "<h1>Email Test Debugger</h1>";
echo "<p>Attempting to send email to: <strong>$to</strong></p>";

// Try to send
if (mail($to, $subject, $message, $headers)) {
    echo "<p style='color: green; font-weight: bold;'>✅ Success: PHP accepted the email for delivery.</p>";
    echo "<p>Note: If you don't receive it, your local SMTP server (e.g., in XAMPP) might not be configured to actually relay it to Gmail.</p>";
} else {
    echo "<p style='color: red; font-weight: bold;'>❌ Failed: PHP could not send the email.</p>";
    echo "<p>This is expected on local XAMPP without configuration. It usually works automatically on live hosting (Hostinger).</p>";
}

echo "<h2>How to Check Database</h2>";
echo "<p>If you submitted the contact form, check your database:</p>";
echo "<pre>SELECT * FROM contact_messages ORDER BY id DESC;</pre>";
echo "<p>Look at the <strong>admin_email_status</strong> column. If it says 'failed', it means this test confirmed the issue.</p>";
