<?php
	include('../config.php');
 if(isset($_GET['logout']))
 {
 	unset($_SESSION['userLoggedIn']);
 	unset($_SESSION['currentUserId']);
 	session_destroy();
 	header('Location: ../index.php');
 }

?>