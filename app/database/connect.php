<?php
$host ='localhost';
$user ='root';
$pass ='';
$db_name ='itec_project';

$conn = new MYSQLi($host,$user,$pass,$db_name);

if($conn->connect_error)
{
    die('database connect errror '. $conn->connect_error);
}
