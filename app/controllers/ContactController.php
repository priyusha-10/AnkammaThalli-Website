<?php
// app/controllers/ContactController.php

require_once __DIR__ . '/../models/SiteSetting.php';

class ContactController {
    public function index() {
        // Fetch global settings (address, phone, map link, etc.)
        $settings = SiteSetting::getAll();

        // Handle Form Submission (Basic Email Logic for Phase 4)
        $messageSent = false;
        $errorMsg = '';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Basic validation
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $message = trim($_POST['message'] ?? '');
            
            if (!empty($name) && !empty($email) && !empty($message)) {
                // Ideally, send email or save to DB here
                // For now, simulate success
                $messageSent = true;
            } else {
                $errorMsg = 'Please fill in all required fields.';
            }
        }

        // Render View
        require __DIR__ . '/../views/pages/contact.php';
    }
}
