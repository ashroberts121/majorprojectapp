<?php

  $activePage = 'home'; //Sets active page variable for navbar

  include('../admin/config.php');//Call in config for db connection
  include('../controller/functions.php');//Call in custom function file
  include('../model/head.php');//Call in head.php for head tags
  include('../view/nav.php');//Call in bottom navbar
?>

<!-- Page Container -->
<div class="col-12" style="padding: 0;">
  <div class="row" id="pageContainer">
    <!--//////////////////////////////// New Post Card -------------------------------------->
    <div id="homeNewPostCard" class="card col">

      <div class="card-header">
          <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex justify-content-between align-items-center">
                <div class="h3">New Post..</div>
              </div>
          </div>
      </div>

      <div class="card-body">
        <form class="tab-content" method="post" action="<?php echo DIR?>controller/process_new_post.php" enctype="multipart/form-data">
          <div class="tab-pane fade show active" id="posts" role="tabpanel">
            <!-- Post Title Field (Optional)-->
            <div class="form-group mb-1">
              <input type="text" name="title" id="title" class="form-control" placeholder="Post Title (optional)">
            </div>
            <!-- Post Message Field -->
            <div class="form-group mb-1">
                <textarea class="form-control mb-1" id="message" name="message" rows="3" placeholder="What are you thinking?"></textarea>
            </div>
            <!-- Post Tags (optional) -->
            <div class="form-group mb-1">
                <input type="text" name="tags" id="tags" class="form-control" placeholder="Tags - Seperated by Commas (optional)">
            </div>
            <!-- Post Image (optional) -->
            <div class="form-group mb-1">
              <i class="fa fa-camera" style="font-size:1.5rem;margin:5px;" onclick="showUploadImage()"></i>
              <p id="show_upload_image"></p>
            </div>
          </div>
          <div class="btn-toolbar justify-content-between">
            <div class="btn-group">
              <button id="customButton" type="submit" name="submit" class="btn btn-primary">Share</button>
            </div>
          </div>
        </form>

      </div>

    </div>

    <!---///////////////////////////// End of New Post Card -------------------------------------->

    <?php
    // //assign variable for session value
    // $detect_user = mysqli_real_escape_string($conn, $_SESSION['email']);

    //Select all posts from database
    $sql = "SELECT * FROM posts ORDER BY id DESC";
    $result = $conn->query($sql);

    //Display table rows as objects
    while($row = $result->fetch_object()){

    ?>

    <!--////////////////////////////////// Social Media Post Card------------------------------------>
    <div id="homePostCard" class="card">

      <!-- Header, poster details -->
      <div class="card-header">
          <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex justify-content-between align-items-center">
                  <div class="mr-2">
                      <!-- Profile display picture -->
                      <img class="rounded-circle" width="50px" height="50px" src="<?php echo DIR ?>assets/user_images/<?php echo "$row->display_picture" ?>">
                  </div>
                  <div class="ml-2">
                      <!-- Username tag -->
                      <div class="h5 m-0">@<?php echo "$row->username" ?></div>
                      <!-- Post time -->
                      <div class="text-muted mt-2"> <i class="fa fa-clock-o mr-1"></i><?php echo "$row->post_time" ?></div>
                  </div>
              </div>
          </div>
      </div>

      <!-- Body, post content -->
      <div class="card-body">

          <!-- Post title -->
          <?php
            //Check if post has title, hide a>h5 tags if not
            if(!(($row->title) == '')){
              ?>
              <a class="card-link" href="#">
                  <h5 class="card-title" id="customPostColor"><?php echo "$row->title" ?></h5>
              </a>
              <?php
            };//end of if ?>

          <!-- Post content -->
          <p class="card-text">
              <?php echo "$row->message" ?>
          </p>

          <!-- Post image -->
          <?php
            //Check if post has image, hide img tag if not
            if(!(($row->image) == '')){
              ?>
              <img src="<?php echo DIR ?>assets/post_images/<?php echo "$row->image"?>"width="100%" height="auto" />
              <?php
            };//end of if ?>

          <!-- Post tags -->
          <div>
            <?php
            //Remove whitespace from 'tags' rows
            trim($row->tags);
            //Remove commas from 'tags' rows and convert tags into an array
            $tags = explode(',', $row->tags);

            //Loop through $tags array and display on post
            foreach($tags as $x => $xvalue){
              ?>
              <a href="#"><span class="badge badge-primary" id="customPostBGColor"><?php echo $xvalue?></span></a>
              <?php
            } //end of foreach
          ?>
          </div>

      </div>

      <!-- Footer, post controls -->
      <div class="card-footer">

        <a href="#" class="card-link" id="customPostColor"><i class="fa fa-thumbs-up"></i> Like (0)</a>
        <a href="#" class="card-link" id="customPostColor"><i class="fa fa-comment"></i> Comment (0)</a>

      </div>
    </div>

    <!-- Post divider -->
    <div style="height: 30px;">
      <div id="postDivider"></div>
    </div>
    <!--///////////////////////////////// END OF Social Media Post Card ---------------------------->

    <?php

    }//End of while loop
    ?>


    <?php
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ?>
      <div>

      <?php

      $postsQuery = $conn->query("SELECT
        posts.id,
        posts.title,
        COUNT(post_likes.id) AS likes,
        GROUP_CONCAT(users.username SEPARATOR '|') AS liked_by

        FROM posts

        LEFT JOIN post_likes
        ON posts.id = post_likes.post_id

        LEFT JOIN users
        ON post_likes.user_id = users.id

        GROUP BY posts.id
      ");

      while($row = $postsQuery->fetch_object()){
        $row->liked_by = $row->liked_by ? explode('|', $row->liked_by) : [];
        $posts[] = $row;
      }

    //echo '<pre>', print_r($posts, true), '</pre>';
    foreach($posts as $post){
        echo $post->title;
        ?>
        <a href="<?php echo DIR?>controller/process_post_like.php?type=post&id=<?php echo $post->id ?>">Like</a>
        <?php
        echo '<br/>';
        ?>
        <p><?php echo $post->likes ?> people liked this</p>
        <?php if(!empty($post->liked_by)){?>
          <ul>
            <?php foreach($post->liked_by as $user){?>
              <li><?php echo $user; ?></li>
            <?php } ?>
          </ul>
        <?php } ?>

        <?php
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ?>
  </div>

  </div>
</div><!-- End of page Container -->



<?php

  include('../model/footer.php');//Call in footer.php
?>
