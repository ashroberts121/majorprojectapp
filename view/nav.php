<div class="container" id="navbarBottomContainer"><!-- Navbar container -->
  <div id="navbarBottom" class="row">

    <!-- <div class="col-1"></div><!-- Navbar side -->

    <a href="<?php echo DIR ?>view/home.php"><div class="col medium material-icons" <?php if($activePage == 'home'){ ?> style="background-color: #639EFB;" <?php } ?> >
      home<br/><p>HOME</p></a><!-- Navbar 'home' button with active page checker -->
    </div>
    <a href="#allGroupsTab"><a href="<?php echo DIR ?>view/groups.php"><div class="col medium material-icons" <?php if($activePage == 'groups'){ ?> style="background-color: #639EFB;" <?php } ?> >
      group<br/><p>GROUPS</p></a></a><!-- Navbar 'groups' button with active page checker -->
    </div>
    <a href="<?php echo DIR ?>view/challenges.php"><div class="col medium material-icons" style="letter-spacing: -0.3px;<?php if($activePage == 'challenges'){ ?> background-color: #639EFB; <?php } ?>" >
      stars<br/><p>CHALLENGES</p></a><!-- Navbar 'challenges' button with active page checker -->
    </div>
    <a href="<?php echo DIR ?>view/profile.php"><div class="col medium material-icons" <?php if($activePage == 'profile'){ ?> style="background-color: #639EFB;" <?php } ?> >
      account_circle<br/><p>PROFILE</p></a><!-- Navbar 'profile' button with active page checker -->
    </div>
    <a href="<?php echo DIR ?>view/login.php"><div class="col medium material-icons" <?php if($activePage == 'login'){ ?> style="background-color: #639EFB;" <?php } ?> >
      exit_to_app<br/><p>LOGIN</p></a><!-- Navbar 'login' button with active page checker -->
    </div>

    <!-- <div class="col-1"></div><!-- Navbar side -->

  </div>
</div>
