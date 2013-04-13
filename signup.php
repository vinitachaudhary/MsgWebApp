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
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
	<style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }
	  
	  h2 {text-align:center;}

      .form-signin {
        
        padding: 19px 29px 29px;
        margin: 20px 400px 20px;
        
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
 
	<script>
        function validate(form) {
		var e = form.elements;
		var div=document.getElementById("error");
		/* Your validation code. */

		if(e['password'].value != e['ConfirmPassword'].value) {
		div.innerHTML="Passwords do not match !!!!!";
		return false;
		}
		
		<?php
		$sql = mysqli_query($con,"SELECT * FROM users");
		while($row = mysqli_fetch_array($sql))
		{?>
		php_user = "<?php echo $row['Username']; ?>";
		if(e['username'].value == php_user) {
		
		div.innerHTML="Username not available !!! Please choose another username";
		return false;
		}
		<?php } ?>
		return true;
		}
    </script>
  <body>
	<div class="container">
	<form class="form-signin" onSubmit="return validate(this);" action="insert.php" method="post">
		<h2>Create an Account</h2><br/>
		<div class="alert alert-error" id="error" style="background:#f5f5f5; border:#f5f5f5"></div>
		<table border="0">
		<tr><td>Name</td><td>:</td><td><input type="text" size="30" name="name"></td></tr>
		<tr><td>Username</td><td>:</td><td><input type="text" size="30" name="username"></td></tr>
		<tr><td>Password</td><td>:</td><td><input type="password" size="30" id="password" name="password"></td></tr>
		<tr><td>Confirm Password</td><td>:</td><td><input type="password" size="30" id="ConfirmPassword" name="ConfirmPassword"></td></tr>
		</table><br/>
		<button class="btn btn-large btn-primary" type="submit" style="position: relative; left: 100px">Create Account</button>
		</fieldset>
    </form>
	</div>
   </body>
</html>