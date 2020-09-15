<?php 

session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'; 

use App\Model\Post;

if(isset($_GET))
{    
    // Create new Post
    $posts = new Post;
    $posts->delete($_GET['id']);

    // Redirect to all posts with message
    $_SESSION['success-message'] = "Post Deleted";
    header('Location: '.URL.'/views/admin/post/all.view.php');
    exit();
}