<?php 
	if (isset($_POST['email']) && isset($_POST['pass']))
	{
		if ($_POST['email'] == "user1" && $_POST['pass'] == "admin")
		{
			echo "Good";
			session_start();
			$_SESSION["logged"] = "yes";
			header('Location: dashboard.php');
		}
		else
		{
			echo "<center>invalid email or password</center>";
			include 'adminLogin.html';
		}
	}
	else
	{
		echo "<center>provide both email and password</center>";
		include 'adminLogin.html';
	}
 ?>
