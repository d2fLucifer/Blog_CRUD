<?php 
include "path.php";
include ROOT_PATH."/app/include/header.php" ;
include ROOT_PATH."/app/include/message.php" ;

?>

  
    <section class="home" id="home">
      <div class="home-text container">
        <div class="home-title">D2F Team Blog</div>
        <span class="home-subtitle">Gamble save our life</span>
      </div>
    </section>

    <div class="post-filter container">
      <span class="filter-item" data-filter="all">ALL</span>
      <span class="filter-item" data-filter="Lifestyle">Lifestyle</span>
      <span class="filter-item" data-filter="Food">Food</span>
      <span class="filter-item" data-filter="Nature">Nature</span>
      <span class="filter-item" data-filter="Photography">Photography</span>
    </div>
    <?php 

include ROOT_PATH."/app/include/message.php" ;

?>
    <section class="post container">
      <div class="post-box">
        <img src="./img/image79.webp" alt="" class="post-img" />
        <h2 class="category"></h2>
        <a href="views/single_post.php" class="post-title"
          >Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore
          sapiente veniam aperiam? Deleniti porro alias eos iure error veritatis
          excepturi?</a
        >
        <span class="post-date"></span>
        <p class="post-description">
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel corporis
          incidunt rem illo quo assumenda, ea temporibus sapiente. Voluptate,
          maiores?
        </p>
        <div class="profile">
          <img src="img/user1_image.jpg" class="profile-img" alt="" />
          <span class="profile-name"></span>
        </div>
      </div>
    </section>
   
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        var filterItems = document.querySelectorAll(".filter-item");
        filterItems.forEach(function (item) {
          item.addEventListener("click", function () {
            var selectedFilter = item.getAttribute("data-filter");
            var currentURL = new URL(window.location.href);
            currentURL.searchParams.set("filter", selectedFilter);
            window.location.href = currentURL.href;
          });
        });
      });
      $(document).ready(function() {
            $('.dropdown-toggle').on('click', function() {
                $('.dropdown-menu').toggleClass('show');
            });
        });
    </script>
 <?php 
include "app/include/footer.php" ;
?>