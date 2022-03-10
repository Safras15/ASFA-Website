<?php

//Start the Session
session_start();
	
//including the database connection file.
include_once("Includes/connect.php");

//Check if the submit button is clicked.
if(isset($_POST['sub'])) {  
   
    //Inputs from the from	
    $name = $_POST['name'];
    $email = $_POST['email'];	
    $company = $_POST['company'];	
	$mobile_number = $_POST['mobile_number'];
    $password = $_POST['password'];
	
	$result = mysqli_query($conn, "INSERT INTO customer (name,email,company,mobile_number,status,password)
	VALUES('$name','$email','$company','$mobile_number','Active','$password')");
		
    if ($result) {
        
      echo "<script>alert('Wow! User Registration Completed.')</script>";
      echo "<script type='text/javascript'> document.location ='Login.php'; </script>";
    } else {
      echo "<script>alert('Woops! Email Already Exists.')</script>";
    }
  }
?>

<html>
<head>
<?php include 'Includes/Navigation2.php'; ?>

<!-- Custom StyleSheet -->
<link rel="stylesheet" href="./CSS/Login.css" />
</head>
  
<body>
<!--Login Form-->
<div class="Logincontainer">
    <form action="" method="POST" class="login-email">
        <p class="login-text">Register</p>
        <div class="input-group">
            <input type="text" placeholder="Username" name="name" pattern="[a-zA-Z][a-zA-Z ]{2,}" title="--Numbers Not Allowed--" value="" required>
        </div>
        <div class="input-group">
            <input type="email" placeholder="Email" name="email" value="" required>
        </div>
        <div class="input-group">
            <input type="text" placeholder="Company" name="company" value="" required>
        </div>
        <div class="input-group">
            <input type="tel" placeholder="Mobile Number" name="mobile_number" maxlength="10" pattern="^[0-9]{10}$" title="-Only 10 Digit Mobile Numbers are Allowed-" value="" required>
        </div>
        <div class="input-group">
            <input type="password" placeholder="Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" value="" required>
        </div>
        <div class="input-group">
            <button type="submit" name="sub" class="btn">Register</button>
        </div>
        <p class="login-register-text">Have an account? <a href="Login.php">Login Here</a>.</p>
    </form>
</div>

<?php include 'Includes/Footer.php'; ?>

</body>
</html>