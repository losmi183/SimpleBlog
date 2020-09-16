<?php 

session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'; 

use App\Model\Post;
use App\Controllers\Validate;
use App\Controllers\Post\ImageUpload;


if(isset($_POST))
{
    $filename = ImageUpload::upload('image', 'images');

    // Validation true Validate class static method
    Validate::minChars($_POST['title'], 3);
    Validate::minChars($_POST['content'], 5);
    Validate::minChars($_POST['author'], 3);


    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];
    
    // Create new Post
    $posts = new Post;
    $posts->create($title, $content, $author, $filename);

    // Redirect to all posts with message
    $_SESSION['success-message'] = "Post Created";
    header('Location: '.URL.'views/admin/post/all.view.php');
    exit();
}

