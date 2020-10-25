<?php
	if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['desc']))
	{
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$feedback = $_POST['desc'];
		try
    	{
        	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=itticket','root','');
        	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 	
        	//echo "Connection has been established.<br/>";
        	$sql="insert into feedback (fname,lname,email,feedback) values ('$fname','$lname','$email','$feedback')";
        	$query=$dbhandler->query($sql);
        	//$num = $dbhandler->query("select id from issue where (registertime = '$timestamp');")->fetch();
 			
 			// echo "<script>"
 			// echo "alert(\"";
    //     	echo "Issue has been registered database.";
    //     	echo "Catagory: ".$catagory;
    //     	echo "<b>Your ticketID: ".$num[0]."</b>";
    //     	echo "<br><b>Password: ".$password."</b>";
    // 		echo "\")</script>"

    		?>
    			<!-- <script type="text/javascript">
    				alert ("Issue has been registered in our database.\nCatagory: <?php echo($catagory) ?>\nTicket ID: <?php echo($num[0]) ?>\nPassword: <?php echo($password) ?>")
    			</script> -->
    		<?php
		}
 
   		catch(PDOException $e)
   		{
        	echo $e->getMessage();
        	die();
    	}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>
	<link rel="stylesheet" type="text/css" href="style.css">
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

	<center><h4 style="font-size: 40px; color: #3b3b3b; font-family: Arial; font-weight: normal; letter-spacing: 2px; word-spacing: 5px; padding-top: 50px;">ENTER YOUR FEEDBACK</h4></center>

	<center>
	<div class="div3">
		<!-- <div class="div4">
			<img src="feedback.png">
		</div> -->

		<form action="feedback.php" name="form1" onsubmit="required()" method="POST">
		
		<h1 style=" padding-left: 80px; font-family: Prestige Elite Std;">Firstname</h1>
		<div style="padding-left: 80px;"><input type="text" class="round" name="fname" placeholder="Enter Firstname"></div>

		<h1 style=" padding-left: 80px;  font-family: Prestige Elite Std;">Lastname</h1>
		<div style="padding-left: 80px;"><input type="text" class="round" name="lname" placeholder="Enter Lastname"></div>

		<h1 style=" padding-left: 80px; font-family: Prestige Elite Std;">Email</h1>
		<div style="padding-left: 80px;"><input type="email" class="round" name="email" placeholder="Enter your email-ID" ></div>

		<h1 style=" padding-left: 80px; font-family: Prestige Elite Std;">Description</h1>
		<div style="padding-left: 80px;"><textarea rows = "5" cols = "50" class="tround" name = "desc" maxlength="500" placeholder="Enter your feedback"></textarea></div>

		<div style="padding-top: 100px; padding-left: 80px;">
			<center><input type="submit" name="submit" value="GO!!" name=""></center>
		</div>
		</form>
	</div>
	</center>


	<div style="padding-top: 300px;">
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
	var fname = document.forms["form1"]["fname"].value;
	var lname = document.forms["form1"]["lname"].value;
	var email = document.forms["form1"]["email"].value;
	var desc = document.forms["form1"]["desc"].value;

	if (fname == "")
	{
		alert("Please provide Firstname");
		return false;
	}

	if (lname == "") 
	{
		alert("Please provide Lastname");
		return false;
	}

	if (email == "") 
	{
		alert("Please provide email");
		return false;
	}

	if (desc == "") 
	{
		alert("Please provide the feedback");
		return false;
	}
	else
	{
		alert("Thank you for the feedback");
		return false;
	}
}
</script>