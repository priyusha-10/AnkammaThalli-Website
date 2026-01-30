<?php
// app/controllers/DonationsController.php

require_once __DIR__ . '/../models/Donation.php';
require_once __DIR__ . '/../models/PageSection.php';

class DonationsController {
    public function index() {
        // Fetch donation methods (Bank transfers, UPI, etc.)
        $donationMethods = Donation::getAll();
        
        // Fetch specific text content for the page if any
        // We can reuse the PageSection model for intro text
        // $introText = PageSection::getContent('donations', 'intro');

        // Render View
        require __DIR__ . '/../views/pages/donations.php';
    }
}
