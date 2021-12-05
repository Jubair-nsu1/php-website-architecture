<?php
  require('../dbConnection.php');
  $email=$_REQUEST['email'];
  $query = "DELETE FROM employee WHERE email=$email";
  $result = mysqli_query($conn,$query);
  if($result){
    echo "<script>alert('Employee Removed Successfully')</script>";
    echo "<script>window.open('../../views/admin/employee.php','_self')</script>";
  }
?>
