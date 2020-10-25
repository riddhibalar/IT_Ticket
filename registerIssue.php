<!DOCTYPE html>
<html>
<head>
	<title>Register Issue</title>
</head>
<body>
	<center>
		<h1>What's the issue?</h1>
		<form action="registerIssue.php" name="form1" onsubmit="required()" method="POST">
			<table>
				<tr>
					<td>Email</td><td><input type="text" name="email" placeholder="Enter your email-ID" pattern="[^0-9][A-Za-z0-9]+@[a-z]+.[a-z]+?.[a-z]+"></td>
				</tr>
				<tr>
					<td>Subject</td><td><input type="text" name="subject" placeholder="What's your issue about?"></td>
					
				</tr>
				<tr><td>Issue catagory</td>
					<td>
						<select name="catagory">
							<option value="Alpha">Alpha</option>
							<option value="Beta">Beta</option>
							<option value="Gamma">Gamma</option>
							<option value="Delta">Delta</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Description</td>
					<td>
						<textarea rows = "5" cols = "50" name = "description" maxlength="500" placeholder="Eleborate the issue"></textarea>
					</td>
				</tr>
				<tr>
					<td>Enter Code <img src="captcha.php"></td><td><input type="text" name="vercode1"/></td>
				</tr>
				<tr>
					<td><input type="submit" name="submit" value="Submit Issue"></td>
				</tr>
			</table>
		</form>
	</center>
	
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
	
<?php 
  
	$timestamp = time()+12600; 
	echo($timestamp); 
	echo "\n"; 
	echo(date("F d, Y h:i:s A", $timestamp)); 

	session_start();

	if (isset($_POST['vercode1']) && isset($_SESSION['vercode']))
	{
		if ($_POST['vercode1'] == $_SESSION['vercode'])
		{
			echo "<br>Correct captcha<br>";
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
		echo $catagory;

		try
    	{
        	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=itticket','root','');
        	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 	
        	echo "Connection has been established.<br/>";
        	$sql="insert into issue (email,password,subject,description,registertime,assignment) values ('$email','$password','$subject','$desc','$timestamp','$catagory')";
        	$query=$dbhandler->query($sql);
        	$num = $dbhandler->query("select * from issue where (registertime = '$timestamp');")->fetch();
 
        	echo "Data has been inserted into the database.";
        	echo "<br><b>TicketID: ".$num[0]."</b>";
    		echo "<br><b>Password: ".$password."</b>";
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
		   echo "<br>Email has been sent";
		} 
		else
		{
		   echo "<br>Email error";
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