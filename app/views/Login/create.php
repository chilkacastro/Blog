<?php require APPROOT . '/views/includes/header.php';  ?>
<section class="vh-100 bg-image">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-2">Create an account</h2>


              <form class="px-4 py-3" method="post" action="">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control <?php echo (!empty($data['username_error'])) ? 'is-invalid' : ''; ?>" id="username" name="username" placeholder="Username">
                  <span class="invalid-feedback"><?php echo $data['username_error']; ?> </span>
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Email">
                  <span class="invalid-feedback"><?php echo $data['email_error']; ?> </span>
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control  <?php echo (!empty($data['password_len_error'])) ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Password">
                  <span class="invalid-feedback"><?php echo $data['password_len_error']; ?> </span>
                </div>

                <div class="form-group">
                  <label for="verify_password">Re-enter the password</label>
                  <input type="password" class="form-control  <?php echo (!empty($data['password_match_error'])) ? 'is-invalid' : ''; ?>" id="verify_password" name="verify_password" placeholder="Re-enter the password">
                  <span class="invalid-feedback"><?php echo $data['password_match_error']; ?> </span>
                </div>

                <div class="d-flex justify-content-center align-items-center mt-3 mb-3">
                <button type="submit" name="signup" class="btn btn-primary mt-2"> Sign up</button>
                </div>
                <p class="text-center">Already registered? <a href="/Blog/Login/"> Login</a> </p>

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
  </div>
</section>
<?php require APPROOT . '/views/includes/footer.php'; ?>