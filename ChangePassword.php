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
        echo "<script type='text/javascript'> document.location ='Profile.php'; </script>";

    }elseif(mysqli_num_rows($check_email)==0){
        echo '<script>alert("Invalid Details")</script>';
    }
}

	?>

<html>
<head>
<?php include 'Includes/Navigation2.php'; ?>
</head>

<body>
<!--My Profile-->

<div class="profile-container">
  <div class="leftbox">
    <nav>
      <a onclick="tabs(0)" class="tab active">
        <i class='bx bxs-user'></i>
      </a>
    </nav>
  </div>

  <form method="post">
  <div class="rightbox">
    <div class="profile tabshow">
      <h1>Change Password</h1>
      <h2 style="font-size: 2rem;">Email</h2>
      <div class="input-group">
            <input style="font-size: 1.7rem; width:60%; height: 3.2rem;" type="email" placeholder="Email" name="email" value="" required>
        </div>
        <br>
        <h2 style="font-size: 2rem;">New Password</h2>
        <div class="input-group">
            <input style="font-size: 1.7rem; width:60%; height: 3.2rem;" type="password" placeholder="New Password" name="password" value="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        </div>


<br>
      <button class="btn" type="submit" name="sub" value="UPDATE">Change Password</button>
     

    </div>
  </div>
</div>
</form>


<?php include 'Includes/Footer.php'; ?>

</body>
</html>



