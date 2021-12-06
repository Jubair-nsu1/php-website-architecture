<?php
include("dbConnection.php");

$email_id = $_GET['email'];

if (isset($_POST['archive_account'])) {
    $query = "select * From customer Where email='$email_id' ";
    $result =mysqli_query($conn,$query);
    $count = mysqli_num_rows($result);
    if($count==1){
      while ($row = mysqli_fetch_array($result)) {
            $name = $row['name'];
            $email = $row['email'];
            $password = $row['password'];
            $phone = $row['phone'];
      }
    }

    //Putting Customer Account info into Archive Account
    $sql = "Insert Into archive(name, email, password, phone) Values('$name','$email','$password','$phone')";
    $result2 = mysqli_query($conn,$sql);

    if($result2){
      echo "<script>alert('Archived Successfully')</script>";
      echo "<script>window.open('../views/employee/customer.php','_self')</script>";
    }
    else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}

?>
