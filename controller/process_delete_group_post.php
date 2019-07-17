<?php

  include('../admin/config.php');//Call in config for db connection
  include('../controller/functions.php');//Call in custom function file
  include('../model/head.php');//Call in head.php for head tags


  if(isset($_GET['id'])){
    //Assign variable to id value
    $id = $_GET['id'];
    $groupID = $_GET['groupid'];
    $name = $_GET['name'];

    //Delete post with selected id
    $sql = "DELETE FROM group_posts WHERE id='$id'";
    $result = $conn->query($sql);

    ?>
      <script>
        //Redirect to group page
        alert("Post successfully deleted.");
        window.location = "<?php echo DIR;?>view/group_page.php?id=<?php echo $groupID;?>&name=<?php echo $name;?>";
      </script>
    <?php
  }//end if isset

?>
