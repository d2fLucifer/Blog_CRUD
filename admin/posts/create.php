<?php
include "../../path.php";
include_once ROOT_PATH . "/app/include/adminHeader.php";
include_once ROOT_PATH . "/app/controllers/posts.php";
?>

<?php
include_once ROOT_PATH . "/app/include/adminSidebars.php";
?>

<div style="margin-top: 50px;" class="container">
    <a href="create.php" class="btn btn-success">Adding POST</a>
    <a href="index.php" class="btn btn-success">Manage POST</a>
    <h1>CREATE POST FORM</h1>
    <form method="POST" action="">
        <div class="form-group">
            <label for="title">Title</label>
            <input name="title" type="text" class="form-control" id="title" placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <input name="slug" type="text" class="form-control" id="slug" placeholder="Enter slug">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input name="image" type="file" class="form-control-file" id="image">
        </div>
        <div class="form-group">
            <label for="topic">Topic</label>
            
            <select name="topic_id" class="form-control" id="topic">
                <?php foreach ($topics as $key => $topic) : ?>
                    <option value="<?php echo $topic['id']; ?>"><?php echo $topic['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" id="body" name="body" rows="5" placeholder="Enter body"></textarea>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="publish" name="publish">
            <label class="form-check-label" for="publish">Publish</label>
        </div>
        <button name="add-post" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php
include_once ROOT_PATH . "/app/include/adminFooter.php";
?>
