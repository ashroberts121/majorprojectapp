<?php

  include('../admin/config.php');//Call in config for db connection
  include('../controller/functions.php');//Call in custom function file
  include('../model/head.php');//Call in head.php for head tags

?>

<?php

//Set variables for new challenge member
$challenge_id = $_GET['id'];
$challenge_name = $_GET['name'];
$user_id = $_SESSION['id'];
$user_email = $_SESSION['email'];

//Insert new user into challenge_members table
$sql = $conn->query("INSERT INTO challenge_members(challenge_id, user_id, user_email) VALUES ('$challenge_id', '$user_id', '$user_email')");

//Select members column from challenges table
$sql2 = $conn->query("SELECT members FROM challenges WHERE id = '$challenge_id'");
while($row = $sql2->fetch_object()){
  //Increment challenge member column
  $members = ($row->members) + 1;
  $sql = $conn->query("UPDATE challenges SET members='$members' WHERE id='$challenge_id'");

}//end while

//Select username for logged in user
$sql = $conn->query("SELECT username FROM users WHERE id='$user_id'");

while($row = $sql->fetch_object()){
  //Attach username to variable
  $username = $row->username;
}
  //Add a default leaderboard entry upon joining challenge
  $sql = $conn->query("INSERT INTO challenge_leaderboard(challenge_id, user_id, user_email, username, challenge_time) VALUES ('$challenge_id', '$user_id', '$user_email', '$username', '0')");

?>
<!--Redirect to challenge page -->
  <script>
    alert('Successfully joined challenge.');
    window.location = "<?php echo DIR?>view/challenge_page.php?id=<?php echo $challenge_id?>&name=<?php echo $challenge_name?>";
  </script>
<?php

?>
