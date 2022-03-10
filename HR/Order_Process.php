<?php

//Start the Session
session_start();
	
//including the database connection file.
include_once("Includes/connect.php");

if(!isset($_SESSION['hr']) && empty($_SESSION['hr']) ){
    header('location:../Admin/AdminLogin.php');
   }

?>

<html>
<head>
<?php include 'Includes/Navigation2.php'; ?>


<!-- Custom StyleSheet -->
<link rel="stylesheet" href="../HR/CSS/Style.css" />
</head>

<body>

<?php


if(isset($_POST['submit'])){
	 
        $order_id = $_POST['order_id']; 
		$reason = $_POST['reason']; 
		$order_status = $_POST['order_status']; 

		$insertCancel = "INSERT INTO order_tracking (order_id, reason, order_status) 
        VALUES ('$order_id', '$reason', '$order_status')";

        if(mysqli_query($conn, $insertCancel)){

		$up_sql = "UPDATE orders SET order_status='$order_status' WHERE order_id = $order_id";
        mysqli_query($conn, $up_sql);
        echo "<script>alert('The Order is Accepted...')</script>";
		echo "<script type='text/javascript'> document.location ='Orders.php'; </script>";
		}
    
}

?>


		<div class="head">
          <h1>Check Payment</h1>
          <a style="margin-left:64%;" href="Orders.php" class="btn">Back</a>
		  <form method='post'>
          <div class="container-md cancel">
			<table>
				<thead>
					<tr>
                        <th>Product</th>
						<th>Quantity</th>
						<th>Total Price</th>
						<th>Order Status</th>
                        <th>Payment Method</th>
					</tr>
				</thead>
				<tbody>

                <?php

                if(isset($_GET['id'])){
                $o_id = $_GET['id'];
                }

                $sql_orders = "SELECT * FROM orders WHERE order_id='$o_id'";
				$result_orders = mysqli_query($conn, $sql_orders);
                $row_orders = mysqli_fetch_assoc($result_orders);
  
				$sql = "SELECT * FROM orderitems WHERE order_id='$o_id'";
				$result = mysqli_query($conn, $sql);
			  
				if (mysqli_num_rows($result) > 0) {
			 
				while($row = mysqli_fetch_assoc($result)) {
                $product_id = $row["product_id"]; 

 		     	?>
             
            
           <tr>
            <td>

                <?php

                $sql_product = "SELECT * FROM product WHERE product_id = '$product_id'";
                $result_product = mysqli_query($conn, $sql_product);
                $row_product = mysqli_fetch_assoc($result_product);

                ?>

          <div class="cart-info">
            <img src="../Admin/<?php echo  $row_product['product_image'] ?>" alt="">
            <div>
              <br>
              <a style="font-size: 1.6rem; color:black;"><?php echo $row_product['product_name']?></a>
              <p style="text-align:left;"><?php echo $row_product['product_size']?>'</p>
            </div>
          </div>
        </td>
            <td>Case : <?php echo $row["quantity"] ?></td>
            <td style="color:black;">Rs.<?php echo $row["quantity"] * $row["product_price"] ?>.00</td>
            <td><?php echo $row_orders["order_status"] ?></td>
            <td><?php echo $row_orders["payment_method"] ?></td>
        </tr>
        <?php
			   }
			   } else {
				 echo "0 results";
			   }
			 ?>
      
				</tbody>
			</table>

            <div class="total-price">
      <table>
        <tr>
          <td style="font-size:1.7rem; font-weight:600;">Total Price : </td>
          <td style="color: black; text-align:left; font-weight:550;">Rs.<?php echo  $row_orders['total_price'] ?>.00/=</td>
        </tr>
        <tr>
        <td style="font-size:1.7rem; font-weight:600;">Order Status :</td>
          <td style="color: black; text-align:left; font-weight:550;"><?php echo  $row_orders['order_status'] ?></td>
        </tr>
        <tr>
        <td style="font-size:1.7rem; font-weight:600;">Date & Time :</td>
          <td style="color: black; text-align:left; font-weight:550;"><?php echo date('M j g:i A', strtotime($row_orders["order_datetime"]));?></td>
        </tr>
      </table>

    </div>
          </div>
			</div>	


		   <div class="container-md reason">
               <br>

           <label for="sel1">Change Status:</label>
           <select style="font-size: 1.6rem; width: 20%; color:black;" class="form-control" name="order_status">
           <option value='Accepted' selected>Accepted</option>
           <option value='Cancelled'>Cancelled</option>
           </select>

		   <br>	
           </br>

		   <label>Reason</label>
		   <br>
 		   <textarea class="form-control" name='reason' id="" cols="62" rows="3" placeholder="Type...."></textarea>
		   </div>
		   <div class="reasonbtn">
		   <input type="hidden" name='order_id' value='<?php echo $_GET["id"] ?>'>
           <input type='submit' name='submit' value='Change Status' class="btn">
		   </div>
		   </form>

		   <br>
		   </br>
           <br>
            </br>
            <br>
            </br>
<?php include 'Includes/Footer.php'; ?>
    
</body>
</html>