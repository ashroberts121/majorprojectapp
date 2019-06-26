<div class="col-12" id="navbarBottomContainer"><!-- Navbar container -->
  <div id="navbarBottom" class="row">

    <div class="col-1"></div><!-- Navbar side -->

    <a href="<?php echo DIR ?>view/home.php"><div class="col-2 medium material-icons" <?php if($activePage == 'home'){ ?> style="background-color: #639EFB;" <?php } ?> >
      home<br/><p>HOME</p></a><!-- Navbar 'home' button with active page checker -->
    </div>
    <a href="<?php echo DIR ?>view/social.php"><div class="col-2 medium material-icons" <?php if($activePage == 'social'){ ?> style="background-color: #639EFB;" <?php } ?> >
      group<br/><p>SOCIAL</p></a><!-- Navbar 'social' button with active page checker -->
    </div>
    <a href="<?php echo DIR ?>view/explore.php"><div class="col-2 medium material-icons" <?php if($activePage == 'explore'){ ?> style="background-color: #639EFB;" <?php } ?> >
      explore<br/><p>EXPLORE</p></a><!-- Navbar 'explore' button with active page checker -->
    </div>
    <a href="<?php echo DIR ?>view/stats.php"><div class="col-2 medium material-icons" <?php if($activePage == 'stats'){ ?> style="background-color: #639EFB;" <?php } ?> >
      poll<br/><p>STATS</p></a><!-- Navbar 'stats' button with active page checker -->
    </div>
    <a href="<?php echo DIR ?>view/profile.php"><div class="col-2 medium material-icons" <?php if($activePage == 'profile'){ ?> style="background-color: #639EFB;" <?php } ?> >
      account_circle<br/><p>PROFILE</p></a><!-- Navbar 'profile' button with active page checker -->
    </div>

    <div class="col-1"></div><!-- Navbar side -->

  </div>
</div>
