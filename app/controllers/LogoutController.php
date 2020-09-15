<?php 

session_start();

if(isset($_SESSION['user'])) {
    unset($_SESSION['user']);

    $_SESSION['success-message'] = 'You are logout now';
}

header("Location: /index.php");
