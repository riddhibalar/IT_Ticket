<!DOCTYPE html>
<html>
<head>
	<title>Ticket Status</title>
</head>
<body>
	<form action="status.php" method="POST">
	<table align="center">
		<tr>
			<td>Ticket ID</td><td><input type="text" name="id" value=<?php if (isset($_POST['id'])) echo $_POST['id']; ?>></td>
		</tr>
		<tr>
			<td>Password</td><td><input type="Password" name="pass" value=<?php if (isset($_POST['pass'])) echo $_POST['pass']; ?>></td>
		</tr>
		<tr>
			<td><input type="submit" name="submit" value="Go!"></td>
		</tr>
	</table>
	</form>
</body>
</html>

<?php
	if (isset($_POST['id']) && isset($_POST['pass']))
	{
		$id = $_POST['id'];
		$pass = $_POST['pass'];
		$servername = 'localhost';
		$username = 'root';
		$password = '';
		$dbname = 'itticket';
		$conn = new mysqli($servername, $username, $password, $dbname);


		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		

		$stmt = $conn->prepare("select * from issue where id = ? and password = ?");
		$stmt->bind_param("is", $id, $pass);

		$stmt->execute();

		// $stmt->bind_result($a,$b,$c,$d,$e,$f,$g,$h,$i);
		if ($stmt->fetch())
		{
			

			$connection=new mysqli("localhost","root","","itticket");
			if(isset($connection->connect_error))
			{
				echo $connection->connect_error;
				exit;
			}
			$result=$connection->query("select * from issue where id = $id");

			while($result1=$result->fetch_object())
			{
				$email = $result1->email;
				$subject = $result1->subject;
				$description = $result1->description;
				$solution = $result1->resolution;
				$registertime = $result1->registertime;
				$resolvetime = $result1->resolvetime;
			}

			if (is_null($resolvetime))
			{
				?>
					<!DOCTYPE html>
					<html>
					<head>
						<title>View</title>
					</head>
					<body>
						<center>
							<h1>Ticket status: Not resolved</h1>
							<h1>Issue ID: <?php echo $id ?></h1> 
							<h2>Email: <?php echo $email ?></h2> 
							<h2>Subject: <?php echo $subject ?></h2>
							<h3>Register time: <?php echo(date("F d, Y h:i:s A", $registertime)) ?></h3>
							<h4>Description: <?php echo $description ?></h4>
						</center>
					</body>
					</html>
				<?php
			}

			else{
				?>
					<!DOCTYPE html>
					<html>
					<head>
						<title>View</title>
					</head>
					<body>
						<center>
							<h1>Ticket status: Resolved</h1>
							<h1>Issue ID: <?php echo $id ?></h1> 
							<h2>Email: <?php echo $email ?></h2> 
							<h2>Subject: <?php echo $subject ?></h2>
							<h3>Description: <?php echo $description ?></h3>
							<h3>Solution: <?php echo $solution ?></h3>
							<h4>Register time: <?php echo(date("F d, Y h:i:s A", $registertime)) ?></h4>
							<h4>Resolution time: <?php echo(date("F d, Y h:i:s A", $resolvetime)) ?></h4>
							<h4>Period of resolution: <?php echo (secondsToTime($resolvetime-$registertime))?></h4>
						</center>
					</body>
					</html>
				<?php
			}

			///

		}

		else
			echo "<br><center><strong>ID and password don't match</strong></center>";
	}
	// else
	// {
	// 	echo "<center>provide both email and password</center>";
	// 	include 'login.html';
	// }
?>

<?php
	

	function secondsToTime($seconds) {
		$dtF = new \DateTime('@0');
		$dtT = new \DateTime("@$seconds");
		return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes and %s seconds');
	}

 ?>