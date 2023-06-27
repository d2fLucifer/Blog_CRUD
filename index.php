<?php
include_once "path.php";
include_once ROOT_PATH . "/app/include/header.php";
include_once ROOT_PATH . "/app/include/message.php";
include_once ROOT_PATH . "/app/controllers/topics.php";
include_once ROOT_PATH . "/app/controllers/users.php";

$topics = selectAll('topics');
$posts = getPublishedPost();
?>

<!-- Rest of your code -->
              

<section class="home" id="home">
  <div class="home-text container">
    <div class="home-title">D2F Team Blog</div>
    <span class="home-subtitle">Gamble save our life</span>
  </div>
</section>

<div class="post-filter container">
  <?php foreach ($topics as $key => $topic) : ?>
    <span class="filter-item" data-filter="all">
      <a class="filter-link" href="#"><?php echo $topic['name']; ?></a>
    </span>
  <?php endforeach; ?>
</div>

<?php include ROOT_PATH . "/app/include/message.php"; ?>

<section class="post container">
  <?php if (!empty($posts)) : ?>
    <?php foreach ($posts as $key => $post) : ?>
      <div class="post-box">
        <img src="<?php echo BASE_URL . '/img/' . $post['image'] ?>" alt="" class="post-img" />
        <a href="single_post.php?id=<?php echo $post['id']; ?>" class="post-title">
          <?php echo $post['title']; ?>
        </a>
        <span class="post-date"><?php echo date('F j, Y', strtotime($post['posted_time'])); ?></span>
        <p class="post-description">
          <?php echo $post['body']; ?>
        </p>
        <div class="profile">
          <?php
          $user = selectOne('users', ['id' => $post['user_id']]);
          if ($user && file_exists(ROOT_PATH . '/img/' . $user['image'])) {
            ?>
            <img src="<?php echo BASE_URL . '/img/' . $user['image']; ?>" class="profile-img" alt="" />
            <span class="profile-name"><?php echo $user['username']; ?></span>
          <?php } ?>
        </div>
        <div class="post-stats">
          <span class="view-count"><?php echo $post['views']; ?> Views</span>
        </div>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</section>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('.dropdown-toggle').on('click', function() {
      $('.dropdown-menu').toggleClass('show');
    });
  });
</script>

<?php include ROOT_PATH . "/app/include/footer.php"; ?>
