<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'; ?>

<?php use App\Model\Post; ?>
<?php use App\Controllers\Post\PostsController; ?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/includes/notification.php'; ?>

<?php 
    if(isset($_GET))
    {
        $post = PostsController::find($_GET['id']);        
    } 
    else 
    {
        header('Location: '.URL.'/views/admin/post/all.view.php');
        exit();
    }
?>

<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Post</h3>
                </div>
                <div class="card-body">
                    <form action="/app/controllers/post/UpdatePost.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $post->id; ?>">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control" name="title" value="<?php echo $post->title; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Content</label>
                            <textarea name="content" class="form-control" cols="30" rows="10"><?php echo $post->content; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Author</label>
                            <input type="text" class="form-control" name="author" value="<?php echo $post->author; ?>">
                        </div>
                        <button class="btn btn-primary btn-block">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/footer.php'; ?>