<?php
include_once "../../path.php";
include_once ROOT_PATH . "/app/include/header.php";
include_once ROOT_PATH . "/app/controllers/users.php";

?>



<div style="margin-top: 150px;" class="container">
   
    <h1>EDIT User Form</h1>
    <?php include_once ROOT_PATH . "/app/helpers/formErrors.php"; ?>
    <form method="POST" action="edit_profile.php" enctype="multipart/form-data">
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

        <input value="<?php echo $id ?>" name="id" type="hidden">

        <div class="form-group">
            <label for="username">Username:</label>
            <input value="<?php echo isset($username) ? $username : ''; ?>" type="text" class="form-control" id="username" name="username" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input value="<?php echo isset($email) ? $email : ''; ?>" type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input value="<?php echo isset($password) ? $password : ''; ?>" type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="repeat-password">Repeat Password:</label>
            <input value="<?php echo isset($passwordConf) ? $passwordConf : ''; ?>" type="password" class="form-control" id="repeat-password" name="repeat-password" required>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input name="image" type="file" class="form-control-file" id="image" accept="image/*">
            <div id="image-preview"></div>
        </div>

        <button name="update-user-forUsers" type="submit" class="btn btn-primary">Update</button>
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
include_once ROOT_PATH . "/app/include/footer.php";
?>
