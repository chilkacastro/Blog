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
                                <input name="title" type="text"
                                    class="form-control <?php echo (!empty($data['empty_title'])) ? 'is-invalid' : ''; ?>"
                                    id="titleinput" placeholder="Title">
                                <span class="invalid-feedback"><?php echo $data['empty_title']; ?> </span>
                            </div>

                            <div class="form-group">
                                <label for="textinput">Content</label>
                                <textarea
                                    class="form-control <?php echo (!empty($data['empty_content'])) ? 'is-invalid' : ''; ?>"
                                    id="textinput" name="text" rows="5" placeholder="Enter text here..."
                                    style="resize: none;"></textarea>
                                <span class="invalid-feedback"><?php echo $data['empty_content']; ?> </span>
                            </div>
                            <label for="status" class="pr-2">Status:</label>
                            <div class="form-check <?php echo (!empty($data['empty_content'])) ? 'is-invalid' : ''; ?>">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Public
                                </label>
                            </div>
                            <div class="form-check <?php echo (!empty($data['empty_content'])) ? 'is-invalid' : ''; ?>">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Private
                                </label>
                            </div>
                            <span class="invalid-feedback"><?php echo $data['empty_status']; ?> </span>
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