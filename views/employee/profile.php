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
    max-width: 500px;
    box-shadow: 0 0 30px green;
    padding:15px 15px 15px 15px;
  }
  </style>


    <title>Profile</title>
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
      $phone = $_SESSION['phone'];
  }
  ?>

  <body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="home.php" style="color:green">Employee</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="home.php">Home </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.php">Profile</a>
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
    <center>
      <div class="greenbox">
          <h2 style="color:green">My Profile</h2><br>
          <a>Name</a><br>
          <a style="color:red"><?php echo "$name"; ?></a><br><br>
          <a>Email</a><br>
          <a style="color:red; font:14px"><?php echo "$email"; ?></a><br><br>
          <a>Phone</a><br>
          <a style="color:red"><?php echo "$phone"; ?></a><br><br>
      </div>
    </center>

  </body>

</html>
