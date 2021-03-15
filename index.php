<?php
include('config.php');
include('includes/handlers/login-handler.php');
//$_SESSION['userLoggedIn'] = False;
if(isset($_SESSION['userLoggedIn']))
   header('Location: includes/home.php');
$errorArray = array();
   $errorArray['invalidLogin']=" ";

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<title>CodeChef</title>
</head>
<body>
  <!--header-->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="index.php"><img src="assets/images/codechef.jpg" width="70" height="100" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!--menu bar-->
  <div class="collapse navbar-collapse menubar" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">About Us</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Colleges</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Contact Us</a>
      </li>
    </ul>
  </div>
</nav>
<!-- Main Body-->
<div class="container">
	<div class="row">
		<!--About-->
		<div class="col-md-9 aboutus">
			<h1><i style="color: red;">What is CodeChef?</i></h1>
			<p>
			 <!--copy some para here-->
			 CodeChef was created as a platform to help programmers make it big in the world of algorithms, computer programming and programming contests. We host three featured contests every month and give away prizes and goodies to the winners as encouragement. Apart from this, the platform is open to the entire programming community to host their own contests. Major institutions and organizations across the globe use our platform to host their contests. On an average, 30+ external contests are hosted on our platform every month.
			</p>
    </div>

  
		<!--login zone-->
		<div class="col-md-3 loginzone">
         <h1 style="color: red;">Login Zone</h1>
         <form method="post">
         <label>Email</label><br>
         <input type="text" name="email"><br>
         <label>Password</label><br>
         <input type="password" name="password">
         <br><br>
         <button type="submit" name="submit" style="background-color: #1E90FF;">Log In</button>
         </form>
         <p><i style=" color: red;">
         <?php
           $errorArray = include('includes/handlers/login-handler.php');
           echo $errorArray['invalidLogin'];
           //$errorArray['invalidLogin'] = " ";
         ?>
       </i>
       </p>
         <br>
         <p>
         New User? Sign Up <a href="includes/register.php" style="color: red;"><i>Here</i></a>
         </p>
		</div>
	</div>
</div>
</div>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>