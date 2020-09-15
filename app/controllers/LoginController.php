<?php 

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'; 

session_start();

use App\Model\AuthUser;

?>

<?php

if(isset($_POST)) {

    $db = new \PDO('mysql:dbname=blog;host=localhost;charset=utf8mb4', 'root', '');

    $auth = new \Delight\Auth\Auth($db);

    try {
        $auth->login($_POST['email'], $_POST['password']);

        // Creating AuthUser object if login success
        $authUser = new App\Model\AuthUser($_POST['email'], $_POST['password']);
        $_SESSION['user'] = $authUser;
        $_SESSION['email'] = $_POST['email'];

        // Success message
        $_SESSION['success-message'] = 'You Are successfully logged in';


        header("Location: /index.php");
        exit();

    }
    catch (\Delight\Auth\InvalidEmailException $e) {
        echo $_SESSION['error-message'] = "Wrong email address";
        header("Location: /views/auth/login.view.php");
        // exit();
        // die('Wrong email address');
    }
    catch (\Delight\Auth\InvalidPasswordException $e) {
        $_SESSION['error-message'] = "Wrong password";
        header("Location: /views/auth/login.view.php");
        exit();        
        // die('Wrong password');
    }
    catch (\Delight\Auth\EmailNotVerifiedException $e) {
        $_SESSION['error-message'] = "Email not verified";
        header("Location: /views/auth/login.view.php");
        exit();
        // die('Email not verified');
    }
    catch (\Delight\Auth\TooManyRequestsException $e) {
        $_SESSION['error-message'] = "Too many requests";
        header("Location: /views/auth/login.view.php");
        exit();
        // die('Too many requests');
    }

}