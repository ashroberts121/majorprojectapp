<?php

include('../admin/config.php');//Call in config for db connection
include('../controller/functions.php');//Call in custom function file
include('../model/head.php');//Call in head.php for head tags

if(isset($_POST['submit'])){

  //Fetch user from users table to match logged in user
  $email = $_SESSION['email'];
  $id = $_SESSION['id'];
  $commentUser = $conn->query("SELECT username FROM users WHERE email = '$email'");

  //Display content if username is available to match with email
  while($row = $commentUser->fetch_object()){

    //Assign variables to comment details
    $post_id = $_POST['post_id'];
    $comment = $_POST['comment'];
    $username = $row->username;
    $comment_time = date('d' . '/' . 'm' . '/' . 'y' . ' @ ' . 'H' . ':' . 'i');



    //Insert comment details into 'post_comments' table
    $sql = $conn->query("INSERT INTO post_comments(post_id, user_id, username, comment_time, comment) VALUES ('$post_id', '$id', '$username', '$comment_time', '$comment')");



  }//end while

  $postComments = $conn->query("SELECT * FROM posts WHERE id = '$post_id'");
  while($row2 = $postComments->fetch_object()){
    $comments = ($row2->comments) + 1;
    echo $comments;
    $sql2 = $conn->query("UPDATE posts SET comments='$comments' WHERE id='$post_id'");

  }//end while

  //Redirect to post comments
  ?>
    <script>
      alert('Successfully posted.');
      window.location = "<?php echo DIR?>view/post_comment.php?type=post&id=<?php echo $post_id; ?>";
    </script>
  <?php

}//end if isset
