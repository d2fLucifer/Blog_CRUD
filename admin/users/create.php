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
    <?php if (isset($role) && $role === true): ?>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="role" name="role" checked>
                    <label class="form-check-label" for="role">
                        Admin
                    </label>
                </div>
            </div>
        <?php else: ?>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="role" name="role">
                    <label class="form-check-label" for="role">
                        Admin
                    </label>
                </div>
            </div>
        <?php endif; ?>
  
</div>
<input value="<?php echo $id ?>" name="id"  type="hidden">


        <div class="form-group">
            <label for="username">Username:</label>
            <input value="<?php echo $username ?>" type="text" class="form-control" id="username" name="username" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input  value="<?php echo $email ?>" type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input  value="<?php echo $password ?>" type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="repeat-password">Repeat Password:</label>
            <input value="<?php echo $password ?>" type="password" class="form-control" id="repeat-password" name="repeat-password" required>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input name="image" type="file" class="form-control-file" id="image" accept="image/*">
            <div id="image-preview"></div>
        </div>

        <button name="create-admin" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    // Image preview
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('image-preview');

    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function() {
                const imageUrl = reader.result;
                imagePreview.innerHTML = '<img src="' + imageUrl + '" alt="Image Preview" class="img-thumbnail">';
            }
            reader.readAsDataURL(file);
        } else {
            imagePreview.innerHTML = '';
        }
    });
</script>
<?php
include_once ROOT_PATH . "/app/include/adminFooter.php";
?>
