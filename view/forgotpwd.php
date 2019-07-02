<?php

  include('../admin/config.php');//Call in config for db connection
  include('../controller/functions.php');//Call in custom function file
  include('../model/head.php');//Call in head.php for head tags

?>

<!--//////////////// IMPORTANT N0TE // EMAIL RESET LINKS DO NOT WORK FOR LOCALHOST //////////////////////--->
<!-- This code has been setup to work temporarily without the need for email until no longer on localhost -->

<!-- Forgot Password Content -->
<div class="col-8 offset-2 pt-4" id="loginLogin" role="tabpanel">

  <form action="<?php echo DIR ?>controller/process_forgotpwd.php" method="post">
    <!-- Email Input Field -->
    <div class="form-group">
      <input type="email" name="email" class="form-control" id="email" placeholder="Email" required autofocus>
    </div>
    <!-- Email Password Reset Link Button -->
    <div class="text-center pt-4">
      <button type="submit" name="forgotPass" id="customButton" class="btn btn-primary">Email Link</button>
    </div>
  </form>

</div>
<!-- End of Forgot Password Content -->
