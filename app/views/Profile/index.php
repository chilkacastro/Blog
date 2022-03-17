<?php require APPROOT . '/views/includes/header.php'; ?>
<h1 class= "text-center mt-3">Profile</h1>
<p class= "text-center mt-3">Nothing here yet to show information of Author</p>
<h1 class= "text-center mt-3">Publications</h1>
<table class="container table table-bordered">
    <tr>
        <td>Title</td>
        <td>Date</td>
        <td>Author</td>
        <td>Status</td>
        <td colspan="3" class="text-center"> Actions</td>
    </tr>
    <?php
        if (!empty($data["publications"])) {
            foreach($data["publications"] as $publication){
                echo"<td>
                <a href='/Blog/Profile/details/$publication->publication_id'>$publication->publication_title</a>
                </td>";
                echo"<td>$publication->timestamp</td>";
                echo"<td>$publication->first_name $publication->middle_name $publication->last_name</td>";
                echo"<td>$publication->publication_status</td>";
                echo"<td>
                <a href='/Blog/Profile/details/$publication->publication_id'> Details</a>
                </td>";
                echo"<td>
                <a href='/Blog/Profile/editPublication/$publication->publication_id'> Edit</a>
                </td>";
                echo"<td>
                <a href='/Blog/Profile/delete/$publication->publication_id'> Delete</a>
                </td>";
                echo"</tr>";
            }
        }
        ?>
</table>

<h1 class= "text-center mt-3">Comments</h1>

<?php
if(!empty($data['msg'])){
    echo '<div class="alert alert-danger" role="alert">'.
        $data['msg'].'
    </div>';
}
?>
<?php require APPROOT . '/views/includes/footer.php'; ?>