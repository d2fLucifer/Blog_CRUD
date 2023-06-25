<?php
include "../../path.php";
include_once ROOT_PATH . "/app/include/adminHeader.php";
?>

<?php
include_once ROOT_PATH . "/app/include/adminSidebars.php";
?>


        
<div style="margin-top :50px;" class="container">
<a href="create.php" class="btn btn-success">Adding POST</a>
            <a href="edit.php" class="btn btn-success">Manage POST</a>
        <h1> EDIT POST FORM</h1>
        <form>
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" placeholder="Enter title">
  </div>
  <div class="form-group">
    <label for="slug">Slug</label>
    <input type="text" class="form-control" id="slug" placeholder="Enter slug">
  </div>
  <div class="form-group">
    <label for="image">Image</label>
    <input type="file" class="form-control-file" id="image">
  </div>
  <div class="form-group">
    <label for="topic">Topic</label>
    <select class="form-control" id="topic">
      <option value="LIFESTYLE">Lifestyle</option>
      <option value="FOOD">Food</option>
      <option value="NATURE">Nature</option>
      <option value="PHOTOGRAPHY">Photography</option>
    </select>
  </div>
  <div class="form-group">
    <label for="body">Body</label>
    <textarea class="form-control" id="body" rows="5" placeholder="Enter body"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


        
    </div>

   


<?php
include_once ROOT_PATH . "/app/include/adminFooter.php";
?>
