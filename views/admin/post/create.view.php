<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'; ?>

<?php use App\Model\Post; ?>
<?php use App\Controllers\Post\PostsController; ?>


<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/includes/notification.php'; ?>

<!-- WYSIWYG plugin scripts  -->
<script src="https://cdn.tiny.cloud/1/82chw70nauojexfwuxjtpzs2xxxbb6igj3ndmcoxktu8894d/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
    selector: '#mytextarea'
    });
</script>

<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card">
                <div class="card-header">
                    <h3>Add New Post</h3>
                </div>
                <div class="card-body">
                    <form id="main-form" action="/app/controllers/post/createPost.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label for="">Content</label>
                            <textarea id="mytextarea" name="content" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Author</label>
                            <input type="text" class="form-control" name="author" >
                        </div>

                        <hr>

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