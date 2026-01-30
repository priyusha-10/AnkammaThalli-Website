<?php
// app/models/Menu.php

require_once __DIR__ . '/../core/Database.php';

class Menu {
    public static function getAll() {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->query("SELECT * FROM menus WHERE is_active = 1 ORDER BY display_order ASC");
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            // Log error or handle gracefully
            return [];
        }
    }
}
