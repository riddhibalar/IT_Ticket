<?php 
	session_start();
	if(!isset($_SESSION['logged']) || $_SESSION['logged'] != "yup")
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
	$resolver = $_SESSION['resolver'];
	$result=$connection->query("select * from issue where assignment = '$resolver' and resolvetime IS NULL");
?>


<!DOCTYPE html>
<html>
<head>
	<title>View and assign</title>
</head>
<body>
	<form>
		<table>
			<tr>
				<td><b>ID</b></td><td><b>EMAIL</b></td><td><b>SUBJECT</b></td><td><b>REGISTER TIME</b></td><td><b>VIEW</b></td>
			</tr>
		    <?php
			while($result1=$result->fetch_object())
			{
				?>
				<tr>
				<td><?php echo $result1->id?></td>
				<td><?php echo $result1->email?></td>
				<td><?php echo $result1->subject?></td>
				<td><?php echo (date("F d, Y h:i:s A", $result1->registertime))?></td>
				<td><a href="view.php?id=<?php echo $result1->id;?>">view</a></td>
				</tr>

				<?php

			}
			?>

		</table>
	</form>
</body>
</html>

<?php
	}
?>