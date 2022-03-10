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

<!-- Custom StyleSheet -->
<link rel="stylesheet" href="../Admin/CSS/Style.css" />
</head>
<body>

<div class="head">
          <h1>Delivery Details</h1>
          <a href="../Admin/Add_Delivery_Method.php" class="btn">+ Add Delivery</a>
</div>
<div class="container-md cart">
    <table>
				<thead>
                  <tr>
                      <th>ID</th>
                      <th>Driver Name</th>
                      <th>Method</th>
                      <th>Vehicle Number</th>
                      <th>Mobile Number</th>
                      <th>Address</th>
                      <th>Action</th>
      </tr>
				</thead>
				<tbody>

                <?php
    $sql = "SELECT * FROM delivery ORDER BY `delivery`.`delivery_id` ASC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {

            ?>
      
        <tr>
        <td style="color:black;"><?php echo $row["delivery_id"] ?></td>
        <td><?php echo $row['driver_name']?></td>
        <td><?php echo $row['method']?></td>
        <td><?php echo $row['vehicle_number']?></td>
        <td><?php echo $row['mobile_number']?></td>
        <td><?php echo $row['address']?></td>
            <td><a style="color: #00FA9A;" href='Edit_Delivery.php?id=<?php echo $row["delivery_id"] ?>'>Edit</a> 
            | <a href='Delete_Delivery.php?id=<?php echo $row["delivery_id"] ?>'>Delete</a></td>
        </tr>

        
        <?php
        }
      } else {
        echo "0 results";
      }


?>

			 
				</tbody>
			</table>
    </div>

    <br>
    </br>

<?php include 'Includes/Footer.php'; ?>
</body>
</html>  