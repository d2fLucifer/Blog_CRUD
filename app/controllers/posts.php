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
$published = '';
$image ='';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $post = selectOne($table, ['id' => $id]);

    if ($post) {
        $title = $post['title'];
        $body = $post['body'];
        $topic_id = $post['topic_id'];
        $slug = $post['slug'];
        $published = $post['published'];
        $image = $post['image'];
    }
}
if (isset($_GET['delete_id'])) {
    if (isset($_GET['delete_id'])) {
        $id = $_GET['delete_id'];
        $result = delete($table, $id);
    
        if ($result) {
            $_SESSION['message'] = "Post deleted successfully";
            $_SESSION['type'] = "success";
        } else {
            $_SESSION['message'] = "Failed to delete the post.";
            $_SESSION['type'] = "error";
        }
    
        header("Location: " . BASE_URL . "/admin/posts/index.php");
        exit();
    }
    
}
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
        if (isset($_POST['update-post'])) {
            $id = $_POST['id'];
            unset($_POST['update-post'], $_POST['id']);
            $_POST['user_id'] = 1;
            $_POST['published'] = isset($_POST['published']) ? 1 : 0;

            // Check if topic_id is set in $_POST
            $topic_id = isset($_POST['topic_id']) ? $_POST['topic_id'] : '';

            // Get the selected topic
            $selectedTopic = selectOne('topics', ['id' => $topic_id]);

            $post_id = update($table, $id, $_POST);
            $_SESSION['message'] = "Post updated successfully";
            $_SESSION['type'] = "success";

            if ($post_id) {
                header("Location: " . BASE_URL . "/admin/posts/index.php");
                exit();
            } else {
                $errors[] = "Failed to update the post.";
            }
        }
    }
}
?>
