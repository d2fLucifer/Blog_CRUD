<?php
if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', dirname(__DIR__));
    include_once ROOT_PATH . "/path.php";
}

require_once ROOT_PATH . "/app/database/db.php";
require_once ROOT_PATH . "/app/helpers/ValidatePosts.php";

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

    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . "_" . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/img/" . $image_name;
        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        if ($result) {
            $_POST['image'] = $image_name;
        } else {
            $errors[] = "Failed to upload image";
        }
    } else {
        $errors[] = "Post image required";
    }

    if (count($errors) === 0) {
        if (isset($_POST['add-post'])) {
            unset($_POST['add-post']);
            $_POST['user_id'] = 1;
            $_POST['published'] = isset($_POST['published']) ? 1 : 0;

            // Check if topic_id is set in $_POST
            $topic_id = isset($_POST['topic_id']) ? $_POST['topic_id'] : '';

            // Get the selected topic
            $selectedTopic = selectOne('topics', ['id' => $topic_id]);

            $post_id = create($table, $_POST);
            $_SESSION['message'] = "Post created successfully";
            $_SESSION['type'] = "success";

            if ($post_id) {
                header("Location: " . BASE_URL . "/admin/posts/index.php");
                exit();
            } else {
                $errors[] = "Failed to create the post.";
            }
        }
    } else {
        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $body = isset($_POST['body']) ? $_POST['body'] : '';
        $topic_id = isset($_POST['topic_id']) ? $_POST['topic_id'] : '';
        $slug = isset($_POST['slug']) ? $_POST['slug'] : '';
        $_POST['published'] = isset($_POST['published']) ? 1 : 0;
    }
}
?>
