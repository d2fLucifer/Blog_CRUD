<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function usersOnly($redirect = '/404page.php')
{
    if (empty($_SESSION['id'])) {
        $_SESSION['message'] = 'You need to login first';
        $_SESSION['type'] = 'danger';
        if (headers_sent()) {
            die("Redirect failed. Please click on the logo");
        } else {
            header('Location: ' . BASE_URL . $redirect);
            exit();
        }
        exit(0);    
    }
}

function adminOnly($redirect = '/index.php')
{
    if ($_SESSION['role'] === "Author" || empty($_SESSION['id'])) {
        $_SESSION['message'] = 'You need to be authorized';
        $_SESSION['type'] = 'danger';
        if (headers_sent()) {
            die("Redirect failed. Please click on topics in Sidebar");
        } else {
            header('Location: ' . BASE_URL . $redirect);
            exit();
        }
        exit(0);
    }
}

function guestOnly($redirect = '/index.php')
{
    if (!empty($_SESSION['id'])) {
        if (headers_sent()) {
            die("Redirect failed. Please click on   the logo");
        } else {
            header('Location: ' . BASE_URL . $redirect);
            exit();
        }
        exit(0);
    }
}
