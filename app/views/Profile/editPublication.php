<?php require APPROOT . '/views/includes/header.php'; ?>

<section class="vh-100">
    <div class="container-fluid py-4 h-100">
        <div class="row d-flex justify-content-center align-items-center h-10">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5">
                        <h1 class="text-center">EDIT PUBLICATION</h1>
                        <form action='' method='post'>
                            <div class="form-group">
                                <label for="titleinput"></label>
                                <input name="title" type="text" class="form-control" id="titleinput" value="<?php echo $data->publication_title ?>"> </div>
                                <div class="form-group">
                                    <label for="textinput"></label>
                                    <input name="text" type="text" class="form-control" id="textinput" value="<?php echo $data->publication_text ?>"></input>
                                </div>

                                <div class="form-group">
                                    <label for="status" class="pr-2">Status:</label>
                                    <input type="radio"  id="public" value="public" name="status" <?php echo ($data->publication_status == 'public' ? 'checked="checked"': '');?>>
                                    <label for="public" class="pr-2">Public</label>
                                    <input type="radio" id="private" value="private" name="status" <?php echo ($data->publication_status == 'private' ? 'checked="checked"': '');?>>
                                    <label for="private">Private</label>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" name="uploadPub" class="btn-btn-primary">Upload</button>
                                </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


<?php require APPROOT . '/views/includes/footer.php'; ?>










