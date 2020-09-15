<?php 

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'; 

session_start();

use App\Controllers\VerificationEmail;

?>

<?php

if(isset($_POST)) {

    $db = new \PDO('mysql:dbname=blog;host=localhost;charset=utf8mb4', 'root', '');

    $auth = new \Delight\Auth\Auth($db);

    try {
        $userId = $auth->register($_POST['email'], $_POST['password'], $_POST['name'], function ($selector, $token) {
            echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
            $url = '<a href="blog.me/verify_email.php?selector=' . \urlencode($selector) . '&token=' . \urlencode($token) . '">Click Here To Validate your EMail</a>';

            $verificationEmail = new VerificationEmail();

            $verificationEmail->sendVerification($_POST['email'], $url);
        });

        echo 'We have signed up a new user with the ID ' . $userId;
    }
    catch (\Delight\Auth\InvalidEmailException $e) {
        die('Invalid email address');
    }
    catch (\Delight\Auth\InvalidPasswordException $e) {
        die('Invalid password');
    }
    catch (\Delight\Auth\UserAlreadyExistsException $e) {
        die('User already exists');
    }
    catch (\Delight\Auth\TooManyRequestsException $e) {
        die('Too many requests');
    }
}


