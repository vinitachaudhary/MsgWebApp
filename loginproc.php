<?php
  
// Inialize session
session_start();

$con=mysqli_connect("localhost","root","r00t","my_db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Retrieve username and password from database according to user's input
$login = mysqli_query($con,"SELECT * FROM users WHERE (Username = '" .$_POST['username'] . "') and(Password = '".mysql_real_escape_string(md5($_POST['password'])) ."') "); 

// Check username and password match
if (mysqli_num_rows($login)==1)
 {
// Set username session variable
$_SESSION['username'] = $_POST['username'];
// Jump to  userpage
header('Location: userpage.php');
}
else {
// Jump to login page
header('Location: Main.php');
}

?>