<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'; ?>

<?php use App\Model\Post; ?>

<?php require_once 'views/partials/header.php'; ?>

<?php require_once 'views/includes/notification.php'; ?>


<?php 

    $posts = new Post;

    foreach($posts->all() as $post)
    {
        echo $post->id;
    }



?>


<?php require_once 'views/partials/footer.php'; ?>


  