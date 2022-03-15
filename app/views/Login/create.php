<?php require APPROOT . '/views/includes/header.php';  ?>


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
    
    <button type="submit" name="signup" class="btn btn-primary mt-2"> Sign up</button>
    <p class="text-center">Already registered?<a href="/Blog/Login/">Login</a> </p>

    <?php

if(!empty($data['msg'])){
    echo '<div class="alert alert-danger" role="alert">'.
        $data['msg'].'
    </div>';
}

?>
  </form>

<?php require APPROOT . '/views/includes/footer.php'; ?>