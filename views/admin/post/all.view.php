<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'; ?>

<?php use App\Model\Post; ?>
<?php use App\Controllers\Post\PostsController; ?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/includes/notification.php'; ?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/includes/notification.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>All Post</h3>
                    <a href="create.view.php" class="btn btn-primary">New Post</a>
                </div>
                <div class="card-body">
                    <table class="table">

                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Author</th>
                            <th>Image</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>

                    <?php foreach(PostsController::index() as $post) : ?>
                        <tr>
                            <td><?php echo $post->id; ?></td>
                            <td><?php echo $post->title; ?></td>
                            <td><?php echo shortText($post->content); ?></td>
                            <td><?php echo $post->author; ?></td>
                            <td><img height="80px" src="/images/<?php echo $post->image; ?>" alt=""></td>
                            <td><a href="#" class="btn btn-success">View</a></td>
                            <td><a href="/views/admin/post/edit.view.php?id=<?php echo $post->id; ?>" class="btn btn-primary">Edit</a></td>
                            <td><a href="/app/controllers/post/deletePost.php?id=<?php echo $post->id; ?>" class="btn btn-danger">Delete</a></td>                        </tr>
                    <?php endforeach; ?>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/footer.php'; ?>