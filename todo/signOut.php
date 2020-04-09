<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="main.css" />
  
  <title>Logged Out</title>    
</head>
<body>
  <?php session_start() ?>
  <div class="container">
    <h2>You have successfully logged out.</h2>
    <ul style="color: white;">If you would like to sign back in and return home, <a href="signInPage.php">click here</a>.</ul>

  </div>



<?php
  if(count($_SESSION) > 0) {
    foreach($_SESSION as $key => $value) {
      unset($_SESSION[$key]);
    }
    session_destroy();
  }
?>
</body>
</html>