<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'; ?>

<?php use App\Model\Post; ?>

<?php require_once 'views/partials/header.php'; ?>

<?php require_once 'views/includes/notification.php'; ?>

<?php 
    if(isset($_GET)) {
        $post = new Post; 
        $post = $post->show($_GET['id']);
    } else {
        header("Location: index.php");
    }
?>

<div class="container pt-5">
    <div class="row">
        <div class="col-12"><h3><?php echo $post->title; ?></h3></div>
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <a href=""><h6><?php echo $post->author; ?></h6></a>   
                    <p><?php echo formatTime($post->created_at); ?></p>             
                </div>
                <div class="card-body">
                    <?php echo $post->content; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<hr>
<br>

<?php require_once 'views/includes/comments.php'; ?>

<?php require_once 'views/partials/footer.php'; ?>

<script>
    $( document ).ready(function() {

        // Toggle Subcomments        
        $(".view-replies").click(function(){
            $(this).parent().parent().siblings(".subcomments").toggle();
        })

        // Toggle Add Subcomment
        $(".add-subcomment").click(function(){
            $(this).parent().parent().siblings(".subcomment-form").toggle();
        })
    });
</script>


  