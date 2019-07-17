<?php

  $activePage = 'groups'; //Sets active page variable for navbar

  include('../admin/config.php');//Call in config for db connection
  include('../controller/functions.php');//Call in custom function file
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

<div class="col-12" style="padding: 0;">
  <div class="row" id="pageContainer">

    <!-- Tab content -->
    <div class="col-12 p-0 tab-content" id="nav-tabContent">

      <!------------------ TAB 1 (All Groups), Content ----------------->
      <div class="tab-pane fade show active" id="allGroupsTab" role="tabpanel">
        <?php
        if(logged_in()){
          ?><a href="<?php echo DIR;?>view/create_group.php"><button type="button" class="btn btn-secondary">Create group +</button></a><?php
        }
        ?>

        <?php
          $email = $_SESSION['email'];

          $sql = $conn->query("SELECT * FROM groups ORDER BY id DESC");
          while($row = $sql->fetch_object()){
            $groups[] = $row;
          } ?>

          <?php
           foreach($groups as $group){ ?>
            <!-- Card -->
            <div class="card" id="groupsGroupCard">
              <img class="card-img-top" src="<?php echo DIR ?>assets/group_bg_images/<?php echo $group->cover_image;?>" alt="Card image cap" width="100%" height="auto">
              <div class="col-8 offset-2">
                <h4><?php echo $group->name;?></h4>
                <p><?php echo $group->members;?> Member(s)</p>
                <a href="<?php echo DIR;?>view/group_page.php?id=<?php echo $group->id;?>&name=<?php echo $group->name;?>"><button type="button" class="btn btn-secondary">Visit</button></a>
                <?php
                if(logged_in()){
                  $sql2 = $conn->query("SELECT * FROM group_members WHERE group_id = '$group->id' AND user_email='$email'");
                  if(($row2 = $sql2->fetch_object()) >= 0){
                    if($row2 == 0){
                      //echo '<p style="color:white">not joined</p>';
                      ?><a href="<?php echo DIR;?>controller/process_join_group.php?id=<?php echo $group->id;?>&name=<?php echo $group->name;?>"><button type="button" class="btn btn-secondary">Join</button></a><?php
                    }else{
                      //echo '<p style="color:white">joined</p>';
                      ?><a href="<?php echo DIR;?>controller/process_leave_group.php?id=<?php echo $group->id;?>&name=<?php echo $group->name;?>"><button type="button" class="btn btn-secondary" style="background-color:white;color:#639EFB">Joined ✓</button></a><?php
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

      <!------------------------------- TAB 2 (My Groups), Content ------------------------->
      <div class="tab-pane fade" id="myGroupsTab" role="tabpanel">
        <?php
        $user_id = $_SESSION['id'];
        $sql = $conn->query("SELECT group_id FROM group_members WHERE user_id='$user_id'");
        while($row = $sql->fetch_object()){
          $group_members[] = $row;
        }//end while
        if(empty($group_members)){
          echo '<p style="color:red">Your joined groups will appear here.</p>';
        }else{
          foreach($group_members as $group_member){
            $joined_groups = $group_member->group_id;
            $sql = $conn->query("SELECT * FROM groups WHERE id='$joined_groups' ORDER BY id DESC");

            while($row = $sql->fetch_object()){
              ?>
              <!-- Card -->
              <div class="card" id="groupsGroupCard">
                <img class="card-img-top" src="<?php echo DIR ?>assets/group_bg_images/<?php echo $row->cover_image;?>" alt="Card image cap" width="100%" height="auto">
                <div class="col-8 offset-2">
                  <h4><?php echo $row->name;?></h4>
                  <p><?php echo $row->members;?> Members</p>
                  <a href="<?php echo DIR;?>view/group_page.php?id=<?php echo $row->id;?>&name=<?php echo $row->name;?>"><button type="button" class="btn btn-secondary">Visit</button></a>
                  <a href="<?php echo DIR;?>controller/process_leave_group.php?id=<?php echo $row->id;?>&name=<?php echo $row->name;?>"><button type="button" class="btn btn-secondary" style="background-color:white;color:#639EFB">Joined ✓</button></a>
                </div>
              </div>
              <?php
            }//end while
          }//end foreach
        }//end if else(empty(group_members))
        ?>

      </div>
      <!-- End of tab 2 content -->

    </div>
    <!-- End of tab content -->

  </div><!-- row #pageContainer -->
</div><!-- div.col-12 -->

<?php
  include('../model/footer.php');//Call in footer.php
?>
