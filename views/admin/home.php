<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Custom CSS-->
    <link rel="stylesheet" href="../../assets/css/main.css" type="text/css">
    <?php
      //Bootstrap CSS
      include("../../assets/css/bootstrap.css");
      //JS
      include("../../assets/js/bootstrap.js");
    ?>

<style>
.bluebox {
  margin-top: 50px;
  max-width: 800px;
  box-shadow: 0 0 30px blue;
  padding:15px 15px 15px 15px;
}
</style>


    <title>Dashboard</title>
  </head>

  <!-- User Session Added -->
  <?php
  include("../../controller/session.php");
  ?>

  <body>

    <!-- Navbar -->
    <?php
    include("components/navbar.html");
    ?>

    <?php
      $totalCustomers=0;
      $totalEmployee=0;

      $sql = "Select * From employee";
      $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
      while( $record = mysqli_fetch_assoc($resultset) ) {
            $totalEmployee++;
      }

      $sql2 = "Select * From customer";
      $resultset = mysqli_query($conn, $sql2) or die("database error:". mysqli_error($conn));
      while( $record = mysqli_fetch_assoc($resultset) ) {
            $totalCustomers++;
      }

      //Getting Timezone of Dhaka
      $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
    ?>

    <center>
    <div class="bluebox">
        <h1 style="color:blue">Welcome<?php echo " $name"; ?></h2><br>
        <h4><?php echo $dt->format('F j, Y, g:i a');  ?></h4><br><br>

        <div class="cardBlue">
          <div class="contain">
            <h4><b>Total Employee</b></h4>
            <p><?php echo $totalEmployee ?></p>
          </div>
        </div>
        	<br>

        <div class="cardGreen">
          <div class="contain">
            <h4><b>Total Customers</b></h4>
            <p><?php echo $totalCustomers ?></p>
          </div>
        </div>
    </div>
    </center>
    <br><br>

  </body>

</html>
