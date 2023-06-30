
<?php

include "../../path.php";
include_once ROOT_PATH . "/app/include/adminHeader.php";
?>

<?php
require_once ROOT_PATH . "/app/helpers/middleware.php";

include_once ROOT_PATH . "/app/include/adminSidebars.php";
include_once ROOT_PATH . "/app/controllers/topics.php";

?>
    <div style="margin-top :50px;" class="container">
    <h1>CREATING TOPIC</h1>
    <?php
    include ROOT_PATH . "/app/helpers/formErrors.php";

                          ?>
            <a href="index.php" class="btn btn-success">Manage Topic</a>
    
        <form method="POST" action="create.php">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" value="<?php echo $name; ?>" class="form-control" id="title" name="name" required>
                </div>

               

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea  class="form-control" id="body" name="description" rows="4" required></textarea>
                </div>

                <button type="submit" name="add-topic" class="btn btn-primary">Add Topic</button>
            </form>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
include_once ROOT_PATH . "/app/include/adminFooter.php";
?>