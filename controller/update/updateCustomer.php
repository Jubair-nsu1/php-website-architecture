<?php
include_once("../dbConnection.php");

$email =$GET['email'];
if (isset($_POST['update_customer'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE customer SET name=$name,email=$email,password=$password,phone=$phone Where email='$email'";
    $result =mysqli_query($conn,$query);

    if($result){
      echo "<script>alert('Updated Successfully')</script>";
      echo "<script>window.open('../../views/admin/customer.php','_self')</script>";
    }
    else{
      echo "<script>alert('Failed to Update')</script>";
    }
}

?>
