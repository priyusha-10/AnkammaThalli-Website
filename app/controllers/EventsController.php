<?php
// app/controllers/EventsController.php

require_once __DIR__ . '/../models/Event.php';

class EventsController {
    public function index() {
        // Fetch all events
        $allEvents = Event::getAll();

        // Separate into categorization if needed (Ongoing, Upcoming, Past)
        $ongoing = [];
        $upcoming = [];
        $past = [];
        
        $now = new DateTime();

        foreach ($allEvents as $event) {
            // If status is manually set in DB, respect it. 
            // Or use date comparison logic. Here we trust DB status mostly but can enhance.
            if ($event['status'] === 'ongoing') {
                $ongoing[] = $event;
            } elseif ($event['status'] === 'upcoming') {
                $upcoming[] = $event;
            } else {
                $past[] = $event;
            }
        }

        // Render View
        require __DIR__ . '/../views/pages/events.php';
    }
}
