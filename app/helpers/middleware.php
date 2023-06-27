<?php
function usersOnly($redirect = '/index.php')
{
    if (empty($_SESSION['id'])) {
        $_SESSION['message'] = 'You need to login first';
        $_SESSION['type'] = 'danger';
        if (headers_sent()) {
            die("Redirect failed. Please click on the logo");
        } else {
            header('Location: ' . BASE_URL . '/index.php');
            exit();
        }
        exit(0);
    }
}

function adminOnly($redirect = '/index.php')
{
    if ($_SESSION['role']==="Author" || empty($_SESSION['id'])) {
        $_SESSION['message'] = 'You need to be authorized';
        $_SESSION['type'] = 'danger';
        if (headers_sent()) {
            die("Redirect failed. Please click on topics in Sidebar");
        } else {
            header('Location: ' . BASE_URL . '/index.php');
            exit();
        }
        exit(0);
    }
}

function guestOnly($redirect = '/index.php')
{
    if (!empty($_SESSION['id'])) {
        if (headers_sent()) {
            die("Redirect failed. Please click on topics in the logo");
        } else {
            header('Location: ' . BASE_URL . '/index.php');
            exit();
        }
        exit(0);
    }
}
