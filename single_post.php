<?php
include "path.php";
include_once ROOT_PATH . "/app/controllers/posts.php";


$post = selectOne('posts', ['id' => $_GET['id']]);
$updateData = ['views' => $post['views'] + 1];
update('posts', $_GET['id'], $updateData);

include ROOT_PATH . "/app/include/header.php";
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
<section class="comments post-container">
    <h3>Comments</h3>
    <?php
    // Retrieve the comments for the post
    $comments = selectAll('comments', ['post_id' => $post['id']]);
    foreach ($comments as $comment) {
        $user = selectOne('users', ['id' => $comment['user_id']]);
        if ($user) {
            ?>
            <div class="comment card mb-3">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <img src="<?php echo BASE_URL . '/img/' . $user['image']; ?>" alt="" class="user-image rounded-circle me-3">
                        <div class="comment-info">
                            <h5 class="username"><?php echo $user['username']; ?></h5>
                            <p class="comment-time mb-0"><?php echo $comment['created_at']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text"><?php echo $comment['body']; ?></p>
                </div>
            </div>
        <?php
        }
    }
    ?>

    <div class="comment-form card mb-3">
        <div class="card-body">
            <h5 class="card-title">Leave a Comment</h5>
            <form>
                <div class="mb-3">
                    <label for="comment-body" class="form-label">Your Comment</label>
                    <textarea class="form-control" id="comment-body" name="comment-body" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</section>

<?php
include ROOT_PATH . "/app/include/footer.php";
?>
