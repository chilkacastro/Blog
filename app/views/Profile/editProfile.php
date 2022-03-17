<?php require APPROOT . '/views/includes/header.php'; ?>

<form action='' method='post' enctype="multipart/form-data">

    <div class="form-group">
        <label for="fnameinput">First Name</label>
        <input name="fname" type="text" class="form-control" id="fnameinput" value= "<?php echo $data->first_name?>">
    </div>
    <div class="form-group">
        <label for="mnameinput">Middle Name</label>
        <input name="mname" type="text" class="form-control" id="mnameinput" value="<?php echo $data->middle_name?>">
    </div>
    <div class="form-group">
        <label for="fnameinput">Last Name</label>
        <input name="lname" type="text" class="form-control" id="lnameinput" value="<?php echo $data->last_name?>">
    </div>
    <!-- <div class="form-group">
        <label for="cityinput">City</label>
        <input name="city" type="text" class="form-control" id="cityinput" placeholder="City">
    </div> -->
    <!-- <div class="form-group">
        <label for="profileinput">Profile picture</label>
        <input type='file' name='picture' class='form-control' />
    </div> -->

    <button type="submit" name='editProfile' class="btn btn-primary">Save</button>
</form>

<?php require APPROOT . '/views/includes/footer.php'; ?>