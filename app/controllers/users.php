<?php

include ROOT_PATH . "/app/database/db.php";
include ROOT_PATH . "/app/helpers/ValidateUsers.php";
$errors = array();
$username = '';
$email = '';
$password = '';
$passwordConf = '';
$table = 'users';

function loginUser($user)
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = 'Author';
    $_SESSION['message'] = 'You are now logged in ';
    $_SESSION['type'] = 'success';

    if ($_SESSION['role'] === 'Author') {
        header('location:' . BASE_URL . '/index.php');
        exit();
    } else {
        header('location:' . BASE_URL . '/admin/dashboard.php');
        exit();
    }
}

if (isset($_POST['register-btn'])|| isset($_POST['create-admin'])) {
    $errors = validateUser($_POST);
    if (count($errors) === 0) {
        unset($_POST['register-btn'], $_POST['repeat-password'],$_POST['create-admin']);
        
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
            $errors[] = "User image required";
        }

        $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $_POST['password'] = $hashedPassword;
if($_POST['role'])
{
    $_POST['role'] = "Admin";
    $user_id = create($table, $_POST);
$_SESSION['message'] = 'Admin user created successfully';
$_SESSION['type']='success';
header('location:' . BASE_URL . '/admin/users/index.php');
exit() ;
}
else {
    $_POST['role'] = 'Author';
    $user_id = create($table, $_POST);
    $user = SelectOne($table, ['id' => $user_id]);
    loginUser($user);
}


    } else {
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $passwordConf = isset($_POST['repeat-password']) ? $_POST['repeat-password'] : '';
    }
}

if (isset($_POST['login-btn'])) {
    $errors = validateLogin($_POST);
    if (count($errors) === 0) {
        $user = selectOne('users', ['username' => $_POST['username']]);
        if ($user && password_verify($_POST['password'], $user['password'])) {
            $user_id = $user['id'];
            $user = SelectOne($table, ['id' => $user_id]);
            loginUser($user);
        } else {
            array_push($errors, "Wrong credentials");
        }
    }

    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
}
