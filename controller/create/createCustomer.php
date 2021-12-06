<?php
include("../dbConnection.php");

//Customer Registration
if (isset($_POST['customer_register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $query = "Insert Into customer(name, email, password,phone) Values('$name','$email','$password','$phone')";
    $result =mysqli_query($conn,$query);

    if($result){
      echo "<script>alert('Registered Successfully')</script>";
      echo "<script>window.open('../../views/customer/login.php','_self')</script>";
    }
}

?>
