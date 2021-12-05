<?php
include_once("../dbConnection.php");

$email = $_GET['email'];
if (isset($_POST['update_employee'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE employee SET name='$name',password='$password',phone='$phone' WHERE email='$email'";
    if(mysqli_query($conn,$query)){
      header("Location: ../../views/admin/employee.php");
    }
    else{
      echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
    }
}

?>
