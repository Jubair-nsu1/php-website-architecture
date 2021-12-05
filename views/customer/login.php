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



    <title>Customer Login</title>
  </head>

  <body>
    <style>
    body  {
      background-image: url("https://static.vecteezy.com/system/resources/previews/002/490/560/non_2x/abstract-dark-blue-luxury-background-with-golden-line-diagonal-free-vector.jpg");
    }
    </style>
    <br><br><br>

    <div class="login-wrap">
	  <div class="login-html">

		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>

    <div class="login-form">

      <div class="sign-in-htm">
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
  					<button class="button" type="submit" name="customer_login">Sign In</button></br></br>
  				</div>
  				<div class="hr"></div>
  				<div class="foot-lnk">
  					<a href="#forgot">Forgot Password?</a><br>
            <a href="../../index.php">Main Page</a>
  				</div>
        </form>
			</div>

			<div class="sign-up-htm">
        <form name="form" action="../../controller/auth.php" method="post">
  				<div class="group">
  					<label for="name" class="label">Name</label>
  					<input class="input" type="text" name="name" placeholder="Aron Smith" required/>
  				</div>
          <div class="group">
            <label for="email" class="label">Email Address</label>
             <input class="input" type="email" name="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="xyz@gmail.com" required/>
          </div>
  				<div class="group">
  					<label for="password" class="label">Password</label>
  					<input class="input" type="password" name="password" placeholder="Enter a password" required/>
  				</div>
  				<div class="group">
  					<label for="phone" class="label">Phone number</label>
  					<input class="input" type="phone" name="phone" pattern="[0-9]{1}[0-9]{10}" placeholder="017XXXXXXXX" required/>
  				</div><br>

  				<div class="group">
  					<input type="submit" class="button" name="customer_register" value="Sign Up">
  				</div>
  					<center><label for="tab-1" style="color:white">Already Member?</label><center>
        </form>
			</div>

		  </div>
	 </div>
  </div>


  </body>
</html>
