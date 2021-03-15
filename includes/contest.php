
<?php

include('../config.php');
$currentUserId = $_SESSION['currentUserId'];
$userDetailsQuery = "SELECT * FROM userdetails WHERE uid = '$currentUserId' ";
$success = mysqli_query($con,$userDetailsQuery);
$userdetailsRow = mysqli_fetch_array($success);
$uyear = $userdetailsRow[4];
$problemQuery = "SELECT * FROM problems WHERE pyear = '$uyear' ";
$success = mysqli_query($con,$problemQuery);
$p_count = mysqli_num_rows($success);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Contest</title>
</head>
<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
<body>
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
        <a class="nav-link" href="logout.php?logout"><i><b>Logout</b></i></a>
      </li>
    </ul>
  </div>
</nav>
<div class="container" style="color: #FF69B4;">
  <div class="container" style="font-size: 30px;">
  <p id ="timer" style="text-align: right; color: red;">
  </p>
</div>
<?php
echo "<h2><i>Hi ".$userdetailsRow[1]."!</i></h2>";

?>
<br>
<table class="table" style="color: white; width: 1400px; text-align: center;">
  <thead class="thead-light">
    <tr>
      <th scope="col"><b>Code</b></th>
      <th scope="col"><b>Statement</b></th>
      <th scope="col"><b>Total Submissions</b></th>
    </tr>
  </thead>
  <tbody>
    <tr>
    	<?php 
           while($p_count!=0){
              $row = mysqli_fetch_array($success);
              $pcode = $row[1];
              echo "   
               <tr class='prow'>
               <th scope='row' class='ques'>
               <a href='question.php?pcode=".$pcode." 'target='_blank'>".$row[1]."</a>
               </th>
               <td>".$row[3]."</td>
               <td>".$row[5]."</td>
               <td></td>
               <td></td>
                </tr>

              ";
              $p_count--;
           }
    	?>
  </tbody>
</table>
</div>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/timer.js"></script>
</body>
</html>