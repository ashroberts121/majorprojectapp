<?php

  $activePage = 'home'; //Sets active page variable for navbar

  include('../admin/config.php');//Call in config for db connection
  include('../controller/functions.php');//Call in custom function file
  include('../model/head.php');//Call in head.php for head tags
  include('../view/nav.php');//Call in bottom navbar
  //include('home.php');//Call in home.php

?>
<div class="col-12">
  <div class="row" style="text-align:center;">

    <?php
    $postsQuery = $conn->query("SELECT
      posts.id,
      posts.username,
      COUNT(post_likes.id) AS likes,
      GROUP_CONCAT(users.username SEPARATOR '|') AS liked_by

      FROM posts

      LEFT JOIN post_likes
      ON posts.id = post_likes.post_id

      LEFT JOIN users
      ON post_likes.user_id = users.id

      GROUP BY posts.id

      ORDER BY posts.id DESC
    ");

    while($row = $postsQuery->fetch_object()){
      $row->liked_by = $row->liked_by ? explode('|', $row->liked_by) : [];
      $posts[] = $row;
    }

    foreach($posts as $post){
      if(($_GET['id']) == ($post->id)){
        if(!empty($post->liked_by)){?>
          <div class="col-2 mt-2"><a href="<?php echo DIR;?>view/home.php"><i class="fa fa-chevron-left fa-2x" style="color:#639EFB"></i></a></div>
          <div class="col-8">
            <p class="h4 mt-2">Likes</p>
            <ul class="list-group list-group-flush">
              <?php
              foreach($post->liked_by as $user) {?>
                <li class="list-group-item"><?php echo $user;?></li>
              <?php
              }//end foreach?>
            </ul>
          </div>
          <div class="col-2"></div>
        <?php
        }else{?>
          <div class="col-2 mt-2"><a href="<?php echo DIR;?>view/home.php"><i class="fa fa-chevron-left fa-2x" style="color:#639EFB"></i></a></div>
          <div class="col-8">
            <p class="h4 mt-2">Likes</p>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Post has no likes yet. :(</li>
            </ul>
          </div>
          <div class="col-2"></div>
        <?php
        }//end if else
      }
    }//end foreach ?>

  </div>
</div>
