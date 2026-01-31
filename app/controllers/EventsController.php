<?php
// app/controllers/EventsController.php

require_once __DIR__ . '/../models/Event.php';

class EventsController {
    public function index() {
        // Fetch categorized events directly from DB Logic
        $ongoingEvents = Event::getOngoing();
        $upcomingEvents = Event::getUpcoming();

        // Render View
        require __DIR__ . '/../views/pages/events.php';
    }
}
