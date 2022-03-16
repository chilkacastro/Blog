<?php require APPROOT . '/views/includes/header.php'; ?>

<!-- <h1>Publications</h1> -->

<!-- search  -->
<div class="col-md-9 col-md-push-1">
    <h3 class="text-center">Search</h3>
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">

                <form action="#" method="get" id="searchForm" class="input-group">
                    <div class="input-group-btn search-panel">
                        <select name="search_param" id="search_param" class="btn btn-dark dropdown-toggle form-select form-select-sm" aria-label=".form-select-sm example" data-toggle="dropdown">
                            <option value="all">All</option>
                            <option value="author">Author</option>
                            <option value="title">Title</option>
                            <option value="content">Content</option>
                        </select>
                    </div>
                    <input type="text" class="form-control" name="x" placeholder="Search term...">

                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </span>

                </form><!-- end form -->

            </div><!-- end col-xs-8 -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end col-md-9 -->

<!-- <div>
    <form class="d-flex">
        <input class="form-control me-sm-2" type="text" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div> -->

    
</nav>
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
                echo"<td>$publication->profile_id</td>";
                echo"</tr>";

            }
        }
        ?>
    </table>


   
<?php require APPROOT . '/views/includes/footer.php'; ?>
<?php
if(!empty($data['msg'])){
    echo '<div class="alert alert-danger" role="alert">'.
        $data['msg'].'
    </div>';
}
?>
<?php require APPROOT . '/views/includes/footer.php'; ?>