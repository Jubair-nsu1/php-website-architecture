<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- CSS -->
    <link rel="stylesheet" href="../../assets/css/loginForm.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" />
    <!-- JS -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>



    <title>Admin Login</title>
  </head>



  <body>
    <br><br><br>

    <div class="login-wrap">
  	<div class="login-html">
		  <div class="login-form">
        <center><h2 style="color:white">Admin Login</h2></center><br>

        <form name="form" action="../../controller/auth.php" method="post">
          <div class="group">
  					<label for="email" class="label">Email</label>
            <input type="email" name="email" class="input" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Enter Email" required/>
  				</div>
  				<div class="group">
  					<label for="pass" class="label">Password</label>
            <input type="password" name="password" class="input" placeholder="Enter Password" required/>
  				</div>
  				<div class="group">
  					<input id="check" type="checkbox" class="check" checked>
  					<label for="check"><span class="icon"></span> Keep me Signed in</label>
  				</div>
  				<div class="group">
  					<button class="button" type="submit" name="admin_login">Sign In</button></br></br>
  				</div>
  				<div class="hr"></div>
  				<div class="foot-lnk">
  					<a href="#forgot">Forgot Password?</a>
  				</div>
        </form>

		  </div>
	 </div>
   </div>


  </body>
</html>
