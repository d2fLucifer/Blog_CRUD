<?php
include_once "../path.php";
include_once ROOT_PATH . "/app/include/adminHeader.php";
include_once ROOT_PATH . "/app/controllers/posts.php";
include_once ROOT_PATH . "/app/include/adminSidebars.php";
adminOnly();

?>

<div style="margin-top: 50px;" class="container">
    
    <h1>Dashboard</h1>

    <?php include ROOT_PATH . "/app/include/message.php"; ?>

    
</div>

<?php include_once ROOT_PATH . "/app/include/adminFooter.php"; ?>


