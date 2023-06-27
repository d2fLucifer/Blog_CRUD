<?php
include_once "path.php";
include_once ROOT_PATH . "/app/database/db.php";
include_once ROOT_PATH . "/app/helpers/middleware.php";
include_once ROOT_PATH . "/app/helpers/validateComments.php";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = validateComments($_POST);

    if (count($errors) === 0) {
        $post_id = $_POST['post_id'];
        $user_id = $_POST['user_id'];
        $body = $_POST['body'];

        $commentData = [
            'post_id' => $post_id,
            'user_id' => $user_id,
            'body' => $body
        ];
        $commentId = create('comments', $commentData);

        if ($commentId) {
            // Comment created successfully
            $_SESSION['message'] = "Comment posted successfully";
            $_SESSION['type'] = "success";
            header("Location: " . BASE_URL . "/post.php?id=" . $_POST['post_id']);
            exit();
        } else {
            $errors[] = "Failed to post the comment";
        }
    }
}
?>
