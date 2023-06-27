<?php
include_once "../../path.php";
include_once ROOT_PATH . "/app/include/adminHeader.php";
include_once ROOT_PATH . "/app/controllers/posts.php";
include_once ROOT_PATH . "/app/helpers/formErrors.php";
include_once ROOT_PATH . "/app/include/adminSidebars.php";
adminOnly();
?>

<div style="margin-top: 50px;" class="container">
    <a href="create.php" class="btn btn-success">Add Post</a>
    <a href="index.php" class="btn btn-success">Manage Posts</a>
    <h1>Create Post Form</h1>

    <?php include ROOT_PATH . "/app/helpers/formErrors.php"; ?>

    <form method="POST" action="create.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title</label>
            <input value="<?php echo $title; ?>" name="title" type="text" class="form-control" id="title" placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <input value="<?php echo $slug; ?>" name="slug" type="text" class="form-control" id="slug" placeholder="Enter slug">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input name="image" type="file" class="form-control-file" id="image" accept="image/*">
            <div id="image-preview"></div>
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
            <input type="checkbox" class="form-check-input" id="publish" name="published">
            <label class="form-check-label" for="published">Publish</label>
        </div>
        <button name="add-post" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php include_once ROOT_PATH . "/app/include/adminFooter.php"; ?>

<script>
    // Image preview
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('image-preview');

    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function() {
                const imageUrl = reader.result;
                imagePreview.innerHTML = '<img src="' + imageUrl + '" alt="Image Preview" class="img-thumbnail">';
            }
            reader.readAsDataURL(file);
        } else {
            imagePreview.innerHTML = '';
        }
    });
</script>
