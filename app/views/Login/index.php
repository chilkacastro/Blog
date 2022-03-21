<?php require APPROOT . '/views/includes/header.php'; ?>
<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-10">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5">

                        <form class="px-4 py-3" method="post" action="">
                            <h3 class="mb-3 d-flex justify-content-center">SIGN IN</h3>

                            <div class="form-outline mb-4">
                                <label for="username">Username</label>
                                <input type="text" class="form-control
                                <?php
                                echo (!empty($data['username_error'])) ? 'is-invalid' : '';
                                ?>" id="username" name="username" placeholder="Username">
                                <span class="invalid-feedback">
                                    <?php echo $data['username_error']; ?>
                                </span>
                            </div>

                            <div class="form-outline mb-4">
                                <label for="password">Password</label>
                                <input type="password" class="form-control 
                                <?php
                                echo (!empty($data['password_error'])) ? 'is-invalid' : '';
                                ?>" id="password" name="password" placeholder="Password">
                                <span class="invalid-feedback">
                                    <?php
                                    echo $data['password_error'];
                                    ?>
                                </span>
                            </div>

                            <div class="mt-2 d-flex justify-content-center">
                                <button type="submit" name="login" class="btn btn-primary text-center">Login</button>
                            </div>

                            <p class="text-center mt-3">Not registered yet? <a href="/Blog/Login/create/">Sign Up</a></p>
                            <hr class="my-4">

                            <?php

                            if (!empty($data['msg'])) {
                                echo '<div class="alert alert-danger" role="alert">' .
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