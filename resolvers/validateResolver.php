<?php

	$array = array(
		"Alpha" => "pass",
		"Beta" => "pass",
		"Gamma" => "pass",
		"Delta" => "pass",
	);

	if (isset($_POST['email']) && isset($_POST['pass']))
	{

		if (array_key_exists($_POST['email'], $array))
		{
			if ($array[$_POST['email']] == $_POST['pass'])
			{
				echo "Good";
				session_start();
				$_SESSION["logged"] = "yup";
				$_SESSION["resolver"] = $_POST['email'];
				header('Location: dashboard.php');
			}
			else
			{
				echo "<center>invalid email or password</center>";
				include 'login.html';
			}
		}
		else
		{
			echo "<center>invalid email or password</center>";
			include 'login.html';
		}
	}
	else
	{
		echo "<center>provide both email and password</center>";
		include 'login.html';
	}
 ?>
