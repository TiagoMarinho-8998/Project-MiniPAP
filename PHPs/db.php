<?php
    // Enter your database credentials
    $host = 'localhost';
    $dbname = 'loginsystem';
    $username = 'root';
    $password = '';

    try {
        // Create a PDO instance
        $dsn = "mysql:host=$host;dbname=$dbname";
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        $con = new PDO($dsn, $username, $password, $options);
    } catch(PDOException $e) {
        // If connection fails, show error message
        echo "Failed to connect to MySQL: " . $e->getMessage();
    }
?>