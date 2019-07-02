<!doctype html>
<html>
  <head>
  <meta charset="UTF-8">
  <!-- Display Website Title from config -->
  <title> <?php echo SITE_TITLE ?> </title>

  <meta name="viewport" content="width=device-width, initial-scale=1"><!--Set viewport-->

  <link rel="stylesheet" href="<?php echo DIR; ?>assets/css/main.css" type="text/css"><!--Custom styles-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"><!--Bootstrap CSS CDN-->

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"><!-- Materialize CSS Icons Link -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous"><!-- Font Awesome Icons Link -->

  <script src="<?php echo DIR; ?>assets/js/main.js" type="text/javascript"></script><!--Custom scripts-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </head>
    <body>
      <div id="headerLogoBar" class="col-12">
        <div class="col-2 offset-5">
          <a href="<?php echo DIR ?>">
            <img src="../assets/img/fitness_logo.png" height="28px" width="auto" />
          </a>
          <?php
            if(logged_in()){
              //assign variable for session value
              $email = mysqli_real_escape_string($conn, $_SESSION['email']);
              //Select logged in users first and last name based on their email
              $sql = "SELECT username FROM users WHERE email='$email'";
              $result = $conn->query($sql);

              while($row = $result->fetch_object()){
                  //Display first and last name of logged in user
                  echo "$row->username";
                }
            }
          ?>
        </div>
      </div>
