<?php
ob_start();

if (!defined('ROOT_PATH')) {
    include "../../path.php";
}

include_once ROOT_PATH . "/app/include/adminHeader.php";
include_once ROOT_PATH . "/app/include/adminSidebars.php";
include_once ROOT_PATH . "/app/database/db.php";
include_once ROOT_PATH . "/app/helpers/ValidateTopics.php";

$table = 'topics';
$errors = array();
$id = '';
$name = '';
$description = '';

$topics = selectAll($table);

if (isset($_POST['add-topic'])) {
    $errors = validateTopic($_POST);

    if (count($errors) === 0) {
        unset($_POST['add-topic']);
        $topic_id = create('topics', $_POST);

        if ($topic_id) {
            $_SESSION['message'] = 'Topic created successfully';
            $_SESSION['type'] = 'success';
            header('Location: ' . BASE_URL . '/admin/topics/index.php');
            exit();
        } else {
            $_SESSION['message'] = 'Failed to create topic';
            $_SESSION['type'] = 'error';
        }
    } else {
        $name = $_POST['name'];
        $description = $_POST['description'];
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $topic = selectOne($table, ['id' => $id]);
    $id = $topic['id'];
    $name = $topic['name'];
    $description = $topic['description'];
}

if (isset($_POST['update-topic'])) {
    $errors = validateTopic($_POST);

    if (count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['update-topic'], $_POST['id']);
        $topic_id = update($table, $id, $_POST);
        if ($topic_id) {
            $_SESSION['message'] = 'Topic updated successfully';
            $_SESSION['type'] = 'success';
            header('Location: ' . BASE_URL . '/admin/topics/index.php');
            exit();
        } else {
            $_SESSION['message'] = 'Failed to update topic';
            $_SESSION['type'] = 'error';
        }
    } else {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $id = $_POST['id'];
    }
}

if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    $count = delete($table, $id);
    $_SESSION['message'] = 'Topic deleted successfully';
    $_SESSION['type'] = 'success';
    header('Location: ' . BASE_URL . '/admin/topics/index.php');
    exit();
}

ob_end_flush();
?>
