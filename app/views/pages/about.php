<?php
// app/views/pages/about.php
?>
<!-- About Page Redesign: 3-Slide Carousel -->
<section class="about-carousel">
    <!-- Slide 1: History -->
    <div class="carousel-slide active" style="background-image: url('assets/images/background-images/Background-image-1.jpg');">
        <div class="slide-overlay"></div>
        <div class="slide-content">
            <h1 class="slide-title">Our Sacred History</h1>
            <p class="slide-description">Tracing the divine roots of AnkammaThalli Temple through centuries of tradition and faith.</p>
            <button class="btn btn-primary btn-learn-more" data-modal="modal-history">Learn More</button>
        </div>
    </div>

    <!-- Slide 2: Mission -->
    <div class="carousel-slide" style="background-image: url('assets/images/background-images/background-image-4.jpg');">
        <div class="slide-overlay"></div>
        <div class="slide-content">
            <h1 class="slide-title">Our Mission</h1>
            <p class="slide-description">To foster a community of devotion, peace, and spiritual growth for all devotees.</p>
            <button class="btn btn-primary btn-learn-more" data-modal="modal-mission">Learn More</button>
        </div>
    </div>

    <!-- Slide 3: Values -->
    <div class="carousel-slide" style="background-image: url('assets/images/background-images/Background-image-5.jpg');">
        <div class="slide-overlay"></div>
        <div class="slide-content">
            <h1 class="slide-title">Our Core Values</h1>
            <p class="slide-description">Integrity, Seva (Service), and Dharma guide every step of our temple's journey.</p>
            <button class="btn btn-primary btn-learn-more" data-modal="modal-values">Learn More</button>
        </div>
    </div>

    <!-- Right Side Indicators -->
    <div class="carousel-indicators">
        <div class="indicator active" data-slide="0">01</div>
        <div class="indicator" data-slide="1">02</div>
        <div class="indicator" data-slide="2">03</div>
    </div>
</section>

<!-- Full Screen Modal -->
<div id="about-modal" class="about-modal">
    <div class="modal-content">
        <span class="close-modal">&times;</span>
        <div id="modal-body-content">
            <!-- Dynamic Content Loaded Here -->
            <h2>Loading...</h2>
            <p>Please wait.</p>
        </div>
    </div>
</div>
