<?php
// app/models/Donation.php

require_once __DIR__ . '/../core/Database.php';

class Donation {
    public static function getAll() {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->query("SELECT * FROM donations WHERE is_active = 1");
        return $stmt->fetchAll();
    }
}
