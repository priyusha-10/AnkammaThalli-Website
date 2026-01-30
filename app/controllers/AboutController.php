<?php
// app/controllers/AboutController.php

require_once __DIR__ . '/../models/PageSection.php';

class AboutController {
    public function index() {
        // Fetch Content
        $history = PageSection::getContent('about', 'history');
        $mission = PageSection::getContent('about', 'mission');
        $values = PageSection::getContent('about', 'values');

        // Render View
        require __DIR__ . '/../views/pages/about.php';
    }
}
