<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}// After successful login
require_once ROOT_PATH . "/app/helpers/middleware.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?php echo BASE_URL . '/index.php'; ?>">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['username'] ?>
                    </a>
                    <?php if(isset($_SESSION['id'])):                  ?>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <h6 class="dropdown-header"><?php echo $_SESSION['username'] ?></h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><?php echo $_SESSION['username'] ?></a>
                        <a class="dropdown-item" href="#">Email: john@example.com</a>
                        <a class="dropdown-item" href="#">Role: Administrator</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo BASE_URL .'/logout.php'; ?>">Logout</a>
                    </div>
                    <?php endif;?>
                </li>
            </ul>
        </div>
    </nav>
