<?php
// Place this code at the very beginning of your PHP file, before any output or whitespace
ob_start();

include ROOT_PATH . "/app/database/db.php";
$table = 'topics';
$id ='';
$name ='';
$description ='';


$topics = selectAll($table);

if (isset($_POST['add-topic'])) {
    unset($_POST['add-topic']);

    $topic_id = create('topics', $_POST);

    if ($topic_id) {
        $_SESSION['message'] = 'Topic created successfully';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Failed to create topic';
        $_SESSION['type'] = 'error';
    }

    // Use absolute URL for the redirect to ensure correctness
    header('Location: ' . BASE_URL . '/admin/topics/index.php');
    exit();
}
if(isset($_GET['id']))
{
   $id =$_GET['id'];
   $topic =selectOne($table,['id' => $id]);
$id =$topic ['id'];
$name =$topic['name'];
$description =$topic['description'];

}
if(isset($_POST['update-topic']))
{
$id =$_POST['id'];
unset($_POST['update-topic'],$_POST['id']);
$topic_id = update($table,$id,$_POST);
$_SESSION['message'] = 'Topic updated successfully';
$_SESSION['type'] = 'success';
header('Location: ' . BASE_URL . '/admin/topics/index.php');
exit();
}
if (isset($_GET['del_id'])) {
   $id = $_GET['del_id'];
   $count = delete($table, $id);
   $_SESSION['message'] = 'Topic deleted successfully';
   $_SESSION['type'] = 'success';
   header('Location: ' . BASE_URL . '/admin/topics/index.php');
   exit();
}

// Place this code at the very end of your PHP file, after all processing
ob_end_flush();







?>