<?php

// Inialize session
session_start();

$con=mysqli_connect("localhost","root","r00t","my_db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql= mysqli_query($con,"SELECT * FROM users");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Compose Message</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
  </head>
</html>
<div class="container">
<form class="well span8" action="sendmsg.php" method="post">
  <div class="row">
		<div class="span3">
		<ul class="nav nav-list"> 
		  <li class="nav-header">Users</li>  
 
<?php while($row = mysqli_fetch_array($sql))
{
if ($row['Username'] != $_SESSION['username'])
	echo "<li><input type=checkbox name=allusers[] value= $row[Username]>$row[Name]</li>";
}
?>
		</div>
		<div class="span5">
		<label>Message</label>
		<textarea name="msg" id="message" class="input-xlarge span5" rows="10"></textarea>
		
		</div>
	
		<button type="submit" class="btn btn-primary pull-right">Send</button>
   </div>
</form>
</div>
</body>
</html>
