<?php require APPROOT . '/views/includes/header.php';  ?>

<form class="px-4 py-3" method="post" action="">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
    <div class='mt-2'> 
        <button type="submit" name="login" class="btn btn-primary">Sign in</button>
        <p class="text-center">Not registered yet? <a href="/Blog/Login/create">Sign Up</a> </p>
    </div>
    <?php

    if($data != []){
        echo '<div class="alert alert-danger" role="alert">'.
            $data['msg'].'
        </div>';
    }

?>

</form>



<?php require APPROOT . '/views/includes/footer.php'; ?>