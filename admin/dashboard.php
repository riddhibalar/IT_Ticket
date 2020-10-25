<?php 
	session_start();
	if(!isset($_SESSION['logged']) || $_SESSION['logged'] != "yes")
	{
		echo "<center>Session has been expired</center>";
		include 'adminLogin.html';
	}
	else
	{
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="drop.css">
	<title>Welcome, Admin!</title>
</head>
	<form action="redirector.php" method="GET">
		<body>
			<!-- <h1>What would you like to do?</h1>
			<select name="dropdown">
				<option value="viewasgn">Pending Issues</option>
				<option value="resolved">Resolved Issues</option>
			</select>
			<input type="submit" name="submit" value="Go!"> -->
			<br><br><br><br><br><br><br><br>
			<div>
				<ul class='dropdown'>
			     <li id="top"><a href='/project/admin/dashboard.php'>What would you like to see?</a>
			     	<span></span>
			        <ul class="dropdown-box">
			           <li><a href='/project/admin/viewasgn/mixer.php'>Pending Issues</a></li>
			           <li><a href='/project/admin/resolved/mixer.php'>Resolved Issues</a></li>
			           <li><a href='viewfeedback.php'>View Feedback</a></li>
			           <li><a href='stats.php'>Statistics</a></li>
			           <li><a href='adminLogin.html'>Logout</a></li>
			        </ul>
			     </li>
		  		</ul>
			</div>  

		</body>
	</form>
</html>

<?php
	}
?>