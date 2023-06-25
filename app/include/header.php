<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}// After successful login
// Set the user ID in the session

var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D2F</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <header>
        <div class="nav container">
            <a href="<?php echo BASE_URL . '/index.php' ?>" class="logo"><span>D2</span>F</a>
            <?php if (isset($_SESSION['id'])):  ?>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?php echo BASE_URL . '/img/user2_image.jpg' ?>" alt="User Profile Picture" class="rounded-circle" width="30" height="30">
                                <?php echo $_SESSION['username'] ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo BASE_URL . '/logout.php' ?>">Sign Out</a>
                                <?php if ($_SESSION['role']!=='Author'): ?>
               
                                    <a class="dropdown-item" href="<?php echo BASE_URL . '/admin/dashboard.php' ?>">Dashboard</a>
            <?php  endif; ?>
                            </div>
                        </li>
                    </ul>
                </nav>
            <?php else:   ?>
                <a href="<?php echo BASE_URL . '/login.php' ?>" class="login">Login</a>
                <a href="<?php echo BASE_URL . '/register.php' ?>" class="login">Register</a>
            <?php endif; ?>
        </div>
    </header>

    <!-- Rest of your page content goes here -->
</body>
</html>