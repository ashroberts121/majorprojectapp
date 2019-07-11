<?php

  include('../admin/config.php');//Call in config for db connection
  include('../controller/functions.php');//Call in custom function file
  include('../model/head.php');//Call in head.php for head tags

?>

<?php

//Set variables for new group member
$group_id = $_GET['id'];
$group_name = $_GET['name'];
$user_id = $_SESSION['id'];
$user_email = $_SESSION['email'];

//Insert new user into group_members table
$sql = $conn->query("INSERT INTO group_members(group_id, user_id, user_email) VALUES ('$group_id', '$user_id', '$user_email')");

//Select members column from groups table
$sql2 = $conn->query("SELECT members FROM groups WHERE id = '$group_id'");
while($row = $sql2->fetch_object()){
  //Increment group member column
  $members = ($row->members) + 1;
  $sql = $conn->query("UPDATE groups SET members='$members' WHERE id='$group_id'");

}//end while
?>
  <script>
    alert('Successfully joined group.');
    window.location = "<?php echo DIR?>view/group_page.php?id=<?php echo $group_id?>&name=<?php echo $group_name?>";
  </script>
<?php

?>
