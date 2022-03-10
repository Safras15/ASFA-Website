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
      $driver_name = $_POST['driver_name'];
      $method = $_POST['method'];
      $vehicle_number = $_POST['vehicle_number'];
      $mobile_number = $_POST['mobile_number'];
      $address = $_POST['address'];
      $delivery_id = $_POST['hiddenID'];

      $sql = "INSERT INTO delivery (driver_name, method, vehicle_number, mobile_number, address)
      VALUES ('$driver_name', '$method', '$vehicle_number', '$mobile_number', '$address')";

$sql = "UPDATE delivery SET driver_name='$driver_name', method='$method', vehicle_number='$vehicle_number',  
mobile_number='$mobile_number', address='$address' WHERE delivery_id='$delivery_id'";

      if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Updated Successfully..')</script>";
        echo "<script type='text/javascript'> document.location ='Delivery_Details.php'; </script>";

} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}

if(isset($_GET['id'])){
    $delivery_id = $_GET['id'];
   $sql = "SELECT * FROM delivery WHERE delivery_id='$delivery_id'";
   $result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

}


?>
<br>
</br>

<div class="offset-md-3 col-lg-6">
<div class="card">
<div class="card-header">
<h1>Edit Delivery Method</h1>
</div>
<div class="offset-md-1 col-lg-9">
<section id="content ">
	<div class="ocontent-blog bg-white py-3">
		<div class="container"> 
        		<form method="post" enctype="multipart/form-data">
                <input type="hidden" name='hiddenID' value='<?php echo $delivery_id?>'>
			  <div class="form-group">
			    <label for="Drivername">Driver Name</label>
			    <input style="font-size:1.4rem;" type="text" class="form-control" value='<?php echo $row['driver_name']; ?>' name="driver_name" id="driver_name" placeholder="Driver Name" pattern="[a-zA-Z][a-zA-Z ]{2,}" title="--Numbers Not Allowed--">
			  </div>
              <div class="form-group">
			    <label for="Method">Method</label>
			    <input style="font-size:1.4rem;" type="text" class="form-control" value='<?php echo $row['method']; ?>' name="method" id="method" placeholder="Delivery Method">
			  </div>
              <div class="form-group">
			    <label for="vehiclenumber">Vehicle Number</label>
			    <input style="font-size:1.4rem;" type="text" class="form-control" value='<?php echo $row['vehicle_number']; ?>' name="vehicle_number" id="vehicle_number" placeholder="Vehicle Number">
			  </div>
              <div class="form-group">
			    <label for="mobilenumber">Mobile Number</label>
			    <input style="font-size:1.4rem;" type="tel" class="form-control" value='<?php echo $row['mobile_number']; ?>' name="mobile_number" id="mobile_number" placeholder="Mobile Number" maxlength="10" pattern="^[0-9]{10}$" title="-Only 10 Digit Mobile Numbers are Allowed-">
			  </div>
			  <div class="form-group">
			    <label for="address">Address</label>
			    <textarea style="font-size:1.4rem;" class="form-control" name="address" rows="3"><?php echo $row['address']; ?></textarea>
			  </div>
			
			  
        <br>
			  <button style="margin-left: 23%; font-size: 2rem; width: 54%;" type="submit" name='submit' class="btn btn-default">Edit Delivery Method</button>
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
<br>
</br>
<?php include 'Includes/Footer.php'; ?>


</body>
</html>  