<?php
include_once("../inc/connect.php");
?>





<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">


        <li>
 <?php


$getCats = "SELECT `id`, `category` FROM `blogCat`";
$getPostsResult = $pdo->prepare($getCats);
$getPostsResult->execute();

if ($getPostsResult->rowCount() > 0) {

        while ($row = $getPostsResult->fetchObject()) {
            ?>
            <a href="blogList.php?cat=<?php echo $row->id; ?>">
                <?php echo $row->category ?>
            </a>
            <?php }} ?>
        </li>



    </ul>
</div>
