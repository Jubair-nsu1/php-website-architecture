<?php
require_once 'dbConnection.php';

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
      echo "<script>window.open('../views/customer/login.php','_self')</script>";
    }
}



//Customer Login
if (isset($_POST['customer_login'])) {
    session_start();
    if (isset($_SESSION["email"])) {
        session_destroy();
    }

    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "select * From customer Where email='$email' And password='$password'";

    $result =mysqli_query($conn,$query);
    $count = mysqli_num_rows($result);

    if($count==1){
      while ($row = mysqli_fetch_array($result)) {
            $name = $row['name'];
            $email = $row['email'];
            $phone = $row['phone'];
      }
      $_SESSION["name"]  = $name;
      $_SESSION["email"] = $email;
      $_SESSION["phone"] = $phone;
      header("location:../views/customer/home.php");
    }
    else{
      echo "<script>alert('Error login')</script>";
      echo "<script>window.open('../index.php','_self')</script>";
    }
}

//Employee Login
if (isset($_POST['employee_login'])) {
    session_start();
    if (isset($_SESSION["email"])) {
        session_destroy();
    }

    $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
    $date = $dt->format('F j, Y');
    $time = $dt->format('g:i a');

    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "select name,email,phone From employee Where email='$email' And password='$password'";
    $result =mysqli_query($conn,$query);
    $count = mysqli_num_rows($result);

    if($count==1){
      while ($row = mysqli_fetch_array($result)) {
            $name = $row['name'];
            $email = $row['email'];
      }
      $_SESSION["name"]  = $name;
      $_SESSION["email"] = $email;
      //Storing Employee Login record
      $emp_name = $_SESSION["name"];
      $query2 = "Insert Into log_history(employee_name, log, date,time) Values('$emp_name','Signed In','$date','$time')";
      mysqli_query($conn,$query2);
      header("location:../views/employee/home.php");
    }
    else{
      echo "<script>alert('Error login')</script>";
      echo "<script>window.open('../index.php','_self')</script>";
    }
}


//Admin Login
if (isset($_POST['admin_login'])) {
    session_start();
    if (isset($_SESSION["email"])) {
        session_destroy();
    }

    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "select * From admin Where email='$email' And password='$password'";

    $result =mysqli_query($conn,$query);
    $count = mysqli_num_rows($result);

    if($count==1){
      while ($row = mysqli_fetch_array($result)) {
            $name = $row['name'];
            $email = $row['email'];
      }
      $_SESSION["name"]  = $name;
      $_SESSION["email"] = $email;
      header("location:../views/admin/home.php");
    }
    else{
      echo "<script>alert('Error login')</script>";
      echo "<script>window.open('../index.php','_self')</script>";
    }
}


?>
