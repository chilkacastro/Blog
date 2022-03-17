<?php require APPROOT . '/views/includes/header.php'; ?>

<h1 class="title"></h1>
<p></p>
<?php
        if (!empty($data["publications"])) {
            foreach($data["publications"] as $publication){
                echo "<h1>
                <a href='/Blog/Home/details/$publication->publication_title'>$publication->publication_title</a>
                </h1>";
                echo "<p>$publication->publication_text</p>";
            }
        }
?>

<?php
if(!empty($data['msg'])){
    echo '<div class="alert alert-danger" role="alert">'.
        $data['msg'].'
    </div>';
}
?>
<?php require APPROOT . '/views/includes/footer.php'; ?>