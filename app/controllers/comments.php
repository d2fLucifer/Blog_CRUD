<?php
if (!defined('ROOT_PATH')) {
    include_once "../../path.php";
}
include_once ROOT_PATH . "/app/database/db.php";
include_once ROOT_PATH . "/app/helpers/middleware.php";
include_once ROOT_PATH . "/app/helpers/validateComments.php";

$table = "comments";

date_default_timezone_set("Asia/Ho_Chi_Minh");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = validateComments($_POST);

    if (count($errors) === 0) {
        if (isset($_POST['comment-btn'])) {
            unset($_POST['comment-btn']);
            $_POST['user_id'] = $_POST['user_id'];
            $_POST['post_id'] = $_POST['post_id'];
            $commentData = [
                'user_id' => $_POST['user_id'],
                'post_id' => $_POST['post_id'],
                'body' => $_POST['comment-body'], 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $comment_id = create($table, $commentData);
            if ($comment_id) {
                $_SESSION['message'] = "Commented successfully";
                $_SESSION['type'] = "success";
                header("Location: " . BASE_URL . "/single_post.php?id=" . $_POST['post_id']);
                exit();
            } else {
                $errors[] = "Failed to post the comment";
            }
        }
    }
}
?>
