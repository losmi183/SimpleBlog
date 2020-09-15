<?php 

namespace App\Controllers\Post;

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'; 

use App\Model\Post;

class PostsController {

    public static function index()
    {        
        $posts = new Post;
        return $posts->all();
    }   

    public static function find($id)
    {        
        $post = new Post;
        return $post->show($id);
    }   
}