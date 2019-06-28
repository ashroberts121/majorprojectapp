<?php

  $activePage = 'challenges'; //Sets active page variable for navbar

  include('../admin/admin.php');//Call in admin for db connection
  include('../model/head.php');//Call in head.php for head tags
  include('../view/nav.php');//Call in bottom navbar

?>

<!-- Challenges page tabs -->
<div class="card-header border-bottom-0 bg-transparent">
  <ul class="nav nav-tabs justify-content-center pt-1" role="tablist">
    <!-- All Challenges Tab -->
    <li class="nav-item">
      <a class="nav-link active text-primary" data-toggle="pill" href="#challengesAllTab" role="tab">All Challenges</a>
    </li>
    <!-- Active Challenges Tab -->
    <li class="nav-item">
      <a class="nav-link text-primary" data-toggle="pill" href="#challengesActiveTab" role="tab">Active Challenges</a>
    </li>
  </ul>
</div>

<!-- Tab content -->
<div class="tab-content" id="nav-tabContent" style="text-aline:center">

  <!-- TAB 1 Content, All Challenges -->
  <div class="tab-pane fade show active" id="challengesAllTab" role="tabpanel">

    <!-- Card -->
    <div class="card" id="groupsGroupCard">
      <img class="card-img-top" src="<?php echo DIR ?>assets/img/mountain.jpeg" alt="Card image cap" width="100%" height="auto">
      <div class="col-8 offset-2">
        <h4>Three Peaks Challenge</h4>
        <p>285 Active Challengers</p>
        <button type="button" class="btn btn-secondary">Visit</button>
      </div>
    </div>

    <!-- Card -->
    <div class="card" id="groupsGroupCard">
      <img class="card-img-top" src="<?php echo DIR ?>assets/img/weightloss_man.jpeg" alt="Card image cap" width="100%" height="auto">
      <div class="col-8 offset-2">
        <h4>Weight Loss Challenge</h4>
        <p>2,825 Active Challengers</p>
        <button type="button" class="btn btn-secondary">Visit</button>
      </div>
    </div>

    <!-- Card -->
    <div class="card" id="groupsGroupCard">
      <img class="card-img-top" src="<?php echo DIR ?>assets/img/cycling.jpeg" alt="Card image cap" width="100%" height="auto">
      <div class="col-8 offset-2">
        <h4>Tour de France Challenge</h4>
        <p>670 Active Challengers</p>
        <button type="button" class="btn btn-secondary">Visit</button>
      </div>
    </div>

    <!-- Card -->
    <div class="card" id="groupsGroupCard">
      <img class="card-img-top" src="<?php echo DIR ?>assets/img/weightlifter.jpg" alt="Card image cap" width="100%" height="auto">
      <div class="col-8 offset-2">
        <h4>Strong Man Challenge</h4>
        <p>1,340 Active Challengers</p>
        <button type="button" class="btn btn-secondary">Visit</button>
      </div>
    </div>

  </div>
  <!-- End of tab 1 content -->

  <!-- TAB 2 Content, Active Challenges -->
  <div class="tab-pane fade" id="challengesActiveTab" role="tabpanel">

    <!-- Card -->
    <div class="card" id="groupsGroupCard">
      <img class="card-img-top" src="<?php echo DIR ?>assets/img/cycling.jpeg" alt="Card image cap" width="100%" height="auto">
      <div class="col-8 offset-2">
        <h4>Tour de France Challenge</h4>
        <p>670 Active Challengers</p>
        <button type="button" class="btn btn-secondary">Visit</button>
      </div>
    </div>

    <!-- Card -->
    <div class="card" id="groupsGroupCard">
      <img class="card-img-top" src="<?php echo DIR ?>assets/img/mountain.jpeg" alt="Card image cap" width="100%" height="auto">
      <div class="col-8 offset-2">
        <h4>Three Peaks Challenge</h4>
        <p>285 Active Challengers</p>
        <button type="button" class="btn btn-secondary">Visit</button>
      </div>
    </div>

    <!-- Card -->
    <div class="card" id="groupsGroupCard">
      <img class="card-img-top" src="<?php echo DIR ?>assets/img/weightloss_man.jpeg" alt="Card image cap" width="100%" height="auto">
      <div class="col-8 offset-2">
        <h4>Weight Loss Challenge</h4>
        <p>2,825 Active Challengers</p>
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
