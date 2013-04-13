<?php

// Inialize session
session_start();
/*
// Check, if user is already login, then jump to secured page
if (isset($_SESSION['username'])) {
header('Location: userpage.php');
}
*/
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
<table class="table table-condensed table-hover" style="text-align:center">
  <thead>
    <tr>
      <th class="span9" >Select User</th>
	</tr>
  </thead>
  <tbody>
    <tr>

<?php 
$sql= mysqli_query($con,"SELECT * FROM users");

while($row = mysqli_fetch_array($sql))
{
$sql1 = mysqli_query($con,"SELECT * FROM messages WHERE ((FromUser = '".$row['Username']."')and (ToUser='".$_SESSION['username']."')) or((ToUser = '".$row['Username']."') and (FromUser='".$_SESSION['username']."'))"); 

if (mysqli_num_rows($sql1)>0 && $row['Username']!=$_SESSION['username'])
	echo '<td><a href="seemsg.php?fromuser=', urlencode($row['Username']), '">'.$row['Name']."</a><td></tr><tr>";
		
}
?>
</tbody>
</table>
</html>



 
 