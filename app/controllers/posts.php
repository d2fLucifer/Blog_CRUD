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
$title = '';
$body = '';
$topic_id = '';
$slug = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = validatePosts($_POST);
    
    if (count($errors) === 0) {
        if (isset($_POST['add-post'])) {
            unset($_POST['add-post']);
            $_POST['user_id'] = 1;
            $_POST['published'] = isset($_POST['published']) ?1 :0;

            // Check if topic_id is set in $_POST
            $topic_id = isset($_POST['topic_id']) ? $_POST['topic_id'] : '';

            // Get the selected topic
            $selectedTopic = selectOne('topics', ['id' => $topic_id]);
           

            $post_id = create($table, $_POST);
            $_SESSION['message']= "Post created successfully ";
            $_SESSION['type']= "success ";

            if ($post_id) {
                header("Location: " . BASE_URL . "/admin/posts/index.php");
                exit();
            } else {
                $errors[] = "Failed to create the post.";
            }
        }
    } else {
        $title = $_POST['title'] ;
        $body = $_POST['body'];
        $topic_id = $_POST['topic_id'];
        $slug = $_POST['slug'] ;
    }
}
?>
