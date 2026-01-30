<?php
// app/config/database.php

return [
    'local' => [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'temple_db',
        'charset' => 'utf8mb4'
    ],
    'hostinger' => [
        'host' => 'localhost', // Usually localhost on shared hosting
        'username' => 'u123456789_user', // Replace with Hostinger DB user
        'password' => 'password_here',   // Replace with Hostinger DB password
        'database' => 'u123456789_db',   // Replace with Hostinger DB name
        'charset' => 'utf8mb4'
    ]
];
