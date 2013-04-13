<?php

// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['username'])) {
header('Location: userpage.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Signup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
	<style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 80px auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
	</style>
	<link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
  </head>
 </html>

<?php 

$con=mysqli_connect("localhost","root","r00t");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
// Create database
/*$sql="CREATE DATABASE my_db";

if (mysqli_query($con,$sql))
  {
  echo "Database my_db created successfully";
  }
else
  {
  echo "Error creating database: " . mysqli_error($con);
  }
 */ 
 mysqli_query($con,"USE my_db");
/*
// Create table
$sql = "CREATE TABLE Users 
(
Username VARCHAR(30) NOT NULL , 
PRIMARY KEY(Username),
Name VARCHAR(30),
Password VARCHAR(50)
)";
// Execute query
if (mysqli_query($con,$sql))
  {
  echo "Table users created successfully";
  }
else
  {
  echo "Error creating table: " . mysqli_error($con);
  }
  */
  //mysqli_query($con,"DROP DATABASE my_db");
  
/*$sql1 = "CREATE TABLE Messages 
(
MsgID INT NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(MsgID),
FromUser VARCHAR(20),
ToUser VARCHAR(20),
Message TEXT
)";
// Execute query
if (mysqli_query($con,$sql1))
  {
  echo "Table msgs created successfully";
  }
else
  {
  echo "Error creating table: " . mysqli_error($con);
  }*/
  
  //mysqli_query($con,"USE my_db.users");
  
 /* $result = mysqli_query($con,"SELECT * FROM users
WHERE Name='Vinita Chaudhary'");

while($row = mysqli_fetch_array($result))
  {
  echo $row['Name'] . " " . $row['Username'];
  echo "<br>";
  }
  */
 ?> 
 <body>
 <div class="container">
 <a href='signup.php'><button class="btn btn-large btn-primary" style="background:red ; position: relative; left: 600px; top: 75px;" >Create Account</button></a>
 <form class="form-signin" method="POST" action="loginproc.php">
 <h2 class="form-signin-heading">Please sign in</h2>
 <input type="text" name="username" class="input-block-level" placeholder="Username">
 <input type="password" name="password" class="input-block-level" placeholder="Password">
 <button class="btn btn-large btn-primary" type="submit" style="position: relative; left: 100px">Sign in</button>
 </form>
 </div>
 </body>
 </html>