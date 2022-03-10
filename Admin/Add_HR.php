<?php
//Start the Session
session_start();
	
//including the database connection file.
include_once("Includes/connect.php");

if(!isset($_SESSION['admin']) && empty($_SESSION['admin']) ){
  header('location:AdminLogin.php');
 }
?>


<html>
<head>
<?php include 'Includes/Navigation2.php'; ?>

<script src="https://kit.fontawesome.com/39d1910945.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- Custom StyleSheet -->
<link rel="stylesheet" href="./css/Style.css" />
</head>
<body>

<?php

if(isset($_POST['submit'])){
      $hr_name = $_POST['hr_name'];
      $email = $_POST['email'];
      $mobile_number = $_POST['mobile_number'];
      $address = $_POST['address'];
      $password = $_POST['password'];


      $sql = "INSERT INTO hr (hr_name, email, mobile_number, address, password)
      VALUES ('$hr_name', '$email', '$mobile_number', '$address', '$password')";

      if (mysqli_query($conn, $sql)) {
        echo "<script>alert('New HR Account Added Successfully..')</script>";
        echo "<script type='text/javascript'> document.location ='Create_Accounts.php'; </script>";

} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}


?>
<br>
</br>

<div class="offset-md-3 col-lg-6">
<div class="card">
<div class="card-header">
<h1>Create HR Account</h1>
</div>
<div class="offset-md-1 col-lg-9">
<section id="content ">
	<div class="ocontent-blog bg-white py-3">
		<div class="container"> 
        <?php
        if(isset($message)){
            ?>
    <div class="alert alert-success"><?php echo $message ?></div>
        <?php
        }
        ?>
        		<form method="post" enctype="multipart/form-data" action='Add_HR.php'>
			  <div class="form-group">
			    <label for="Hrname">HR Name</label>
			    <input style="font-size:1.4rem;" type="text" class="form-control" name="hr_name" id="hr_name" placeholder="HR Name" pattern="[a-zA-Z][a-zA-Z]{2,}" title="--Numbers Not Allowed--">
			  </div>
              <div class="form-group">
			    <label for="Email">Email</label>
			    <input style="font-size:1.4rem;" type="email" class="form-control" name="email" id="email" placeholder="Email Address">
			  </div>
              <div class="form-group">
			    <label for="mobilenumber">Mobile Number</label>
			    <input style="font-size:1.4rem;" type="tel" class="form-control" name="mobile_number" id="mobile_number" placeholder="Mobile Number" maxlength="10" pattern="^[0-9]{10}$" title="-Only 10 Digit Mobile Numbers are Allowed-">
			  </div>
			  <div class="form-group">
			    <label for="address">Address</label>
			    <textarea style="font-size:1.4rem;" class="form-control" name="address" rows="3"></textarea>
			  </div>
              <div class="form-group">
			    <label for="Password">Password</label>
			    <input style="font-size:1.4rem;" type="password" class="form-control" name="password" id="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
			  </div>
			
			  
        <br>
			  <button style="margin-left: 23%; font-size: 2rem; width: 54%;" type="submit" name='submit' class="btn btn-default">Create HR Account</button>
			<br>
			</br>
			</form>
			
		</div>
	</div>

</section>
</div>
</div>
</div>

<br>
</br>
<br>
</br>
<br>
</br>

<?php include 'Includes/Footer.php'; ?>


</body>
</html>  