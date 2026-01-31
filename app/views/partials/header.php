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
    
    <!-- CSS Assets with Cache Busting -->
    <link rel="stylesheet" href="assets/css/theme.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="assets/css/base.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="assets/css/layout.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="assets/css/components.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="assets/css/pages/home.css?v=<?php echo time(); ?>">
</head>
<body>

<header class="site-header">
    <div class="flame-particles">
        <div class="particle p1"></div>
        <div class="particle p2"></div>
        <div class="particle p3"></div>
        <div class="particle p4"></div>
        <div class="particle p5"></div>
        <div class="particle p6"></div>
    </div>
    <div class="om-watermark">ॐ</div>
    <div class="container">
        <div class="logo">
            <a href="index.php">
                <img src="assets/images/transparent-logo.png" alt="AnkammaThalli Temple Logo">
            </a>
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
