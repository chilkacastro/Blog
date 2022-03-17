<?php require APPROOT . '/views/includes/header.php'; 
?>



<h1>Edit publication</h1>

<form action='' method='post'>

    <div class="form-group">
        <label for="titleinput"></label>
        <input name="title" type="text" class="form-control" id="titleinput" value="<?php echo $data->publication_title?>"
    </div>
    <div class="form-group">
        <label for="textinput"></label>
        <input name="text" type="text" class="form-control" id="textinput" value="<?php echo $data->publication_text?>">
    </div>
    <div class="form-group">
        <label for="status">Status:</label>
        <br>
        <input type="radio" value="public" id="public" name="status">
        <label for="public">Public</label>

        <input type="radio" id="private" value="private" name="status">
        <label for="private">Private</label>

    </div>

    <button type="submit" name="uploadPub" class="btn-btn-primary">Upload</button>

</form>


<?php require APPROOT . '/views/includes/footer.php'; ?>