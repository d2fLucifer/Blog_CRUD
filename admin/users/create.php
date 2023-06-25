<?php
include "../../path.php";
include_once ROOT_PATH . "/app/include/adminHeader.php";
?>

<?php
include_once ROOT_PATH . "/app/include/adminSidebars.php";
?>


        
<div style="margin-top :50px;" class="container">
<a href="create.php" class="btn btn-success">Adding Users</a>
            <a href="index.php" class="btn btn-success">Manage Users</a>
        <h1> CREATE User Form</h1>
        
        <form method="POST" action="submit_form.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="role">Role:</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="">Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
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
                <label for="image">Image:</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

   


<?php
include_once ROOT_PATH . "/app/include/adminFooter.php";
?>
