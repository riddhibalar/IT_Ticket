<?php 
	session_start();
	if(!isset($_SESSION['logged']) || $_SESSION['logged'] != "yes")
	{
		echo "<center>Session has been expired</center>";
		include 'adminLogin.html';
	}

	else{
?>

<?php
	if(!isset($_GET['dropdown']))
	{
		echo "<center>Select option</center>";
		include 'dashboard.php';	
	}

	header('location: /project/admin/'.$_GET['dropdown'].'/'.$_GET['dropdown'].'.php');
	}	
?>
