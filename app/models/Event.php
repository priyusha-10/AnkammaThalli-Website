<?php
// app/models/Event.php

require_once __DIR__ . '/../core/Database.php';

class Event {
    // 1. Fetch Ongoing Events (Happening NOW)
    public static function getOngoing() {
        $db = Database::getInstance()->getConnection();
        // Strict Logic: Current time is between Start and End
        $sql = "SELECT *, 
                DATE_FORMAT(start_date, '%M %d, %Y') as formatted_date,
                DATE_FORMAT(start_date, '%h:%i %p') as start_time,
                DATE_FORMAT(end_date, '%h:%i %p') as end_time
                FROM events 
                WHERE NOW() BETWEEN start_date AND end_date
                AND status != 'cancelled'
                ORDER BY start_date ASC";
        
        $stmt = $db->query($sql);
        return $stmt->fetchAll();
    }

    // 2. Fetch Upcoming Events (Future from Today)
    public static function getFuture($limit = 50) {
        $db = Database::getInstance()->getConnection();
        $sql = "SELECT *, 
                DATE_FORMAT(start_date, '%M %d, %Y') as formatted_date,
                DATE_FORMAT(start_date, '%h:%i %p') as start_time 
                FROM events 
                WHERE start_date > NOW() 
                AND status != 'cancelled'
                ORDER BY start_date ASC 
                LIMIT ?";
        
        $stmt = $db->prepare($sql);
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // 3. Fetch Past Events (Finished this Year)
    public static function getPastCurrentYear() {
        $db = Database::getInstance()->getConnection();
        $sql = "SELECT *, 
                DATE_FORMAT(start_date, '%M %d, %Y') as formatted_date,
                DATE_FORMAT(start_date, '%h:%i %p') as start_time 
                FROM events 
                WHERE end_date < NOW() 
                AND YEAR(start_date) = YEAR(CURDATE())
                AND status != 'cancelled'
                ORDER BY start_date DESC"; // Most recent past first
        
        $stmt = $db->query($sql);
        return $stmt->fetchAll();
    }
    
    // Alias for Home Controller compatibility (returns Future)
    public static function getUpcoming($limit = 10) {
        return self::getFuture($limit);
    }

    public static function getAll() {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->query("SELECT * FROM events ORDER BY start_date DESC");
        return $stmt->fetchAll();
    }
}
