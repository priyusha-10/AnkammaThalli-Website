<?php
// app/controllers/ContactController.php

require_once __DIR__ . '/../models/SiteSetting.php';
require_once __DIR__ . '/../models/ContactMessage.php';

class ContactController {
    public function index() {
        // Fetch global settings
        $settings = SiteSetting::getAll();

        $messageSent = false;
        $errorMsg = '';
        
        // Handle Form Submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // 1. Sanitize & Validate
            $name = trim($_POST['name'] ?? '');
            $email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
            $phone = trim($_POST['phone'] ?? '');
            $message = trim($_POST['message'] ?? '');

            if (!$name || !$email || !$message) {
                $errorMsg = 'Please enter a valid Name, Email, and Message.';
            } else {
                // 2. Save to Database
                $contactModel = new ContactMessage();
                $messageId = $contactModel->create($name, $email, $phone, $message);

                if ($messageId) {
                    // DB Save Success
                    $messageSent = true; // Show success even if email fails (data is safe)

                    // 3. Send Emails
                    $adminEmail = 'priyushajobs@gmail.com'; // REPLACE WITH YOUR REAL ADMIN EMAIL
                    $templeName = "Sri Ankammathalli Temple";
                    
                    // A. Send to Admin
                    $adminSubject = "New Contact Inquiry from $name";
                    $adminBody = "Name: $name\nEmail: $email\nPhone: $phone\n\nMessage:\n$message";
                    $adminHeaders = "From: no-reply@ankammathalli.org" . "\r\n" .
                                    "Reply-To: $email" . "\r\n" .
                                    "X-Mailer: PHP/" . phpversion();

                    if (@mail($adminEmail, $adminSubject, $adminBody, $adminHeaders)) {
                        $contactModel->updateEmailStatus($messageId, 'admin', 'sent');
                    } else {
                        $contactModel->updateEmailStatus($messageId, 'admin', 'failed');
                    }

                    // B. Send Confirmation to User
                    $userSubject = "We received your message - $templeName";
                    $userBody = "Namaste $name,\n\nThank you for contacting $templeName. We have received your message and will get back to you shortly.\n\nYour Message:\n$message\n\nRegards,\nTemple Committee";
                    $userHeaders = "From: no-reply@ankammathalli.org" . "\r\n" .
                                   "Reply-To: $adminEmail" . "\r\n" .
                                   "X-Mailer: PHP/" . phpversion();

                    if (@mail($email, $userSubject, $userBody, $userHeaders)) {
                        $contactModel->updateEmailStatus($messageId, 'user', 'sent');
                    } else {
                        $contactModel->updateEmailStatus($messageId, 'user', 'failed');
                    }

                } else {
                    $errorMsg = 'System Error: Could not save your message. Please try again later.';
                    // Log this error ideally
                }
            }
        }

        // Render View
        require __DIR__ . '/../views/pages/contact.php';
    }
}
