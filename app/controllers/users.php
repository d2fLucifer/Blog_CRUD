<?php
include ROOT_PATH . "/app/database/db.php";
include ROOT_PATH . "/app/helpers/ValidateUsers.php";

$errors = array();
$username = '';
$email = '';
$password = '';
$passwordConf = '';
$table = 'users';
$id = '';
$admin_users = selectAll($table);
$role = '';
$image = '';

function loginUser($user)
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['message'] = 'You are now logged in.';
    $_SESSION['type'] = 'success';

    if ($_SESSION['role'] === 'Author') {
        header('location:' . BASE_URL . '/index.php');
        exit();
    } else {
        header('location:' . BASE_URL . '/admin/dashboard.php');
        exit();
    }
}

if (isset($_POST['register-btn']) || isset($_POST['create-admin'])) {
    $errors = validateUser($_POST);
    if (count($errors) === 0) {
        unset($_POST['register-btn'], $_POST['repeat-password'], $_POST['create-admin']);

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

        if (isset($_POST['role'])) {
            $_POST['role'] = "Admin";
            $user_id = create($table, $_POST);
            $_SESSION['message'] = 'Admin user created successfully';
            $_SESSION['type'] = 'success';
            header('location:' . BASE_URL . '/admin/users/index.php');
            exit();
        } else {
            $_POST['role'] = 'Author';

            $user_id = create($table, $_POST);

            $user = selectOne($table, ['id' => $user_id]);

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
            $user = selectOne($table, ['id' => $user_id]);
            loginUser($user);
        } else {
            $errors[] = "Wrong credentials";
        }
    }

    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
}

if (isset($_GET['delete_id'])) {
    $count = delete($table, $_GET['delete_id']);
    $_SESSION['message'] = 'Admin user deleted successfully';
    $_SESSION['type'] = 'success';
    header('location:' . BASE_URL . '/admin/users/index.php');
    exit();
}

if (isset($_GET['id'])) {
    $user = selectOne($table, ['id' => $_GET['id']]);
    $id = $user['id'];
    $role = $user['role'] === 'Admin' ? true : false;
    $username = $user['username'];
    $email = $user['email'];
    $image = $user['image'];
}

if (isset($_POST['update-user'])) {
    $errors = validateUser($_POST);
    if (count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['repeat-password'], $_POST['update-user'], $_POST['id']);

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

        $_POST['role'] = isset($_POST['role']) ? "Admin" : "Author";

        $count = update($table, $id, $_POST);
        $_SESSION['message'] = 'Admin user updated successfully';
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . '/admin/users/index.php');
        exit();
    } else {
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $passwordConf = isset($_POST['repeat-password']) ? $_POST['repeat-password'] : '';
    }
}
