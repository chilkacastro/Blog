<?php require APPROOT . '/views/includes/header.php'; ?>

<section class="vh-100">
    <div class="container-fluid py-4 h-100">
        <div class="row d-flex justify-content-center align-items-center h-10">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5">
                        <h1 class="text-center">NEW PUBLICATION</h1>
                        <form action='' method='post' class="container-fluid">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input name="title" type="text" class="form-control <?php echo (!empty($data['empty_title'])) ? 'is-invalid' : ''; ?>" id="titleinput" placeholder="Title">
                                <span class="invalid-feedback"><?php echo $data['empty_title']; ?> </span>
                            </div>

                            <div class="form-group">
                                <label for="textinput">Content</label>
                                <textarea class="form-control" id="textinput" name= "text" rows="5" placeholder="Enter text here..." style="resize: none;"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="status" class="pr-2">Status:</label>
                                <input type="radio" value="public" id="public" name="status">
                                <label for="public" class="pr-2">Public</label>
                                <input type="radio" id="private" value="private" name="status">
                                <label for="private">Private</label>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" name="upload" class="btn-btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<?php require APPROOT . '/views/includes/footer.php'; ?>