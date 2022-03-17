<<<<<<< HEAD
<?php require APPROOT . '/views/includes/header.php'; 
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/Blog/Profile/getPublications">Edit profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/Blog/Profile/createPublication">Create a publication</a>
            </li>
            </li>

        </ul>

    </div>
</nav>
=======
<?php require APPROOT . '/views/includes/header.php';?>
>>>>>>> 84769336d7b1723763354e75a8d953e556aaf59d

<h1>New publication</h1>

<form action='' method='post'>

    <div class="form-group">
        <label for="titleinput">Title</label>
        <input name="title" type="text" class="form-control" id="titleinput" placeholder="Title">
    </div>
    <div class="form-group">
        <label for="textinput">Content</label>
        <input name="text" type="text" class="form-control" id="textinput" placeholder="Content">
    </div>
    <div class="form-group">
        <label for="status">Status:</label>
        <br>
        <input type="radio" value="public" id="public" name="status">
        <label for="public">Public</label>

        <input type="radio" id="private" value="private" name="status">
        <label for="private">Private</label>

    </div>

    <button type="submit" name="upload" class="btn-btn-primary">Upload</button>

</form>


<?php require APPROOT . '/views/includes/footer.php'; ?>