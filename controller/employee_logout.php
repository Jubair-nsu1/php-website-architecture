<?php
include("dbConnection.php");
session_start();

$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));

if (isset($_SESSION['email'])) {
    $name = $_SESSION['name'];
    $date = $dt->format('F j, Y');
    $time = $dt->format('g:i a');
    //Storing Employee Logout record
    $query = "Insert Into log_history(employee_name, log, date,time) Values('$name','Signed Out','$date','$time')";
    $result =mysqli_query($conn,$query);

    session_destroy();
}

header("location: ../index.php");
?>
