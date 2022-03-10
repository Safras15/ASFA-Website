<?php

//Start the Session
session_start();
	
//including the database connection file.
include_once("Includes/connect.php");

if(!isset($_SESSION['customerid'])){
	echo '<script>window.location.href = "Login.php";</script>';
}
?>

<html>
<head>
<?php include 'Includes/Navigation2.php';
?>

</head>

<body>

<div class="container text-white">
    <h2 class='text-center text-white'>My Account</h2>

			<div class="container text-white">
			<div class="head">
          <h1>Delivery Details</h1>
		  <a style="margin-left:64%;" href="myaccount.php" class="btn">Back</a>
          <div class="container-md billd">
			
				<?php
                $_SESSION['deliveryid'] = $row["delivery_id"];
                
				if(isset($_GET['id'])){
                    $delivery_id = $_GET['id'];

                    $sql = "SELECT * FROM delivery WHERE delivery_id = '$delivery_id'";
                    $result = mysqli_query($conn, $sql);
                  
                    $row = mysqli_fetch_assoc($result);
                
                   
            ?>
            <table>
				<thead>
					<tr>
						<th>Full Name :</th>
						<td><?php echo $row["driver_name"] ?></td>
					</tr>
					<tr>
						<th>Method :</th>
						<td><?php echo $row["method"] ?></td>
					</tr>
					<tr>
						<th>Vehicle Number :</th>
						<td><?php echo $row["vehicle_number"] ?></td>
					</tr>
					<tr>
						<th>Mobile Number :</th>
						<td><?php echo $row["mobile_number"] ?></td>
					</tr>
					<tr>
						<th>Address :</th>
						<td><?php echo $row["address"] ?></td>
					</tr>
				</thead>
			</table>	
	</div>	
    <?php
                }           
            ?>
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
<br>
</br>
<br>
</br>

<?php include 'Includes/Footer.php'; ?>

</body>
</html>