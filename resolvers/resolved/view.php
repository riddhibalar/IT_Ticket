<?php 
	session_start();
	if(!isset($_SESSION['logged']) || $_SESSION['logged'] != "yup")
	{
		echo "<center>Session has been expired</center>";
		header('Location: sessionExpiry.html');
	}

	else{
	$id = $_GET['id'];
?>

<?php
	$connection=new mysqli("localhost","root","","itticket");
	if(isset($connection->connect_error))
	{
		echo $connection->connect_error;
		exit;

	}
	$resolver = $_SESSION['resolver'];
	$result=$connection->query("select * from issue where id = $id");
?>

<?php 
	while($result1=$result->fetch_object())
	{
		$email = $result1->email;
		$subject = $result1->subject;
		$description = $result1->description;
		$registertime = $result1->registertime;
		$resolvetime = $result1->resolvetime;
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>View</title>
</head>
<body>
	<center>
		<h1>Issue ID: <?php echo $id ?></h1> 
		<h2>Email: <?php echo $email ?></h2> 
		<h2>Subject: <?php echo $subject ?></h2>
		<h3>Description: <?php echo $description ?></h3>
		<h4>Register time: <?php echo(date("F d, Y h:i:s A", $registertime)) ?></h4>
		<h4>Resolution time: <?php echo(date("F d, Y h:i:s A", $resolvetime)) ?></h4>
		<h4>Period of resolution: <?php echo (secondsToTime($resolvetime-$registertime))?></h4>
	</center>
</body>
</html>

<?php
	}

	function secondsToTime($seconds) {
		$dtF = new \DateTime('@0');
		$dtT = new \DateTime("@$seconds");
		return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes and %s seconds');
	}
?>