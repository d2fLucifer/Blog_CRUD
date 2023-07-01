<?php
include_once "path.php";
include_once ROOT_PATH . "/app/include/header.php";
include_once ROOT_PATH . "/app/controllers/users.php";

$user = selectOne($table, ['id' => $_SESSION['id']]); 

$userPostsCount = count(selectAll('posts', ['user_id' => $_SESSION['id']]));


$userPosts = selectAll('posts', ['user_id' => $_SESSION['id']], 'created_at DESC'); 

$visiblePosts = array_slice($userPosts, 0, 1); 
$remainingPosts = array_slice($userPosts, 1); 

?>

<section class="h-100 gradient-custom-2">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-9 col-xl-7">
        <div class="card">
          <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
              <img src="<?php echo BASE_URL . '/img/' . $user['image']; ?>" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2" style=" margin-right : 20px;width: 150px ;height: 150px;z-index: 1">
            </div>
            <div class="ms-3" style="margin-top: 130px;">
              <h5><?php echo $user['username']; ?></h5>
              <p>New York</p>
            </div>
          </div>
          <div class="p-4 text-black" style="background-color: #f8f9fa; position:relative;">
            <div class="d-flex justify-content-end text-center py-1">
              <div style="left:10px; position:absolute;">
                <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark" style="z-index: 1;">
              <a href="user/users/edit_profile.php?id=<?php echo $_SESSION['id']; ?>"> Edit Profile</a>
                </button>
              </div>
              <div>
                <p class="mb-1 h5"><?php echo $userPostsCount; ?></p>
                <p class="small text-muted mb-0">Posts</p>
              </div>
              <div class="px-3">
                <p class="mb-1 h5">1026</p>
                <p class="small text-muted mb-0">Followers</p>
              </div>
              <div>
                <p class="mb-1 h5">478</p>
                <p class="small text-muted mb-0">Following</p>
              </div>
            </div>
          </div>
          <div class="card-body p-4 text-black">
            <div class="mb-5">
              <p class="lead fw-normal mb-1">About</p>
              <div class="p-4" style="background-color: #f8f9fa;">
                <p class="font-italic mb-1">Web Developer</p>
                <p class="font-italic mb-1">Lives in New York</p>
                <p class="font-italic mb-0">Photographer</p>
              </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
              <p class="lead fw-normal mb-0">Recent Posts</p>
              <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p>
            </div>
            <div class="row g-2" id="postsContainer">
              <?php foreach ($visiblePosts as $post): ?>
                <div class="col mb-2">
                  <div class="card" style="width: 18rem;">
                    <img src="<?php echo BASE_URL . '/img/' . $post['image']; ?>" class="card-img-top" alt="post image">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $post['title']; ?></h5>
                      <p class="card-text"><?php echo $post['body']; ?></p>
                      <a href="<?php echo BASE_URL . '/single_post.php?id=' . $post['id']; ?>" class="post-btn">Read</a>
                    </div>
                  </div>
                </div>
                
                
              <?php endforeach; ?>
            </div>

            <?php if (count($remainingPosts) > 0): ?>
              <div class="row justify-content-center mt-4">
                <button id="loadMoreBtn" class="post-btn">Load More</button>
              </div>
             
            <?php endif; ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  const loadMoreBtn = document.getElementById('loadMoreBtn');
  const postsContainer = document.getElementById('postsContainer');
  const remainingPosts = <?php echo json_encode($remainingPosts); ?>;
  let currentIndex = <?php echo count($visiblePosts); ?>;

  loadMoreBtn.addEventListener('click', function() {
    if (currentIndex < remainingPosts.length) {
      let post = remainingPosts[currentIndex];
      const card = document.createElement('div');
      card.classList.add('col');
      card.innerHTML = `
        <div class="card" style="width: 18rem;">
          <img src="<?php echo BASE_URL; ?>/img/${post['image']}" class="card-img-top" alt="post image">
          <div class="card-body">
            <h5 class="card-title">${post['title']}</h5>
            <p class="card-text">${post['body']}</p>
            <a href="<?php echo BASE_URL . '/single_post.php?id='?>${post['id']}  class="btn btn-primary">Read</a>
          </div>
        </div>
      `;
      postsContainer.appendChild(card);
      currentIndex++;

      if (currentIndex === remainingPosts.length) {
        loadMoreBtn.style.display = 'none';
      }
    }
  });
</script>



