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
    if (isset($_REQUEST['username'])) {
        // Removes backslashes and escapes special characters in a string
        $username = htmlspecialchars(stripslashes($_REQUEST['username']), ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars(stripslashes($_REQUEST['email']), ENT_QUOTES, 'UTF-8');
        $password = htmlspecialchars(stripslashes($_REQUEST['password']), ENT_QUOTES, 'UTF-8');
        $create_datetime = date("Y-m-d H:i:s");

        // Prepare and execute the insert query with parameters
        $query = "INSERT into `users` (username, password, email, create_datetime,funcao_id) 
                  VALUES (:username, :password, :email, :create_datetime,2)";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $password_hash = md5($password);
        $stmt->bindParam(':password', $password_hash, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':create_datetime', $create_datetime, PDO::PARAM_STR);
        $result = $stmt->execute();
        

        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>
