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

    <!--//////////////////////////////// New Comment Form -------------------------------------->
    <!-- New Comment Card -->
    <div id="newCommentCard" class="card col">

      <!-- New Comment Card Body -->
      <div class="card-body">
        <div class="h4">Add comment..</div>
        <form class="tab-content" method="post" action="<?php echo DIR?>controller/process_post_comment.php" enctype="multipart/form-data">
          <div class="tab-pane fade show active" id="posts" role="tabpanel">
            <!-- Post Message Field -->
            <div class="form-group mb-1">
                <textarea class="form-control mb-1" id="comment" name="comment" rows="3" placeholder="What are you thinking?"></textarea>
            </div>
            <!-- Post ID Field (Hidden from user) -->
            <div>
              <input style="display:none;" id="post_id" name="post_id" value="<?php echo $_GET['id']; ?>"/>
            </div>
          </div>
          <!-- Submit comment form -->
          <div class="btn-toolbar justify-content-between">
            <div class="btn-group">
              <button id="customButton" type="submit" name="submit" class="btn btn-primary">Share</button>
            </div>
          </div>
        </form>
      </div>
    </div><!-- End of New Comment Card -->

    <div class="col-12">
      <ul class="list-group list-group-flush">
        <?php
        $post_id = $_GET['id'];

        //Select all rows from post_comments table
        $comments = $conn->query("SELECT * FROM post_comments WHERE post_id = '$post_id' ORDER BY id DESC");

        //Display content as objects if post_comments has rows
        while($row = $comments->fetch_object()){

          ?>
          <li class="list-group-item">
              <!-- Username tag -->
              <div class="h6 m-0">@<?php echo "$row->username" ?></div>
              <!-- Post time -->
              <div class="text-muted"> <i class="fa fa-clock-o mr-1"></i><?php echo "$row->comment_time" ?></div>

              <!-- Post content -->
              <p class="card-text"><?php echo "$row->comment" ?></p>
          </li>

        <?php
        }//End of while
        ?>
      </ul>
    </div><!--end of div.col -->

  </div>
</div><!-- End of page container -->
