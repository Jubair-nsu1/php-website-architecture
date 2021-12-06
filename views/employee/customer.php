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
              <td><button class="btn btn-primary"><a  style="color:white" data-toggle="modal" data-target="#exampleModal<?php echo $email ?>">Edit</a></button></td>

              <!-- Modal for updating customer information-->
              <div class="modal fade" id="exampleModal<?php echo  $email ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <form role="form" method="post" action="../../controller/update/updateCustomer.php?email=<?php echo $email ?>">
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
