<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'; ?>

<?php use App\Model\Post; ?>
<?php use App\Controllers\Post\PostsController; ?>


<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/includes/notification.php'; ?>


<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card">
                <div class="card-header">
                    <h3>Add New Post</h3>
                </div>
                <div class="card-body">
                    <form action="/app/controllers/post/createPost.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label for="">Content</label>
                            <textarea name="content" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Author</label>
                            <input type="text" class="form-control" name="author" >
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" class="form-control" name="image" >
                        </div>
                        <button class="btn btn-primary btn-block">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/footer.php'; ?>