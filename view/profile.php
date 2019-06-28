<?php

  $activePage = 'profile'; //Sets active page variable for navbar

  include('../admin/admin.php');//Call in admin for db connection
  include('../model/head.php');//Call in head.php for head tags
  include('../view/nav.php');//Call in bottom navbar

?>

<!-- Profile Page Container -->
<div class="col-12" style="padding: 0;">

  <!-- Profile Cover Image -->
  <div class="row" id="profileCoverImage"></div>

  <!-- Profile Display Picture -->
  <img src="../assets/img/bodybuilding_man.jpeg" id="profileDisplayImage" width="100px" height="100px"/>

  <!-- Profile Content -->
  <div class="row" id="profileContent">
    <!-- User Info -->
    <div class="col-6 offset-3">
      <!-- Username -->
      <h4>@Username123</h4>
      <!-- Full Name -->
      <p>Ash Roberts</p>
      <!-- Gender | City/Town,Country -->
      <p>Male | Liverpool,UK</p>
      <!-- Username -->
      <p>Web Developer</p>
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

<?php
  include('../model/footer.php');//Call in footer.php
?>
