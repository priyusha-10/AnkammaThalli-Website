<?php
// app/views/pages/gallery.php

// 1. Group Images by Category
$albums = [];
if (!empty($images)) {
    foreach ($images as $img) {
        $cat = $img['category'] ? ucfirst($img['category']) : 'General';
        $albums[$cat][] = $img;
    }
}
?>
<link rel="stylesheet" href="assets/css/pages/gallery.css?v=<?php echo time(); ?>">
<!-- PhotoSwipe CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/5.4.2/photoswipe.min.css">

<div class="container gallery-header">
    <h1>Temple Gallery</h1>
    <p class="lead">Glimpses of devotion, rituals, and celebration.</p>
</div>

<div class="container">
    <?php if (empty($albums)): ?>
        <p class="empty-state">No images found in the gallery.</p>
    <?php else: ?>
        <div class="albums-grid">
            <?php 
                $loopIndex = 0;
                foreach ($albums as $category => $photos): 
                $previewPhotos = array_slice($photos, 0, 4); // Get first 4 for preview
                $count = count($photos);
                $loopIndex++;
            ?>
                <!-- Category Card -->
                <div class="category-card" onclick="openCategoryModal('<?= $category ?>')" style="--i: <?= $loopIndex ?>;">
                    <div class="category-header">
                        <h3><?= htmlspecialchars($category) ?></h3>
                        <span class="photo-count"><?= $count ?> Photos</span>
                    </div>
                    
                    <!-- Mini Grid Preview (2x2) -->
                    <div class="category-preview-grid">
                        <?php foreach ($previewPhotos as $index => $pic): ?>
                            <div class="preview-thumb" style="background-image: url('<?= htmlspecialchars($pic['image_url']) ?>');">
                                <?php if ($index === 3 && $count > 4): ?>
                                    <div class="more-overlay">+<?= $count - 4 ?></div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                        
                        <!-- Fill empty spots if less than 4 images to keep grid shape (Optional, but looks cleaner) -->
                        <?php for($i = count($previewPhotos); $i < 4; $i++): ?>
                            <div class="preview-thumb placeholder"></div>
                        <?php endfor; ?>
                    </div>
                </div>

                <!-- Hidden Data for Lightbox -->
                <div id="data-<?= $category ?>" class="hidden-album-data" style="display:none;">
                    <?php foreach ($photos as $photo): ?>
                        <div class="photo-item" 
                             data-src="<?= htmlspecialchars($photo['image_url']) ?>" 
                             data-w="1200" 
                             data-h="800" 
                             data-title="<?= htmlspecialchars($photo['title']) ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<!-- Category Detail Modal (Hidden by default) -->
<div id="category-modal" class="gallery-modal" style="display: none;">
    <div class="modal-content">
        <button class="close-modal" aria-label="Close" onclick="closeCategoryModal()">×</button>
        <div class="modal-header">
            <h2 id="modal-title">Category Name</h2>
        </div>
        <div class="modal-body-grid" id="modal-grid">
            <!-- Images will be injected here via JS -->
        </div>
    </div>
</div>

<!-- PhotoSwipe Module (ES6) -->
<script type="module">
import PhotoSwipeLightbox from 'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/5.4.2/photoswipe-lightbox.esm.min.js';
import PhotoSwipe from 'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/5.4.2/photoswipe.esm.min.js';

let currentLightbox = null;
let currentItems = [];

// Global functions attached to window for HTML access
window.openCategoryModal = function(categoryName) {
    const dataContainer = document.getElementById('data-' + categoryName);
    if (!dataContainer) return;

    // 1. Populate Modal Data
    document.getElementById('modal-title').textContent = categoryName;
    const gridContainer = document.getElementById('modal-grid');
    gridContainer.innerHTML = ''; // Clear previous
    currentItems = []; // Reset lightbox items

    const photos = dataContainer.querySelectorAll('.photo-item');
    photos.forEach((photo, index) => {
        const src = photo.getAttribute('data-src');
        const title = photo.getAttribute('data-title');
        
        // Initial Item with basic fallback (will be updated)
        const item = {
            src: src,
            width: 1200, 
            height: 900,
            alt: title
        };
        currentItems.push(item);

        // Smart Preload: Get natural dimensions to prevent distortion
        const img = new Image();
        img.onload = function() {
            item.width = this.naturalWidth;
            item.height = this.naturalHeight;
        };
        img.src = src;

        // Create Modal Grid Item
        const thumb = document.createElement('div');
        thumb.className = 'modal-img-thumb';
        thumb.style.backgroundImage = `url('${src}')`;
        thumb.title = title || '';
        thumb.onclick = () => openLightbox(index); // Link to Lightbox
        
        gridContainer.appendChild(thumb);
    });

    // 2. Show Modal
    document.getElementById('category-modal').style.display = 'flex';
    document.body.style.overflow = 'hidden'; // Prevent background scroll
};

window.closeCategoryModal = function() {
    document.getElementById('category-modal').style.display = 'none';
    document.body.style.overflow = 'auto';
};

window.openLightbox = function(index) {
    if (!currentItems.length) return;

    const lightbox = new PhotoSwipeLightbox({
        dataSource: currentItems,
        pswpModule: PhotoSwipe,
        bgOpacity: 0.95,
        showHideOpacity: true,
        padding: { top: 40, bottom: 40, left: 20, right: 20 }, // Ensure it doesn't touch edges
        imageClickAction: 'zoom',
        tapAction: 'close'
    });
    lightbox.init();
    lightbox.loadAndOpen(index);
    currentLightbox = lightbox;
};
</script>
