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
    // When form submitted, check and create user session.
    
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
        $password = stripslashes($_REQUEST['password']);
        // Check user is exist in the database
        $query = "SELECT * FROM `users` WHERE username=:username AND password=:password";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', md5($password), PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->rowCount();
        // Check if funcao_id = 1
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            if ($_SESSION['username'] == 'root') {
                // Redirect to X.php
                header("Location: admin_dashboard.php");
                exit;
            }
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="registration.php">New Registration</a></p>
  </form>
<?php
    }
?>
</body>
</html>
