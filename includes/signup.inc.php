<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ((isset($_POST["fullname"]) || isset($_POST["email"])) || (isset($_POST["pwd"]) || isset($_POST["phone"]))) {

        $fullname = filter_input(INPUT_POST,"fullname", FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $pwd = $_POST["pwd"];
        $phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_NUMBER_INT);

        $hash = password_hash($pwd, PASSWORD_DEFAULT);

        $table = "users";

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Invalid email format");
        }

        if (!preg_match("/^09\d{9}$/", $phone)) {
            die("Invalid phone number.");
        }

        $query = "INSERT INTO $table (fullname, email, pwd, phone)
                  VALUES (:fullname, :email, :pwd, :phone);
        ";

        try {

            require_once "databaseConnection.inc.php";

            $stmt = $pdo->prepare($query);

            $stmt->bindParam(":fullname", $fullname);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":pwd", $hash);
            $stmt->bindParam(":phone", $phone);

            $stmt->execute();

            $stmt = null;
            $pdo = null;

            echo "Account successfully created";

            sleep(3);

            header("Location: ../pages/dashboard.php");

            die();

        } catch (PDOException $e) {
            die("Failed to create account: " . $e->getMessage());
        }

    } else {
        echo "All fields are required!";
    }
}
