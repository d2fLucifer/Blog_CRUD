<?php
error_reporting(E_ALL & ~E_WARNING); // Exclude warnings from error reporting
ini_set('display_errors', 0); // Turn off displaying errors on the browser

include ROOT_PATH . "/app/database/db.php";
if(isset($_POST['add-topic']))
{
   unset($_POST['add-topic']);
   dd($_POST);
   $topic_id =create('topics',$_POST);
   $_SESSION['message']='Topic created sucessfully';
   header('location:' . BASE_URL . '/admin/topics/index.php');
   exit();
}
