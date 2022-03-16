<?php require APPROOT . '/views/includes/header.php';  ?>

<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-10">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <form class="px-4 py-3" method="post" action="">
                            <h3 class="mb-5">Sign in</h3>

                            <div class="form-outline mb-4">
                                <input type="text" class="form-control form-control-lg" id="usernamex-2" name="username" placeholder="Username">
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" class="form-control form-control-lg" id="passwordX-2" name="password" placeholder="Password">
                            </div>

                            <div class='mt-2'>
                                <button type="submit" name="login" class="btn btn-primary text-center">Login</button>
                                <p class="text-center">Not registered yet? <a href="/Blog/Login/create/">Sign Up</a> </p>
                            </div>

                            <hr class="my-4">

                            <?php

                            if ($data != []) {
                                echo '<div class="alert alert-default" role="alert" style="background-color:#b54f4f;">' .
                                    $data['msg'] . '
                                 </div>';
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/includes/footer.php'; ?>