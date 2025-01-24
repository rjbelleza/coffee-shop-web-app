<?php

$table = "users";

$table = preg_replace('/[^a-zA-Z0-9_]/', '', $table);

$createTable = "CREATE TABLE $table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    pwd VARCHAR(255) NOT NULL,
    phone VARCHAR(255) UNIQUE NOT NULL
);";

try {

    require_once "databaseConnection.inc.php";

    $stmt = $pdo->prepare($createTable);
    $stmt->execute();

    $pdo = null;
    $stmt = null;

    echo "Table created successfully";

    die();

} catch (PDOException $e) {
    die("Query Failed: " . $e->getMessage());
}
