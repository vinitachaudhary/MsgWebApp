<?php
$con=mysqli_connect("localhost","root","r00t","my_db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Account Creation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
  </head>
</html>

<?php
$sql="INSERT INTO Users (Username, Name, Password)
VALUES
('$_POST[username]','$_POST[name]','".md5($_POST['password'])."')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }

 else
	{?>
	<html>
	<div class="alert alert-block" >
	<h4>Account Created Successfully !!! 
    <a href="Main.php" class="btn btn-large pull-right" >Continue</a>
  </h4>
  <p>Your Acount has been created successfully.</p>
  </div>
	</html>	
	
	<?php }
mysqli_close($con);
?>
