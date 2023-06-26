<?php
    session_start();
    // Destroy session
    if(session_destroy()) {
        // Redirecionar para a página de login
        header("Location: login.php");
    }
?>