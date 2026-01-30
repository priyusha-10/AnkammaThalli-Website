<?php
// app/views/pages/about.php

// Helper function to handle basic markdown-like bolding if needed, or just use nl2br
function formatContent($text) {
    // Convert **text** to <strong>text</strong>
    $text = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $text);
    return nl2br(htmlspecialchars_decode($text)); // Decode in case it's stored safely
}
?>
<link rel="stylesheet" href="assets/css/pages/about.css">

<div class="container about-header">
    <h1>About Us</h1>
    <p class="lead">Discover the legacy of AnkammaThalli Temple</p>
</div>

<div class="container">
    <!-- History Section -->
    <section class="content-section">
        <h2>Our History</h2>
        <div class="about-content">
            <?= formatContent($history['content_text'] ?? 'History content not available.') ?>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="content-section">
        <h2>Our Mission</h2>
        <div class="about-content">
            <?= formatContent($mission['content_text'] ?? 'Mission content not available.') ?>
        </div>
    </section>

    <!-- Values Section -->
    <section class="content-section">
        <h2>Our Core Values</h2>
        <div class="about-content values-content">
            <?= formatContent($values['content_text'] ?? 'Values content not available.') ?>
        </div>
    </section>
</div>
