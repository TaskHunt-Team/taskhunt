DROP DATABASE IF EXISTS TaskHunt;
CREATE DATABASE TaskHunt;
USE TaskHunt;

-- USERS
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    username VARCHAR(50) UNIQUE,
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    role ENUM('client','freelancer','admin'),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- JOBS
CREATE TABLE jobs (
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
);

-- PROPOSALS
CREATE TABLE proposals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    job_id INT,
    freelancer_id INT,
    message TEXT,
    price INT,
    status ENUM('pending','accepted','rejected') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- NOTIFICATIONS
CREATE TABLE notifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    message TEXT,
    is_read BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ADMIN USER
INSERT INTO users (first_name, last_name, username, email, password, role)
VALUES (
'Admin',
'User',
'admin',
'admin@gmail.com',
'$2y$10$eImiTXuWVxfM37uY4JANjQ==',
'admin'
);