<?php
// app/models/SiteSetting.php

require_once __DIR__ . '/../core/Database.php';

class SiteSetting {
    // Fetch all settings as an associative array [key => value]
    public static function getAll() {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->query("SELECT setting_key, setting_value FROM site_settings");
        $results = $stmt->fetchAll();
        
        $settings = [];
        foreach ($results as $row) {
            $settings[$row['setting_key']] = $row['setting_value'];
        }
        return $settings;
    }
}
