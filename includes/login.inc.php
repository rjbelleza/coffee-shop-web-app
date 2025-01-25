<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    $table = "users";

    try {
        require_once "databaseConnection.inc.php";

        $query = "SELECT email, pwd FROM $table WHERE email = :email;";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(':email', $email);

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user) {

            if (password_verify($pwd, $user["pwd"])) {
                header("Location: ../pages/dashboard.php");
            } else {
                die("Password is incorrect!");
            }

        } else {
            die("User not found!");
        }

    } catch (PDOException $e) {
        die("Query failed: ") . $e->getMessage();
    }
}
