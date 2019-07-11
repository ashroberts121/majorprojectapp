<?php

  include('../admin/config.php');//Call in config for db connection
  include('../controller/functions.php');//Call in custom function file
  include('../model/head.php');//Call in head.php for head tags

	//Unset cookie
	setcookie('email', $_SESSION['email'], time() - 86400, "/MajorProjectApp");

	//end session - logout
	session_destroy();

	//redirect to login page
  ?>
    <script>
      alert("Logged out.");
      window.location = "<?php echo DIR?>view/login.php";
    </script>
  <?php

?>
