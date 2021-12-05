<?php
  include("../dbConnection.php");

  $email = $_GET['email'];
  $query = "DELETE FROM customer WHERE email='$email'";
  $result = mysqli_query($conn,$query);
  if($result){
    header("Location: ../../views/admin/customer.php");
  }
  else{
    echo "<script>alert('Cannot Removed')</script>";
  }
?>
