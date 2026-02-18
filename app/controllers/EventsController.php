<?php
// app/controllers/EventsController.php

require_once __DIR__ . '/../models/Event.php';

class EventsController {
    public function index() {
        // Fetch categorized events directly from DB Logic
        $ongoingEvents = Event::getOngoing();
        $futureEvents = Event::getFuture();
        $pastEvents = Event::getPastCurrentYear();

        // Render View
        require __DIR__ . '/../views/pages/events.php';
    }
}
