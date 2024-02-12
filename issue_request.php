<?php
session_start();
if (!isset($_SESSION['auth'])) {
  header("location:login.php");
}
require "connection.php";




?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Request</title> 
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  </head>
  <body>
  <?php require_once "bar/upperbar.php"; ?>
    <div class="container">
   
      <div class="wrapper">
        <div class="title"><span>Request From User</span></div>
       
      </div>
    </div>
    <?php require_once "bar/script.php"; ?>
  </body>
</html>