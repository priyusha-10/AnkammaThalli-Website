<?php
// app/models/ContactMessage.php

require_once __DIR__ . '/../core/Database.php';

class ContactMessage {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    /**
     * Save a new message to the database
     * Returns the ID of the inserted message or false on failure
     */
    public function create($name, $email, $phone, $message) {
        $sql = "INSERT INTO contact_messages (name, email, phone, message, admin_email_status, user_email_status) 
                VALUES (:name, :email, :phone, :message, 'pending', 'pending')";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':message', $message);

        if ($stmt->execute()) {
            return $this->pdo->lastInsertId();
        }
        return false;
    }

    /**
     * Update the email status for a specific message
     */
    public function updateEmailStatus($id, $type, $status) {
        // $type should be 'admin' or 'user'
        $column = ($type === 'admin') ? 'admin_email_status' : 'user_email_status';
        
        $sql = "UPDATE contact_messages SET $column = :status WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }
}
