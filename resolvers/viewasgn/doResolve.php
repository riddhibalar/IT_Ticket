<?php 
	session_start();
	if(!isset($_SESSION['logged']) || $_SESSION['logged'] != "yup")
	{
		echo "<center>Session has been expired</center>";
		header('Location: sessionExpiry.html');
	}

	else{

?>

<!DOCTYPE html>
<html>
<head>
    <title>Do Resolve</title>
    <link rel="stylesheet" type="text/css" href="textarea.css">
</head>
<body>
    <form action="doResolve.php" method="POST">
    <center>
    <table>
        <tr>
            <td>Solution</td>
            <td>
				<textarea rows = "5" cols = "50" name = "solution" maxlength="255" placeholder="The solution goes here"></textarea>
			</td>
        </tr>
        <tr>
            <td><input type="submit"></td>
        </tr>
    </table>
    </center>
    </form>
</body>
</html>

<?php
    	if(isset($_POST['solution']) && $_POST['solution'] != null)
        {

            $solu = $_POST['solution'];
            $id = $_SESSION['id'];
            try
            {
                $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=itticket','root','');
                $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 	
                echo "Connection is established...<br/>";
                $timestamp = time();
                $sql="update issue set resolution = '$solu', resolvetime = '$timestamp' where id = '$id';";
                // update issue set resolution = '$solu' where id = '$id';
                $query=$dbhandler->query($sql);
               // $num = $dbhandler->query("select id from issue where (registertime = '$timestamp');")->fetch();
     
                // echo "Data is inserted";
                // echo "<b>Your ticketID: ".$num[0]."</b>";

                $fetch = $dbhandler->query("select * from issue where id = '$id';")->fetch();
               
                echo $fetch[0];
                echo $fetch[2];
                echo $fetch[3];
                echo "ihsv";
            }
     
               catch(PDOException $e)
               {
                echo $e->getMessage();
                die();
            }
    
            $to = $fetch[2];
            $esubject = 'Message from ITTicketing system';
            $message = 'Your issue with isuue ID: '.$id.' and subject: '.$fetch[3].' has been resolved.'."\r\n".'Solution: '.$solu." \r\n";
            $headers = "From: no-reply@void.com\r\n";
            if (mail($to, $esubject, $message, $headers)) 
            {
                echo "SUCCESS";
                ?>
                <script type="text/javascript">
                        var result = confirm( "Mail has been sent" );

                        if ( result ) {
                            window.location.replace("mixer.php");
                        } else {
                            window.location.replace("mixer.php");
                        }
                </script>
                <?php
               

            } 
            else 
            {
               echo "ERROR";
            }
        }


?>

<?php
    }
?>