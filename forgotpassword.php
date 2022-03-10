<?php
		
//Start the Session
session_start();
	
//including the database connection file.
include_once("Includes/connect.php");


if(isset($_POST['sub']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $check_email = mysqli_query($conn, "SELECT * FROM customer WHERE email='$email'");
			
    if(mysqli_num_rows($check_email)==1)
    {  
        $query =  mysqli_query($conn,"UPDATE customer SET password='$password' WHERE email='$email'");
        echo '<script>alert("Your Password has been Changed Successfully")</script>';
    

    }elseif(mysqli_num_rows($check_email)==0){
        echo '<script>alert("Invalid Details")</script>';
    }
}
	?>

<script>

function onChange() {
  const password = document.querySelector('input[name=password]');
  const confirm = document.querySelector('input[name=confirm]');
  if (confirm.value === password.value) {
    confirm.setCustomValidity('');
  } else {
    confirm.setCustomValidity('Passwords do not match');
  }
}
</script>

<html>
<head>
<?php include 'Includes/Navigation2.php'; ?>

<!-- Custom StyleSheet -->
<link rel="stylesheet" href="./CSS/Login.css" />
</head>

<body>
<!--forgotpassword Form-->
<div class="Logincontainer">
    <form action="" method="POST" class="login-email">
        <p class="login-text">Reset Password</p>
        <div class="input-group">
            <input type="email" placeholder="Email" name="email" value="" required>
        </div>
        <div class="input-group">
            <input type="password" placeholder="New Password" name="password" value="" onChange="onChange()" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        </div>
        <div class="input-group">
            <input type="password" placeholder="Confirm Password" name="confirm" value="" onChange="onChange()" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        </div>
        <div class="input-group">
            <button type="submit" name="sub" class="btn">Reset Password</button>
        </div>
        <p class="login-register-text">Done Reseting? <a href="Login.php">Login Here</a>.</p>
    </form>
</div>

<?php include 'Includes/Footer.php'; ?>

</body>
</html>