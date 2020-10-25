<!DOCTYPE html>
<html>
<head>
	<title>Status</title>
	<link rel="stylesheet" type="text/css" href="status_style.css">
</head>
<body>
	<h1 style="margin-top: 90px; margin-left: 400px;"><font color="black" style="font-size: 100px; font-family: Arial Unicode MS; font-weight: normal;">HELP</font><font color="green" style="font-size: 50px;">desk</font></h1>

	<nav id="menu" style="padding-top: 15px; padding-left: 450px;">
		<a style="font-size: 25px;" href="regiss.php">HOME</a>
		<a style="font-size: 25px;" href="statis.php">STATUS</a>
		<a style="font-size: 25px;" href="feedback.php">FEEDBACK</a>
		<a style="font-size: 25px;" href="#">FAQ</a>
		<a style="font-size: 25px;" href="#">CONTACT</a>
		<!-- <div class="line" style="transform: translate(-252px,-10px);"></div> -->
	</nav>

	<center><h4 style="font-size: 40px; color: #3b3b3b; font-family: Arial; font-weight: normal; letter-spacing: 2px; word-spacing: 5px; padding-top: 40px;">TICKET STATUS</h4><br>
			<h6 style="font-size: 20px; color: #3b3b3b; font-family: sans-serif; font-weight: normal; letter-spacing: 5px; word-spacing: 7px; transform: translateY(-100px);">Enter ticket id and password</h6>
	</center>

	<center>
		<form action="statis.php" name="form1" onsubmit="required()" method="POST">
	<div style="transform: translateY(-100px);" class="div2">
		<div class="div1" style="padding-top: 0px;"><img src="ticket.png"></div>
		<div class="div1"><img src="password.png"></div>

		<div style="transform: translateY(-140px);"><input type="text" class="round" name="id" placeholder="Enter ticket ID"></div>

		<div style="transform: translateY(-100px);"><input type="password" class="round" name="pass" placeholder="Enter password"></div>
	
		<div style="transform: translateY(-50px); padding-left: 25px;">
		<input type="submit" name="submit" value="GO!!">
		</div>
	</div>
</form>
	</center>


	<div style="padding-top: 300px; transform: translateY(320px);">
	<footer class="footer-basic-centered">

			<p class="footer-company-motto">Help for a better WORLD !!</p>

			<p style="font-size: 30px; opacity: .7" class="footer-links">
				<a href="regiss.php">Home</a>
				__
				<a href="statis.php">Status</a>
				__
				<a href="feedback.php">Feedback</a>
				__
				<a href="#">Faq</a>
				__
				<a href="#">Contact</a>
			</p>
			<div style="padding-bottom: 20px; padding-top: 50px;">
			<p style="font-size: 50px;" class="footer-company-name"><font color="black">HELP</font><font color="green">desk</font> &copy; 2019</p>
			<p style="font-size: 15px; opacity: .5" class="footer-company-name"><font color="white">Email:helpdesk21@gmail.com</font></p>
		</div>
		</footer>
</div>
</body>
</html>

<script type="text/javascript">
function required()
{
	var id = document.forms["form1"]["id"].value;
	var pass = document.forms["form1"]["pass"].value;
	
	if (id == "")
	{
		alert("Please input id");
		return false;
	}

	if (pass == "") 
	{
		alert("Please provide password");
		return false;
	}
}
</script>

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
		if ($stmt->fetch())
		{
			

			$connection=new mysqli("localhost","root","","itticket");
			if(isset($connection->connect_error))
			{
				//echo $connection->connect_error;
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
						<link rel="stylesheet" type="text/css" href="status_style.css">
					</head>
					<body>
						<center>
						<div style="transform: translateY(-800px);"><font face="sans-serif" color="#173f5f">
							<h1>Ticket status: Not resolved</h1>
							<h1>Issue ID: <?php echo $id ?></h1> 
							<h2>Email: <?php echo $email ?></h2> 
							<h2>Subject: <?php echo $subject ?></h2>
							<h2>Register time: <?php echo(date("F d, Y h:i:s A", $registertime)) ?></h3>
							<h2>Description: <?php echo $description ?></h3>
						</div>
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
						<div style="transform: translateY(-800px);"><font face="sans-serif" color="#173f5f">
							<h1>Ticket status: Resolved</h1>
							<h1>Issue ID: <?php echo $id ?></h1> 
							<h2>Email: <?php echo $email ?></h2> 
							<h2>Subject: <?php echo $subject ?></h2>
							<h2>Description: <?php echo $description ?></h3>
							<h2>Solution: <?php echo $solution ?></h3>
							<h3>Register time: <?php echo(date("F d, Y h:i:s A", $registertime)) ?></h4>
							<h4>Resolution time: <?php echo(date("F d, Y h:i:s A", $resolvetime)) ?></h4>
							<h3>Period of resolution: <?php echo (secondsToTime($resolvetime-$registertime))?></h4></div>
						</font>
						</div>
						</center>
					</body>
					</html>
				<?php
			}
		}

		else
			?>
			<!DOCTYPE html>
			<html>
			<head>
				<title>Status</title>
			</head>
			<body>
				<script type="text/javascript">
					alert("ID and password don't match");
					return false;
				</script>
			</body>
			</html>
			<!-- echo "<br><center><strong>ID and password don't match</strong></center>"; -->

			<?php
	}
?>

<?php
	

	function secondsToTime($seconds) {
		$dtF = new \DateTime('@0');
		$dtT = new \DateTime("@$seconds");
		return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes and %s seconds');
	}

 ?>