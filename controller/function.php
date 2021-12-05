<?php
include_once 'dbConnection.php';


// Admin add employee/Create employee access
if (isset($_POST['add_employee'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $query = "Insert Into employee(full_name, email, phone, password) Values('$name','$email','$phone','$password')";
    $result =mysqli_query($conn,$query);

    if($result){
      echo "<script>alert('Employee Added Successfully')</script>";
  //  echo "<script>window.open('../views/customer/login.php','_self')</script>";
    }
}


// Admin edit employee


// Admin delete employee


// Admin edit customer


// Admin delete customer


// Admin check employee log


// Admin print employee log report


// Customer delete own account



?>
