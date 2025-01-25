<?php

require_once "databaseConnection.inc.php";

$tbl1 = "users";
$tbl2 = "orders";
$tbl3 = "products";
$tbl4 = "payments";
$tbl5 = "order_items";

$dropTables = [
    "DROP TABLE IF EXISTS $tbl5",
    "DROP TABLE IF EXISTS $tbl4",
    "DROP TABLE IF EXISTS $tbl3",
    "DROP TABLE IF EXISTS $tbl2",
    "DROP TABLE IF EXISTS $tbl1",
];

$usersTable = "CREATE TABLE users (
               id INT AUTO_INCREMENT PRIMARY KEY,
               fullname VARCHAR(255) NOT NULL,
               email VARCHAR(255) UNIQUE NOT NULL,
               pwd VARCHAR(255) NOT NULL,
               phone BIGINT NOT NULL,
               role ENUM('customer', 'admin', 'courier') DEFAULT 'customer',
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
               delivered_date TIMESTAMP NULL DEFAULT NULL,
               total_amount DECIMAL(10, 2) NOT NULL,
               status ENUM('pending', 'confirmed', 'to_be_delivered', 'completed', 'cancelled', 'invalid') DEFAULT 'pending',
               FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);";

$orderItemsTable = "CREATE TABLE order_items (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    order_id INT,
                    product_id INT,
                    quantity INT NOT NULL,
                    price_at_time_of_order DECIMAL(10, 2) NOT NULL,
                    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
                    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);";

$paymentsTable ="CREATE TABLE payments (
                 id INT AUTO_INCREMENT PRIMARY KEY,
                 order_id INT,
                 payment_date TIMESTAMP DEFAULT current_timestamp(),
                 amount DECIMAL(10, 2) NOT NULL,
                 payment_method ENUM('cod', 'digital_wallet', 'credit_card') DEFAULT 'cod',
                 FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE
);";

try {

    foreach($dropTables as $drop) {
        $pdo->exec($drop);
    }
    
    $stmt = $pdo->exec($usersTable);
    $stmt = $pdo->exec($productsTable);
    $stmt = $pdo->exec($ordersTable);
    $stmt = $pdo->exec($orderItemsTable);
    $stmt = $pdo->exec($paymentsTable);

    echo "Tables created successfully.";

    $stmt = null;
    $pdo = null;

    die();

} catch (PDOException $e) {
    echo "Error creating tables: " . $e->getMessage();
    die();
}
