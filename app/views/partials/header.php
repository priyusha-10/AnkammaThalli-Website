<?php
// app/views/partials/header.php

require_once __DIR__ . '/../../models/Menu.php';

// Fetch menus using the Model
$menuItems = Menu::getAll();

// Determine current page for active state
$currentPage = $_GET['page'] ?? 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnkammaThalli Temple</title>
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/theme.css">
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/layout.css">
    <link rel="stylesheet" href="assets/css/components.css">
</head>
<body>

<header class="site-header">
    <div class="container">
        <div class="logo">
            <a href="index.php">AnkammaThalli Temple</a>
        </div>
        
        <nav class="main-nav">
            <ul>
                <?php foreach ($menuItems as $item): ?>
                    <?php 
                        $isActive = ($currentPage === $item['slug']) ? 'active' : '';
                    ?>
                    <li>
                        <a href="index.php?page=<?= htmlspecialchars($item['slug']) ?>" class="<?= $isActive ?>">
                            <?= htmlspecialchars($item['label']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</header>
<main>
