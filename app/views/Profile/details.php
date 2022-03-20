<?php require APPROOT . '/views/includes/header.php'; ?>
<section class="vh-100">
    <div class="py-5 h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-10 container">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-4">
                    <h1> <?php echo 'Title: ' . $data->publication_title ?> </h1>
                    <h5> <?php echo 'Author:' . $data->first_name . ' ' . $data->middle_name . ' ' . $data->last_name?></h5>
                    <h5> <?php echo 'Published Date:' . date(" m/d/Y", strtotime($data->timestamp)) . '<br><br>' ?></h5>
                    <div class="card-body">
                        <p> <?php echo $data->publication_text ?> </p>
                    </div>
                </div>
                <!-- Comment icon appears only when author is not signed in -->
<?php
if (!isLoggedIn()) {
    echo '<div class="container d-flex justify-content-center mt-2">
            <a class="nav-link" href="/Blog/Login/"><i class="fa-regular fa-comment"></i> Add a comment </a></li>
        </div>';
}
?>
            </div>
        </div>
        <!-- Add a comment -->
<?php
if (isLoggedIn()) {
    echo ' 
        <div class="my-3 py-1 text-dark">
            <div class="text-center">
                    <label class="form-label text-light" for="textAreaExample">ADD A COMMENT</label>
            </div>
            <div class="col-md-8 col-lg-6 col-xl-10 container">
                    <div class="card p-3 shadow-2-strong" style="border-radius: 1rem;"">
                        <div class="form-outline">
                            <textarea class="form-control" id="textAreaExample" rows="4"  placeholder="Write comment..." style="resize: none;"></textarea>
                        </div>
                        <div class="d-flex justify-content-end mt-3 mr-4">
                            <button type="button" class="btn btn-success">Submit</button>
                        </button>
                        </div>
                    </div>
            </div>
        </div>';
}
?>
</section>
<?php require APPROOT . '/views/includes/footer.php'; ?>