<?php

// Inialize session
session_start();

$con=mysqli_connect("localhost","root","r00t","my_db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $selectuser = $_GET['fromuser'];
  
  $sql = mysqli_query($con,"SELECT * FROM messages WHERE ((FromUser = '".$selectuser."') and (ToUser='".$_SESSION['username']."')) or ((ToUser = '".$selectuser."') and (FromUser='".$_SESSION['username']."')) ORDER BY MsgID");
 ?>
 <!DOCTYPE html>
<html>
  <head>
    <title>Account Creation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
  </head>
  </br>
  
  <?php
  while($row = mysqli_fetch_array($sql))
  {
  if ($row['FromUser']!=$_SESSION['username'])
  {echo "<div class=row-fluid><div class=span12><div class=span6 style=background:PaleGreen><p>From : ".$row['FromUser']."</p>";
  echo "<p>".$row['Message']."</p></div><div class=span6></div></div></div></br>"; 
  }
  else
  {echo "<div class=row-fluid><div class=span12><div class=span6></div><div class=span6 style=background:Pink><p>From : ".$row['FromUser']."</p>";
  echo "<p>".$row['Message']."</p></div></div></div></br>";
  }
  }
  ?>
  <html>
  <div class="row-fluid">
  <div class="span12"><div class="span6"></div><div class="span6">
  <form action="sendmsg.php" method="post">
  <textarea name="msg" id="msg" rows="5" ></textarea></br></html>
  <?php
  echo "<input type=hidden name=allusers[] value=".$selectuser.">";?>
  <html>
  <input type="submit" value="Send">
  </form>
  </div>
  </div>
  </div>
  </html>
  