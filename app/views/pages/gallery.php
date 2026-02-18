<?php
// app/views/pages/gallery.php

// 1. Extract Categories
$categories = ['All'];
$groupedImages = [];

if (!empty($images)) {
    foreach ($images as $img) {
        $cat = $img['category'] ? ucfirst($img['category']) : 'General';
        if (!in_array($cat, $categories)) {
            $categories[] = $cat;
        }
    }
}
?>
<link rel="stylesheet" href="assets/css/pages/gallery.css?v=<?php echo time(); ?>">

<div class="container gallery-header">
    <div class="text-center">
        <h1 style="font-family: var(--font-heading); margin-bottom: 0.5rem;">Temple Gallery</h1>
        <p class="lead" style="font-size: 1rem; color: #555;">Glimpses of devotion, rituals, and celebration.</p>
    </div>
</div>

<!-- 1. Category Chips Section -->
<div class="category-chips-container">
    <div class="category-chips-list">
        <?php foreach ($categories as $index => $cat): ?>
            <div class="category-chip <?php echo $index === 0 ? 'active' : ''; ?>" 
                 data-category="<?php echo $cat === 'All' ? 'all' : $cat; ?>">
                <?php echo htmlspecialchars($cat); ?>
            </div>
        <?php endforeach; ?>
        

    </div>
</div>

<!-- 2. Image Carousel Section -->
<div class="gallery-carousel-section">
    <!-- 3D Container -->
    <div class="carousel-3d-container">
        <?php if (!empty($images)): ?>
            <?php foreach ($images as $index => $img): 
                $cat = $img['category'] ? ucfirst($img['category']) : 'General';
            ?>
                <div class="carousel-item" data-category="<?= $cat ?>" data-full-src="<?= htmlspecialchars($img['image_url']) ?>" data-index="<?= $index ?>">
                    <img src="<?= htmlspecialchars($img['image_url']) ?>" alt="<?= htmlspecialchars($img['title']) ?>">
                    <div class="carousel-overlay">
                        <h3><?= htmlspecialchars($img['title']) ?></h3>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center w-100">No images available.</p>
        <?php endif; ?>
    </div>

    <!-- Navigation Arrows (Custom styled) -->
    <div class="carousel-nav-container">
        <button class="carousel-nav prev">&#8592;</button>
        <button class="carousel-nav next">&#8594;</button>
    </div>
</div>

<!-- 3. Fullscreen Lightbox Modal -->
<div id="gallery-modal" class="gallery-modal">
    <div class="modal-overlay"></div>
    
    <button class="modal-close">&times;</button>
    <div class="modal-counter" id="modal-counter">1 / 10</div>
    
    <button class="modal-nav prev">&#10094;</button>
    <button class="modal-nav next">&#10095;</button>

    <div class="modal-content">
        <div class="modal-image-container">
            <img src="" id="modal-image" alt="Full Image">
        </div>
        <div class="modal-caption" id="modal-caption">Image Title</div>
    </div>
</div>

<script src="assets/js/gallery.js?v=<?php echo time(); ?>"></script>

