<?php require APPROOT . '/views/includes/header.php'; ?>
<section class="vh-100">
    <div class="py-5 h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-10 container">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-4">
                    <h1><?php echo 'Title: ' . $data["publication"]->publication_title ?> </h1>
                    <h5><?php echo 'Author:' . $data["publication"]->first_name . ' ' . $data["publication"]->middle_name . ' ' . $data["publication"]->last_name ?></h5>
                    <h5><?php echo 'Published Date:' . date(" m/d/Y H:i:s", strtotime($data["publication"]->timestamp)) . '<br><br>' ?></h5>
                    <div class="card-body">
                        <p><?php echo $data["publication"]->publication_text ?> </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add a comment -->
        <?php
        if (isLoggedIn()) {
            echo ' 
        <div class="my-3 py-1 text-dark">
            <div class="text-center">
                    <label class="form-label text-dark" for="textAreaExample">ADD A COMMENT</label>
            </div>
            <div class="col-md-8 col-lg-6 col-xl-10 container">
                    <div class="card p-3 shadow-2-strong" style="border-radius: 1rem;"">
                        <form action="" method="post" enctype=multipart/form-data">
                        <div class="form-outline">
                            <textarea class="form-control" id="commentTextArea" name="commentTextArea" rows="4" placeholder="Write comment..." style="resize: none;"></textarea>
                        </div>
                        <div class="d-flex justify-content-end mt-3 mr-4">
                            <button type ="submit" name="commentSubmit">SUBMIT</button>
                        </div>
                </form>
                <div class="text-dark">';
            '<hr>';
            foreach ($data["comments"] as $comment) {
                echo "<hr>";
                echo $comment->first_name . ' ' . $comment->middle_name . ' ' . $comment->last_name . ' ' . date(" m/d/Y H:i:s", strtotime($comment->timestamp));
                if ($comment->profile_id == $data["currentUser"]->profile_id) {
                    echo '<a class="mr-5" href="/Blog/Profile/editComment/' . $comment->publication_comment_id . '"><button>Edit</button></a>';
                    echo '<a href="/Blog/Profile/deleteComment/' . $comment->publication_comment_id  . ' /'. $comment->publication_id .' ""><button>Delete</button></a> ';
                }
                echo "<br>$comment->publication_comment_text<br>";
            }
        };

        '</div>
        </div>
    </div>';
        ?>
</section>

<?php require APPROOT . '/views/includes/footer.php'; ?>