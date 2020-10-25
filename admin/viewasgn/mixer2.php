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


<!-- Start -->
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Table V01</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">Key</th>
								<th class="column2">Value</th>
								
								
							</tr>
						</thead>
						<tbody>
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
								
							
								
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>


<!-- End -->


<?php
	}
?>