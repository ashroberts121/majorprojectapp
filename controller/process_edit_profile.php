<?php

  include('../admin/config.php');//Call in config for db connection
  include('../controller/functions.php');//Call in custom function file
  include('../model/head.php');//Call in head.php for head tags

?>

<?php

//Check if submit button is pressed
if(isset($_POST['submit'])){

  //Declare variables for inputs
  $email = $_SESSION['email'];
  $username = $_POST['username'];
  $firstname = $_POST['firstname'];
  $surname = $_POST['surname'];
  $gender = $_POST['gender'];
  $job_title = $_POST['job_title'];
  $location = $_POST['location'];

  //display picture file properties
  $fileName = $_FILES['display_picture']['name'];
  $fileTmpName = $_FILES['display_picture']['tmp_name'];
  $fileSize = $_FILES['display_picture']['size'];
  $fileError = $_FILES['display_picture']['error'];
  $fileType = $_FILES['display_picture']['type'];

  //background picture file properties
  $fileName2 = $_FILES['background_picture']['name'];
  $fileTmpName2 = $_FILES['background_picture']['tmp_name'];
  $fileSize2 = $_FILES['background_picture']['size'];
  $fileError2 = $_FILES['background_picture']['error'];
  $fileType2 = $_FILES['background_picture']['type'];

  //Seperate file name into an array
  $fileExt = explode('.', $fileName);
  $fileExt2 = explode('.', $fileName2);

  //Make file extensions lower case
  $fileActualExt = strtolower(end($fileExt));
  $fileActualExt2 = strtolower(end($fileExt2));

  //Declare array of accepted file extensions
  $allowed = array('jpg', 'jpeg', 'png', 'gif');

  //Check if extension is accepted
  if ((in_array($fileActualExt, $allowed)) && (in_array($fileActualExt2, $allowed))) {
    //Check for any file errors
    if (($fileError === 0) || ($fileError2 === 0)) {
      //Check if file meets size requirements
      if (($fileSize < 1000000) || ($fileSize2 < 1000000)) {

        //Declare uploaded file destination
        $fileDestination = '../assets/user_images/'.$fileName;
        $fileDestination2 = '../assets/user_images/'.$fileName2;

        //Move files to destination folder
        move_uploaded_file($fileTmpName, $fileDestination);
        move_uploaded_file($fileTmpName2, $fileDestination2);
      }else {
        //Redirect to profile
        ?>
          <script>
            alert('Your file was too big.');
            window.location = "<?php echo DIR?>view/profile.php";
          </script>
        <?php
      }
    }else {
      //Redirect to profile
      ?>
        <script>
          alert('There was an error uploading the file.');
          window.location = "<?php echo DIR?>view/profile.php";
        </script>
      <?php
    }
  }else {
    //Redirect to profile
    ?>
      <script>
        alert('Your file must be a jpg, jpeg, png or gif.');
        window.location = "<?php echo DIR?>view/profile.php";
      </script>
    <?php
  }

  //////////////////////////////////////////////////////////////////////////////////////////////////////////
  //Update 'profile' table values based on the logged in user email
  $sql_profile = "UPDATE profile SET username='$username', firstname='$firstname', surname='$surname', gender='$gender', job_title='$job_title', location='$location', display_picture='$fileName', background_picture='$fileName2' WHERE email='$email'";
  $result = $conn->query($sql_profile);

  //Update 'users' table values based on the logged in user email
  $sql_users = "UPDATE users SET username='$username', firstname='$firstname', surname='$surname' WHERE email='$email'";
  $result = $conn->query($sql_users);

  //Redirect to profile
  ?>
    <script>
      alert('Successfully updated profile.');
      window.location = "<?php echo DIR?>view/profile.php";
    </script>
  <?php

}

?>
