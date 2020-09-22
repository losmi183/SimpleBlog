<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'; ?>

<?php use App\Model\Post; ?>

<?php require_once 'views/partials/header.php'; ?>

<?php require_once 'views/includes/notification.php'; ?>

<?php $posts = new Post; ?>

<div class="container pt-5">
    <div class="row">
        <div class="col-12"><h3>Latest News</h3></div>
        <div class="col-12">
        <?php foreach($posts->all() as $post): ?>
            <div class="card">
                <div class="card-header">
                <a href="post.php?id=<?php echo $post->id; ?>"><h6><?php echo $post->title; ?></h6></a>                
                    <small><?php echo $post->author; ?></small>
                </div>
                <div class="card-body">
                    <img width="100%" src="images/<?php echo $post->image; ?>" alt="" class="img-fluid">
                    <?php echo $post->content; ?>
                </div>
            </div>
            <br>
            <hr>
            <br>
        <?php endforeach; ?>
        </div>
    </div>
</div>




<?php require_once 'views/partials/footer.php'; ?>


  