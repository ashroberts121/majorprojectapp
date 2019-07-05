<?php

  include('../admin/config.php');//Call in config for db connection
  include('../controller/functions.php');//Call in custom function file
  include('../model/head.php');//Call in head.php for head tags


  if(isset($_GET['type'], $_GET['id'])){
    $type = $_GET['type'];
    $post_id = $_GET['id'];
    $user_id = $_SESSION['id'];

    switch($type){
      case 'post':
        $conn->query("INSERT INTO post_likes (post_id, user_id)
                        SELECT {$post_id}, {$user_id}
                        FROM posts
                        WHERE EXISTS (
                          SELECT id
                          FROM posts
                          WHERE id = {$post_id})
                        AND NOT EXISTS (
                          SELECT id
                          FROM post_likes
                          WHERE user_id = {$user_id}
                          AND post_id = {$post_id})
                        LIMIT 1
                    ");
      break;
    }//end of switch
  }

  ?>
    <script>
      alert('Successfully liked.');
      window.location = "<?php echo DIR?>view/home.php";
    </script>
  <?php

?>
