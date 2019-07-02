<?php
    include('../admin/config.php');//Call in config for db connection
    include('functions.php');//Call in custom function file
    include('../model/head.php');//Call in head.php for head tags

    //Check if there is a value for email and token in url
    if(isset($_GET['email']) && isset($_GET['token'])){
        //Declare variables for values taken from url
        $email = mysqli_real_escape_string($conn, $_GET['email']);
        $token = mysqli_real_escape_string($conn, $_GET['token']);

        //Select row based on token and email value
        $sql = "SELECT id FROM users WHERE token='$token' AND email='$email'";
        $result = $conn->query($sql);

        //Run if change password button is pressed
        if(isset($_POST['passwordNew'])){
            //Declare variable
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $passwordConfirm = $_POST['passwordConfirm'];
            //Check password is at least 8 chars.
            if(strlen($password) < 8){
              ?>
                <script>
                  alert('Password must be at least 8 characters.');
                  window.location = "<?php echo DIR?>view/changepwd.php";
                </script>
              <?php
            }//Check if password matches confirm password
            else if($password !== $passwordConfirm){
              ?>
                <script>
                  alert('Passwords must match.');
                  window.location = "<?php echo DIR?>view/changepwd.php";
                </script>
              <?php
            }else{
                //encrypt password
                $password = password_hash($password, PASSWORD_DEFAULT);

                //Write update statement for password of logged in user
                $sql = "UPDATE users SET password='$password' WHERE email='$email'";
                $result = $conn->query($sql);
                //If error checking is successful
                if($result){
                  ?>
                    <script>
                      alert('Password changed successfully!');
                      window.location = "<?php echo DIR?>view/login.php";
                    </script>
                  <?php
                }
            }
        }

    }else{
        //Redirect to login.php if no token and/or email is available for $_GET[]
        ?>
          <script>
            alert('An error occurred.');
            window.location = "<?php echo DIR?>view/login.php";
          </script>
        <?php
    }
?>

<!-- Reset Password Content -->
<div class="col-8 offset-2 pt-4" id="loginLogin" role="tabpanel">

  <form action="" method="post">
    <!-- Password Input Field -->
    <div class="form-group">
      <input type="password" name="password" class="form-control" id="password" id="password" placeholder="Password" required>
    </div>
    <!-- Confirm Password Input Field -->
    <div class="form-group">
      <input type="password" name="passwordConfirm" class="form-control" id="password" id="password" placeholder="Confirm Password" required>
    </div>
    <!-- Password Reset Confirmation Button -->
    <div class="text-center pt-4">
      <button type="submit" name="passwordNew" id="customButton" class="btn btn-primary">Reset Password</button>
    </div>
  </form>

</div>
<!-- End of Reset Password Content -->
