<?php

  include('../admin/config.php');//Call in config for db connection
  include('../controller/functions.php');//Call in custom function file
  include('../model/head.php');//Call in head.php for head tags


  if(isset($_GET['id'])){
    //Assign variable to id value
    $deleteChallenge = $_GET['id'];

    //Delete group with selected id
    $sql = "DELETE FROM challenges WHERE id='$deleteChallenge'";
    $result = $conn->query($sql);

    //Delete all associated group posts
    $sql = "DELETE FROM challenge_posts WHERE challenge_id='$deleteChallenge'";
    $result = $conn->query($sql);

    ?>
      <script>
        alert("Challenge successfully deleted.");
        window.location = "<?php echo DIR?>view/challenges.php";
      </script>
    <?php
  }//end if isset

?>
