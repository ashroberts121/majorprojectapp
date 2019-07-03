<?php

  $activePage = 'login'; //Sets active page variable for navbar

  include('../admin/config.php');//Call in config for db connection
  include('../controller/functions.php');//Call in custom function file
  include('../model/head.php');//Call in head.php for head tags
  include('../view/nav.php');//Call in bottom navbar

?>

<div class="col-8 offset-2">
  <h4 style="text-align:center;margin:10px 0;">Update profile</h4>
  <form action="<?php echo DIR ?>controller/process_edit_profile.php" method="post" enctype="multipart/form-data">

    <!-- Edit Username Field -->
    <div class="form-group">
      <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
    </div>
    <div class="row">
      <!-- Edit First Name Field -->
      <div class="form-group col-6">
        <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Firstname" required>
      </div>
      <!-- Edit Surname Field -->
      <div class="form-group col-6">
        <input type="text" name="surname" id="surname" class="form-control" placeholder="Surname" required>
      </div>
    </div>
    <!-- Edit Gender Input Field -->
    <div class="form-group">
      <select name="gender" class="form-control" placeholder="Gender" required autofocus>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>
    </div>
    <!-- Edit Location Field -->
    <div class="form-group">
      <input type="text" name="location" id="location" class="form-control" placeholder="Location" required autofocus>
    </div>
    <!-- Edit Job Title Field -->
    <div class="form-group">
      <input type="text" name="job_title" id="job_title" class="form-control" placeholder="Job Title" required autofocus>
    </div>
    <!-- Upload Display Picture Input Field -->
    <label style="margin:0;font-size 10px;">Display Picture</label>
    <input type="file" id="display_picture" name="display_picture" multiple="multiple" class="mb-2"/>
    <!-- Upload Display Picture Input Field -->
    <label style="margin:0;font-size 10px;">Background Picture</label>
    <input type="file" id="background_picture" name="background_picture" multiple="multiple" class="mb-2"/>


    <!-- Register Submit Form Button -->
    <div class="text-center pt-2 pb-1">
      <button type="submit" name="submit" id="customButton" class="btn btn-primary">Update Profile</button>
    </div>

  </form>
</div>
