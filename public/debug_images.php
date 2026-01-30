<?php
// public/debug_images.php

require_once __DIR__ . '/../app/config/database.php';

// 1. Check Directory
$imgDir = __DIR__ . '/assets/images';
echo "<h1>Image Debugger</h1>";
echo "<h2>1. Checking Directory: " . htmlspecialchars($imgDir) . "</h2>";

if (!is_dir($imgDir)) {
    echo "<p style='color:red'>❌ Directory does not exist!</p>";
} else {
    echo "<p style='color:green'>✅ Directory exists.</p>";
    $files = scandir($imgDir);
    $files = array_diff($files, array('.', '..'));
    
    echo "<h3>Files found in directory:</h3><ul>";
    if (empty($files)) {
        echo "<li style='color:red'>No files found! Did you copy the images here?</li>";
    } else {
        foreach ($files as $file) {
            echo "<li>" . htmlspecialchars($file) . "</li>";
        }
    }
    echo "</ul>";
}

// 2. Check Database
echo "<h2>2. Checking Database Records</h2>";
try {
    $config = require __DIR__ . '/../app/config/database.php';
    $dbConfig = $config['local']; // Assuming local
    $dsn = "mysql:host={$dbConfig['host']};dbname={$dbConfig['database']};charset={$dbConfig['charset']}";
    $pdo = new PDO($dsn, $dbConfig['username'], $dbConfig['password']);
    
    $stmt = $pdo->query("SELECT * FROM gallery_images");
    $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<table border='1' cellpadding='5' style='border-collapse:collapse;'>";
    echo "<tr><th>ID</th><th>Title</th><th>DB Path (image_url)</th><th>File Status</th></tr>";
    
    foreach ($images as $img) {
        $dbPath = $img['image_url'];
        // Remove 'assets/images/' prefix to match with scandir results for easier reading, 
        // or check full path
        $fullPath = __DIR__ . '/' . $dbPath;
        
        $exists = file_exists($fullPath);
        $status = $exists ? "<span style='color:green'>✅ Found</span>" : "<span style='color:red'>❌ Missing</span>";
        
        echo "<tr>";
        echo "<td>{$img['id']}</td>";
        echo "<td>{$img['title']}</td>";
        echo "<td>{$dbPath}</td>";
        echo "<td>$status <br><small>Looking for: $fullPath</small></td>";
        echo "</tr>";
    }
    echo "</table>";

} catch (Exception $e) {
    echo "DB Error: " . $e->getMessage();
}
?>
