<?php
include "../../path.php";
include_once ROOT_PATH . "/app/include/adminHeader.php";
include_once ROOT_PATH . "/app/controllers/topics.php";

?>

<?php
include_once ROOT_PATH . "/app/include/adminSidebars.php";
adminOnly();

?>

<div class="col py-3">
    <div class="container mt-4">
        <div class="container">
        <a href="create.php" class="btn btn-success">Adding Topic</a>
            <a href="edit.php" class="btn btn-success">Edit Topic</a>
            <?php 
include ROOT_PATH."/app/include/message.php" ;
?>
            <h1>Topic Management</h1>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Topic Name</th>
                    
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
<?php foreach($topics as $key =>$topic):?>



                <tr>
                    <td><?php echo $key+1; ?></td>
                    <td><?php echo $topic['name']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $topic['id']; ?> " class="btn btn-primary">Edit</a>
                        <a href="index.php?del_id=<?php echo $topic['id']; ?> " class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endforeach;?>
                
                <!-- Add more rows for other topics as needed -->
            </tbody>
        </table>
        </div>
    </div>
</div>
</div>
</div>

<?php
include_once ROOT_PATH . "/app/include/adminFooter.php";
?>
