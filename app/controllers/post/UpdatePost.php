<?php 

session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'; 

use App\Model\Post;
use App\Controllers\Validate;

if(isset($_POST))
{
    // Validation true Validate class static method
    Validate::minChars($_POST['title'], 3);
    Validate::minChars($_POST['content'], 5);
    Validate::minChars($_POST['author'], 3);


    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];
    
    // Create new Post
    $posts = new Post;
    $posts->update($id, $title, $content, $author);

    // Redirect to all posts with message
    $_SESSION['success-message'] = "Post Updated";
    header('Location: '.URL.'/views/admin/post/all.view.php');
    exit();
}

    
