<?php

  $activePage = 'challenges'; //Sets active page variable for navbar

  include('../admin/config.php');//Call in config for db connection
  include('../controller/functions.php');//Call in custom function file
  include('../model/head.php');//Call in head.php for head tags
  include('../view/nav.php');//Call in bottom navbar

?>

<!-- Challenges page tabs -->
<div class="card-header border-bottom-0 bg-transparent">
  <ul class="nav nav-tabs justify-content-center pt-1" role="tablist">
    <!-- Login Tab -->
    <li class="nav-item">
      <a class="nav-link active text-primary" data-toggle="pill" href="#allChallengesTab" role="tab">All Challenges</a>
    </li>
    <!-- Register Tab -->
    <li class="nav-item">
      <a class="nav-link text-primary" data-toggle="pill" href="#myChallengesTab" role="tab">My Challenges</a>
    </li>
  </ul>
</div>

<!-- Page Container -->
<div class="col-12" style="padding: 0;" id="pageContainer">

  <!-- Tab content -->
  <div class="col-12 p-0 tab-content" id="nav-tabContent">

    <!------------------ TAB 1 (All Challenges), Content ----------------->
    <div class="tab-pane fade show active" id="allChallengesTab" role="tabpanel">
      <?php
      if(logged_in()){
        ?><a href="<?php echo DIR;?>view/create_challenge.php"><button type="button" class="btn btn-secondary">Create challenge +</button></a><?php
      }
      ?>

      <?php
        $email = $_SESSION['email'];

        $sql = $conn->query("SELECT * FROM challenges ORDER BY id DESC");
        while($row = $sql->fetch_object()){
          $challenges[] = $row;
        } ?>

        <?php
         foreach($challenges as $challenge){ ?>
          <!-- Card -->
          <div class="card" id="challengesChallengeCard">
            <img class="card-img-top" src="<?php echo DIR ?>assets/challenge_bg_images/<?php echo $challenge->cover_image;?>" alt="Card image cap" width="100%" height="auto">
            <div class="col-8 offset-2">
              <h4><?php echo $challenge->name;?></h4>
              <p class="mb-1"><?php echo $challenge->members;?> Challenger(s)</p>
              <p class="mb-1">~<?php echo $challenge->distance;?> Kilometers</p>
              <a href="<?php echo DIR;?>view/challenge_page.php?id=<?php echo $challenge->id;?>&name=<?php echo $challenge->name;?>"><button type="button" class="btn btn-secondary">Visit</button></a>
              <?php
              if(logged_in()){
                $sql2 = $conn->query("SELECT * FROM challenge_members WHERE challenge_id = '$challenge->id' AND user_email='$email'");
                if(($row2 = $sql2->fetch_object()) >= 0){
                  if($row2 == 0){
                    //echo '<p style="color:white">not joined</p>';
                    ?><a href="<?php echo DIR;?>controller/process_join_challenge.php?id=<?php echo $challenge->id;?>&name=<?php echo $challenge->name;?>"><button type="button" class="btn btn-secondary">Join</button></a><?php
                  }else{
                    //echo '<p style="color:white">joined</p>';
                    ?><a href="<?php echo DIR;?>controller/process_leave_challenge.php?id=<?php echo $challenge->id;?>&name=<?php echo $challenge->name;?>"><button type="button" class="btn btn-secondary" style="background-color:white;color:#639EFB">Joined ✓</button></a><?php
                  }//end if else
                }//end if
              }//End if(logged in)
              ?>
            </div>
          </div>
        <?php
        }//end foreach
        ?>
    </div>
    <!------------------------------- End of tab 1 content ------------------------------>

    <!------------------------------- TAB 2 (My Challenges), Content ------------------------->
    <div class="tab-pane fade" id="myChallengesTab" role="tabpanel">
      <?php
      $user_id = $_SESSION['id'];
      $sql = $conn->query("SELECT challenge_id FROM challenge_members WHERE user_id='$user_id'");
      while($row = $sql->fetch_object()){
        $challenge_members[] = $row;
      }//end while
      if(empty($challenge_members)){
        echo '<p style="color:red">Your joined challenges will appear here.</p>';
      }else{
        foreach($challenge_members as $challenge_member){
          $joined_challenges = $challenge_member->challenge_id;
          $sql = $conn->query("SELECT * FROM challenges WHERE id='$joined_challenges' ORDER BY id DESC");

          while($row = $sql->fetch_object()){
            ?>
            <!-- Card -->
            <div class="card" id="challengesChallengeCard">
              <img class="card-img-top" src="<?php echo DIR ?>assets/challenge_bg_images/<?php echo $row->cover_image;?>" alt="Card image cap" width="100%" height="auto">
              <div class="col-8 offset-2">
                <h4><?php echo $row->name;?></h4>
                <p class="mb-1"><?php echo $row->members;?> Challenger(s)</p>
                <p class="mb-1">~<?php echo $challenge->distance;?> Kilometers</p>
                <a href="<?php echo DIR;?>view/challenge_page.php?id=<?php echo $row->id;?>&name=<?php echo $row->name;?>"><button type="button" class="btn btn-secondary">Visit</button></a>
                <a href="<?php echo DIR;?>controller/process_leave_challenge.php?id=<?php echo $row->id;?>&name=<?php echo $row->name;?>"><button type="button" class="btn btn-secondary" style="background-color:white;color:#639EFB">Joined ✓</button></a>
              </div>
            </div>
            <?php
          }//end while
        }//end foreach
      }//end if else(empty(challenge_members))
      ?>

    </div>
    <!-- End of tab 2 content -->

  </div>
  <!-- End of tab content -->

</div><!-- div.col-12 -->

<?php
  include('../model/footer.php');//Call in footer.php
?>
