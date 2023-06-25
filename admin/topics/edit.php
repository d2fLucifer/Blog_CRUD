<?php
include "../../path.php";
include_once ROOT_PATH . "/app/include/adminHeader.php";
include_once ROOT_PATH . "/app/controllers/topics.php";

?>

<?php
include_once ROOT_PATH . "/app/include/adminSidebars.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Topic</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <a href="create.php" class="btn btn-success">Adding Posts</a>
            <a href="index.php" class="btn btn-success">Manage Topic</a>
        <h1>Edit Topic</h1>

        <form method='post' action='edit.php'>
        <input type="hidden" value="<?php echo $id; ?>" class="form-control" id="id" name="id">

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text"value="<?php echo $name; ?>" class="form-control" id="title" name="name" >
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="4"><?php echo $description; ?></textarea>
            </div>

            <button name="update-topic" type="submit" class="btn btn-primary">Update Topic</button>
        </form>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
include_once ROOT_PATH . "/app/include/adminFooter.php";
?>