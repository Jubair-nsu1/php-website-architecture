<?php
  include_once 'dbConnection.php';
  session_start();
  if (!(isset($_SESSION['email']))) {
      session_destroy();
      header("location:../index.php");
  } else {
      $name = $_SESSION['name'];
      $email = $_SESSION['email'];
  }
?>
