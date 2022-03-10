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

		<div class="head">
          <h1>Recent Orders</h1>
		  <a style="margin-left:65%;" href="myaccount.php" class="btn">Back</a>
			<div class="container-md myacc">
			<table>
				<thead>
					<tr>
                        <th>Order ID</th>
						<th>Total Price</th>
						<th>Order Status</th>
						<th>Payment Method</th>
            <th>Delivery Method</th>
						<th>Date & Time</th>
						<th>Operations</th>
					</tr>
				</thead>
				<tbody>

				<?php
				$c_id = $_SESSION['customerid'];
				
    $sql = "SELECT * FROM orders INNER JOIN delivery ON orders.delivery_id=delivery.delivery_id WHERE customer_id='$c_id' ORDER BY `orders`.`order_id` DESC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {

            ?>

				  <tr>
                  <td style="color:black;"><?php echo $row["order_id"] ?></td>
			<td>Rs.<?php echo $row["total_price"] ?>.00/=</td>
      <td>
                <span class="status"><?php if($row["order_status"] == 'Cancelled'){?>
                <span style="background:#FF0000; border-radius: 4px; padding: 2px 4px;"><?php echo $row["order_status"] ?></span><?php } ?>
                <?php if($row["order_status"] == 'Delivered'){?>
                <span style="background:#7CFC00;  border-radius: 4px; padding: 2px 4px;"><?php echo $row["order_status"] ?></span><?php } ?>
                <?php if($row["order_status"] == 'In Progress'){?>
                <span style="background:#ffff00;  border-radius: 4px; padding: 2px 4px;"><?php echo $row["order_status"] ?></span><?php } ?>
                <?php if($row["order_status"] == 'Ready To Delivery'){?>
                <span style="background:#FFA500;  border-radius: 4px; padding: 2px 4px;"><?php echo $row["order_status"] ?></span><?php } ?>
                <?php if($row["order_status"] == 'Accepted'){?>
                <span style="background:#ff00ff;  border-radius: 4px; padding: 2px 4px;"><?php echo $row["order_status"] ?></span><?php } ?>
                <?php if($row["order_status"] == 'On The Way'){?>
                <span style="background:pink;  border-radius: 4px; padding: 2px 4px;"><?php echo $row["order_status"] ?></span><?php } ?>
                <?php if($row["order_status"] == 'Order Placed'){?>
                <span style="background:#00BFFF;  border-radius: 4px; padding: 2px 4px;"><?php echo $row["order_status"] ?></span><?php } ?></span>
            </td>
            <td><?php echo $row["payment_method"] ?></td>
            <?php if($row["delivery_id"] == 7){?>
				<td><a style="font-weight:bold; color:black;">---</a></td>
				<?php }else{ ?>
			<td><a style="font-weight:bold; color:black;" href="delivery_details.php?id=<?php echo $row["delivery_id"] ?>"><?php echo $row["method"] ?></a></td>
           <?php } ?>
            <td><?php echo date('M j g:i A', strtotime($row["order_datetime"]));?></td>
            <td><a style="color: #00FA9A;" href="View_Order.php?id=<?php echo $row["order_id"] ?>">View</a>
            <?php if($row["order_status"] != 'Cancelled' && $row["order_status"] != 'Delivered' && $row["order_status"] != 'In Progress' && $row["order_status"] != 'Accepted' && $row["order_status"] != 'Ready To Delivery'){?>
		 |  <a href="Cancel_Order.php?id=<?php echo $row["order_id"] ?>">Cancel</a>
		    <?php } ?></td>
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