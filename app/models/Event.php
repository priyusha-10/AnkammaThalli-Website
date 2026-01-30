<?php
// app/models/Event.php

require_once __DIR__ . '/../core/Database.php';

class Event {
    public static function getUpcoming($limit = 2) {
        $db = Database::getInstance()->getConnection();
        // Fetch upcoming or ongoing events, ordered by date
        $stmt = $db->prepare("SELECT * FROM events WHERE status IN ('upcoming', 'ongoing') ORDER BY event_date ASC LIMIT ?");
        // Bind limit as integer
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function getAll() {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->query("SELECT * FROM events ORDER BY event_date ASC");
        return $stmt->fetchAll();
    }
}
