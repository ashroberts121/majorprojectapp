<?php

  //Assign database details to variables
  define('DBHOST', 'localhost');
  define('DBUSER', 'root');
  define('DBPASS', 'oranges11');
  define('DBNAME', 'majorprojectapp');

  //Setup database connection
  $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

  //Check if connection was successful
  if(!$conn){
      die("Error connecting to SQL Database: 'MajorProjectApp'");
  }else{
    //  echo "Connected Successfully to Database <br/>";
  }

  //Run session
  session_start();

  //Attach root to DIR and $DIR variable
  define('DIR', 'http://localhost/MajorProjectApp/');
  $DIR = 'http://localhost/MajorProjectApp';
  //Attach admin to DIR_ADMIN and $DIR_ADMIN variable
  define('DIR_ADMIN', 'http://localhost/MajorProjectApp/admin/');
  $DIR_ADMIN = 'http://localhost/MajorProjectApp/admin/';

  define('SITE_TITLE', 'MajorProjectApp'); //Site title

  define('included', 1);

  include("../functions.php"); // Include functions file

  date_default_timezone_set('Europe/London'); //Set timezone to GMT

?>
