<?php
  include('admin/admin.php');
  include('controller/head.php');

?>

<p>You will be redirected in 3 seconds</p>
    <script>
        var timer = setTimeout(function() {
            window.location='http://www.google.com'
        }, 3000);
    </script>
