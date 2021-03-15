<?php
if(isset($_POST['submit']))
{
	$uname = $_POST['uname'];
	$ucollege = $_POST['ucollege'];
	$ucontact = $_POST['ucontact'];
	$uemail = $_POST['uemail'];
	$upassword = $_POST['upassword'];
	$uyear = $_POST['uyear'];
	$uother = $_POST['other'];
	//$uimage = $_POST['uimage'];
	$filename = $_FILES['uimage']['name'];
	$imgDest = "../assets/images/uimg/".$id.".".$filename;
     move_uploaded_file($_FILES['uimage']['tmp_name'], $imgDest);
	
	if($ucollege == -999)
	{
		$q = "INSERT INTO colleges(cname) VALUES ('$uother')";
		$s = mysqli_query($con,$q);
		$q = "SELECT cid FROM colleges WHERE cname = '$uother'";
		$s = mysqli_query($con,$q);
		$r = mysqli_fetch_array($s);
		$ucollege = $r[0];

	}

	$registerQueryLogin = "INSERT INTO userlogin (uemail,upassword) VALUES ('$uemail','$upassword')";
    $registerQueryDetails = "INSERT INTO userdetails(uname,ucollege,ucontact,uyear,uimage) VALUES ('$uname','$ucollege','$ucontact','$uyear','$filename')";
	$success = mysqli_query($con,$registerQueryLogin);
    $success1 = mysqli_query($con,$registerQueryDetails);
	if($success && $success1){
		echo "Registration Successsful! Go back to login.Click on Logo to redirect to login page!";
		/*$q = "SELECT *FROM userlogin WHERE uemail = '$uemail' AND upassword = '$upassword'";
		$s = mysqli_query($con,$q);
		$r = mysqli_fetch_array($s);
		$id = $r[0];
		$info =  $_FILES['uimage']['name'];
		$pinfo = pathinfo($_FILES['uimage']['name']);
		$extn = $pinfo['extension'];
	$imgDest = "../assets/images/uimg/".$id.".".$extn;
     move_uploaded_file($_FILES['uimage']['tmp_name'], $imgDest);*/
	}
	else
		echo "Error in Registration!";
         
}


?>