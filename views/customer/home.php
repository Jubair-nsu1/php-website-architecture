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
  max-width: 500px;
  box-shadow: 0 0 30px blue;
  padding:15px 15px 15px 15px;
}
</style>

  <title>Dashboard</title>
  </head>

  <!-- User Session Added -->
  <?php
  include("../../controller/session.php");
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
    </div>
    <br><br>

    <form role="form" method="post" action="../../controller/delete/deleteAccount.php?email=<?php echo $email ?>">
        <button type="submit" onclick="return confirm('Are you sure you want to delete your account?');" class="btn btn-danger" name="delete_account">Delete Your Account</button>
    </form>

    </center>


  </body>

</html>
