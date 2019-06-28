<?php
	/*********************************************/
    //Check if email already exists in database
	function email_exists($email, $conn){

		$sql = "SELECT id FROM users WHERE email='$email'";
		$result = $conn->query($sql);

		if(mysqli_num_rows($result) == 1){
			return true;
		}else{
			return false;
		}
	}

	/*********************************************/
    //Check to see if user is logged in (active session or cookie)
	function logged_in(){
		//check if user is logged in - session or cookie is set
		if(isset($_SESSION['email']) || isset($_COOKIE['email'])){
			return true;
		}else{
			return false;
		}
	}


?>
