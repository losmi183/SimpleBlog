<?php require __DIR__ . '/vendor/autoload.php'; ?>

<?php

if(isset($_GET)) {

    // Create standard connection
    $db = new \PDO('mysql:dbname=blog;host=localhost;charset=utf8mb4', 'root', '');

    // Create Auth object
    $auth = new \Delight\Auth\Auth($db);

    $selector = $_GET['selector'];
    $token = $_GET['token'];

    try {
        $auth->confirmEmail($_GET['selector'], $_GET['token']);

        echo 'Email address has been verified';
    }
    catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
        die('Invalid token');
    }
    catch (\Delight\Auth\TokenExpiredException $e) {
        die('Token expired');
    }
    catch (\Delight\Auth\UserAlreadyExistsException $e) {
        die('Email address already exists');
    }
    catch (\Delight\Auth\TooManyRequestsException $e) {
        die('Too many requests');
    }

}