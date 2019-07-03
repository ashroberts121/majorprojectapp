<?php

  $activePage = 'profile'; //Sets active page variable for navbar

  include('../admin/config.php');//Call in config for db connection
  include('../controller/functions.php');//Call in custom function file
  include('../model/head.php');//Call in head.php for head tags
  include('../view/nav.php');//Call in bottom navbar

?>

<?php
  //Check if a user is logged in and display their profile details
  if(logged_in()){

    //assign variable for session value
    $detect_user = mysqli_real_escape_string($conn, $_SESSION['email']);
    //Select profiles based on their id
    $sql = "SELECT * FROM profile WHERE email='$detect_user'";
    $result = $conn->query($sql);

    while($row = $result->fetch_object()){

?>

<!-- Profile Page Container -->
<div class="col-12" style="padding: 0;">

  <!-- Profile Cover Image -->
  <div class="row" id="profileCoverImage" style="background-image: url(<?php echo DIR.'assets/user_images/'.$row->background_picture?>);"></div>

  <!-- Profile Display Picture -->
  <img src="<?php echo DIR?>assets/user_images/<?php echo "$row->display_picture"?>" id="profileDisplayImage" width="100px" height="100px"/>

  <!-- Profile Content -->
  <div class="row" id="profileContent">
    <!-- User Info Taken from Database -->
    <div class="col-6 offset-3">
      <!-- Username -->
      <h4>@<?php echo "$row->username" ?></h4>
      <!-- Full Name -->
      <p><?php echo "$row->firstname"." "."$row->surname" ?></p>
      <!-- Gender | City/Town,Country -->
      <p><?php echo "$row->gender" ?> | <?php echo "$row->location" ?></p>
      <!-- Username -->
      <p><?php echo "$row->job_title" ?></p>
      <!-- Post edit -->
      <a href="<?php echo DIR ?>view/edit_profile.php" class="medium material-icons" style="text-decoration:none;color:#639EFB">edit</a>
    </div>
  </div>

  <!-- Profile User Groups & Competition -->
  <!-- Profile tabs -->
  <div class="card-header border-bottom-0 bg-transparent">
    <ul class="nav nav-tabs justify-content-center pt-4" id="" role="tablist">
      <!-- Login Tab -->
      <li class="nav-item">
        <a class="nav-link active text-primary" data-toggle="pill" href="#profileGroups" role="tab">Followed Groups</a>
      </li>
      <!-- Register Tab -->
      <li class="nav-item">
        <a class="nav-link text-primary" data-toggle="pill" href="#profileChallenges" role="tab">Followed Challenges</a>
      </li>
    </ul>
  </div>

  <!-- Tab content -->
  <div class="tab-content" id="nav-tabContent" style="text-aline:center">

    <!-- TAB 1 Content, Followed Groups -->
    <div class="tab-pane fade show active" id="profileGroups" role="tabpanel">

      <!-- Card -->
      <div class="card" id="groupsGroupCard">
        <img class="card-img-top" src="<?php echo DIR ?>assets/img/runner_woman.jpeg" alt="Card image cap" width="100%" height="auto">
        <div class="col-8 offset-2">
          <h4>Running</h4>
          <p>24K Members</p>
          <button type="button" class="btn btn-secondary">Visit</button>
        </div>
      </div>

      <!-- Card -->
      <div class="card" id="groupsGroupCard">
        <img class="card-img-top" src="<?php echo DIR ?>assets/img/yoga_woman.jpeg" alt="Card image cap" width="100%" height="auto">
        <div class="col-8 offset-2">
          <h4>Yoga</h4>
          <p>50K Members</p>
          <button type="button" class="btn btn-secondary">Visit</button>
        </div>
      </div>

      <!-- Card -->
      <div class="card" id="groupsGroupCard">
        <img class="card-img-top" src="<?php echo DIR ?>assets/img/bodybuilding_man.jpeg" alt="Card image cap" width="100%" height="auto">
        <div class="col-8 offset-2">
          <h4>Bodybuilding</h4>
          <p>167K Members</p>
          <button type="button" class="btn btn-secondary">Visit</button>
        </div>
      </div>

      <!-- Card -->
      <div class="card" id="groupsGroupCard">
        <img class="card-img-top" src="<?php echo DIR ?>assets/img/weightloss_woman.jpeg" alt="Card image cap" width="100%" height="auto">
        <div class="col-8 offset-2">
          <h4>Weight Loss</h4>
          <p>205K Members</p>
          <button type="button" class="btn btn-secondary">Visit</button>
        </div>
      </div>

    </div>
    <!-- End of tab 1 content -->

    <!-- TAB 2 Content, Followed Competitions -->
    <div class="tab-pane fade" id="profileChallenges" role="tabpanel">

      <!-- Card -->
      <div class="card" id="groupsGroupCard">
        <img class="card-img-top" src="<?php echo DIR ?>assets/img/bodybuilding_man.jpeg" alt="Card image cap" width="100%" height="auto">
        <div class="col-8 offset-2">
          <h4>Bodybuilding</h4>
          <p>167K Members</p>
          <button type="button" class="btn btn-secondary">Visit</button>
        </div>
      </div>

      <!-- Card -->
      <div class="card" id="groupsGroupCard">
        <img class="card-img-top" src="<?php echo DIR ?>assets/img/weightloss_woman.jpeg" alt="Card image cap" width="100%" height="auto">
        <div class="col-8 offset-2">
          <h4>Weight Loss</h4>
          <p>205K Members</p>
          <button type="button" class="btn btn-secondary">Visit</button>
        </div>
      </div>

      <!-- Card -->
      <div class="card" id="groupsGroupCard">
        <img class="card-img-top" src="<?php echo DIR ?>assets/img/runner_woman.jpeg" alt="Card image cap" width="100%" height="auto">
        <div class="col-8 offset-2">
          <h4>Running</h4>
          <p>24K Members</p>
          <button type="button" class="btn btn-secondary">Visit</button>
        </div>
      </div>

      <!-- Card -->
      <div class="card" id="groupsGroupCard">
        <img class="card-img-top" src="<?php echo DIR ?>assets/img/yoga_woman.jpeg" alt="Card image cap" width="100%" height="auto">
        <div class="col-8 offset-2">
          <h4>Yoga</h4>
          <p>50K Members</p>
          <button type="button" class="btn btn-secondary">Visit</button>
        </div>
      </div>

    </div>
    <!-- End of tab 2 content -->

  </div>
  <!-- End of tab content -->

</div>

<?php

  }//end of while($row = $result->fetch_object())

} //end of if(logged_in())

else /* if not logged in, display default profile attributes */ { ?>

  <!-- Profile Page Container -->
  <div class="col-12" style="padding: 0;">

    <!-- Profile Cover Image -->
    <div class="row" id="profileCoverImage" style="background-image: url('<?php echo DIR?>assets/user_images/defaultbgp.jpeg');"></div>

    <!-- Profile Display Picture -->
    <img src="<?php echo DIR?>assets/user_images/defaultdp.jpg" id="profileDisplayImage" width="100px" height="100px"/>

    <!-- Profile Content -->
    <div class="row" id="profileContent">
      <!-- User Info -->
      <div class="col-6 offset-3">
        <!-- Indicate login to user -->
        <p style="color:red;">Please login to see profile.</p>
        <!-- Username -->
        <h4>@Username</h4>
        <!-- Full Name -->
        <p>Full Name</p>
        <!-- Gender | City/Town,Country -->
        <p>Gender | Location</p>
        <!-- Username -->
        <p>Job Title</p>
        <!-- Post divider -->
        <div style="height: 30px;">
          <div id="postDivider"></div>
        </div>
      </div>
    </div>

    <!-- Profile User Groups & Competition -->
    <!-- Profile tabs -->
    <div class="card-header border-bottom-0 bg-transparent">
      <ul class="nav nav-tabs justify-content-center pt-4" id="" role="tablist">
        <!-- Login Tab -->
        <li class="nav-item">
          <a class="nav-link active text-primary" data-toggle="pill" href="#profileGroups" role="tab">Followed Groups</a>
        </li>
        <!-- Register Tab -->
        <li class="nav-item">
          <a class="nav-link text-primary" data-toggle="pill" href="#profileChallenges" role="tab">Followed Challenges</a>
        </li>
      </ul>
    </div>

    <!-- Tab content -->
    <div class="tab-content" id="nav-tabContent" style="text-aline:center">

      <!-- TAB 1 Content, Followed Groups -->
      <div class="tab-pane fade show active" id="profileGroups" role="tabpanel">

        <!-- Card -->
        <div class="card" id="groupsGroupCard">
          <img class="card-img-top" src="<?php echo DIR ?>assets/img/runner_woman.jpeg" alt="Card image cap" width="100%" height="auto">
          <div class="col-8 offset-2">
            <h4>Running</h4>
            <p>24K Members</p>
            <button type="button" class="btn btn-secondary">Visit</button>
          </div>
        </div>

        <!-- Card -->
        <div class="card" id="groupsGroupCard">
          <img class="card-img-top" src="<?php echo DIR ?>assets/img/yoga_woman.jpeg" alt="Card image cap" width="100%" height="auto">
          <div class="col-8 offset-2">
            <h4>Yoga</h4>
            <p>50K Members</p>
            <button type="button" class="btn btn-secondary">Visit</button>
          </div>
        </div>

        <!-- Card -->
        <div class="card" id="groupsGroupCard">
          <img class="card-img-top" src="<?php echo DIR ?>assets/img/bodybuilding_man.jpeg" alt="Card image cap" width="100%" height="auto">
          <div class="col-8 offset-2">
            <h4>Bodybuilding</h4>
            <p>167K Members</p>
            <button type="button" class="btn btn-secondary">Visit</button>
          </div>
        </div>

        <!-- Card -->
        <div class="card" id="groupsGroupCard">
          <img class="card-img-top" src="<?php echo DIR ?>assets/img/weightloss_woman.jpeg" alt="Card image cap" width="100%" height="auto">
          <div class="col-8 offset-2">
            <h4>Weight Loss</h4>
            <p>205K Members</p>
            <button type="button" class="btn btn-secondary">Visit</button>
          </div>
        </div>

      </div>
      <!-- End of tab 1 content -->

      <!-- TAB 2 Content, Followed Competitions -->
      <div class="tab-pane fade" id="profileChallenges" role="tabpanel">

        <!-- Card -->
        <div class="card" id="groupsGroupCard">
          <img class="card-img-top" src="<?php echo DIR ?>assets/img/bodybuilding_man.jpeg" alt="Card image cap" width="100%" height="auto">
          <div class="col-8 offset-2">
            <h4>Bodybuilding</h4>
            <p>167K Members</p>
            <button type="button" class="btn btn-secondary">Visit</button>
          </div>
        </div>

        <!-- Card -->
        <div class="card" id="groupsGroupCard">
          <img class="card-img-top" src="<?php echo DIR ?>assets/img/weightloss_woman.jpeg" alt="Card image cap" width="100%" height="auto">
          <div class="col-8 offset-2">
            <h4>Weight Loss</h4>
            <p>205K Members</p>
            <button type="button" class="btn btn-secondary">Visit</button>
          </div>
        </div>

        <!-- Card -->
        <div class="card" id="groupsGroupCard">
          <img class="card-img-top" src="<?php echo DIR ?>assets/img/runner_woman.jpeg" alt="Card image cap" width="100%" height="auto">
          <div class="col-8 offset-2">
            <h4>Running</h4>
            <p>24K Members</p>
            <button type="button" class="btn btn-secondary">Visit</button>
          </div>
        </div>

        <!-- Card -->
        <div class="card" id="groupsGroupCard">
          <img class="card-img-top" src="<?php echo DIR ?>assets/img/yoga_woman.jpeg" alt="Card image cap" width="100%" height="auto">
          <div class="col-8 offset-2">
            <h4>Yoga</h4>
            <p>50K Members</p>
            <button type="button" class="btn btn-secondary">Visit</button>
          </div>
        </div>

      </div>
      <!-- End of tab 2 content -->

    </div>
    <!-- End of tab content -->

  </div>

<?php }//end of else

include('../model/footer.php');//Call in footer.php
?>
