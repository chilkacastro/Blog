<?php require APPROOT . '/views/includes/header.php'; ?>

<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-10">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5">
                        <h1 class="text-center">CREATE PROFILE</h1>
                        <form action='' method='post' enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="fnameinput">First Name</label>
                                <input name="fname" type="text" class="form-control col-14" id="fnameinput" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <label for="mnameinput">Middle Name</label>
                                <input name="mname" type="text" class="form-control col-14" id="mnameinput" placeholder="Middle Name">
                            </div>
                            <div class="form-group">
                                <label for="fnameinput">Last Name</label>
                                <input name="lname" type="text" class="form-control col-14" id="lnameinput" placeholder="Last Name">
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" name='register' class="btn btn-primary col-3 mt-3">Save</button>
                            <div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/includes/footer.php'; ?>
