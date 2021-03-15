<?php
include('../config.php');
if(!isset($_SESSION['userLoggedIn']))
    header('Location: ../index.php');

  $pcode = $_GET['pcode'];
  $quesQuery = "SELECT * FROM problems WHERE pcode = '$pcode'";
  $success = mysqli_query($con,$quesQuery);
  $quesrow  = mysqli_fetch_array($success);
  $year = $quesrow[2];
   if(isset($_POST['submit'])){
    $solutions = $_POST['solutions'];
    $extn = $_POST['language'];
    $tmp = "solutions/".$year."/";
    $filename = $tmp.$_SESSION['currentUserId'].$pcode.$extn;
   // $uid $_SESSION['currentUserId'];
    //$filepathQuery = "SELECT uyear FROM userdetails WHERE uid = '$uid'";
    $myfile= fopen($filename,"w");
    fwrite($myfile,$solutions);
    $sub = $quesrow[5];
    $sub++;
    $updateQuery = "UPDATE  problems SET  psubmission = '$sub'WHERE  pcode = '$pcode'";
    $success = mysqli_query($con,$updateQuery);

   }
?>




<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<title>Problem</title>
</head>
<body>
<!--header-->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="../index.php"><img src="../assets/images/codechef.jpg" width="70" height="100" alt=""></a>
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
      <li class="nav-item active" style="margin-left: 800px;">
        <a class="nav-link" href="logout.php?logout"><i>Logout</i></a>
      </li>
    </ul>
  </div>
</nav>
<!-- main body -->
<div class="container">
  <p id ="timer" style="text-align: right; color: red;">
  <h2> 
    <?php 
    echo $quesrow[3];
     ?> 
   </h2><br>
  <p> 
    <?php 
    echo $quesrow[4]; 
    ?> 
  </p>
  <form method="post">
    <input type="radio" name="language" value="c">
    <label style="width: 33%;">C</label>
    <input type="radio" name="language" value="Java">
    <label style="width: 33%;">Java</label>
    <input type="radio" name="language" value="Py">
    <label style="width: 20%;">Python</label>
    <h2>Submit Your Solution Here:</h2>
    <textarea class="form-control" name="solutions" id="solutions" rows="30"></textarea><br>
    <button type="submit" name="submit" style="width: 100%; background-color: yellow; color: black;">Click here to submit</button>
  </form>
  </div>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/timer.js"></script>
</body>
</html>