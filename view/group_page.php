<?php

  $activePage = 'groups'; //Sets active page variable for navbar

  include('../admin/config.php');//Call in config for db connection
  include('../controller/functions.php');//Call in custom function file
  include('../model/head.php');//Call in head.php for head tags
  include('../view/nav.php');//Call in bottom navbar

?>
<div class="col-12" style="padding: 0;">
  <div class="row" id="pageContainer">
    <div class="col-12 p-0" id="groupPageJoinButton">
      <?php
      //Assign logged in user to $email
      $email = $_SESSION['email'];
      $id = $_SESSION['id'];
      $group_id = $_GET['id'];
      $name = $_GET['name'];

      if(!(logged_in())){

      }else{
        //Only give posting capabilities to group members (check logged in user)
        if(!(group_member_exists($email, $group_id, $conn))){ ?>
          <a href="<?php echo DIR;?>controller/process_join_group.php?id=<?php echo $group_id;?>&name=<?php echo $name;?>"><button type="button" class="btn btn-secondary">Join</button></a>
          <?php
        }else{
        ?>

        <a href="<?php echo DIR;?>controller/process_leave_group.php?id=<?php echo $group_id;?>&name=<?php echo $name;?>"><button type="button" class="btn btn-secondary" style="background-color:white;color:#639EFB">Joined ✓</button></a>

        <!-- Delete group option if logged in as group author -->
        <?php
          $sql = $conn->query("SELECT * FROM groups WHERE id='$group_id'");
          while($row = $sql->fetch_object()){
            $author = $row->author_id;
            if($id == $author){
              ?><a href="<?php echo DIR;?>controller/process_delete_group.php?id=<?php echo $group_id;?>&name=<?php echo $name;?>"><p class="m-0" style="color: red;padding: 2px 4px;">Delete Group</p></a><?php
            }//end if
          }
        ?>
      </div>
      <!-- Post form -->
      <div id="groupNewPostCard" class="card col">

        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="h5">Post to '<?php echo $_GET['name']?>'</div>
                </div>
            </div>
        </div>

        <div class="card-body">
          <form class="tab-content" method="post" action="<?php echo DIR?>controller/process_new_group_post.php" enctype="multipart/form-data">
            <div class="tab-pane fade show active" id="posts" role="tabpanel">
              <!-- Post Title Field-->
              <div class="form-group mb-1">
                <input type="text" name="title" id="title" class="form-control" placeholder="Post Title (optional)">
              </div>
              <!-- Post Message Field -->
              <div class="form-group mb-1">
                  <textarea class="form-control mb-1" id="message" name="message" rows="3" placeholder="What are you thinking?"></textarea>
              </div>
              <!-- Post Image (optional) -->
              <div class="form-group mb-1">
                <i class="fa fa-camera" style="font-size:1.5rem;margin:5px;" onclick="showUploadImage()"></i>
                <p id="show_upload_image"></p>
              </div>
              <!-- Post ID Field (Hidden from user) -->
              <div>
                <input style="display:none;" id="post_id" name="post_id" value="<?php echo $_GET['id']; ?>"/>
              </div>
              <!-- Post Name Field (Hidden from user | for redirection purposes) -->
              <div>
                <input style="display:none;" id="post_name" name="post_name" value="<?php echo $_GET['name']; ?>"/>
              </div>
            </div>
            <div class="btn-toolbar justify-content-between">
              <div class="btn-group">
                <button id="customButton" type="submit" name="submit" class="btn btn-primary">Share</button>
              </div>
            </div>
          </form>
        </div>

      </div><!-- div#groupNewPostCard -->
      <?php
    }//end if else(group_member_exists)
}//end if else (logged in)
    ?>


      <!-- Display group posts, newest first -->
      <?php
      $id = $_GET['id'];

      $sql = $conn->query("SELECT * FROM group_posts WHERE group_id = '$id' ORDER BY id DESC");
      while($row = $sql->fetch_object()){
        $group_posts[] = $row;
      }//end while
      if(empty($group_posts)){
        echo '<div class="col-12">No posts yet :(</div>';
      }else{
        foreach($group_posts as $post){
          ?>
        <div class="col-12 p-0">
          <div id="groupNewPostCard">
            <!-- Header, poster details -->
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mr-2">
                            <!-- Profile display picture -->
                            <img class="rounded-circle" width="50px" height="50px" src="<?php echo DIR ?>assets/user_images/<?php echo "$post->display_picture" ?>">
                        </div>
                        <div class="ml-2">
                            <!-- Username tag -->
                            <div class="h5 m-0">@<?php echo "$post->username" ?></div>
                            <!-- Post time -->
                            <div class="text-muted mt-2"> <i class="fa fa-clock-o mr-1"></i><?php echo "$post->post_time" ?></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Body, post content -->
            <div class="card-body">
              <!-- Post title -->
              <a class="card-link" href="#"><h5 class="card-title" id="customPostColor"><?php echo "$post->title" ?></h5></a>
              <!-- Post content -->
              <p class="card-text"><?php echo $post->message;?></p>
              <!-- Post image -->
              <img src="<?php echo DIR ?>assets/group_post_images/<?php echo "$post->post_image"?>"width="100%" height="auto" />

              <!-- Delete Post if logged in as post author -->
              <?php
                if(($_SESSION['id']) == ($post->author_id)){
                  ?>
                  <a href="<?php echo DIR; ?>controller/process_delete_post.php?id=<?php echo $post->id; ?>" id="homeDeletePost">Delete</a>
                  <?php
                }//end if
              ?>

            </div>
          </div>
        </div>
          <?php
        }//End foreach
      }//End if else
      ?>

  </div><!-- row #pageContainer -->
</div><!-- div.col-12 -->
