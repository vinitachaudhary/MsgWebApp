<?php

// Inialize session
session_start();

$con=mysqli_connect("localhost","root","r00t","my_db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
//echo $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Sending Message</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
  </head>
</html>

<?php
$flag=0;
if ($_POST['msg']==NULL or $_POST['allusers']==NULL)
	header('location:ComposeMsg.php');
	
foreach ($_POST['allusers'] as $value)
  {
	$sql="INSERT INTO messages (FromUser, ToUser, Message)
    VALUES
	('$_SESSION[username]','$value','$_POST[msg]')";

	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	$flag=1;
	}
  }

	
if ($flag!=1)
	{?>
	<html>
	<div class="alert alert-block" >
	<h4>Message Sent Successfully !!! 
    <a href="Main.php" class="btn btn-large pull-right" >Continue</a>
  </h4>
  <p>Your message has been successfully sent to all users.</p>
  </div>
	</html>	
	<?php
	}
	?>