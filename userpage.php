<?php
$con=mysqli_connect("localhost","root","r00t","my_db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
// Inialize session
session_start();

// // Check, if username session is NOT set then this page will jump to login page
 if (!isset($_SESSION['username'])) {
 header('Location: Main.php');
 }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Messages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
	<style type="text/css">
	
	 </style>
  </head>
<body>
<div class="container">
<div class="span4 well" style="position: relative; top : 200px ;left : 250px">
	<div class="row">
		<div class="span1"><img src="http://critterapp.pagodabox.com/img/user.jpg" alt=""></div>
		<div class="span3">
          	<p><strong><?php echo "Welcome ".$_SESSION['username']." !"?></strong></p>
			<a href="ComposeMsg.php" class="btn btn-primary"><i class="icon-pencil"></i> <strong>Compose Message</strong></a>
			<a href="inbox.php" class="btn btn-primary"><i class="icon-envelope"></i> <strong>View Messages</strong></a>
			<a href="logout.php" class="btn btn-primary"><i class="icon-user"></i> <strong>Logout</strong></a>
		</div>
	</div>
</div>
</div>

</body>

</html>