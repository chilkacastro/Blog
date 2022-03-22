<?php require APPROOT . '/views/includes/header.php'; ?>
<section class="vh-100">
    <div class="py-5 h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-10 container">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-4">
                    <h1><?php echo 'Title: ' . $data["publication"]->publication_title ?> </h1>
                    <h5><?php echo 'Author:' . $data["publication"]->first_name . ' ' . $data["publication"]->middle_name . ' ' . $data["publication"]->last_name ?>
                    </h5>
                    <h5><?php echo 'Published Date:' . date(" m/d/Y H:i:s", strtotime($data["publication"]->timestamp)) . '<br><br>' ?>
                    </h5>
                    <div class="card-body">
                        <p><?php echo $data["publication"]->publication_text ?> </p>
                    </div>
                    <?php
                        // Add a comment icon when not logged in
                        if (!isLoggedIn()) {
                            echo ' 
                            <div class="card-body">
                                <div class="text-dark container d-flex justify-content-center mt-1">
                                    <a class="nav-link" href="/Blog/Login/"><i class="fa-regular fa-comment"></i> Add a comment </a></li>
                            </div>
                            
                            <div class="text-dark">';
                            // displays all the comments
                            foreach ($data["comments"] as $comment) {
                                echo "<hr>";
                                echo $comment->first_name . ' ' . $comment->middle_name . ' ' . $comment->last_name . ' ' . date(" m/d/Y H:i:s", strtotime($comment->timestamp));
                                echo "<br>$comment->publication_comment_text<br>";
                                       
                            };
                            '</div>';
                        }
                    ?>
                </div>
            </div>
        </div>
        <script>
        function validateForm() {
            let comment = document.forms["commentForm"]["commentTextArea"].value;
            if (comment == "") {
                alert("Comment must be filled out");
                return false;
            }
        }
        </script>
        <!-- Add a comment when logged in -->
        <?php
        if (isLoggedIn()) {
            echo ' 
            <div class="my-3 py-1 text-dark">
                <div class="text-center">
                    <label class="form-label text-dark" for="textAreaExample">ADD A COMMENT</label>
                </div>
            <div class="col-md-8 col-lg-6 col-xl-10 container">
                <div class="card p-3 shadow-2-strong" style="border-radius: 1rem;"">
                    <form action="" name="commentForm" onsubmit="return validateForm()" method="post" enctype=multipart/form-data">
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
                echo "<br>$comment->publication_comment_text<br>";
            };

            '</div>
        </div>
    </div>';
        }
        ?>
</section>
<?php require APPROOT . '/views/includes/footer.php'; ?>