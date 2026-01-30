<?php
// public/test_db.php

// Load config
$config = require __DIR__ . '/../app/config/database.php';

// Determine environment - Defaulting to 'local' for now
// You can set an environment variable or a simple flag here
$env = 'local'; 
$dbConfig = $config[$env];

echo "<h2>Database Connection Test ($env)</h2>";

try {
    $dsn = "mysql:host={$dbConfig['host']};dbname={$dbConfig['database']};charset={$dbConfig['charset']}";
    $pdo = new PDO($dsn, $dbConfig['username'], $dbConfig['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "<p style='color:green; font-weight:bold;'>✅ Connection Successful!</p>";
    
    // Test Query
    $stmt = $pdo->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    if (empty($tables)) {
        echo "<p>⚠️ No tables found. Please import <code>sql/schema.sql</code>.</p>";
    } else {
        echo "<p>Tables found:</p><ul>";
        foreach ($tables as $table) {
            echo "<li>$table</li>";
        }
        echo "</ul>";
    }

} catch (PDOException $e) {
    echo "<p style='color:red; font-weight:bold;'>❌ Connection Failed: " . $e->getMessage() . "</p>";
    echo "<p>Details: Check your <code>app/config/database.php</code> settings.</p>";
}
