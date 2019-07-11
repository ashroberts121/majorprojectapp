<?php

  include('../admin/config.php');//Call in config for db connection
  include('../controller/functions.php');//Call in custom function file
  include('../model/head.php');//Call in head.php for head tags


  if(isset($_GET['id'])){
    //Assign variable to id value
    $deleteGroup = $_GET['id'];

    //Delete group with selected id
    $sql = "DELETE FROM groups WHERE id='$deleteGroup'";
    $result = $conn->query($sql);

    //Delete all associated group posts
    $sql = "DELETE FROM group_posts WHERE group_id='$deleteGroup'";
    $result = $conn->query($sql);

    ?>
      <script>
        alert("Group successfully deleted.");
        window.location = "<?php echo DIR?>view/groups.php";
      </script>
    <?php
  }//end if isset

?>
