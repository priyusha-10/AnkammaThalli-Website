<?php
// app/views/pages/home.php
?>
<link rel="stylesheet" href="assets/css/pages/home.css">

<!-- Hero / Welcome Section -->
<section class="hero-section">
    <h1 class="hero-title">Welcome to AnkammaThalli Temple</h1>
    <p class="lead"><?= htmlspecialchars($welcomeMsg['content_text'] ?? 'Experience peace and devotion.') ?></p>
    <div style="margin-top: 2rem;">
        <a href="index.php?page=donations" class="btn btn-primary">Donate Now</a>
    </div>
</section>

<!-- Upcoming Events Section -->
<section class="container" style="margin-bottom: 4rem;">
    <h2 class="section-title">Upcoming Events</h2>
    
    <?php if (!empty($upcomingEvents)): ?>
        <div class="events-grid">
            <?php foreach ($upcomingEvents as $event): ?>
                <div class="card">
                    <h3><?= htmlspecialchars($event['title']) ?></h3>
                    <p class="text-muted"><?= date('F j, Y, g:i a', strtotime($event['event_date'])) ?></p>
                    <p><?= htmlspecialchars(substr($event['description'], 0, 100)) ?>...</p>
                    <a href="index.php?page=events" class="btn btn-outline" style="margin-top: 1rem; font-size: 0.9rem;">Details</a>
                </div>
            <?php endforeach; ?>
        </div>
        <div style="text-align: center;">
            <a href="index.php?page=events" class="btn btn-secondary">View All Events</a>
        </div>
    <?php else: ?>
        <p style="text-align: center;">No upcoming events at the moment.</p>
    <?php endif; ?>
</section>

<!-- Gallery Preview Section -->
<section class="container" style="margin-bottom: 4rem;">
    <h2 class="section-title">Temple Highlights</h2>
    <?php if (!empty($recentImages)): ?>
        <div class="gallery-strip">
            <?php foreach ($recentImages as $img): ?>
                <img src="<?= htmlspecialchars($img['image_url']) ?>" alt="<?= htmlspecialchars($img['title']) ?>">
            <?php endforeach; ?>
        </div>
        <div style="text-align: center; margin-top: 1rem;">
            <a href="index.php?page=gallery" class="btn btn-secondary">View Gallery</a>
        </div>
    <?php else: ?>
        <p style="text-align: center;">Gallery images coming soon.</p>
    <?php endif; ?>
</section>

<!-- About Teaser -->
<section class="container" style="display: flex; gap: 2rem; align-items: center; background: #fff; padding: 2rem; border-radius: 8px;">
    <div style="flex: 1;">
        <h2>Our History</h2>
        <p>Discover the rich history and spiritual significance of the AnkammaThalli Temple. A place where tradition meets tranquility.</p>
        <a href="index.php?page=about" class="btn btn-outline" style="margin-top: 1rem;">Read More</a>
    </div>
    <!-- Placeholder for an image if needed -->
</section>
