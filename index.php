<?php 
include "path.php";
include ROOT_PATH."/app/include/header.php" ;
include ROOT_PATH."/app/include/message.php" ;
include_once ROOT_PATH . "/app/controllers/topics.php";
$topics = selectAll('topics');

?>


    <section class="home" id="home">
      <div class="home-text container">
        <div class="home-title">D2F Team Blog</div>
        <span class="home-subtitle">Gamble save our life</span>
      </div>
    </section>

    <div class="post-filter container">
    <?php foreach($topics as $key =>$topic):?>
    <div class="post-filter container">
      <span class="filter-item" data-filter="all"><a class="filter-link" href="#"><?php echo $topic['name']; ?></a></span>
      
    </div>
      <?php endforeach;?>
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
     
      $(document).ready(function() {
            $('.dropdown-toggle').on('click', function() {
                $('.dropdown-menu').toggleClass('show');
            });
        });
    </script>
 <?php 
include "app/include/footer.php" ;
?>