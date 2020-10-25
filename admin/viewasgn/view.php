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
	$result=$connection->query("select * from issue where id = $id");
?>

<?php
	while($result1=$result->fetch_object())
	{
		$email = $result1->email;
		$subject = $result1->subject;
		$description = $result1->description;
		$registertime = $result1->registertime;
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
				<td>Register time: </td><td><?php echo(date("F d, Y h:i:s A", $registertime)) ?></td>
			</tr>
			<tr>
				<td>Subject: </td><td><?php echo $subject ?></td>
			</tr>
			<tr>
				<td>Description: </td><td><?php echo $description ?></td>
			</tr>
		</table>
</body>
</html>

<?php
	}
?>