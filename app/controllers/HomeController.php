<?php
// app/controllers/HomeController.php

require_once __DIR__ . '/../models/PageSection.php';
require_once __DIR__ . '/../models/Event.php';
require_once __DIR__ . '/../models/Gallery.php';

class HomeController {
    public function index() {
        // Fetch Data
        $welcomeMsg = PageSection::getContent('home', 'welcome_msg');
        $upcomingEvents = Event::getUpcoming(3); // Increased limit
        $ongoingEvents = Event::getOngoing();
        $recentImages = Gallery::getRecent(4);

        // Render View
        // Passed variables will be available in the view
        require __DIR__ . '/../views/pages/home.php';
    }
}
