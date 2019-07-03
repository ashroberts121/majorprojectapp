<?php
	include('../admin/config.php');//Call in config file
	include('functions.php');//Call in custom function file


    //check if submit button was pressed
	if(isset($_POST['submit'])){

    //set form input values to variables and make sure it is a string
		$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
		$surname = mysqli_real_escape_string($conn, $_POST['surname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$passwordConfirm = $_POST['passwordConfirm'];

        //Check first name is at least 3 letters
        //Javascript alert with login.php redirect
		if(strlen($firstname) < 2){
      ?>
  			<script>
  				alert('First name must be at least 2 characters.');
  				window.location = "<?php echo DIR?>view/login.php";
  			</script>
  		<?php
		}
        //Check surname is at least 3 letters
        //Javascript alert with login.php redirect
		else if(strlen($surname) < 2){
      ?>
  			<script>
  				alert('Surname must be at least 2 characters.');
  				window.location = "<?php echo DIR?>view/login.php";
  			</script>
  		<?php
		}
        //Check username is between 3 and 14 letters
        //Javascript alert with login.php redirect
    else if((strlen($username) > 14) || (strlen($username) < 3)){
      ?>
        <script>
          alert('Username must be 3-14 characters long.');
          window.location = "<?php echo DIR?>view/login.php";
        </script>
      <?php
    }
        //Check if email is already in database using 'email_exists' function from functions.php
        //Javascript alert with login.php redirect
    else if(user_exists($username, $conn)){
      ?>
        <script>
          alert('Username taken, try another.');
          window.location = "<?php echo DIR?>view/login.php";
        </script>
      <?php
    }
        //Check that email is a valid email format
        //Javascript alert with login.php redirect
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      ?>
        <script>
          alert('Email format invalid.');
          window.location = "<?php echo DIR?>view/login.php";
        </script>
      <?php
		}
        //Check if email is already in database using 'email_exists' function from functions.php
        //Javascript alert with login.php redirect
		else if(email_exists($email, $conn)){
      ?>
  			<script>
  				alert('Email taken, try another.');
  				window.location = "<?php echo DIR?>view/login.php";
  			</script>
  		<?php
		}
        //Make sure password is at least 8 letters
        //Javascript alert with login.php redirect
		else if(strlen($password) < 8){
      ?>
  			<script>
  				alert('Password must be at least 8 characters.');
  				window.location = "<?php echo DIR?>view/login.php";
  			</script>
  		<?php
		}
        //Check confirm matches password
        //Javascript alert with login.php redirect
		else if($password !== $passwordConfirm){
      ?>
  			<script>
  				alert("Passwords didn't match.");
  				window.location = "<?php echo DIR?>view/login.php";
  			</script>
  		<?php
		}
        //End of form validation
		else{
        //encrypt password
			$password = password_hash($password, PASSWORD_DEFAULT);

        //Create query - insert values from inputs into a new row in users table
			$sql_users = "INSERT INTO users(id, firstname, surname, username, email, password, token) VALUES (NULL, '$firstname', '$surname', '$username', '$email', '$password', '')";
			$sql_profile = "INSERT INTO profile(id, email, firstname, surname, username, gender, location, job_title, display_picture, background_picture) VALUES (NULL, '$email', '$firstname', '$surname', '$username', '(Gender)', '(Location)', '(Job Title)', 'defaultdp.jpg', 'defaultbgp.jpeg')";
			if((mysqli_query($conn, $sql_users)) && (mysqli_query($conn, $sql_profile))){
        ?>
    			<script>
            //Alert to show successful user creation, redirects to login.php
    				alert('Successfully registered!');
    				window.location = "<?php echo DIR?>view/login.php";
    			</script>
    		<?php
			}
		}
	}

?>
