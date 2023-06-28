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
adminOnly();

?>
    <div style="margin-top: 50px;" class="container">
        <a href="create.php" class="btn btn-success">Adding Posts</a>
        <a href="edit.php" class="btn btn-success">Edit Posts</a>
        <h2>MANAGE POSTS</h2>
        <?php include ROOT_PATH . "/app/include/message.php"; ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Username</th>
                    <th>Action</th>
                    <th>Topic</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $key => $post) : ?>
                <tr>
                    <td><?php echo $key + 1 ?></td>
                    <td><?php echo $post['title']; ?></td>
                    <td><?php echo $post['topic_id']; ?></td>
                    <td>Jack</td>
                    <td>
                        <a href="edit.php?id=<?php echo $post['id'] ?>" class="btn btn-primary edit">Edit</a>
                        <a href="edit.php?delete_id=<?php echo $post['id'] ?>" class="btn btn-danger delete">Delete</a>
                        <?php if($post['published']): ?>
                            <a href="edit.php?published=0&p_id=<?php echo $post['id'] ?>" class="btn btn-info published">Unpublished</a>
                        <?php else: ?>
                            <a href="edit.php?published=1&p_id=<?php echo $post['id'] ?>" class="btn btn-info unpublished">Published</a>
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
