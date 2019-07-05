<?php

  include('../admin/config.php');//Call in config for db connection
  include('../controller/functions.php');//Call in custom function file
  include('../model/head.php');//Call in head.php for head tags


  if(isset($_GET['id'])){
    //Assign variable to id value
    $deletePost = $_GET['id'];

    //Delete post with selected id
    $sql = "DELETE FROM posts WHERE id='$deletePost'";
    $result = $conn->query($sql);

    ?>
      <script>
        alert("Post successfully deleted.");
        window.location = "<?php echo DIR?>view/home.php";
      </script>
    <?php
  }//end if isset

?>
