<?php
include "path.php";
include_once ROOT_PATH . "/app/controllers/comments.php";

// Check if the post ID is provided
if (!isset($_GET['id'])) {
    echo "Post ID not provided";
    exit();
}

// Get the post and update the view count
$post = selectOne('posts', ['id' => $_GET['id']]);
if (!$post) {
    echo "Post not found";
    exit();
}

$updateData = ['views' => $post['views'] + 1];
update('posts', $_GET['id'], $updateData);

include ROOT_PATH . "/app/include/header.php";
?>

<section class="post-header">
    <div class="header-content post-container">
        <a href="index.php" class="back-home">Back to Home</a>
        <h1 class="header-title"><?php echo $post['title']; ?></h1>
        <img src="<?php echo BASE_URL . '/img/' . $post['image']; ?>" alt="" class="header-img">
    </div>
</section>

<section class="post-content post-container">
    <h2 class="subheading"><?php echo $post['slug']; ?></h2>
    <p class="post-text"><?php echo $post['body']; ?></p>
</section>
<div class="container-fluid text-center">
<?php

if (isset($_SESSION['id']) && $_SESSION['id'] == $post['user_id']) {
    echo '<a href="user/posts/edit_post.php?id=' . $post['id'] . '" class="btn btn-success"><i class="bx bx-edit"></i> Edit Post</a>';
}
?>

</div>
<section class="comments post-container">
    <h3>Comments</h3>
    <section style="background-color: #fff;">
        <div class="container my-5 py-5">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="card text-dark">
                        <div class="card-body p-4">
                            <h4 class="mb-0">Recent comments</h4>
                            <?php include ROOT_PATH . "/app/include/message.php"; ?>
                            <p class="fw-light mb-4 pb-2">Latest Comments section by users</p>
                            <div id="comments-container">
                                <h3>Comments</h3>
                                <!-- Rest of the comments section -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="comment-form card mb-3">
        <div class="card-body">
            <h5 class="card-title">Leave a Comment</h5>
            <form action="single_post.php" method="POST">
                <div class="mb-3">
                    <label for="comment-body" class="form-label">Your Comment</label>
                    <textarea class="form-control" id="comment-body" name="comment-body" rows="3"></textarea>
                </div>
                <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
                <button name="comment-btn" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        function loadComments() {
            fetch('load_comments.php?id=<?php echo $post['id']; ?>')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('comments-container').innerHTML = data;
                })
                .catch(error => console.log(error));
        }

        loadComments();
    </script>

    <?php
    include ROOT_PATH . "/app/include/footer.php";
    ?>
