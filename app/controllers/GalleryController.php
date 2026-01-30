<?php
// app/controllers/GalleryController.php

require_once __DIR__ . '/../models/Gallery.php';

class GalleryController {
    public function index() {
        // Fetch all images
        $images = Gallery::getAll();

        // Render View
        require __DIR__ . '/../views/pages/gallery.php';
    }
}
