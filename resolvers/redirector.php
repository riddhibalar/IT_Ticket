<?php 
	session_start();
	if(!isset($_SESSION['logged']) || $_SESSION['logged'] != "yup")
	{
		echo "<center>Session has been expired</center>";
		include 'login.html';
	}

	else
?>

<?php
	if(!isset($_GET['dropdown']))
	{
		echo "<center>Select option</center>";
		include 'dashboard.php';	
	}

	header('location: /project/resolvers/'.$_GET['dropdown'].'/'.$_GET['dropdown'].'.php');

?>
