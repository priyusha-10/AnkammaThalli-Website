<?php
// app/views/pages/home.php
?>
<!-- Load Slider Styles -->
<link rel="stylesheet" href="assets/css/pages/home-slider.css?v=<?php echo time() + 2; ?>">

<!-- Hero / Welcome Section -->
<section class="hero-section" style="position: relative; padding-bottom: 6rem;">
    <div class="divine-overlay-pattern"></div>
    <div class="hero-content">
        <h1 class="hero-title">Welcome to AnkammaThalli Temple</h1>
        <p class="lead">A sacred space of devotion, protection, and blessings.</p>
        <p class="lead" style="font-size: 1.1rem; margin-top: 0.5rem; max-width: 900px;">
            Experience the divine grace of Amma AnkammaThalli, seek inner peace, and offer your prayers for the well-being of your family and community.
        </p>
    </div>


</section>

<!-- Home Page Slider (Replacing Cards) -->
<section class="home-carousel">
    <!-- Slide 1: Upcoming Events -->
    <div class="home-slide active">
        <div class="home-slide-bg" style="background-image: url('assets/images/Home-bg-images/home-bg-1.jpg');"></div>
        <div class="home-slide-overlay"></div>
        <div class="home-slide-content">
            <h1 class="home-slide-title">Upcoming Events</h1>
            
            <div class="mini-events-list">
                <?php 
                $sliderEvents = !empty($ongoingEvents) ? $ongoingEvents : $upcomingEvents;
                // Limit to 3
                $sliderEvents = array_slice($sliderEvents, 0, 3);
                
                if (empty($sliderEvents)): ?>
                    <p class="home-slide-description">Join us for sacred rituals, festivals, and community gatherings.</p>
                <?php else: ?>
                    <?php foreach($sliderEvents as $event): ?>
                    <div class="mini-event-item">
                        <div class="event-info">
                            <span class="event-name"><?php echo htmlspecialchars($event['title'] ?? $event['name']); ?></span>
                            <span class="event-meta">
                                <?php echo htmlspecialchars($event['formatted_date']); ?> | 
                                <?php echo htmlspecialchars($event['start_time']); ?>
                            </span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <br>
            <a href="index.php?page=events" class="btn-slide-action">View All Events</a>
        </div>
    </div>

    <!-- Slide 2: About Us -->
    <div class="home-slide">
        <div class="home-slide-bg" style="background-image: url('assets/images/Home-bg-images/home-bg-2.jpg');"></div>
        <div class="home-slide-overlay"></div>
        <div class="home-slide-content">
            <h1 class="home-slide-title">About Our Temple</h1>
            <p class="home-slide-description">Discover the rich history and spiritual significance of the AnkammaThalli Temple.</p>
            <a href="index.php?page=about" class="btn-slide-action">Our History</a>
        </div>
    </div>

    <!-- Slide 3: Temple Highlights -->
    <div class="home-slide">
        <div class="home-slide-bg" style="background-image: url('assets/images/Home-bg-images/home-bg-3.jpg');"></div>
        <div class="home-slide-overlay"></div>
        <div class="home-slide-content">
            <h1 class="home-slide-title">Temple Highlights</h1>
            <p class="home-slide-description">Witness the beauty and sanctity of the temple through our gallery.</p>
            
            <!-- Mini Gallery Stack -->
            <div class="mini-gallery-grid">
                <div class="gallery-thumb-wrapper">
                    <img src="assets/images/Temple_View/gallery1.jpeg" alt="Temple View 1">
                </div>
                <div class="gallery-thumb-wrapper">
                    <img src="assets/images/Temple_View/gallery2.jpeg" alt="Temple View 2">
                </div>
                <div class="gallery-thumb-wrapper">
                    <img src="assets/images/Temple_View/gallery3.jpeg" alt="Temple View 3">
                </div>
                <div class="gallery-thumb-wrapper">
                    <img src="assets/images/Temple_View/gallery6.jpeg" alt="Temple View 4">
                </div>
            </div>

            <br>
            <a href="index.php?page=gallery" class="btn-slide-action">View Gallery</a>
        </div>
    </div>

    <!-- Navigation Arrows -->
    <button class="home-nav-arrow prev">&#10094;</button>
    <button class="home-nav-arrow next">&#10095;</button>


</section>

<!-- Donate Section (Parallax) -->
<section class="home-donate-section">
    <div class="donate-overlay"></div>
    <div class="container" style="position: relative; z-index: 2;">
        <div class="home-donate-content">
            <h2>Support the Temple</h2>
            <p>Your generous contributions help us maintain the sanctity of the temple and perform daily rituals (Nitya Kainkaryam) and community service (Annadanam).</p>
            <a href="index.php?page=donations" class="btn-slide-action">Donate Now</a>
        </div>
    </div>
</section>
