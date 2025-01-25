<?php

require_once "databaseConnection.php";

$pdo->beginTransaction();

$usersTable = "CREATE TABLE users (
               id INT AUTO_INCREMENT PRIMARY KEY,
               fullname VARCHAR(255) NOT NULL,
               email VARCHAR(255) UNIQUE NOT NULL,
               pwd VARCHAR(255) NOT NULL,
               created_at DATETIME DEFAULT current_timestamp()
);";

$productsTable = "CREATE TABLE products (
                  id INT AUTO_INCREMENT PRIMARY KEY,
                  name VARCHAR(255) NOT NULL,
                  description TEXT,
                  price DECIMAL(10, 2) NOT NULL,
                  category VARCHAR(50),
                  is_available BOOLEAN DEFAULT TRUE

);";

$ordersTable ="CREATE TABLE orders (
               id INT AUTO_INCREMENT PRIMARY KEY,
               user_id INT,
               order_date TIMESTAMP DEFAULT current_timestamp(),
               total_amount DECIMAL(10, 2) NOT NULL,
               status ENUM('pending', 'confirmed', 'to_be_delivered', 'completed', 'cancelled', 'invalid') DEFAULT 'pending',
               FOREIGN KEY (user_id) REFERENCES users(id)
);";
