<?php
if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', dirname(__DIR__));
    include_once ROOT_PATH . "/path.php";
}

require_once ROOT_PATH . "/app/database/db.php";
require_once ROOT_PATH . "/app/helpers/ValidatePosts.php";
require_once ROOT_PATH . "/app/helpers/middleware.php";

$table = 'posts';
$errors = [];
$id = '';
$topics = selectAll('topics');
$posts = selectAll($table);
$title = '';
$body = '';
$topic_id = '';
$slug = '';
$published = '';
$image = '';

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
    adminOnly();

    $id = $_GET['delete_id'];
    $result = deleteFromDatabase($table, $id);

    if ($result) {
        $_SESSION['message'] = "Post deleted successfully";
        $_SESSION['type'] = "success";
    } else {
        $_SESSION['message'] = "Failed to delete the post.";
        $_SESSION['type'] = "danger";
    }

    header("Location: " . BASE_URL . "/admin/posts/index.php");
    exit();
}

if (isset($_GET['published']) && isset($_GET['p_id'])) {
    $published = $_GET['published'];
    $p_id = $_GET['p_id'];

    $count = update($table, $p_id, ['published' => $published]);

    if ($published == 0) {
        $_SESSION['message'] = "Post published successfully";
    } else {
        $_SESSION['message'] = "Post unpublished successfully";
    }

    $_SESSION['type'] = "success";
    header("Location: " . BASE_URL . "/admin/posts/index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = validatePosts($_POST);

    // Check if an image file is uploaded
    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . "_" . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/img/" . $image_name;

        $image_info = getimagesize($_FILES['image']['tmp_name']);
        if ($image_info === false) {
            $errors[] = "Invalid image file";
        } else {
            // Valid image file, move it to the destination
            $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

            if ($result) {
                $_POST['image'] = $image_name;
            } else {
                $errors[] = "Failed to upload image";
            }
        }
    }

    if (count($errors) === 0) {
        // Create or update the post
        $data = [
            'title' => $_POST['title'],
            'body' => $_POST['body'],
            'topic_id' => $_POST['topic_id'],
            'slug' => $_POST['slug'],
            'published' => isset($_POST['published']) ? 1 : 0,
            'user_id' => $_SESSION['id']
        ];

        if (!empty($_POST['image'])) {
            $data['image'] = $_POST['image'];
        }

        if (isset($_POST['add-post']) || isset($_POST['add-post-users'])) {
            $check = isset($_POST['add-post-users']);
            unset($_POST['add-post'], $_POST['add-post-users']);

            $post_id = create($table, $data);

            if ($post_id) {
                $_SESSION['message'] = "Post created successfully";
                $_SESSION['type'] = "success";
                if ($check) {
                    header("Location: " . BASE_URL . "/index.php");
                    exit();
                } else {
                    header("Location: " . BASE_URL . "/admin/posts/index.php");
                    exit();
                }
            } else {
                $errors[] = "Failed to create the post.";
            }
        }

        if (isset($_POST['update-post']) || isset($_POST['update-post-users'])) {
            $check = isset($_POST['update-post-users']);

            $data['id'] = $_POST['id'];
            unset($_POST['update-post'], $_POST['id']);

            $post_id = update($table, $data['id'], $data);

            if ($post_id) {
                $_SESSION['message'] = "Post updated successfully";
                $_SESSION['type'] = "success";
                if ($check) {
                    header("Location: " . BASE_URL . "/single_post.php?id=" . $data['id']);
                    exit();
                } else {
                    header("Location: " . BASE_URL . "/admin/posts/index.php");
                    exit();
                }
            } else {
                $errors[] = "Failed to update the post.";
            }
        }
    }
}
?>
