<?php
   
  if(isset($_POST['submit']))
  {
  	$uemail = $_POST['email'];
  	$upass = $_POST['password'];
  	
  	$loginQuery = "SELECT * FROM userlogin WHERE uemail = '$uemail'AND upassword = '$upass'";
  	$success = mysqli_query($con,$loginQuery);
  	if(mysqli_num_rows($success)!=1){
  	   $errorArray['invalidLogin'] = "Login not authorized!";
       return $errorArray;
     }
  	else{
  		$row = mysqli_fetch_array($success);
  		$_SESSION['currentUserId'] = $row[0];
     // echo $_SESSION['currentUserId'];
      $_SESSION['userLoggedIn'] = True;
      header('Location: includes/home.php');
      //echo "Hi ".$row[1];
  	}

  	
  }

?>