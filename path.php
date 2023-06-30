<?php
define("ROOT_PATH", realpath(dirname(__FILE__)));

// Define the BASE_URL constant


$documentRoot = $_SERVER['DOCUMENT_ROOT'];
$basePath = str_replace('\\', '/', dirname(__FILE__));
$relativePath = str_replace($documentRoot, '', $basePath);
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$baseUrl = $protocol . '://' . $_SERVER['HTTP_HOST'] . $relativePath;

define("BASE_URL", $baseUrl);
?>

