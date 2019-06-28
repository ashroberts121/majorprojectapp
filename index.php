<?php
  include('admin/admin.php');//Call in admin for db connection
  include('controller/head.php');//Call in head.php for head tags

?>

<style>
  /* Remove top bar from splashscreen */
  #headerLogoBar {
    display: none;
  }
</style>

<!--Set background color-->
<div id="splashscreenBackground">

  <!--App Logo-->
  <img id="splashscreenLogo" src="<?php echo DIR ?>assets/img/fitness_logo.png" height="80px;" width="auto;">

  <script>
    //Sets a timer for splashscreen to redirect to home.php after 6 secs
    var timer = setTimeout(
      function() {
        window.location= '<?php echo DIR; ?>view/home.php'
      }, 3000);
  </script>

</div>
