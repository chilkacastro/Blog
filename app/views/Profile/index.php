<?php require APPROOT . '/views/includes/header.php'; 
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
 

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/MVC/User/getUsers">Get Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/MVC/User/createUser">Create User</a>
</li>
     
    </ul>
   
  </div>
</nav>

    <h1>User View</h1>
    <p>This view is invoked by UserController</p>
<?php require APPROOT . '/views/includes/footer.php'; ?>