<?php

  $activePage = 'login'; //Sets active page variable for navbar

  include('../admin/config.php');//Call in config for db connection
  include('../controller/functions.php');//Call in custom function file
  include('../model/head.php');//Call in head.php for head tags
  include('../view/nav.php');//Call in bottom navbar

?>
<!--Login Page Container-->
<div class="container mt-2">
  <div class="card mx-auto border-0">

    <!-- Login Card Header -->
    <div class="card-header border-bottom-0 bg-transparent">
      <ul class="nav nav-tabs justify-content-center pt-4" id="" role="tablist">
        <!-- Login Tab -->
        <li class="nav-item">
          <a class="nav-link active text-primary" data-toggle="pill" href="#loginLogin" role="tab">Login</a>
        </li>
        <!-- Register Tab -->
        <li class="nav-item">
          <a class="nav-link text-primary" data-toggle="pill" href="#loginRegister" role="tab">Register</a>
        </li>
      </ul>
    </div>

    <!-- Login Card Body -->
    <div class="card-body pb-4">
      <div class="tab-content" id="">

        <!-- Login Tab Content -->
        <div class="tab-pane fade show active" id="loginLogin" role="tabpanel">
          <form action="<?php echo DIR ?>controller/process_login.php">
            <!-- Email Input Field -->
            <div class="form-group">
              <input type="email" name="email" class="form-control" id="email" placeholder="Email" required autofocus>
            </div>
            <!-- Password Input Field -->
            <div class="form-group">
              <input type="password" name="password" class="form-control" id="password" id="password" placeholder="Password" required>
            </div>
            <!-- Keep Logged in Checkbox Field -->
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" id="customColor_blue" checked="" type="checkbox">
              <label class="custom-control-label" for="customColor_blue">Keep me logged in</label>
            </div>
            <!-- Form Submission Error Message -->
            <p id="loginErrorCheck"><?php echo $errorCheckResult ?></p>
            <!-- Login Submit Form Button -->
            <div class="text-center pt-4">
              <button type="submit" id="customButton" class="btn btn-primary">Login</button>
            </div>
            <!-- Forgot Password Button (Links to forgotpwd.php) -->
            <div class="text-center pt-2">
              <a class="btn btn-link text-primary" href="<?php echo DIR ?>view/forgotpwd.php">Forgot Your Password?</a>
            </div>
          </form>
        </div>
        <!-- End of Login Tab Content -->

        <!-- Register Tab Content -->
        <div class="tab-pane fade" id="loginRegister" role="tabpanel">
          <form action="<?php echo DIR ?>controller/process_login.php" method="post">
            <!-- First Name Input Field -->
            <div class="form-group">
              <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name" required autofocus>
            </div>
            <!-- Surname Input Field -->
            <div class="form-group">
              <input type="text" name="surname" id="surname" class="form-control" placeholder="Surname" required autofocus>
            </div>
            <!-- Username Input Field -->
            <div class="form-group">
              <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus>
            </div>
            <!-- Email Input Field -->
            <div class="form-group">
              <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
            </div>
            <!-- Password Input Field -->
            <div class="form-group">
              <input type="password" name="password" id="password" class="form-control" placeholder="Set a password" required>
            </div>
            <!-- Confirm Password Input Field -->
            <div class="form-group">
              <input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control" placeholder="Confirm password" required>
            </div>
            <!-- Form Submission Error Message -->
            <p id="loginErrorCheck"><?php echo $errorCheckResult ?></p>
            <!-- Register Submit Form Button -->
            <div class="text-center pt-2 pb-1">
              <button type="submit" name="submit" id="customButton" class="btn btn-primary">Register</button>
            </div>
          </form>
        </div>
        <!-- End of Register Tab Content -->

      </div>
    </div>
    <!-- End of Login Card Body -->

  </div>
</div>
<!-- End of Login Page Container -->

<?php
  include('../model/footer.php');//Call in footer.php
?>
