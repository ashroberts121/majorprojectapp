<?php

  include('../admin/config.php');//Call in config for db connection
  include('../controller/functions.php');//Call in custom function file
  include('../model/head.php');//Call in head.php for head tags

?>

<?php

//Check if submit button is pressed
if(isset($_POST['submit'])){

  //Declare variables for inputs
  $title = $_POST['title'];
  $message = $_POST['message'];
  $post_id = $_POST['post_id'];
  $post_name = $_POST['post_name'];
  $author_id = $_SESSION['id'];

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
    $fileName = $_FILES['upload_picture']['name'];
    $fileTmpName = $_FILES['upload_picture']['tmp_name'];
    $fileSize = $_FILES['upload_picture']['size'];
    $fileError = $_FILES['upload_picture']['error'];
    $fileType = $_FILES['upload_picture']['type'];

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
          //Check if file meets size requirements (MAX 10MB)
          if ($fileSize < 10000000) {

            //Declare uploaded file destination
            $fileDestination = '../assets/group_post_images/'.$fileName;

            //Move files to destination folder
            move_uploaded_file($fileTmpName, $fileDestination);
          }else {
            //Redirect to group_page
            ?>
              <script>
                alert('Your image was too big (MAX 10MB).');
                window.location = "<?php echo DIR?>view/group_page.php?id=<?php echo $post_id?>&name=<?php echo $post_name?>";
              </script>
            <?php
          }
        }else {
          //Redirect to group_page

          ?>
            <script>
              alert('There was an error uploading the image.');
              window.location = "<?php echo DIR?>view/group_page.php?id=<?php echo $post_id?>&name=<?php echo $post_name?>";
            </script>
          <?php
        }
      }else {
        //Redirect to group_page
        ?>
          <script>
            alert('Your image must be a jpg, jpeg, png or gif.');
            window.location = "<?php echo DIR?>view/group_page.php?id=<?php echo $post_id?>&name=<?php echo $post_name?>";
          </script>
        <?php
      }
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Update 'posts' table values based on the logged in user email

    $sql2 = "INSERT INTO group_posts(group_id, author_id, title, message, post_image, username, post_time, display_picture) VALUES ('$post_id', '$author_id', '$title', '$message', '$fileName', '$username', '$post_time', '$display_picture')";
    $result2 = $conn->query($sql2);
    //Redirect to profile
    ?>
      <script>
        alert('Successfully posted.');
        window.location = "<?php echo DIR?>view/group_page.php?id=<?php echo $post_id?>&name=<?php echo $post_name?>";
      </script>
    <?php
  }//end of while
}//end of if

?>
