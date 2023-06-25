
<?php
include "../../path.php";
include_once ROOT_PATH . "/app/include/adminHeader.php";
?>

<?php
include_once ROOT_PATH . "/app/include/adminSidebars.php";
include_once ROOT_PATH . "/app/controllers/topics.php";

?>
    <div style="margin-top :50px;" class="container">
    <h1>Topic Management</h1>
    <a href="create.php" class="btn btn-success">Adding Topic</a>
            <a href="index.php" class="btn btn-success">Manage Topic</a>
    
        <form method="POST" action="create.php">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="title" name="name" required>
                </div>

               

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="body" name="description" rows="4" required></textarea>
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