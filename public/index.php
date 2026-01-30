<?php
// public/index.php

// Basic routing
$page = $_GET['page'] ?? 'home';

// Include Header
require_once __DIR__ . '/../app/views/partials/header.php';

// Route to Page Controller or Load View Directly (Simple Router)
if ($page === 'home') {
    require_once __DIR__ . '/../app/controllers/HomeController.php';
    $controller = new HomeController();
    $controller->index();
} elseif ($page === 'about') {
    require_once __DIR__ . '/../app/controllers/AboutController.php';
    $controller = new AboutController();
    $controller->index();
} elseif ($page === 'gallery') {
    require_once __DIR__ . '/../app/controllers/GalleryController.php';
    $controller = new GalleryController();
    $controller->index();
} elseif ($page === 'events') {
    require_once __DIR__ . '/../app/controllers/EventsController.php';
    $controller = new EventsController();
    $controller->index();
} elseif ($page === 'donations') {
    require_once __DIR__ . '/../app/controllers/DonationsController.php';
    $controller = new DonationsController();
    $controller->index();
} elseif ($page === 'contact') {
    require_once __DIR__ . '/../app/controllers/ContactController.php';
    $controller = new ContactController();
    $controller->index();
} else {
    // For other pages (Phase 4+), placeholders for now
    echo '<div class="container" style="padding: 4rem 0;">';
    echo '<h1>' . ucfirst(htmlspecialchars($page)) . '</h1>';
    echo '<p>Content for ' . htmlspecialchars($page) . ' page coming soon...</p>';
    echo '</div>';
}

// Include Footer
require_once __DIR__ . '/../app/views/partials/footer.php';
?>
