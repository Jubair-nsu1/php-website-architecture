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


    <title>Customers</title>
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


    <!-- View all Customers -->
    <center>
      <br><br>
      <h2>Employee Logs</h2>
      <br><br>
      <!-- Download Log Report -->
      <form method="post" action="../../controller/printReport.php">
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
