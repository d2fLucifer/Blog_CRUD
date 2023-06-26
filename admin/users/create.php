<?php
include "../../path.php";
include_once ROOT_PATH . "/app/include/adminHeader.php";
include_once ROOT_PATH . "/app/controllers/users.php";

?>

<?php
include_once ROOT_PATH . "/app/include/adminSidebars.php";
?>


<div style="margin-top: 50px;" class="container">
    <a href="create.php" class="btn btn-success">Add User</a>
    <a href="index.php" class="btn btn-success">Manage Users</a>
    <h1>Create User Form</h1>
    <?php
    include ROOT_PATH . "/app/helpers/formErrors.php";
    ?>
    <form method="POST" action="create.php" enctype="multipart/form-data">
    <div class="form-group">
    <label>Role:</label>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="role" name="role" value="Admin">
        <label class="form-check-label" for="role">
            Admin
        </label>
    </div>
  
</div>


        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="repeat-password">Repeat Password:</label>
            <input type="password" class="form-control" id="repeat-password" name="repeat-password" required>
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>

        <button name="create-admin" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


<?php
include_once ROOT_PATH . "/app/include/adminFooter.php";
?>
