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

    <title>Profile</title>
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

    <!-- View Customer Profile Info -->
    <?php
      $sql = "Select name,email,phone From customer where email='$email'";
      $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
      while( $record = mysqli_fetch_assoc($resultset) ) {
        $name = $record['name'];
        $email = $record['email'];
        $phone = $record['phone'];
    ?>

    <center>
      <div class="greenbox">
          <h2 style="color:green">My Profile</h2><br>
          <a>Name</a><br>
          <a style="color:red"><?php echo "$name" ?></a><br><br>
          <a>Email</a><br>
          <a style="color:red"><?php echo "$email" ?></a><br><br>
          <a>Phone</a><br>
          <a style="color:red"><?php echo "$phone" ?></a><br><br>
      </div>
    </center>

    <?php
    }
    ?>

  </body>

</html>
