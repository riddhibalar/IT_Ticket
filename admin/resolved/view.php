<?php 
	session_start();
	if(!isset($_SESSION['logged']) || $_SESSION['logged'] != "yes")
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
	// $resolver = $_SESSION['resolver'];
	$result=$connection->query("select * from issue where id = $id");
?>

<?php 
	if($result1=$result->fetch_object())
	{
		$email = $result1->email;
		$subject = $result1->subject;
		$description = $result1->description;
		$solution = $result1->resolution;
		$registertime = $result1->registertime;
		$resolvetime = $result1->resolvetime;
	}
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styletable.css">
	<title>View</title>
</head>
<body>
		<br><br><br>
		<table align="center" cellpadding="4" cellspacing="4" class="expanded">
			<tr>
				<td>Issue ID: </td><td><?php echo $id ?></td>
			</tr>
			<tr>
				<td>Email: </td><td><?php echo $email ?></td>
			</tr>
			<tr>
				<td>Registration time: </td><td><?php echo(date("F d, Y h:i:s A", $registertime)) ?></td>
			</tr>
			<tr>
				<td>Resolution time: </td><td><?php echo(date("F d, Y h:i:s A", $resolvetime)) ?></td>
			</tr>
			<tr>
				<td>Subject: </td><td><?php echo $subject ?></td>
			</tr>
			<tr>
				<td>Description: </td><td><?php echo $description ?></td>
			</tr>
			<tr>
				<td>Solution: </td><td><?php echo $solution ?></td>
			</tr>
			<tr>
				<td>Period of resolution: </td><td><?php echo (secondsToTime($resolvetime-$registertime))?></td>
			</tr>
		</table>
</body>
<!-- <body>
	<center>
		<h1>Issue ID: <?php echo $id ?></h1> 
		<h2>Email: <?php echo $email ?></h2> 
		<h2>Subject: <?php echo $subject ?></h2>
		<h3>Description: <?php echo $description ?></h3>
		<h3>Solution: <?php echo $solution ?></h3>
		<h4>Register time: <?php echo(date("F d, Y h:i:s A", $registertime)) ?></h4>
		<h4>Resolution time: <?php echo(date("F d, Y h:i:s A", $resolvetime)) ?></h4>
		<h4>Period of resolution: <?php echo (secondsToTime($resolvetime-$registertime))?></h4>
	</center>
</body> -->
</html>

<?php
	}

	function secondsToTime($seconds) {
		$dtF = new \DateTime('@0');
		$dtT = new \DateTime("@$seconds");
		return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes and %s seconds');
	}
?>