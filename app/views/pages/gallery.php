<?php
// app/views/pages/gallery.php
?>
<link rel="stylesheet" href="assets/css/pages/gallery.css">

<div class="container gallery-header">
    <h1>Photo Gallery</h1>
    <p class="lead">Glimpses of devotion and celebration.</p>
</div>

<div class="container gallery-grid">
    <?php if (!empty($images)): ?>
        <?php foreach ($images as $img): ?>
            <div class="gallery-item">
                <img src="<?= htmlspecialchars($img['image_url']) ?>" alt="<?= htmlspecialchars($img['title']) ?>" loading="lazy">
                <div class="gallery-caption">
                    <h3><?= htmlspecialchars($img['title']) ?></h3>
                    <?php if (!empty($img['category'])): ?>
                        <p><small><?= ucfirst(htmlspecialchars($img['category'])) ?></small></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p style="text-align: center; width: 100%;">No images found in the gallery.</p>
    <?php endif; ?>
</div>
