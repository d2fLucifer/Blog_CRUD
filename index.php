  <?php
  include_once "path.php";
  include_once ROOT_PATH . "/app/include/header.php";
  include_once ROOT_PATH . "/app/include/message.php";
  include_once ROOT_PATH . "/app/controllers/topics.php";
  include_once ROOT_PATH . "/app/controllers/users.php";

  $topics = selectAll('topics');
  $posts = getPublishedPost();
  $perPage = 6;
  $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
  $offset = ($page - 1) * $perPage;
  $postsCount = count($posts);
  $totalPages = ceil($postsCount / $perPage);
  $posts = array_slice($posts, $offset, $perPage);
  ?>

  <!-- Rest of your code -->

  <section class="home" id="home">
    <div class="home-text container">
      <div class="home-title">D2F Team Blog</div>
      <span class="home-subtitle">Gamble save our life</span>
    </div>
  </section>
  <div class="container">
  <div class="post-filter container">
    <?php foreach ($topics as $key => $topic) : ?>
      <span class="filter-item" data-filter="all">
        <a class="filter-link" href="#"><?php echo $topic['name']; ?></a>
      </span>
    <?php endforeach; ?>
  </div>

  <section class="post container">
    <?php include ROOT_PATH . "/app/include/message.php"; ?>

    <?php if (!empty($posts)) : ?>
      <?php foreach ($posts as $key => $post) : ?>
        <div class="post-box">
          <img src="<?php echo BASE_URL . '/img/' . $post['image'] ?>" alt="" class="post-img" />
          <a href="single_post.php?id=<?php echo $post['id']; ?>" class="post-title">
            <?php echo $post['title']; ?>
          </a>
          <span class="post-date"><?php echo date('F j, Y', strtotime($post['created_at'])); ?></span>
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
    </section>
    <?php endif; ?>

    <!-- Pagination links -->
    <div class="pagination">
  <?php if ($page > 1) : ?>
    <a href="?page=<?php echo $page - 1; ?>" class="btn btn-primary">&laquo; Previous</a>
  <?php endif; ?>
  <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
    <a href="?page=<?php echo $i; ?>" class="btn <?php echo ($page === $i) ? 'btn-primary active' : 'btn-secondary'; ?>"><?php echo $i; ?></a>
  <?php endfor; ?>
  <?php if ($page < $totalPages) : ?>
    <a href="?page=<?php echo $page + 1; ?>" class="btn btn-primary">Next &raquo;</a>
  <?php endif; ?>
</div>

</div>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.dropdown-toggle').on('click', function() {
        $('.dropdown-menu').toggleClass('show');
      });
    });
  </script>

  <?php include ROOT_PATH . "/app/include/footer.php"; ?>
