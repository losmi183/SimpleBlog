<?php 

session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'; 

use App\Model\Post;

if(isset($_GET))
{    
    // Create new Post
    $post = new Post;
    $image = $post->show($_GET['id'])->image;

    // Delete image on storage if exists
    if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/images/' . $image)) 
    {
        unlink($_SERVER['DOCUMENT_ROOT'] . '/images/' . $image); 
    }

    // Delete row in database
    $post->delete($_GET['id']);

    // Redirect to all posts with message
    $_SESSION['success-message'] = "Post Deleted";
    header('Location: '.URL.'/views/admin/post/all.view.php');
    exit();
}