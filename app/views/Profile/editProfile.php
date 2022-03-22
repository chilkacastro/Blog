<?php require APPROOT . '/views/includes/header.php'; ?>
<script>
function validateForm() {
  let fname = document.forms["editProfile"]["fname"].value;
  let lname = document.forms["editProfile"]["lname"].value;
  if (fname == "") {
    alert("First Name must be filled out");
    return false;
  }
  if (lname == "") {
    alert("Last Name must be filled out");
    return false;
  }
}
</script>
<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-10">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5">
                         <form class="container-fluid"  name="editProfile" action='' onsubmit="return validateForm()" method='post' enctype="multipart/form-data">
                            <h3 class="mb-3 d-flex justify-content-center">EDIT PROFILE</h3>
                            <div class="form-outline mb-4">
                                <label for="fnameinput">First Name</label>
                                <input name="fname" type="text" class="form-control" id="fnameinput" value="<?php echo $data->first_name?>">
                            </div>
                            <div class="form-outline mb-4">
                                <label for="mnameinput">Middle Name</label>
                                <input name="mname" type="text" class="form-control" id="mnameinput" value="<?php echo $data->middle_name?>">
                            </div>
                            <div class="form-outline mb-4">
                                <label for="fnameinput">Last Name </label>
                                <input name="lname" type="text" class="form-control" id="lnameinput" value="<?php echo $data->last_name?>">
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" name='editProfile' class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/includes/footer.php';?>

    