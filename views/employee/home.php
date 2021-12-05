<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<style>
.bluebox {
  margin-top: 50px;
  max-width: 500px;
  box-shadow: 0 0 30px blue;
  padding:15px 15px 15px 15px;
}

.cardBlue {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  background: blue;
  color: white;
  transition: 0.3s;
  width: 50%;
}

.cardBlue:hover {
  box-shadow: 0 8px 16px 0 rgba(0,.3,.3,.6);
}

.contain {
  padding: 2px 6px;
}
</style>


    <title>Dashboard</title>
  </head>

  <?php
  include_once '../../controller/dbConnection.php';
  session_start();
  if (!(isset($_SESSION['email']))) {
      session_destroy();
      header("location:login.php");
  } else {
      $name = $_SESSION['name'];
      $email = $_SESSION['email'];
  }
  //Getting Timezone of Dhaka
  $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
  ?>

  <body>

    <!-- Navbar -->
    <?php
    include("components/navbar.html");
    ?>

    <center>
    <div class="bluebox">
        <h1 style="color:blue">Welcome <?php echo " $name"; ?></h2><br>
        <h4><?php echo $dt->format('F j, Y, g:i a');  ?></h4><br><br>

        <?php
          $totalCustomers=0;

          $sql2 = "Select * From customer";
          $resultset = mysqli_query($conn, $sql2) or die("database error:". mysqli_error($conn));
          while( $record = mysqli_fetch_assoc($resultset) ) {
                $totalCustomers++;
          }
        ?>

        <div class="cardBlue">
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
