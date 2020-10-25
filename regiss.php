<?php 
  
	$timestamp = time()+12600; 
	//echo($timestamp); 
	//echo "\n"; 
	//echo(date("F d, Y h:i:s A", $timestamp)); 

	session_start();

	if (isset($_POST['vercode1']) && isset($_SESSION['vercode']))
	{
		if ($_POST['vercode1'] == $_SESSION['vercode'])
		{
			//echo "<br>Correct captcha<br>";
		}
		else
		{
			?>
				<script type="text/javascript">
					alert("Sorry your issue was't registered as you captcha was incorrect.")
				</script>
			<?php
			// echo "<br>Sorry your issue was't registered as you captcha was incorrect.<br>";
		}
	}

	if(isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['description']) && $_POST['email'] != null && $_POST['subject'] != null && $_POST['description'] != null && isset($_POST['vercode1']) && isset($_SESSION['vercode']) && $_POST['vercode1'] == $_SESSION['vercode'])
	{
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$desc = $_POST['description'];
		$catagory = $_POST['catagory'];
		$password = randomStrings(10);
		//echo $catagory;

		try
    	{
        	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=itticket','root','');
        	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 	
        	//echo "Connection has been established.<br/>";
        	$sql="insert into issue (email,password,subject,description,registertime,assignment) values ('$email','$password','$subject','$desc','$timestamp','$catagory')";
        	$query=$dbhandler->query($sql);
        	$num = $dbhandler->query("select id from issue where (registertime = '$timestamp');")->fetch();
 			
 			// echo "<script>"
 			// echo "alert(\"";
    //     	echo "Issue has been registered database.";
    //     	echo "Catagory: ".$catagory;
    //     	echo "<b>Your ticketID: ".$num[0]."</b>";
    //     	echo "<br><b>Password: ".$password."</b>";
    // 		echo "\")</script>"

    		?>
    			<script type="text/javascript">
    				alert ("Issue has been registered in our database.\nCatagory: <?php echo($catagory) ?>\nTicket ID: <?php echo($num[0]) ?>\nPassword: <?php echo($password) ?>")
    			</script>
    		<?php
		}
 
   		catch(PDOException $e)
   		{
        	echo $e->getMessage();
        	die();
    	}

    	$to = $email;
		$esubject = 'Message from ITTicketing system';
		$message = 'Issue subject: '.$subject." \r\n".'Issue description: '.$desc."\r\n".'Your issue has been registered. It will soon get resolved.'." \r\n".'Isuue ID: '.$num[0]." \r\n".'Password: '.$password;
		$headers = "From: no-reply@void.com\r\n";
		if (mail($to, $esubject, $message, $headers)) 
		{
			?>
			<script type="text/javascript">
		   		alert ("Email sent");
		   	</script>
		   	<?php
		}
		else
		{
			?>
			<script type="text/javascript">
		   		alert ("Email error");
		   	</script>
			<?php
		}
	}
?>

<?php
	function randomStrings($length_of_string) 
	{ 

		$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 

		return substr(str_shuffle($str_result),  
		0, $length_of_string); 
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Register Issue</title>
	<link rel="stylesheet" type="text/css" href="style.css">
<body>
	<h1 style="margin-top: 90px; margin-left: 400px;"><font color="black" style="font-size: 100px; font-family: Arial Unicode MS; font-weight: normal;">HELP</font><font color="green" style="font-size: 50px;">desk</font></h1>

	<nav id="menu" style="padding-top: 15px; padding-left: 450px;">
		<a style="font-size: 25px;" href="regiss.php">HOME</a>
		<a style="font-size: 25px;" href="statis.php">STATUS</a>
		<a style="font-size: 25px;" href="feedback.php">FEEDBACK</a>
		<a style="font-size: 25px;" href="/project/admin/adminLogin.html">Admin Login</a>
		<a style="font-size: 25px;" href="/project/resolvers/login.html">Resolver Login</a>
		<!-- <div class="line" style="transform: translate(-252px,-10px);"></div> -->
	</nav>
	
	<center><h4 style="font-size: 40px; color: #3b3b3b; font-family: Arial; font-weight: normal; letter-spacing: 2px; word-spacing: 5px; padding-top: 50px;">WHAT'S THE ISSUE?</h4></center>

	<center>
	<div class="div2">
		<div class="div1">
			<img src="side.jpg">
		</div>

		<form action="regiss.php" name="form1" onsubmit="required()" method="POST">
		<h1 style="transform: translateY(-500px); padding-left: 300px; font-family: Prestige Elite Std;">Email</h1>
		<div style="padding-left: 300px;"><input style="transform: translateY(-500px);" type="email" class="round" name="email" placeholder="Enter your email-ID" pattern="[^0-9][A-Za-z0-9]+@[a-z]+.[a-z]+?.[a-z]+"></div>

		<h1 style="transform: translateY(-500px); padding-left: 300px;  font-family: Prestige Elite Std;">Subject</h1>
		<div style="padding-left: 300px;"><input style="transform: translateY(-500px);" type="text" class="round" name="subject" placeholder="What's your issue about?"></div>

		<h1 style="transform: translateY(-500px); padding-left: 300px;  font-family: Prestige Elite Std;">Issue catagory</h1>
		<div style="padding-left: 300px;"><select class="round" style="transform: translateY(-500px);" name="catagory">
			<option value="Alpha">Alpha</option>
			<option value="Beta">Beta</option>
			<option value="Gamma">Gamma</option>
			<option value="Delta">Delta</option>
		</select></div>

		<h1 style="transform: translateY(-500px); padding-left: 300px; font-family: Prestige Elite Std;">Description</h1>
		<div style="padding-left: 300px;"><textarea style="transform: translateY(-500px); rows = "5" cols = "50" class="tround" name = "description" maxlength="500" placeholder="Eleborate the issue"></textarea></div>

		<h1 style="transform: translateY(-500px); padding-left: 300px;  font-family: Prestige Elite Std;">Enter Code<br><img style="padding-left: 0px; width: 100px; height: 50px; padding-top: 16px;" src="captcha.php"></h1>
		<div style="padding-left: 300px; padding-top: 16px;"><input style="transform: translateY(-530px);" class="round" type="text" name="vercode1" placeholder="Enter code" />

		<div style="padding-top: 100px; padding-left: 0px;">
			<div style="transform: translateY(-530px);">
			<center><input type="submit" name="submit" value="SUBMIT ISSUE"></center>
			</div>
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
	var email = document.forms["form1"]["email"].value;
	var sub = document.forms["form1"]["subject"].value;
	var desc = document.forms["form1"]["description"].value;

	if (email == "")
	{
		alert("Please input email");
		return false;
	}

	if (sub == "") 
	{
		alert("Please provide subject");
		return false;
	}
	if (desc == "") {
		alert("Please provide description");
		return false;
	}
	else 
	{
		alert("Thank you! Your issue will be soon resolved");
		return true; 
	}
}
</script>
	
