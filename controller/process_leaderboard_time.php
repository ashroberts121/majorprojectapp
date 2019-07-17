<?php

  include('../admin/config.php');//Call in config for db connection
  include('../controller/functions.php');//Call in custom function file
  include('../model/head.php');//Call in head.php for head tags

?>
<?php

if(isset($_POST['submit'])){

  //Set variables for form inputs
  $name = $_POST['name'];
  $challenge_id = $_POST['id'];
  $timeh = $_POST['hours'];
  $timem = $_POST['mins'];
  $times = $_POST['secs'];

  //session email
  $email = $_SESSION['email'];

  //If any fields are left empty, insert as 00
  if(empty($timeh)){
    $timeh = 00;
  }
  if(empty($timem)){
    $timem = 00;
  }
  if(empty($times)){
    $times = 00;
  }

  //Concatonate hours, mins and secs into full time
  $fulltime = $timeh . ':' . $timem . ':' . $times;

  //Update time for logged in user
  $sql = $conn->query("UPDATE challenge_leaderboard SET challenge_time='$fulltime' WHERE user_email='$email'");
  
  ?>
    <!-- Redirect with error message-->
    <script>
      alert('Challenge time successfully updated.');
      window.location = "<?php echo DIR?>view/challenge_page.php?id=<?php echo $challenge_id?>&name=<?php echo $name?>";
    </script>
  <?php
}

?>
