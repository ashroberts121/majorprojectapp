<?php
  include('../admin/config.php');//Call in config file
  include('functions.php');//Call in custom function file
	if(isset($_POST['submit'])){
		//Assign variables to login inputs
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$keep = isset($_POST['keep']);

		//Check if email is in database
		if(email_exists($email, $conn)){
			//$errorCheckResult = "Email exists";
			$sql = "SELECT * FROM users WHERE email='$email'";
			$result = $conn->query($sql);

			//Retrieve password column from database
			$getPassword = mysqli_fetch_assoc($result);

			//Check if password matches database for the user with the entered email
			if(!password_verify($password, $getPassword['password'])){
        ?>
          <script>
            alert("Incorrect password. Please try again or press 'Forgot Your Password'");
            window.location = "<?php echo DIR?>view/login.php";
          </script>
        <?php
			}else{
        //Re-select rows from user table for logged in user
        $sql = "SELECT * FROM users WHERE email='$email'";
  			$result = $conn->query($sql);
        //Set id variable for logged in user
        $id = $result->fetch_object()->id;

				//Set session for user email
				$_SESSION['email'] = $email;
        //Set session for user id
        $_SESSION['id'] = $id;

        // echo $_SESSION['id'];
        // echo '<br />';
        // echo $_SESSION['email'];

				//If user checks 'keep me logged in', set cookie to last 24h
				if($keep == "on"){
					setcookie('email', $email, time() + 86400, "/MajorProjectApp");
				}
				//Redirect to homepage
        ?>
    			<script>
    				alert('Logged in successfully.');
    				window.location = "<?php echo DIR?>view/home.php";
    			</script>
    		<?php
			}

		}else{

      ?>
  			<script>
  				alert('User does not exist. Please try again or register a new account.');
  				window.location = "<?php echo DIR?>view/profile.php";
  			</script>
  		<?php
		}
	}
?>
