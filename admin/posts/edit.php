<?php
include_once "../../path.php";
include_once ROOT_PATH . "/app/include/adminHeader.php";
include_once ROOT_PATH . "/app/controllers/posts.php";
include_once ROOT_PATH . "/app/helpers/formErrors.php";
include_once ROOT_PATH . "/app/include/adminSidebars.php";
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery library -->

<script>
    $(document).ready(function() {
        $('#image').change(function() {
            readURL(this);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
            
                reader.onload = function(e) {
                    $('#image-preview').attr('src', e.target.result);
                }
            
                reader.readAsDataURL(input.files[0]);
            }
        }
    });
</script>

<div style="margin-top: 50px;" class="container">
    <a href="create.php" class="btn btn-success">Add Post</a>
    <a href="index.php" class="btn btn-success">Manage Posts</a>
    <h1>EDIT POST FORM</h1>
    
    <?php include ROOT_PATH . "/app/helpers/formErrors.php"; ?>
    
    <form method="POST" action="edit.php" enctype="multipart/form-data">
        <div class="form-group">
            <input value="<?php echo $id; ?>" name="id" type="hidden">
            <label for="title">Title</label>
            <input value="<?php echo $title; ?>" name="title" type="text" class="form-control" id="title" placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <input value="<?php echo $slug; ?>" name="slug" type="text" class="form-control" id="slug" placeholder="Enter slug">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <?php if (!empty($image)) : ?>
                <img src="<?php echo BASE_URL . '/img/' . $image; ?>" alt="Post Image" class="img-fluid" id="image-preview">
            <?php endif; ?>
            <input name="image" type="file" class="form-control-file" id="image">
        </div>
        <div class="form-group">
            <label for="topic">Topic</label>
            <select name="topic_id" class="form-control" id="topic">
                <?php foreach ($topics as $topic) : ?>
                    <?php if (!empty($topic_id) && $topic_id === $topic['id']): ?>
                        <option selected value="<?php echo $topic['id']; ?>"><?php echo $topic['name']; ?></option>
                    <?php else: ?>
                        <option value="<?php echo $topic['id']; ?>"><?php echo $topic['name']; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" id="body" name="body" rows="5" placeholder="Enter body"><?php echo $body; ?></textarea>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="publish" name="published" <?php echo $published ? 'checked' : ''; ?>>
            <label class="form-check-label" for="published">Publish</label>
        </div>
        <button name="update-post" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php include_once ROOT_PATH . "/app/include/adminFooter.php"; ?>