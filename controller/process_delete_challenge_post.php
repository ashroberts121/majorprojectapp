<?php

  include('../admin/config.php');//Call in config for db connection
  include('../controller/functions.php');//Call in custom function file
  include('../model/head.php');//Call in head.php for head tags


  if(isset($_GET['id'])){
    //Assign variable to id value
    $id = $_GET['id'];
    $challengeID = $_GET['challengeid'];
    $name = $_GET['name'];

    //Delete post with selected id
    $sql = "DELETE FROM challenge_posts WHERE id='$id'";
    $result = $conn->query($sql);

    ?>
      <script>
        //Redirect to challenge page
        alert("Post successfully deleted.");
        window.location = "<?php echo DIR;?>view/challenge_page.php?id=<?php echo $challengeID;?>&name=<?php echo $name;?>";
      </script>
    <?php
  }//end if isset

?>
