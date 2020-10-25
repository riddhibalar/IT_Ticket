<?php 
	session_start();
	if(!isset($_SESSION['logged']) || $_SESSION['logged'] != "yes")
	{
		header('Location: sessionExpiry.html');
	}

	else
	{
?>


<?php
	$connection=new mysqli("localhost","root","","itticket");
	if(isset($connection->connect_error))
	{
		echo $connection->connect_error;
		exit;

	}
	$result=$connection->query("select * from issue where resolution IS NULL");
  
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
								<th class="column1">ID</th>
								<th class="column2">Email</th>
								<th class="column3">Subject</th>
								<th class="column4">Date</th>
								<th class="column5">Time</th>
								<th class="column6">View</th>
								
							</tr>
						</thead>
						<tbody>
							<?php
							while($result1=$result->fetch_object())
							{
								if($result1->resolvetime == NULL)
								{
									?>
									<tr>
										<td class="column1"><?php echo $result1->id?></td>
										<td class="column2"><?php echo $result1->email?></td>
										<td class="column3"><?php echo $result1->subject?></td>
										<td class="column4"><?php echo (date("F d, Y", $result1->registertime))?></td>
										<td class="column5"><?php echo (date("h:i:s A", $result1->registertime))?></td>
										<td class="column6"><a href="mixer2.php?id=<?php echo $result1->id;?>">view</a></td>
									</tr>
									<!-- <tr>
										<td><?php echo $result1->id?></td>
										<td><?php echo $result1->email?></td>
										<td><?php echo $result1->subject?></td>
										<td><?php echo (date("F d, Y h:i:s A", $result1->registertime))?></td>
										<td><a href="view.php?id=<?php echo $result1->id;?>">view</a></td>
									</tr> -->

									<?php
								}
							}
							?>

								
							
								
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