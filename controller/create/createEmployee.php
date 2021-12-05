<?php
include_once '../dbConnection.php';

// Admin add employee/Create employee access
if (isset($_POST['add_employee'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $query = "Insert Into employee(name, email, password, phone) Values('$name','$email','$password','$phone')";
    $result =mysqli_query($conn,$query);

    if($result){
      echo "<script>alert('Employee Added Successfully')</script>";
      echo "<script>window.open('../../views/admin/employee.php','_self')</script>";
    }
}



?>
