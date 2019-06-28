<?php

  $activePage = 'home'; //Sets active page variable for navbar

  include('../admin/config.php');//Call in config for db connection
  include('../controller/functions.php');//Call in custom function file
  include('../model/head.php');//Call in head.php for head tags
  include('../view/nav.php');//Call in bottom navbar

?>
<div class="col-12" style="padding: 0;">
  <div class="row" id="pageContainer">

    <!---------------------------------------------- New Post Card -------------------------------------->
    <div id="homeNewPostCard" class="card col">

      <div class="card-header">
          <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex justify-content-between align-items-center">
                <div class="h2">New Post..</div>
              </div>
          </div>
      </div>

      <div class="card-body">
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
            <div class="form-group">
                <label class="sr-only" for="message">post</label>
                <textarea class="form-control" id="message" rows="3" placeholder="What are you thinking?"></textarea>
            </div>
          </div>
          <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
            <div class="form-group">
              <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFile">
                  <label class="custom-file-label" for="customFile">Upload image</label>
              </div>
            </div>
            <div class="py-4"></div>
          </div>
        </div>
        <div class="btn-toolbar justify-content-between">
          <div class="btn-group">
            <button id="customButton" type="submit" class="btn btn-primary">share</button>
          </div>
        </div>
      </div>

    </div>

    <!---------------------------------------------- End of New Post Card -------------------------------------->

    <!------------------------Social Media Post Card------------------------------->
    <div id="homePostCard" class="card">

      <!-- Header, poster details -->
      <div class="card-header">
          <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex justify-content-between align-items-center">
                  <div class="mr-2">
                      <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt=""><!-- Profile display picture -->
                  </div>
                  <div class="ml-2">
                      <div class="h5 m-0">@Username123</div><!-- Username tag -->
                      <div class="text-muted">Full Name</div><!-- Name -->
                  </div>
              </div>
          </div>
      </div>

      <!-- Body, post content -->
      <div class="card-body">
          <div class="text-muted mb-2"> <i class="fa fa-clock-o"></i> 10 min ago</div><!-- Post time -->
          <a class="card-link" href="#">
              <h5 class="card-title" id="customPostColor">Post Title (optional)</h5><!-- Post title -->
          </a>
          <p class="card-text"><!-- Post content -->
              Post Content here. Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Quo recusandae nulla rem eos ipsa praesentium esse magnam nemo dolor sequi
              fuga quia quaerat cum, obcaecati hic.
          </p>
          <img src="<?php echo DIR ?>assets/img/pushup_man.jpeg" width="100%" height="auto" /><!-- Post image -->
          <div><!-- Post tags -->
            <a href="#"><span class="badge badge-primary" id="customPostBGColor">JavaScript</span></a>
            <a href="#"><span class="badge badge-primary" id="customPostBGColor">Android</span></a>
            <a href="#"><span class="badge badge-primary" id="customPostBGColor">PHP</span></a>
            <a href="#"><span class="badge badge-primary" id="customPostBGColor">Node.js</span></a>
            <a href="#"><span class="badge badge-primary" id="customPostBGColor">Ruby</span></a>
            <a href="#"><span class="badge badge-primary" id="customPostBGColor">Python</span></a>
          </div>
      </div>

      <!-- Footer, post controls -->
      <div class="card-footer">
        <a href="#" class="card-link" id="customPostColor"><i class="fa fa-thumbs-up"></i> Like</a>
        <a href="#" class="card-link" id="customPostColor"><i class="fa fa-comment"></i> Comment</a>
      </div>
    </div>

    <!-- Post divider -->
    <div style="height: 30px;">
      <div id="postDivider"></div>
    </div>
    <!------------------------------//END OF Social Media Post Card---------------------------->

    <!------------------------Social Media Post Card------------------------------->
    <div id="homePostCard" class="card">

      <!-- Header, poster details -->
      <div class="card-header">
          <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex justify-content-between align-items-center">
                  <div class="mr-2">
                      <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt=""><!-- Profile display picture -->
                  </div>
                  <div class="ml-2">
                      <div class="h5 m-0">@Username123</div><!-- Username tag -->
                      <div class="text-muted">Full Name</div><!-- Name -->
                  </div>
              </div>
          </div>
      </div>

      <!-- Body, post content -->
      <div class="card-body">
          <div class="text-muted mb-2"> <i class="fa fa-clock-o"></i> 10 min ago</div><!-- Post time -->
          <a class="card-link" href="#">
              <h5 class="card-title" id="customPostColor">Post Title (optional)</h5><!-- Post title -->
          </a>
          <p class="card-text"><!-- Post content -->
              Post Content here. Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Quo recusandae nulla rem eos ipsa praesentium esse magnam nemo dolor sequi
              fuga quia quaerat cum, obcaecati hic.
          </p>
          <div><!-- Post tags -->
            <a href="#"><span class="badge badge-primary" id="customPostBGColor">JavaScript</span></a>
            <a href="#"><span class="badge badge-primary" id="customPostBGColor">Android</span></a>
            <a href="#"><span class="badge badge-primary" id="customPostBGColor">PHP</span></a>
            <a href="#"><span class="badge badge-primary" id="customPostBGColor">Node.js</span></a>
            <a href="#"><span class="badge badge-primary" id="customPostBGColor">Ruby</span></a>
            <a href="#"><span class="badge badge-primary" id="customPostBGColor">Python</span></a>
          </div>
      </div>

      <!-- Footer, post controls -->
      <div class="card-footer">
        <a href="#" class="card-link" id="customPostColor"><i class="fa fa-thumbs-up"></i> Like</a>
        <a href="#" class="card-link" id="customPostColor"><i class="fa fa-comment"></i> Comment</a>
      </div>
    </div>

    <!-- Post divider -->
    <div style="height: 30px;">
      <div id="postDivider"></div>
    </div>
    <!------------------------------//END OF Social Media Post Card---------------------------->

    <!------------------------Social Media Post Card------------------------------->
    <div id="homePostCard" class="card">

      <!-- Header, poster details -->
      <div class="card-header">
          <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex justify-content-between align-items-center">
                  <div class="mr-2">
                      <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt=""><!-- Profile display picture -->
                  </div>
                  <div class="ml-2">
                      <div class="h5 m-0">@Username123</div><!-- Username tag -->
                      <div class="text-muted">Full Name</div><!-- Name -->
                  </div>
              </div>
          </div>
      </div>

      <!-- Body, post content -->
      <div class="card-body">
          <div class="text-muted mb-2"> <i class="fa fa-clock-o"></i> 10 min ago</div><!-- Post time -->
          <a class="card-link" href="#">
              <h5 class="card-title" id="customPostColor">Post Title (optional)</h5><!-- Post title -->
          </a>
          <p class="card-text"><!-- Post content -->
              Post Content here. Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Quo recusandae nulla rem eos ipsa praesentium esse magnam nemo dolor sequi
              fuga quia quaerat cum, obcaecati hic.
          </p>
          <div><!-- Post tags -->
            <a href="#"><span class="badge badge-primary" id="customPostBGColor">JavaScript</span></a>
            <a href="#"><span class="badge badge-primary" id="customPostBGColor">Android</span></a>
            <a href="#"><span class="badge badge-primary" id="customPostBGColor">PHP</span></a>
            <a href="#"><span class="badge badge-primary" id="customPostBGColor">Node.js</span></a>
            <a href="#"><span class="badge badge-primary" id="customPostBGColor">Ruby</span></a>
            <a href="#"><span class="badge badge-primary" id="customPostBGColor">Python</span></a>
          </div>
      </div>

      <!-- Footer, post controls -->
      <div class="card-footer">
        <a href="#" class="card-link" id="customPostColor"><i class="fa fa-thumbs-up"></i> Like</a>
        <a href="#" class="card-link" id="customPostColor"><i class="fa fa-comment"></i> Comment</a>
      </div>
    </div>

    <!-- Post divider -->
    <div style="height: 30px;">
      <div id="postDivider"></div>
    </div>
    <!------------------------------//END OF Social Media Post Card---------------------------->

  </div>
</div>

<?php
  include('../model/footer.php');//Call in footer.php
?>
