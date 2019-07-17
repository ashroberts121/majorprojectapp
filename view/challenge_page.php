<?php

  $activePage = 'challenges'; //Sets active page variable for navbar

  include('../admin/config.php');//Call in config for db connection
  include('../controller/functions.php');//Call in custom function file
  include('../model/head.php');//Call in head.php for head tags
  include('../view/nav.php');//Call in bottom navbar

?>

<!-- Challenge page tabs -->
<div class="card-header border-bottom-0 bg-transparent">
  <ul class="nav nav-tabs justify-content-center pt-1" role="tablist">
    <!-- Login Tab -->
    <li class="nav-item">
      <a class="nav-link active text-primary" data-toggle="pill" href="#challengeFeedTab" role="tab">Feed</a>
    </li>
    <!-- Register Tab -->
    <li class="nav-item">
      <a class="nav-link text-primary" data-toggle="pill" href="#challengeLeaderboardTab" role="tab">Leaderboard</a>
    </li>
  </ul>
</div>

<!-- Page Container -->
<div class="col-12" style="padding: 0;" id="pageContainer">

  <!-- Tab content -->
  <div class="col-12 p-0 tab-content" id="nav-tabContent">

    <!------------------------------- TAB 1 (Challenge Feed), Content ------------------------->
    <div class="tab-pane fade show active pb-2" id="challengeFeedTab" role="tabpanel">

      <?php
      //Set variable for get data
      $challenge_id = $_GET['id'];
      $challenge_name = $_GET['name'];
      // //Select cover image for page
      $sql = $conn->query("SELECT * FROM challenges WHERE id='$challenge_id'");
      while($row = $sql->fetch_object()){
      ?>
      <div class="col-12" style="background-image:url('<?php echo DIR?>assets/challenge_bg_images/<?php echo $row->cover_image?>');background-size:100% auto">
        <h3 class="pt-4 pb-4" style="text-align:center;color:white;text-shadow:1px 1px 1px grey;"><?php echo $challenge_name?></h3>
        <div class="row pb-4" id="challengesPageBanner">
          <div class="col-2"></div>
          <div class="col-4">
            <p><?php echo $row->members;?> Member(s)</p>
          </div>
          <div class="col-4">
            <p>~ <?php echo $row->distance?> Km</p>
          </div>
          <div class="col-2"></div>
        </div>
      </div>

      <div class="col-12 p-0" id="challengesPageJoinButton">
        <div class="col-10 offset-1">
          <p><?php echo $row->description;?></p>
        </div>

        <?php }//end while ?>
        <?php
        //Assign logged in user to $email
        $email = $_SESSION['email'];
        $id = $_SESSION['id'];
        $challenge_id = $_GET['id'];
        $name = $_GET['name'];

          //Check user is logged in and has joined the group and show correct buttons
          if(!(challenge_member_exists($email, $challenge_id, $conn))){
            if(!(logged_in())){
            }else{
            ?>
            <a href="<?php echo DIR;?>controller/process_join_challenge.php?id=<?php echo $challenge_id;?>&name=<?php echo $name;?>"><button type="button" class="btn btn-secondary">Join Challenge</button></a>
            <?php
          }//end if else ! logged in
          }else{
          ?>

          <a href="<?php echo DIR;?>controller/process_leave_challenge.php?id=<?php echo $challenge_id;?>&name=<?php echo $name;?>"><button type="button" class="btn btn-secondary" style="background-color:white;color:#639EFB">Joined ✓</button></a>

          <!-- Delete challenge option if logged in as challenge author -->
          <?php
            $sql = $conn->query("SELECT * FROM challenges WHERE id='$challenge_id'");
            while($row = $sql->fetch_object()){
              $author = $row->author_id;
              if($id == $author){
                ?><a href="<?php echo DIR;?>controller/process_delete_challenge.php?id=<?php echo $challenge_id;?>&name=<?php echo $name;?>"><p class="m-0" style="color: red;padding: 2px 4px;">Delete challenge</p></a><?php
              }//end if
            }//end while
          }//end if ! challenge exists
          ?>
        </div>
        <!----- Post form ---->
        <?php
        if(!(logged_in())){
          echo '<p class="col" style="color:red;text-align:center">Please login to join this challenge.</p>';
        }elseif(!(challenge_member_exists($email, $challenge_id, $conn))){

        }else{
        ?>

        <div class="col-12 p-0">
          <div id="challengesNewPostCard">

            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="h5">Post to '<?php echo $name; ?>'</div>
                    </div>
                </div>
            </div>

            <div class="card-body">
              <form class="tab-content" method="post" action="<?php echo DIR?>controller/process_new_challenge_post.php" enctype="multipart/form-data">
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
                    <input style="display:none;" id="post_id" name="post_id" value="<?php echo $challenge_id; ?>"/>
                  </div>
                  <!-- Post Name Field (Hidden from user | for redirection purposes) -->
                  <div>
                    <input style="display:none;" id="post_name" name="post_name" value="<?php echo $name; ?>"/>
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
        </div><!-- div#challengeNewPostCard -->
        <?php

        }//end if challenge_member_exists
        ?>


        <!-- Display challenge posts, newest first -->
        <?php
        $id = $_GET['id'];

        $sql = $conn->query("SELECT * FROM challenge_posts WHERE challenge_id = '$id' ORDER BY id DESC");
        while($row = $sql->fetch_object()){
          $challenge_posts[] = $row;
        }//end while
        if(empty($challenge_posts)){
          echo '<div class="col-12">No posts yet :(</div>';
        }else{
          foreach($challenge_posts as $post){
            ?>
          <div class="col-12 p-0">
            <div id="challengesNewPostCard">
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
                <img src="<?php echo DIR ?>assets/challenge_post_images/<?php echo "$post->post_image"?>"width="100%" height="auto" />

                <!-- Delete Post if logged in as post author -->
                <?php
                  if(($_SESSION['id']) == ($post->author_id)){
                    ?>
                    <div class="pb-1">
                      <a href="<?php echo DIR; ?>controller/process_delete_challenge_post.php?id=<?php echo $post->id;?>&challengeid=<?php echo $challenge_id;?>&name=<?php echo $name;?>" id="homeDeletePost">Delete</a>
                    </div>
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
      </div><!--end of tab-->

      <!------------------------------- End of tab 1 content ------------------------------>



      <!------------------------------- TAB 2 (Leaderboard), Content ------------------------->

      <div class="tab-pane fade pb-2" id="challengeLeaderboardTab" role="tabpanel">
        <div class="col-10 offset-1 p-0">
          <div class="row"><h5 class="col" style="text-align:center;">Leaderboard for Challenge:<br/>'<?php echo $name;?>'</h5></div>
          <?php
          if(!(challenge_member_exists($email, $id, $conn))){
            ?><div class="row"><p class="col" style="text-align:center;color:red">Please join the group and add your time to appear on the leaderboard.</p></div><?php
          }else{
            ?>
            <div class="col pt-1" style="text-align:center">
              <div class="form-group">

                  <form method="post" action="<?php echo DIR?>controller/process_leaderboard_time.php" style="text-align:center">
                    <p class="m-0" style="text-align:center">Input challenge time to leaderboard:</p>
                    <div class="row" style="text-align:center">
                      <div class="col-1 p-1"></div>
                      <div class="col p-1">Hours<input class="form-control" type="number" name="hours" placeholder="00"></div>
                      <div class="col p-1">Minutes<input class="form-control" type="number" name="mins" placeholder="00"></div>
                      <div class="col p-1">Seconds<input class="form-control" type="number" name="secs" placeholder="00"></div>
                      <div class="col-1 p-1"></div>
                    </div>
                    <!--Hidden inputs-->
                    <input type="text" style="display:none" name="id" value="<?php echo $challenge_id;?>">
                    <input type="text" style="display:none" name="name" value="<?php echo $name;?>">
                    <!--Submit time-->
                    <button type="submit" name="submit" id="customButton" class="btn btn-primary mt-1">Post Time to Leaderboard</button>
                  </form>

              </div>
            </div>
            <?php
          }
          ?>
          <div class="row">

            <?php
            //Select rows leaderboard data for selected challenge based on 'Get ID'
            $sql2 = $conn->query("SELECT * FROM challenge_leaderboard WHERE challenge_id='$challenge_id' AND challenge_time > 0 ORDER BY challenge_time ASC");  ?>

            <div class="col-3 p-0">
              <ul class="list-group list-group-flush">
                <li class="list-group-item" style="font-weight:bold;">Place</li>
                <?php
                  //Count number of members in the challenge leaderboard
                  $challengers = mysqli_num_rows($sql2);

                  //Display all leaderboard members in a descending list
                  for($x = 1; $x <= $challengers; $x++){
                    ?>
                    <li class="list-group-item">
                      <?php
                      //Show gold icon for first place on leaderboard
                      if($x == 1){
                        echo '<i class="fa fa-trophy" style="color:#d2ac26"></i> ' . $x;
                      }
                      //Show silver icon for second place on leaderboard
                      elseif($x == 2){
                        echo '<i class="fa fa-trophy" style="color:#d1c9ca"></i> ' . $x;
                      }
                      //Show bronze icon for third place on leaderboard
                      elseif($x == 3){
                        echo '<i class="fa fa-trophy" style="color:#b7824c"></i> ' . $x;
                      }
                      elseif($x > 3){
                      echo '<i class="fa fa-angle-right" style="color:#639EFB"></i> ' . $x;
                      }//end if else ?>
                    </li>
                    <?php
                  }//end for loop
                  ?>
              </ul>
            </div>

            <div class="col-5 p-0">
              <ul class="list-group list-group-flush">
                <li class="list-group-item" style="font-weight:bold;">Username</li>
                <?php
                while($row = $sql2->fetch_object()){
                    $leaderboard[] = $row;
                  }//End while

                  foreach($leaderboard as $lb){
                    //display username
                    ?><li class="list-group-item"><?php echo $lb->username;?></li><?php
                  }//end for loop
                  ?>
              </ul>
            </div>

            <div class="col-4 p-0">
              <ul class="list-group list-group-flush">
                <li class="list-group-item" style="font-weight:bold;">Time</li>
                <?php
                while($row = $sql2->fetch_object()){
                    $leaderboard[] = $row;
                  }//End while

                  foreach($leaderboard as $lb){
                      //Remove trailing zeros from time
                      $lbtime = rtrim(rtrim($lb->challenge_time, "0"),".");
                      //display time
                      ?><li class="list-group-item"><?php echo $lbtime;?></li><?php
                  }//end foreach loop
                  ?>
              </ul>
            </div>

          </div>
        </div>
      </div><!--end of tab 2-->

    </div><!-- end of tab content -->
  <!-- row #pageContainer -->
</div><!-- div.col-12 -->
