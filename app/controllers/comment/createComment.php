<?php

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'; 

use App\Model\Comment;

// echo $_POST['post_id'];

if(isset($_POST)) {

    $comment = new Comment();
    $comment->create($_POST['parent_id'], $_POST['name'], $_POST['content']);

    $location = URL . 'post.php?id=' . $_POST['post_id'];

    header("Location: {$location}");
    exit();

}