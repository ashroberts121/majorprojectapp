<?php

  $activePage = 'groups'; //Sets active page variable for navbar

  include('../admin/admin.php');//Call in admin for db connection
  include('../model/head.php');//Call in head.php for head tags
  include('../view/nav.php');//Call in bottom navbar

?>

<!-- Groups page tabs -->
<div class="card-header border-bottom-0 bg-transparent">
  <ul class="nav nav-tabs justify-content-center pt-1" role="tablist">
    <!-- Login Tab -->
    <li class="nav-item">
      <a class="nav-link active text-primary" data-toggle="pill" href="#allGroupsTab" role="tab">All Groups</a>
    </li>
    <!-- Register Tab -->
    <li class="nav-item">
      <a class="nav-link text-primary" data-toggle="pill" href="#myGroupsTab" role="tab">My Groups</a>
    </li>
  </ul>
</div>

<!-- Tab content -->
<div class="tab-content" id="nav-tabContent" style="text-aline:center">

  <!-- TAB 1 (All Groups), Content -->
  <div class="tab-pane fade show active" id="allGroupsTab" role="tabpanel">

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

  <!-- TAB 2 (My Groups), Content -->
  <div class="tab-pane fade" id="myGroupsTab" role="tabpanel">

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

<?php
  include('../model/footer.php');//Call in footer.php
?>
