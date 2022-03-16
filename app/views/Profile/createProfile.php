<?php require APPROOT . '/views/includes/header.php'; 
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
 

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
  <h1>Create Profile View</h1>
  </div>
</nav>

    
    
    <form action='' method='post' enctype="multipart/form-data">

    <div class="form-group">
        <label for="fnameinput">First Name</label>
        <input name="fname" type="text" class="form-control" id="fnameinput" placeholder="First Name">
    </div>
    <div class="form-group">
        <label for="mnameinput">Middle Name</label>
        <input name="mname" type="text" class="form-control" id="mnameinput" placeholder="Middle Name">
    </div>
    <div class="form-group">
        <label for="fnameinput">Last Name</label>
        <input name="lname" type="text" class="form-control" id="lnameinput" placeholder="Last Name">
    </div>
    <!-- <div class="form-group">
        <label for="cityinput">City</label>
        <input name="city" type="text" class="form-control" id="cityinput" placeholder="City">
    </div> -->
    <!-- <div class="form-group">
        <label for="profileinput">Profile picture</label>
        <input type='file' name='picture' class='form-control' />
    </div> -->

    <button type="submit" name='register' class="btn btn-primary">Register</button>
    </form>

   
<?php require APPROOT . '/views/includes/footer.php'; ?>