<?php require APPROOT . '/views/includes/header.php'; 
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
 

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/Blog/Profile/editProfile">Edit profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Blog/Profile/editPublication">Edit a publication</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Blog/Profile/createPublication">Create a publication</a>
      </li>
      
     
    </ul>
   
  </div>
</nav>

    <h1>Profile </h1>
    <table class="table table-bordered">
        <tr>
            <td>Title</td>
            <td>Date</td>
            <td>Author</td>
        </tr>
        <?php
        if (!empty($data["publications"])) {
            foreach($data["publications"] as $publication){
                echo"<td>
                <a href='/Blog/Home/details/$publication->publication_title'>$publication->publication_title</a>
                </td>";
                echo"<td>$publication->timestamp</td>";
                echo"<td>$publication->first_name $publication->middle_name $publication->last_name</td>";
                echo"</tr>";
            }
        }
        ?>
    </table>
    <h1>Comments </h1>

    <?php
if(!empty($data['msg'])){
    echo '<div class="alert alert-danger" role="alert">'.
        $data['msg'].'
    </div>';
}
?>
<?php require APPROOT . '/views/includes/footer.php'; ?>