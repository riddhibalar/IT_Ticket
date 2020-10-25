<?php 
	session_start();
	if(!isset($_SESSION['logged']) || $_SESSION['logged'] != "yup")
	{
		echo "<center>Session has been expired</center>";
		header('Location: sessionExpiry.html');
	}

	else{
		if(isset($_GET['id']))
		{
			$_SESSION['id'] = $_GET['id'];
			$id = $_SESSION['id'];
		}
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
	<title>View</title>
</head>
<body>
	<center>
		<h1>Issue ID: <?php echo $id ?></h1> 
		<h2>Email: <?php echo $email ?></h2> 
		<h2>Subject: <?php echo $subject ?></h2>
		<h3>Register time: <?php echo(date("F d, Y h:i:s A", $registertime)) ?></h3>
		<h4>Description: <?php echo $description ?></h4>
		<h4><a href="doResolve.php?id=<?php echo $_SESSION['id'];?>">Resolve</a></h4>
	</center>
</body>
</html>

<?php
	}
?>