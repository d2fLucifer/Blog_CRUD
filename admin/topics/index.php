<?php
include "../../path.php";
include_once ROOT_PATH . "/app/include/adminHeader.php";
?>

<?php
include_once ROOT_PATH . "/app/include/adminSidebars.php";
?>

<div class="col py-3">
    <div class="container mt-4">
        <div class="container">
        <a href="create.php" class="btn btn-success">Adding Topic</a>
            <a href="edit.php" class="btn btn-success">Manage Topic</a>
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
                <tr>
                    <td>1</td>
                    <td>Topic 1</td>
                    <td>
                        <a href="#" class="btn btn-primary">Edit</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Topic 2</td>
                    <td>
                        <a href="#" class="btn btn-primary">Edit</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <!-- Add more rows for other topics as needed -->
            </tbody>
        </table>
        </div>
    </div>
</div>

<?php
include_once ROOT_PATH . "/app/include/adminFooter.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Topic Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>