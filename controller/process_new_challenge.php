<?php

  include('../admin/config.php');//Call in config for db connection
  include('../controller/functions.php');//Call in custom function file
  include('../model/head.php');//Call in head.php for head tags

?>

<?php

//Check if submit button is pressed
if(isset($_POST['submit'])){

  //Declare variables for inputs
  $author_id = $_SESSION['id'];
  $name = $_POST['name'];
  $desc = $_POST['desc'];
  $distance = $_POST['distance'];

  //Variable for logged in user via session email
  $email = mysqli_real_escape_string($conn, $_SESSION['email']);

  //Find username for logged in user
  $sql = "SELECT * FROM profile WHERE email='$email'";
  $result = $conn->query($sql);
  //Fetch object of username row
  while($row = $result->fetch_object()){
    //Attach logged in users username to $username
    $username = $row->username;
    $display_picture = $row->display_picture;

    //Set variable for format of post time
    $post_time = date('d' . '/' . 'm' . '/' . 'y' . ' @ ' . 'H' . ':' . 'i');

    //display picture file properties
    $fileName = $_FILES['cover_image']['name'];
    $fileTmpName = $_FILES['cover_image']['tmp_name'];
    $fileSize = $_FILES['cover_image']['size'];
    $fileError = $_FILES['cover_image']['error'];
    $fileType = $_FILES['cover_image']['type'];

    //Seperate file name into an array
    $fileExt = explode('.', $fileName);

    //Make file extensions lower case
    $fileActualExt = strtolower(end($fileExt));

    //Declare array of accepted file extensions
    $allowed = array('jpg', 'jpeg', 'png', 'gif',);
    //Check if image has been uploaded
    if (!($fileName == '')) {
      //Check if extension is accepted
      if (in_array($fileActualExt, $allowed)) {
        //Check for any file errors
        if ($fileError === 0) {
          //Check if file meets size requirements (10mb)
          if ($fileSize < 10000000) {

            //Declare uploaded file destination
            $fileDestination = '../assets/challenge_bg_images/'.$fileName;

            //Move files to destination folder
            move_uploaded_file($fileTmpName, $fileDestination);
          }else {
            //Redirect to home
            ?>
              <script>
                alert('Your image was too big (MAX 10MB).');
                window.location = "<?php echo DIR?>view/home.php";
              </script>
            <?php
          }
        }else {
          //Redirect to home

          ?>
            <script>
              alert('There was an error uploading the image.');
              window.location = "<?php echo DIR?>view/home.php";
            </script>
          <?php
        }
      }else {
        //Redirect to home
        ?>
          <script>
            alert('Your image must be a jpg, jpeg, png or gif.');
            window.location = "<?php echo DIR?>view/home.php";
          </script>
        <?php
      }
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Update 'posts' table values based on the logged in user email

    $sql2 = "INSERT INTO challenges(author_id, name, cover_image, description, members, distance) VALUES ('$author_id', '$name', '$fileName', '$desc', '0', '$distance')";
    $result2 = $conn->query($sql2);
    //Redirect to profile
    ?>
      <script>
        alert('Successfully created challenge.');
        window.location = "<?php echo DIR?>view/challenges.php";
      </script>
    <?php
  }//end of while
}//end of if

?>
