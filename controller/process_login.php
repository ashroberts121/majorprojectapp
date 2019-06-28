<?php
	include('../admin/config.php');
	include('../controller/functions.php');//Call in custom function file

	if(logged_in()){
		header("Location: home.php");
		exit();
	}

    //Set variable for error display message
	$errorCheckResult = "";

    //check if submit button was pressed
	if(isset($_POST['login'])){

    //set form input values to variables and make sure it is a string
		$firstName = mysqli_real_escape_string($conn, $_POST['firstname']);
		$lastName = mysqli_real_escape_string($conn, $_POST['surname']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$passwordConfirm = $_POST['passwordConfirm'];

        //Check first name is at least 3 letters
		if(strlen($firstName) < 3){
			$errorCheckResult = "First name must be at least 3 characters long.";
		}
        //Check last name is at least 3 letters
		else if(strlen($lastName) < 3){
			$errorCheckResult = "Last name must be at least 3 characters long.";
		}
        //Check that email is a valid email format
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$errorCheckResult = "Please use a valid email.";
		}
        //Check if email is already in database using function from functions.php
		else if(email_exists($email, $conn)){
			$errorCheckResult = "This email is taken.";
		}
        //Make sure password is at least 8 letters
		else if(strlen($password) < 8){
			$errorCheckResult = "Password must be at least 8 characters long.";
		}
        //Check confirm matches password
		else if($password !== $passwordConfirm){
			$errorCheckResult = "Passwords do not match.";
		}
		else{

            //encrypt password
			$password = password_hash($password, PASSWORD_DEFAULT);

            //Create query - insert values from inputs into a new row in users table
			$sql = "INSERT INTO users(id, firstName, lastName, email, password, token) VALUES (NULL, '$firstName', '$lastName', '$email', '$password', '')";
			if(mysqli_query($conn, $sql)){
				$errorCheckResult = "Successfully registered!";
			}
		}
	}

?>
