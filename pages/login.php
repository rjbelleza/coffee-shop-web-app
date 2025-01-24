<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title> The Cozy Bean | Log In </title>
</head>
<body>
    <main>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <input type="email" name="email" placeholder="Email">
            <input type="pwd" name="pwd" placeholder="Password">
            <button type="submit"> Log In </button>
        </form>
        <?php require_once "../includes/login.inc.php"; ?>
    </main>
</body>
</html>