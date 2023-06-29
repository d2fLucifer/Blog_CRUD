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
$comments = selectAll('comments', ['post_id' => $post['id']]);
if ($comments) {
    foreach ($comments as $comment) {
        $user = selectOne('users', ['id' => $comment['user_id']]);
        if ($user) {
            ?>
            <div class="card-body p-4">
                <div class="d-flex flex-start align-items-center">
                    <img style="margin:10px 10px; padding:10px; height:75px; width:75px;" src="<?php echo BASE_URL . '/img/' . $user['image']; ?>" alt="user_avatar" class="rounded-circle">
                    <div>
                        <h6 class="fw-bold mb-1"><?php echo $user['username']; ?></h6>
                        <div class="d-flex align-items-center mb-3">
                            <p class="mb-0">
                                <?php echo $comment['created_at']; ?>
                                <span class="badge bg-success">Approved</span>
                            </p>
                            <a href="#!" class="link-muted"><i class="fas fa-pencil-alt ms-2"></i></a>
                            <a href="#!" class="text-success"><i class="fas fa-redo-alt ms-2"></i></a>
                            <a href="#!" class="link-danger"><i class="fas fa-heart ms-2"></i></a>
                        </div>
                        <p class="mb-0">
                            <?php echo $comment['body']; ?>
                        </p>
                    </div>
                </div>
            </div>
            <hr class="my-0" style="height: 1px;" />
            <?php
        }
    }
} else {
    echo "No comments found.";
}
?>

