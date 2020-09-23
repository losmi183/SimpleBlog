<?php

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'; 

use App\Model\Comment;

$id = $_GET['id'];

$comment = new Comment();
$comment->addLike($id);

return 'success';

