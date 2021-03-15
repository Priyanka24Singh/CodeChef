<?php
include('../config.php');
if(!isset($_SESSION['userLoggedIn']))
header('Location:../index.php');
$currentUserId = $_SESSION['currentUserId'];
$userDetailsQuery = "SELECT * FROM userdetails WHERE uid = '$currentUserId' ";
$success = mysqli_query($con,$userDetailsQuery);
$userdetailsRow = mysqli_fetch_array($success);
//echo "<h1>Hi ".$userdetailsRow[1];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
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
<!-- main body-->
<div class="container" style="color: #FF7F50;">
  <img src="../assets/images/img1.jpg">
<?php
echo "<h2><i>Hi ".$userdetailsRow[1]."!</i></h2>";

?>

<br><br>
<h3><i style="color: #FFD700;">Be ready for the contest! Now it's to Code.</i></h3><br>
<h3><mark>Rules of the contest</mark></h3>
<br>
<i style="color: #00FA9A;">
<ol>
	<li>You are supposed to code in C/Java/Python only</li>
    <li>The contest is of 60 minutes.You will be given reading time of 15 minutes just to read questions</li>
    <li>The contest will start exactly at 12:15pm on 5th January,2020.</li>
    <li>The below button is disabled and will be enabled exactly whn the contest starts.</li>
</i>
</ol>
<form action="contest.php" method="post">
<button style="width: 400px; background-color: #ebb734; color: black;">Start Contest</button>
</form>
</div>
</body>
</html>
