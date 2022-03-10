<?php

//Start the Session
session_start();
	
//including the database connection file.
include_once("Includes/connect.php"); 

//Check if the submit button is clicked.
if(isset($_POST['sub'])) {  

	$name = $_POST['name'];
  $company = $_POST['company'];
	$mobile_number = $_POST['mobile_number'];
	
	$result = mysqli_query($conn, "UPDATE customer SET name='$name', company='$company', mobile_number='$mobile_number' WHERE customer_id='".$_SESSION['customerid']."'; ;");
 

				
		//redirectig to the display page.
			echo '<script language="javascript">';
			echo 'alert("Updated")';
			echo '</script>';
			echo "<script type='text/javascript'> document.location ='Profile.php'; </script>";
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
$result=mysqli_query($conn,"SELECT * FROM customer where customer_id='$_SESSION[customerid]' ;");
  $row=mysqli_fetch_assoc($result);{

  ?>
  <form method="post">
  <div class="rightbox">
    <div class="profile tabshow">
      <h1>Profile Details</h1>
      <h2>Full Name</h2>
      <input type="text" name="name" class="input" pattern="[a-zA-Z][a-zA-Z ]{2,}" title="--Numbers Not Allowed--" value="<?php echo  $row["name"] ?>">
      <h2>Company Name</h2>
      <input type="text" name="company" class="input" value="<?php echo  $row["company"] ?>">
      <h2>Mobile Number</h2>
      <input type="tel" name="mobile_number" class="input" maxlength="10" pattern="^[0-9]{10}$" title="-Only 10 Digit Mobile Numbers are Allowed-" value="<?php echo $row["mobile_number"];?>">
      <h2>Registered Date & Time</h2>
      <p type="text" style="color:black; font-size:1.5rem;"><?php echo date('M j g:i A', strtotime($row["Registered_Time"]));?></p>

      <?php
      }
      ?>


      <button class="btn" type="submit" name="sub" value="UPDATE">Update</button>
     
      <a href="ChangePassword.php" class="btn">Change Password</a>

    </div>
  </div>
</div>
</form>


<?php include 'Includes/Footer.php'; ?>

</body>
</html>



