<?php
    $comments = new App\Model\Comment();
    $results = $comments->all();
?>


<div class="container">
    <div class="row">

    <?php $subcomments = $comments->allSubcomments(1); 
        $num = count($comments->allSubcomments(3));
        echo $num;
        // var_dump($subcomments);
    ?>

        <div class="col-12">
            <h5>All Comments</h5>
            <?php foreach ($results as $comment) : ?>
                <div class="comment">
                    <div class="d-flex p-3">
                        <h5 class="comment-title">
                            <p><?php echo $comment->name; ?></p>
                            <p class="comment-time"><?php echo formatTime($comment->created_at); ?></p>
                        </h5>
                        <p class="comment-content"><?php echo $comment->content; ?></p>
                    </div> 
                    <div class="d-flex justify-content-between">
                        <div class="p-3">
                            <span id="<?php echo $comment->id; ?>" class="like"><p class="material-icons up mr-1">thumb_up</p><span><?php echo $comment->likes; ?></span></span> 
                        </div>
                        <div class="p-3">
                            <button class="text-success view-replies">View replies</button>
                            <button class="text-danger add-subcomment">Add Comment</button>
                        </div>
                    </div>


                    <!-- Add SubComment  -->
                    <div class="subcomment-form col-12 mt-5">
                        <h5 class="mb-3">Reply This Comment</h5>
                        <form action="/app/controllers/comment/createComment.php" method="POST">
                            <input type="hidden" name="post_id" value="<?php echo $_GET['id']; ?>">
                            <input type="hidden" name="parent_id" value="<?php echo $comment->id; ?>">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label>Your Comment</label>
                                <textarea name="content" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                            <button class="btn btn-success">Send</button>
                        </form>
                    </div>
                    <br>



                    <div class="subcomments">
                        <!-- Checking if there is subcomments  -->
                        <?php if(count($subcomments = $comments->allSubcomments($comment->id)) > 0) :  ?>
                            <!-- Printing Subcomments  -->
                            <?php foreach($subcomments as $comment) : ?>
                                <div class="sub-comment">
                                        <div class="d-flex p-3">
                                            <h5 class="comment-title">
                                                <p><?php echo $comment->name; ?></p>
                                                <p class="comment-time"><?php echo formatTime($comment->created_at); ?></p>
                                            </h5>
                                            <p class="comment-content"><?php echo $comment->content; ?></p>
                                        </div> 
                                    <div class="p-3">
                                        <a href=""><p class="material-icons up mr-1">thumb_up</p></a> 49
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Add New Comment  -->
        <div class="col-12 mt-5">
            <h5 class="mb-3">Leave Comment</h5>
            <form action="/app/controllers/comment/createComment.php" method="POST">
                <input type="hidden" name="post_id" value="<?php echo $_GET['id']; ?>">
                <input type="hidden" name="parent_id" value="0">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label>Your Comment</label>
                    <textarea name="content" cols="30" rows="3" class="form-control"></textarea>
                </div>
                <button class="btn btn-success">Send</button>
            </form>
        </div>

    </div>
</div>

