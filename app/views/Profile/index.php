<?php require APPROOT . '/views/includes/header.php'; ?>
<h1 style="margin-left: 20px;" class="mt-3 ml-3">Welcome, <?php echo $data['profile']->first_name . ' ' .  $data['profile']->middle_name . ' ' . $data['profile']->last_name?> </h1>
<hr>
<h3 class="text-center mt-3">Publications</h3>
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
        foreach ($data["publications"] as $publication) {
            echo "<td>
        <a href='/Blog/Profile/details/$publication->publication_id'>$publication->publication_title</a>
        </td>";

            echo "<td>" . date(" m/d/Y", strtotime($publication->timestamp)) . "</td>";
            echo "<td>$publication->first_name $publication->middle_name $publication->last_name</td>";
            echo "<td>$publication->publication_status</td>";
            echo "<td>
        <a href='/Blog/Profile/details/$publication->publication_id'> Details</a>
        </td>";
            echo "<td>
        <a href='/Blog/Profile/editPublication/$publication->publication_id'> Edit</a>
        </td>";
            echo "<td>
        <a href='/Blog/Profile/delete/$publication->publication_id'> Delete</a>
        </td>";
            echo "</tr>";
  
        }
    }
    ?>
    
</table>

<br><br>

<table class="container table table-bordered">  
    <tr>
        <td>Comment Text</td>
        <td>Publication Title</td>
        <td>Date</td>
        <td colspan="3" class="text-center"> Actions</td>
    </tr>
<h3 class="text-center mt-3">Comments</h3>
<?php
       foreach ($data["authorComments"] as $comment) {
             echo
            "<td>
                <p>$comment->publication_comment_text</p>
            </td>";
             echo
            "<td>
                <a href='/Blog/Profile/details/$comment->publication_id'>$comment->publication_title</a>
            </td>";
            echo "<td>" . date(" m/d/Y", strtotime($comment->timestamp)) . "</td>";
            echo "<td>
                    <a href='/Blog/Profile/editComment/$comment->publication_comment_id'> Edit</a>
                </td>";

            echo "<td>
                    <a href='/Blog/Profile/deleteComment/$comment->publication_comment_id'> Delete</a>
                </td>";
            echo "</tr>";
  
        }
?>
</table>


<?php
if (!empty($data['msg'])) {
    echo '<div class="alert alert-danger" role="alert">' .
        $data['msg'] . '
    </div>';
}
?>
<div></div>;
<?php require APPROOT . '/views/includes/footer.php'; ?>