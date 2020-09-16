<?php 

session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'; 

use App\Model\Post;
use App\Controllers\Validate;
use App\Controllers\Post\ImageUpload;


if(isset($_POST))
{
    // Validation true Validate class static method
    Validate::minChars($_POST['title'], 3);
    Validate::minChars($_POST['content'], 5);
    Validate::minChars($_POST['author'], 3);


    // Check if new image added and creating new or old $filename for image
    $filename = newImageAdded();


    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];

    
    // Create new Post
    $posts = new Post;
    $posts->update($id, $title, $content, $author, $filename);

    // Redirect to all posts with message
    $_SESSION['success-message'] = "Post Updated";
    header('Location: '.URL.'/views/admin/post/all.view.php');
    exit();
}


function newImageAdded()
{
    if($_FILES["image"]["error"] == 0)
    {
        // First delete old image
        unlink($_SERVER['DOCUMENT_ROOT'] . '/images/' . $_POST['old_image']);
        
        // uploading new image
        return ImageUpload::upload('image', 'images');
    }
    else 
    {
        return $_POST['old_image'];
    }
}

    
