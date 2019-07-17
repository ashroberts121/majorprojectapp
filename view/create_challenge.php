<?php

  $activePage = 'challenges'; //Sets active page variable for navbar

  include('../admin/config.php');//Call in config for db connection
  include('../controller/functions.php');//Call in custom function file
  include('../model/head.php');//Call in head.php for head tags
  include('../view/nav.php');//Call in bottom navbar
?>

<!-- Page Container -->
<div class="col-12" style="padding: 0;">
  <div class="row" id="pageContainer">

<!--//////////////////////////////// Create New Challenge Card -------------------------------------->
    <div id="newChallengeCard" class="card col">
      <!-- Card header -->
      <div class="card-header">
          <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex justify-content-between align-items-center">
                <div class="h5">New Challenge</div>
              </div>
          </div>
      </div>
      <!-- Card Body with form which directs to 'process_new_challenge.php'-->
      <div class="card-body">
        <form class="tab-content" method="post" action="<?php echo DIR?>controller/process_new_challenge.php" enctype="multipart/form-data">
          <div class="tab-pane fade show active" id="posts" role="tabpanel">
            <!-- Challenge Name -->
            <div class="form-group mb-1">
              <input type="text" name="name" id="name" class="form-control" placeholder="Challenge Name">
            </div>
            <!-- Challenge Info Field -->
            <div class="form-group mb-1">
                <textarea class="form-control mb-1" id="desc" name="desc" rows="3" placeholder="Add some info about the challenge"></textarea>
            </div>
            <!-- Challenge approx. distance (km) -->
            <div class="form-group mb-1">
              <input type="text" name="distance" id="distance" class="form-control" placeholder="Distance in Kilometers (e.g. 23.06)">
            </div>
            <!-- Post Image (optional) -->
            <div class="form-group mb-1">
              <p class="mb-1">Upload cover photo:</p>
              <input type='file' id='cover_image' name='cover_image' multiple='multiple' class='mb-2'/>
            </div>
          </div>
          <!-- Submit new challenge form -->
          <div class="btn-toolbar justify-content-between">
            <div class="btn-group">
              <button id="customButton" type="submit" name="submit" class="btn btn-primary">Create challenge</button>
            </div>
          </div>
        </form>
      </div>

    </div><!-- div#homeNewPostCard -->

<!---/////////// End of New Post Card -------------------------------------->
  </div>
</div>
