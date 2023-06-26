<?php

if (!defined('ROOT_PATH')) {
    include "../../path.php";
}

include_once ROOT_PATH . "/app/database/db.php";
include_once ROOT_PATH . "/app/helpers/ValidatePosts.php";

$table = 'posts';
$errors = array();

$topics = selectAll('topics');
$posts = selectAll($table);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add-post'])) {
        unset($_POST['add-post'], $_POST['topic_id']);
        $_POST['user_id'] = 1;
        $_POST['published'] = isset($_POST['publish']) ? 1 : 0;

        $post_id = create($table, $_POST);
        header("location: " . BASE_URL . "/admin/posts/index.php");
        exit();
    }
}
?>