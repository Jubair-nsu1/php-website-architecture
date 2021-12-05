<?php
  //include_once('../dbConnection.php');
include("../dbConnection.php");

  $email = $_GET['email'];
  $query = "DELETE FROM customer WHERE email=$email";
  $result = mysqli_query($conn,$query);
  if($result){
    echo "<script>alert('Customer Removed Successfully')</script>";
    echo "<script>window.open('../../views/admin/customer.php','_self')</script>";
  }
  else{
    echo "<script>alert('Cannot Removed')</script>";
  }


?>
