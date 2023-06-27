<?php 
include "path.php";
include_once ROOT_PATH . "/app/controllers/posts.php";
$posts =selectOne('posts',['id' =>$_GET['id']]);
include ROOT_PATH."/app/include/header.php" ;
?>
<section class="post-header">
    <div class="header-content post-container">
        <a href="index.php" class="back-home">Back to Home</a>
        <h1 class="header-title"><?php echo $post['title']; ?></h1>
        <img src="<?php echo BASE_URL . '/img/' . $post['image'] ?>" alt="" class="header-img">
    </div>
</section>
<section class="post-content post-container">
    <h2 class="subheading"><?php echo $post['slug']; ?></h2>
<p class="post-text"><?php echo $post['body']; ?></p>

</section>

<?php 
include ROOT_PATH."/app/include/footer.php" ;
?>