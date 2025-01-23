<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup.css">
    <title>The Cozy Bean | Sign up</title>
</head>
<body>
    <main>
        <form action=" <?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> " method="POST">
            <input type="text" name="fullName" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="tel" name="fullName" placeholder="Phone Number" required>
            <button type="submit"> Sign up </button>
        </form>
    </main>
</body>
</html>