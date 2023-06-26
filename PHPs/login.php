<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    session_start();
    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        // Get the user's input
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Retrieve the user's information from the database
        $stmt = $pdo->prepare("SELECT id_user, pass, role FROM LoginSystem.user WHERE nome = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        // Verify the password
        if ($user && password_verify($password, $user['pass'])) {
            // Start a session and store the user's ID and role
            session_start();
            $_SESSION['user_id'] = $user['id_user'];
            $_SESSION['user_role'] = $user['role'];

            // Redirect the user to the appropriate page
            if ($user['role'] === 'admin') {
                header("Location: admin.php");
            } else {
                header("Location: main.php");
            }
            exit;
        } else {
            // Display an error message
            $errorMessage = "Invalid username or password";
        }
    }
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="registration.php">New Registration</a></p>
    </form>
<?php
    if (isset($errorMessage)) {
        echo "<div class='form'>
              <h3>$errorMessage</h3><br/>
              <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
              </div>";
    }
?>
</body>
</html>