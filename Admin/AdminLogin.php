<html>
<head>


<link rel="stylesheet" type="text/css" href="your_website_domain/css_root/flaticon.css">
<script src="https://kit.fontawesome.com/39d1910945.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">

</head>
<!-- Custom StyleSheet -->
<link rel="stylesheet" href="../Admin/CSS/Login.css" />
<link rel="stylesheet" href="./CSS2/flaticon.css" />

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
		
		
		$query = "SELECT * FROM admin WHERE email='$email' and password='$password'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		$count = mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);
		if ($count == 1){
			
			$_SESSION['admin'] = $row["admin_name"];
			$_SESSION['adminid'] = $row["admin_id"];
			
			echo "<script>alert('Logged Into (Admin Panel) Successfully..')</script>";
			echo "<script type='text/javascript'> document.location ='Dashboard.php'; </script>";
			
		}
	}

	  if(isset($_POST['sub'])){

			$email = $_POST['email'];
			$password = $_POST['password'];
			
			
			$query = "SELECT * FROM hr WHERE email='$email' and password='$password'";
			$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
			$count = mysqli_num_rows($result);
			$row = mysqli_fetch_assoc($result);
			if ($count == 1){
				
				$_SESSION['hr'] = $row["hr_name"];
				$_SESSION['hrid'] = $row["hr_id"];
				
				echo "<script>alert('Logged Into (HR Panel) Successfully..')</script>";
				echo "<script type='text/javascript'> document.location ='../HR/Hr_Dashboard.php'; </script>";
		}
		}

		if(isset($_POST['sub'])){

			$email = $_POST['email'];
			$password = $_POST['password'];
			
			
			$query = "SELECT * FROM supplier WHERE email='$email' and password='$password'";
			$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
			$count = mysqli_num_rows($result);
			$row = mysqli_fetch_assoc($result);
			if ($count == 1){
				
				$_SESSION['supplier'] = $row["supplier_name"];
				$_SESSION['supplierid'] = $row["supplier_id"];
				
				echo "<script>alert('Logged Into (Supplier Panel) Successfully..')</script>";
				echo "<script type='text/javascript'> document.location ='../Supplier/Sup_Dashboard.php'; </script>";
		}else
		{
			// If the login credentials don't match, set an error message.
			echo  '<script>alert("Woops! Email or Password is Wrong.")</script>';
		}
	}
	

?>

<body>

<div class="logo">
<img src="../Images/NewLogo.png" alt="">
      </div>
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
      <p class="forgot-password"><a href="ForgotPassword.php">Forgot Password</a></p><br>
			<div class="input-group">
				<button type="submit" name="sub" class="btn">Login</button>
			</div>
		</form>


		<div class="cardBox">
    <div class="card">
		<div class="iconBox">
        <a href="#"><i style="color:#000000;" class="flaticon-hotel-supplier"></i></a>
		<a href="#" class="cardName">Supplier</a>
        </div>
		</div>
	
    <div class="card">
		<div class="iconBox">
		<a href="#"><i style="color:#000000;" class="flaticon-admin-with-cogwheels"></i></a>
		<a href="#" class="cardName">Admin</a>
        </div>
		</div>
	
    <div class="card">
		<div class="iconBox">
        <a href="#"><i style="color: #000000;" class="flaticon-consulting"></i></a>
		<a href="#" class="cardName">HR</a>
        </div>
	    </div>
		</div>


 

</body>
</html>