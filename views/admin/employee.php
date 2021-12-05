<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Bootstrap5 CSS-->
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


    <title>Employee</title>
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


    <center>
      <br><br>
      <h2>Employee</h2>

      <br><br>
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Add New Employee</button>

      <!-- Modal for adding new employee-->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color:blue">Add a new Employee</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <form role="form" method="post" action="../../controller/create/createEmployee.php">
                <div class="form-group">
                  <label for="exampleInputEmail1">Employee Name</label>
                  <input type="text" name="name" maxlength="20"  placeholder="Enter Name" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Employee Email Address</label>
                  <input type="email" name="email" maxlength="20"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Enter Email Address" class="form-control">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Employee Password</label>
                  <input type="password" name="password" maxlength="20"  placeholder="Enter Password" class="form-control">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Employee Phone Number</label>
                  <input type="Phone" name="phone" maxlength="30" placeholder="Enter Phone Number" class="form-control">
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success" name="add_employee">Create</button>
            </div>
            </form>
          </div>
        </div>
      </div>


      <!-- View all Employee -->
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
            $sql = "Select name,email,phone From employee";
            $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
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

            <!-- Modal for updating employee information-->
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
                    <!-- Update form -->
                    <form role="form" method="post" action="../../controller/update/updateEmployee.php?email=<?php echo $email ?>">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Employee Name</label>
                        <input type="text" name="name" maxlength="20"  value=<?php echo "$name" ?> class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Employee Email Address</label>
                        <input type="email" name="email" maxlength="20"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value=<?php echo "$email" ?> class="form-control" readonly>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Employee Password</label>
                        <input type="password" name="password" maxlength="20"  placeholder="Enter Password" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Employee Phone Number</label>
                        <input type="Phone" name="phone" maxlength="30" value=<?php echo "$phone" ?> class="form-control">
                      </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" name="update_employee">Update</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- button to delete customer -->
            <td><button class="btn btn-danger"><a style="color:white" href="../../controller/delete/deleteEmployee.php?email=<?php echo $email ?>">Delete</a></button></td>
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
