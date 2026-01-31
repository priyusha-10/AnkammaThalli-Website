<?php
// app/views/pages/home.php
?>
<link rel="stylesheet" href="assets/css/pages/home.css">

<!-- Hero / Welcome Section (Golden Mandir Saffron Theme) -->
<section class="hero-section">
    <div class="divine-overlay-pattern"></div>
    <div class="hero-content">
        <h1 class="hero-title">Welcome to AnkammaThalli Temple</h1>
        <p class="lead">A sacred space of devotion, protection, and blessings.</p>
        <p class="lead" style="font-size: 1.1rem; margin-top: 0.5rem; max-width: 900px;">
            Experience the divine grace of Amma AnkammaThalli, seek inner peace, and offer your prayers for the well-being of your family and community.
        </p>
        
        <!-- Primary CTA moved back to Hero -->
        <div style="margin-top: 2rem;">
            <a href="index.php?page=donations" class="btn btn-primary btn-lg">Donate Now</a>
        </div>
    </div>
</section>

<!-- The Sacred Grid (3 Cards in Row) -->
<section class="sacred-grid-container container">
    <div class="divine-grid">
        
        <!-- Card 1: About Us -->
        <article class="divine-card history-card">
            <div class="card-header">
                <h2>About Us</h2>
            </div>
            <div class="card-body">
                <p class="history-snippet">Discover the rich history and spiritual significance of the AnkammaThalli Temple. A place where tradition meets tranquility.</p>
            </div>
            <div class="card-footer">
                <a href="index.php?page=about" class="btn btn-outline btn-sm">Read Full Story</a>
            </div>
        </article>

        <!-- Card 2: Temple Highlights (Gallery) -->
        <article class="divine-card gallery-card">
            <div class="card-header">
                <h2>Temple Highlights</h2>
            </div>
            <div class="card-body">
                <?php if (!empty($recentImages)): ?>
                    <div class="mini-gallery-grid">
                        <?php foreach (array_slice($recentImages, 0, 4) as $img): ?>
                            <img src="<?= htmlspecialchars($img['image_url']) ?>" alt="Gallery Thumb">
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p class="empty-state">Gallery images coming soon.</p>
                <?php endif; ?>
            </div>
            <div class="card-footer">
                <a href="index.php?page=gallery" class="btn btn-outline btn-sm">View Gallery</a>
            </div>
        </article>

        <!-- Card 3: Upcoming Events -->
        <article class="divine-card events-card">
            <div class="card-header">
                <h2>Upcoming Events</h2>
            </div>
            <div class="card-body">
                <?php if (!empty($upcomingEvents)): ?>
                    <div class="mini-events-list">
                        <?php foreach (array_slice($upcomingEvents, 0, 2) as $event): ?>
                            <div class="mini-event-item">
                                <strong><?= htmlspecialchars($event['title']) ?></strong>
                                <span class="event-date"><?= date('M j', strtotime($event['start_date'])) ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p class="empty-state">No upcoming events scheduled.</p>
                <?php endif; ?>
            </div>
            <div class="card-footer">
                <a href="index.php?page=events" class="btn btn-outline btn-sm">View All Events</a>
            </div>
        </article>

    </div>
</section>
