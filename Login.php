<html>
<head>
<?php include 'Includes/Navigation2.php'; ?>

<!-- Custom StyleSheet -->
<link rel="stylesheet" href="./CSS/Login.css" />
</head>

<?php

//Start the Session
session_start();
	
//including the database connection file.
include_once("Includes/connect.php");


//if the form is submitted
if (isset($_POST['sub'])){
		
		//Assigning posted values to variables.
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		
		$query = "SELECT * FROM customer WHERE email='$email' and password='$password'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		$count = mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);
		
		
		if($row["status"] == 'Blocked'){

			echo '<script>alert("Your account is blocked, Contact Administrator....")</script>';

		}elseif ($count == 1){
			
			$_SESSION['customer'] = $row["name"];
			$_SESSION['customerid'] = $row["customer_id"];
			
			echo "<script>alert('Logged In Successfully..')</script>";
			echo "<script type='text/javascript'> document.location ='Index.php'; </script>";
			

		}else
		{
			// If the login credentials don't match, set an error message.
			echo  '<script>alert("Woops! Email or Password is Wrong.")</script>';
		}
		
	}
?>

<body>
<!--Login Form-->
<div class="Logincontainer">
		<form action="" method="POST" class="login-email">
			<p class="login-text">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="" required>
			</div>
      <p class="forgot-password"><a href="forgotpassword.php">Forgot Password</a></p><br>
			<div class="input-group">
				<button type="submit" name="sub" class="btn">Login</button>
			</div>
      
			<p class="login-register-text">Don't have an account? <a href="SignUp.php">Register Here</a>.</p>
		</form>
	</div>


  <?php include 'Includes/Footer.php'; ?>

</body>
</html>