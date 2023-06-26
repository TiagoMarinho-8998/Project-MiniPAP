<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        // Get the user's input
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert the user's information into the database
        $stmt = $pdo->prepare("INSERT INTO LoginSystem.user (nome, email, pass) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, $hashedPassword]);

        // Redirect the user to the login page
        header("Location: login.php");
        exit;
    }
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
</body>
</html>