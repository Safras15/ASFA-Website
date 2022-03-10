<?php

//Start the Session
session_start();
	
//including the database connection file.
include_once("Includes/connect.php"); 

if(!isset($_SESSION['hr']) && empty($_SESSION['hr']) ){
  header('location:../Admin/AdminLogin.php');
}

//Check if the submit button is clicked.
if(isset($_POST['sub'])) {  

	$hr_name = $_POST['hr_name'];
  $email = $_POST['email'];
	$mobile_number = $_POST['mobile_number'];
  $address = $_POST['address'];
	
	$result = mysqli_query($conn, "UPDATE hr SET hr_name='$hr_name', email='$email', mobile_number='$mobile_number', address='$address' WHERE hr_id='".$_SESSION['hrid']."'; ;");
 

				
		//redirectig to the display page.
			echo '<script language="javascript">';
			echo 'alert("Updated Successfully...")';
			echo '</script>';
			echo "<script type='text/javascript'> document.location ='../HR/Hr_Profile.php'; </script>";
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

<?Php
$result=mysqli_query($conn,"SELECT * FROM hr where hr_id='$_SESSION[hrid]' ;");
  $row=mysqli_fetch_assoc($result);{

  ?>
  <form method="post">
  <div class="rightbox">
    <div class="profile tabshow">
      <h1>Profile Details</h1>
      <h2>Full Name</h2>
      <input type="text" name="hr_name" class="input" pattern="[a-zA-Z][a-zA-Z ]{2,}" title="--Numbers Not Allowed--" value="<?php echo  $row["hr_name"]; ?>">
      <h2>Email</h2>
      <input type="email" name="email" class="input" value="<?php echo  $row["email"]; ?>">
      <h2>Mobile Number</h2>
      <input type="tel" name="mobile_number" class="input" maxlength="10" pattern="^[0-9]{10}$" title="-Only 10 Digit Mobile Numbers are Allowed-" value="<?php echo $row["mobile_number"];?>">
      <h2>Address</h2>
      <input type="text" name="address" class="input" value="<?php echo $row["address"];?>">
      <h2>Created Date & Time</h2>
      <p type="text" style="color:black; font-size:1.5rem;"><?php echo date('M j g:i A', strtotime($row["created_time"]));?></p>

      <?php
      }
      ?>


      <button class="btn" type="submit" name="sub" value="UPDATE">Update</button>
     
      <a href="../HR/Hr_Change_Password.php" class="btn">Change Password</a>

    </div>
  </div>
</div>
</form>


<?php include 'Includes/Footer.php'; ?>

</body>
</html>



