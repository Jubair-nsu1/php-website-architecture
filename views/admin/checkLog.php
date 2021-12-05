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
  .greenbox {
    margin-top: 50px;
    max-width: 800px;
    box-shadow: 0 0 30px green;
    padding:0px 0px 0px 0px;
  }
  </style>


    <title>Customers</title>
  </head>

  <?php
  include_once '../../controller/dbConnection.php';
  session_start();
  if (!(isset($_SESSION['email']))) {
      session_destroy();
      header("location:login.php");
  } else {
      $name = $_SESSION['name'];
  }
  ?>

  <body>

    <!-- Navbar -->
    <?php
    include("components/navbar.html");
    ?>


    <!-- View all Customers -->
    <center>
      <br><br>
      <h2>Employee Logs</h2>
      <br><br>
      <!-- Download Log Report -->
      <form method="post" action="../../controller/download.php">
        <input type="submit" name="print_report" class="btn btn-primary" value="Print Log Report" />
      </form>

      <div class="greenbox">
        <table class="table table-striped table-dark">
          <thead>
            <tr class="bg-success">
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Logs</th>
              <th scope="col">Date</th>
              <th scope="col">Time</th>
            </tr>
          </thead>


            <?php
              $c=1;
              $sql = "Select employee_name,log,date,time From log_history";
              $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
              while( $record = mysqli_fetch_assoc($resultset) ) {
                $name = $record['employee_name'];
                $log = $record['log'];
                $date = $record['date'];
                $time = $record['time'];
            ?>
            <tr>
              <td style="color:yellow"><?php echo $c ?></td>
              <td><?php echo $name ?></td>
              <td><?php echo $log ?></td>
              <td><?php echo $date ?></td>
              <td><?php echo $time ?></td>
            </tr>

            <?php
              $c++;
              }
            ?>

        </table>
      </div>
    </center>


  </body>

</html>
