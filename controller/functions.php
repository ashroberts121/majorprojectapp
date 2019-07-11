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
    //Check if email already exists in database
	function user_exists($username, $conn){

		$sql = "SELECT id FROM users WHERE username='$username'";
		$result = $conn->query($sql);

		if(mysqli_num_rows($result) == 1){
			return true;
		}else{
			return false;
		}
	}

	/*********************************************/
  //Check if user has joined group
	function group_member_exists($email, $id, $conn){

		$sql = "SELECT * FROM group_members WHERE user_email='$email' AND group_id='$id'";
		$result = $conn->query($sql);

		if(mysqli_num_rows($result) == 1){
			return true;
		}else{
			return false;
		}
	}

	/*********************************************/
  //Check if there are comments related to post via post id
	function comment_exists($post_id, $conn){

		$sql = "SELECT * FROM post_comments WHERE post_id='$post_id'";
		$result = $conn->query($sql);

		if(mysqli_num_rows($result) > 0){
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
