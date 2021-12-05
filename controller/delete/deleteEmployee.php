<?php
  include("../dbConnection.php");

  $email = $_GET['email'];
  $query = "DELETE FROM employee WHERE email='$email'";
  $result = mysqli_query($conn,$query);
  if($result){
    header("Location: ../../views/admin/employee.php");
  }
  else{
    echo "<script>alert('Cannot Removed')</script>";
  }
?>
