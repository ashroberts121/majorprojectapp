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
$sql = $conn->query("DELETE FROM challenge_members WHERE user_email = '$user_email' AND challenge_id = '$challenge_id'");

//Select members column from challenges table
$sql2 = $conn->query("SELECT members FROM challenges WHERE id = '$challenge_id'");
while($row = $sql2->fetch_object()){
  //Increment challenge member column
  $members = ($row->members) - 1;
  $sql = $conn->query("UPDATE challenges SET members='$members' WHERE id='$challenge_id'");

}//end while
//Select username for logged in user
$sql = $conn->query("SELECT username FROM users WHERE id='$user_id'");

while($row = $sql->fetch_object()){
  //Attach username to variable
  $username = $row->username;
}
  //Add a default leaderboard entry upon joining challenge
  $sql = $conn->query("DELETE FROM challenge_leaderboard WHERE user_email = '$user_email' AND challenge_id = '$challenge_id'");

?>
  <script>
    alert('Successfully left challenge.');
    window.location = "<?php echo DIR?>view/challenges.php";
  </script>
<?php

?>
