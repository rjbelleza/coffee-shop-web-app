<?php

$dsn = "mysql:host=localhost; dbname=cozybeandb";
$dbusername = "cozybean";
$dbpassword = "password";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Database connection successful";
} catch (PDOException $e) {
    echo "Connection failed". $e->getMessage();
}
