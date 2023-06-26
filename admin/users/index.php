
<?php
include "../../path.php";
include_once ROOT_PATH . "/app/include/adminHeader.php";
include_once ROOT_PATH . "/app/controllers/users.php";

?>

<?php
include_once ROOT_PATH . "/app/include/adminSidebars.php";
?>


        
<div style="margin-top: 50px;" class="container">
    <a href="create.php" class="btn btn-success">Adding user</a>
    <a href="edit.php" class="btn btn-success">Manage user</a>
    <h1>Manage Users</h1>

    <?php
    include_once ROOT_PATH . "/app/include/message.php";
    ?>

    <?php if (isset($admin_users) && !empty($admin_users)): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($admin_users as $key => $value): ?>
                    <tr>
                        <td><?php echo $key + 1 ?></td>
                        <td><?php echo $value['username'] ?></td>
                        <td><?php echo $value['email'] ?></td>
                        <td><?php echo $value['role'] ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $value['id']; ?>" class="btn btn-primary">Edit</a>
                            <a href="index.php?delete_id=<?php echo $value['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No users found.</p>
    <?php endif; ?>
</div>

   


<?php
include_once ROOT_PATH . "/app/include/adminFooter.php";
?>
