<?php
 include('../config.php');
 include('handlers/register-handler.php');
 $collegeQuery = "SELECT * FROM colleges";
 $success = mysqli_query($con,$collegeQuery);
 $c_count = mysqli_num_rows($success);
 
?>



<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<title>Register</title>
  
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#"><img src="../assets/images/codechef.jpg" width="70" height="100" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!--menu bar-->
  <div class="collapse navbar-collapse menubar" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
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
<!--Main Body-->
<div class="label-block" align="center">
<h1 style="color: yellow;">Register Here!</h1>
<p style="color: red;">All Feilds are Mandatory(*)</p>
  <div class="registrationForm">
  	<form method="POST" enctype="multipart/form-data">
  		<div class="form-group" style="color: red;">
    <label for="InputName">Enter your Full Name*:</label><br>
    <input type="text" style="width: 500px;" class="form-control" name="uname" id="InputName" aria-desribedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted"><i style="color: pink;">Please enter your full name. </small>
  </div>
    <div class="form-group" style="color: red;">
    	<label for="InputName" style="border-bottom: 400px;">College Name*:</label><br>
    	<select name="ucollege" id="ucollege"onchange="show();" style="width: 180px">
    		<option value="0">--Select Your College--</option>
        <?php
        while($c_count!=0){
           $row = mysqli_fetch_array($success);
            echo"
               <option value = '".$row[0]."''>".$row[1]."</option>

            ";
            $c_count--;
        }
        ?>
        <option value="-999">Other</option>
        <script type="text/javascript">
          
          function show(){
            if(document.getElementById("ucollege").value == -999)
              document.getElementById("other").style.display="inline";
          }
        </script>
        <input type="text" id="other" name="other" style="display: none;">
    	</select>
    </div>
    <p>
      <label style="color: red">Year*: </label><br>
      <select name="uyear" id="uyear">
        <option value="0">--Select Your Year--</option>
        <option value="1">1st Year</option>h
        <option value="2">2nd Year</option>
        <option value="3">3rd Year</option>
        <option value="4">4th Year</option>
        </select>
    </p>
    <div class="form-group" style="color: red;">
    <label for="InputContactNo">Contact No*:</label>
    <input type="text" style="width: 500px;" class="form-control" name= "ucontact" id="InputContactNo" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted"><i style="color: pink;">Please enter 10 digit contact here.</small>
  </div>
     <div class="form-group" style="color: red;">
    <label for="InputEmail">Email Address*:</label>
    <input type="email" style="width: 500px;"class="form-control" name= "uemail" id="InputEmail" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted"><i style="color: pink;">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group" style="color: red;">
 	<label for="InputPassword">Password:</label>
 	<input type="password" style="width: 500px;"class="form-control" name= "upassword" id="InputPassword" aria-describedby="emailHelp">
<small id="emailHelp" class="form-text text-muted"><i style="color: pink;">Password must have 5 digit with one number and one special character.</small>
 </div>
<p>
  <label>Upload Profile Pic</label>
  <input type="file" id="uimage" name="uimage">
</p>
</div>
 <button type="submit" class="btn btn-primary" name="submit"<?php if(isset($_POST['submit'])){echo 'disabled';}?>>Register</button>
</form>
</div>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>