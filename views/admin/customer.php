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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="home.php" style="color:lightblue">Admin</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="home.php">Home </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="employee.php">Employee</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="customer.php">Customers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../controller/signout.php">Sign Out</a>
          </li>
        </ul>

      </div>
    </nav>
    <!-- End of Navbar -->


    <!-- View all Customers -->
    <center>
      <br><br>
      <h2>Customers</h2>
      <div class="greenbox">
        <table class="table table-striped table-dark">
          <thead>
            <tr class="bg-success">
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Update</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>


            <?php
              $c=1;
              $sql = "Select name,email,phone From customer";
              $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($con));
              while( $record = mysqli_fetch_assoc($resultset) ) {
                $name = $record['name'];
                $email = $record['email'];
                $phone = $record['phone'];
            ?>
            <tr>
              <td style="color:yellow"><?php echo $c ?></td>
              <td><?php echo $name ?></td>
              <td><?php echo $email ?></td>
              <td><?php echo $phone ?></td>
              <td><button class="btn btn-primary"><a  style="color:white" data-toggle="modal" data-target="#exampleModal<?php echo "$email"?>">Edit</a></button></td>

              <!-- Modal for updating customer information-->
              <div class="modal fade" id="exampleModal<?php echo "$email"?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel" style="color:blue">Update Customer <?php echo " $name"; ?></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <form role="form" method="post" action="../../controller/create/updateCustomer.php?email=<?php echo $email ?>">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Customer Name</label>
                          <input type="text" name="name" maxlength="20"  value=<?php echo "$name" ?> class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Customer Email Address</label>
                          <input type="email" name="email" maxlength="20"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value=<?php echo "$email" ?> class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Customer Password</label>
                          <input type="password" name="password" maxlength="20"  placeholder="Enter Password" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Customer Phone Number</label>
                          <input type="Phone" name="phone" maxlength="30" value=<?php echo "$phone" ?> class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success" name="update_customer">Update</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- End of Modal for updating customer information-->

              <!-- button to delete customer -->
              <td><button class="btn btn-danger"><a style="color:white" href="../../controller/delete/deleteCustomer.php?email=<?php echo $email ?>">Delete</a></button></td>
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
