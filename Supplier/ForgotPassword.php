<?php
		
//Start the Session
session_start();
	
//including the database connection file.
include_once("Includes/connect.php");


		if(isset($_POST['sub']))
		{
			if(mysqli_query($conn,"UPDATE supplier SET password='$_POST[password]' WHERE email='$_POST[email]';"))
			{
				
				echo '<script>alert("Your Password has been Changed Successfully")</script>';
			
			}
			else{
				echo '<script>alert("Invalid Details")</script>';
			}
			
		}
	?>

<html>
<head>


<!-- Custom StyleSheet -->
<link rel="stylesheet" href="../Supplier/CSS/Login.css" />
</head>

<body>
<div class="logo">
<img src="../Images/logo.jpg" alt="">
      </div>
<!--forgotpassword Form-->
<div class="Logincontainer">
    <form action="" method="POST" class="login-email">
        <p class="login-text">Reset Password</p>
        <div class="input-group">
            <input type="email" placeholder="Email" name="email" value="" required>
        </div>
        <div class="input-group">
            <input type="password" placeholder="New Password" name="password" value="" required>
        </div>
        <div class="input-group">
            <input type="password" placeholder="Confirm Password" name="password" value="" required>
        </div>
        <div class="input-group">
            <button type="submit" name="sub" class="btn">Reset Password</button>
        </div>
        <p class="login-register-text">Done Reseting? <a href="SupLogin.php">Login Here</a>.</p>
    </form>
</div>



</body>
</html>