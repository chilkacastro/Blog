<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- for theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/sketchy/bootstrap.min.css" integrity="sha384-NCwXci5f5ZqlDw+m7FwZSAwboa0svoPPylIW3Nf+GBDsyVum+yArYnaFLE9UDzLd" crossorigin="anonymous">
    <!-- for the search -->
    <title><?php echo SITENAME; ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link disabled" href="/Blog/Home">Home</a>
                    </li>
                    <?php
                    if (isLoggedIn()) {
                        echo '<div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                            <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle disabled" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Profile
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="/Blog/Profile">View Profile</a></li>
                                <li><a class="dropdown-item" name="editProfile" href="/Blog/Profile/editProfile/' . $_SESSION['user_id'] . '">Edit Profile</a></li>
                                <li><a class="dropdown-item" href="/Blog/Profile/createPublication">Create a publication</a></li>
                            </ul>
                            </li>
                            </ul>
                            </div>';
                    } 
                    else {
                        echo '<li class="nav-item">
                        <a class="nav-link" href="/Blog/Profile">Profile</a>
                        </li>';
                    }
                    ?>
                    </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if (isLoggedIn()) {
                        echo '<li class="nav-item"><a class="nav-link" href="/Blog/Login/logout"><i class="fa-solid fa-sign-out"></i> Logout  ' . $_SESSION['user_username'] . '</a></li>';
                    } else {
                        echo '<li class="nav-item"><a class="nav-link" href="/Blog/Login/create"><i class="fa-solid fa-user-plus"></i> Sign Up</a></li>
                            <li class="nav-item"><a class="nav-link" href="/Blog/Login"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

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