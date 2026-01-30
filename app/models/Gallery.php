<?php
// app/models/Gallery.php

require_once __DIR__ . '/../core/Database.php';

class Gallery {
    public static function getRecent($limit = 4) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM gallery_images ORDER BY created_at DESC LIMIT ?");
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function getAll() {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->query("SELECT * FROM gallery_images ORDER BY display_order ASC, created_at DESC");
        return $stmt->fetchAll();
    }
}
