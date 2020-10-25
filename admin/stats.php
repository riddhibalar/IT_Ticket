

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
	$result=$connection->query("select * from issue");
  
	$res = 0;
	$total = 0;
	$totaltime = 0;
	while($result1=$result->fetch_object())
	{
		$total++;
		if ($result1->resolvetime != NULL)
		{
			$res++;
			$totaltime += ($result1->resolvetime - $result1->registertime);
		}
	}
	$avgresolve = $totaltime/$res;

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
								<td>Total Issues: </td><td><?php echo $total ?></td>
							</tr>
							<tr>
								<td>Pending Issues: </td><td><?php echo $total-$res ?></td>
							</tr>
							<tr>
								<td>Resolved Issue: </td><td><?php echo $res ?></td>
							</tr>
							<tr>
								<td>Average time of resolution: </td><td><?php echo secondsToTime(floor($avgresolve)) ?></td>
							</tr>
							<tr>
								<td>Total worktime: </td><td><?php echo secondsToTime($totaltime) ?></td>
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

	function secondsToTime($seconds) {
		$dtF = new \DateTime('@0');
		$dtT = new \DateTime("@$seconds");
		return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes and %s seconds');
	}
?>