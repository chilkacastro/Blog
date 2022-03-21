<?php require APPROOT . '/views/includes/header.php'; ?>
<h1 class="text-center mt-5 mb-3">Welcome to the Main Page!</h1>
<div class="col-md-9 col-md-push-1 container">
    <form action="/Blog/Home/search" method="post" id="searchForm" class="input-group container d-flex justify-content-center">
        <div class="input-group-btn search-panel">
            <select name="search_param" id="search_param" class="btn btn-dark dropdown-toggle form-select form-select-sm" aria-label=".form-select-sm example" data-toggle="dropdown">
                <option value="all"><a href="/Blog/Home/searchByAuthor/">All</a></option>
                <option value="author">Author</option>
                <option value="title">Title</option>
                <option value="content">Content</option>
            </select>
        </div>
        <input type="text" class="form-control col-6" name="keywords" placeholder="Enter something...">
        <span class="input-group-btn">
            <button type="submit" name="submit" class="btn btn-primary">Search</button>
        </span>
    </form>

    <?php
    if (!empty($data['msg'])) {
        echo 
            '<div class="alert alert-default" role="alert" style="text-align:center;font-size:18px;background-color:#b54f4f;">
                ' . $data['msg'] . '
            </div>';
    } ?>

</div>
<h3 class="text-center mt-5 mb-3">Publications</h3>
<table class="table table-bordered container">
    <tr>
        <td>Title</td>
        <td>Date</td>
        <td>Author</td>
    </tr>
    <?php
    if (!empty($data["publications"])) {
        foreach ($data["publications"] as $publication) {
            echo 
                "<td>
                    <a href='/Blog/Home/details/$publication->publication_id'> $publication->publication_title</a>
                </td>";
            echo "<td>" . date(" m/d/Y", strtotime($publication->timestamp)) . "</td>";
            echo "<td>$publication->first_name $publication->middle_name $publication->last_name</td>";
            echo "</tr>";
        }
    } ?>
</table>
<?php require APPROOT . '/views/includes/footer.php'; ?>