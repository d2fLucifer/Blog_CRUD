<?php
include "../../path.php";
include_once ROOT_PATH . "/app/include/adminHeader.php";
include_once ROOT_PATH . "/app/controllers/posts.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Topic Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php
include_once ROOT_PATH . "/app/include/adminSidebars.php";
?>
    <div style="margin-top: 50px;" class="container">
        <a href="create.php" class="btn btn-success">Adding Posts</a>
        <a href="edit.php" class="btn btn-success">Edit Posts</a>
        <h2>MANAGE POSTS</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $key => $post) : ?>
                <tr>
                    <td><?php echo $key + 1 ?></td>
                    <td><?php echo $post['title']; ?></td>
                    <td>Jack</td>
                    <td>
                        <a href="#" class="btn btn-primary edit">Edit</a>
                        <a href="#" class="btn btn-danger delete">Delete</a>
                        <?php if($post['published']): ?>
                        <a href="#" class="btn btn-info published">Published</a>
                        <?php else: ?>
                        <a href="#" class="btn btn-info unpublished">Unpublished</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
include_once ROOT_PATH . "/app/include/adminFooter.php";
?>
