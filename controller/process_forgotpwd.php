<?php
    include('../admin/config.php');//Call in config for db connection
    include('functions.php');//Call in custom function file
    include('../model/head.php');//Call in head.php for head tags

    $reset = "";

    //Check if submit button was pressed
    if(isset($_POST['forgotPass'])){

        //Assign variable to email input
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        //Select row id based on submitted email
        $sql = "SELECT id FROM users WHERE email='$email'";
        $result = $conn->query($sql);

        //Generate a random character sequence for token column
        $str = "0123456789qwertyuiopasdfghjklzxcvbnm";
        $str = str_shuffle($str);
        $str = substr($str, 0, 10);

        //Create url including values for email and token
        $url = DIR . "controller/process_changepwd.php?token=$str&email=$email";

        //echo $url;

        //Display link
        echo $reset = "To reset password please click <a href='$url'>here</a>";

        //Update token based on email input
        $sql = "UPDATE users SET token='$str' WHERE email='$email'";
        $result = $conn->query($sql);
    }
?>
