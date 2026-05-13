<?php
$conn = new mysqli("localhost", "root", "");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// create DB
$conn->query("CREATE DATABASE IF NOT EXISTS TaskHunt");
$conn->select_db("TaskHunt");

// users
$conn->query("CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    username VARCHAR(50) UNIQUE,
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    role ENUM('client','freelancer','admin'),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

// jobs
$conn->query("CREATE TABLE IF NOT EXISTS jobs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT,
    title VARCHAR(255),
    description TEXT,
    budget INT,
    hours INT,
    tags VARCHAR(255),
    location VARCHAR(100),
    status ENUM('pending','approved','rejected') DEFAULT 'approved',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

// proposals
$conn->query("CREATE TABLE IF NOT EXISTS proposals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    job_id INT,
    freelancer_id INT,
    message TEXT,
    price INT,
    status ENUM('pending','accepted','rejected') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

// notifications
$conn->query("CREATE TABLE IF NOT EXISTS notifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    message TEXT,
    is_read BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

// insert admin
$conn->query("INSERT IGNORE INTO users (id, first_name, last_name, username, email, password, role)
VALUES (
1,
'Admin',
'User',
'admin',
'admin@gmail.com',
'\$2y\$10\$eImiTXuWVxfM37uY4JANjQ==',
'admin'
)");
?>