<?php
include "../../path.php";
include_once ROOT_PATH . "/app/include/adminHeader.php";
?>

<?php
include_once ROOT_PATH . "/app/include/adminSidebars.php";
?>

<div style="margin-top :50px;" class="container">
    <a href="create.php" class="btn btn-success">Adding Posts</a>
            <a href="edit.php" class="btn btn-success">Manage Topic</a>
        <h1> Edit Manage Users</h1>
        
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
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>johndoe@example.com</td>
                    <td>Admin</td>
                    <td>
                        <a href="#" class="btn btn-primary">Edit</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jane Smith</td>
                    <td>janesmith@example.com</td>
                    <td>User</td>
                    <td>
                        <a href="#" class="btn btn-primary">Edit</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
<?php
include_once ROOT_PATH . "/app/include/adminFooter.php";
?>