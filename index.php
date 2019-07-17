<?php

  include('admin/config.php');//Call in config for db connection
  include('controller/functions.php');//Call in custom function file
  include('model/head.php');//Call in head.php for head tags

?>

<style>
  /* Remove top bar from splashscreen */
  #headerLogoBar {
    display: none;
  }
</style>

<!--Set background color-->
<div id="splashscreenBackground" class="col-12 m-0">
  <div class="col-6 offset-3" style="height:100%;">
    <!--App Logo-->
    <img id="splashscreenLogo" src="<?php echo DIR ?>assets/img/fitness_logo_text.png" height="80px;" width="auto;">
  </div>
  <script>
    //alert for user to know to view on mobile
    alert("Please view on a mobile device for best experience! \n\nFor web browsers: \n'F12 / Right Click + Inspect Element,\nthen toggle device toolbar with CTRL+SHIFT+M (CMD+ALT+R for Safari)'");
    //Sets a timer for splashscreen to redirect to home.php after 6 secs
    var timer = setTimeout(
      function() {
        window.location= '<?php echo DIR; ?>view/home.php'
      }, 3000);
  </script>
</div>

<?php
  include('../model/footer.php');//Call in footer.php
?>
