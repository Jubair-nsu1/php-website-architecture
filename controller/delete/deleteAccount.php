<?php
  include("../dbConnection.php");

  $email = $_GET['email'];

  if (isset($_POST['delete_account'])) {
    $query = "DELETE FROM customer WHERE email='$email'";
    $result = mysqli_query($conn,$query);
    if($result){
      header("Location: ../../index.php");
    }
    else{
      echo "<script>alert('Cannot Removed')</script>";
    }
  }
?>
