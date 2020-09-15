<?php

namespace App\Controllers;

class Validate {

    public static function minChars($string, $n)
    {
        if(\strlen($string) < $n) 
        {
            $_SESSION['error-message'] = "Title must be ".$n." characters minimum";
            header('Location: '.URL.'/views/admin/post/create.view.php');
            exit();
        }
        else {
            return true;
        }
    }

}