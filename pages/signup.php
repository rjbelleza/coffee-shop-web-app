<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/signup.css">
    <title>The Cozy Bean | Sign up</title>
</head>
<body>
    <main>
        <form action=" <?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> " method="POST">
            <input type="text" name="fullname" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="pwd" placeholder="Password" required>
            <label for="phone"> Contact number </label>
            <input type="tel" name="phone" value="09" placeholder="Phone Number" pattern="\d{11}" title="Phone number must be exactly 11 digits." required>
            <button type="submit"> Sign up </button>
        </form>
        <?php require_once "../includes/signup.inc.php" ?>
    </main>
</body>
</html>