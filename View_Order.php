<?php

//Start the Session
session_start();

//including the database connection file.
include_once("Includes/connect.php");

?>

<html>
<head>
<?php include ('Includes/Navigation2.php');

?>
</head>


<body>


<div class="container text-white">
    <h2 class='text-center text-white'>My Account</h2>

		<div class="head">
          <h1>Order Details</h1>
          <a style="margin-left:66%;" href="myaccount.php" class="btn">Back</a>
			<div class="container-md myacc">
			<table>
				<thead>
					<tr>
            <th>Product</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Total Price</th>
					</tr>
				</thead>

				<tbody>
                <?php
				$c_id = $_SESSION['customerid'];

 if(isset($_GET['id'])){
     $o_id = $_GET['id'];
 }


                $sql_orders = "SELECT * FROM orders WHERE order_id='$o_id' AND customer_id='$c_id'";
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
            <img src="Admin/<?php echo  $row_product['product_image'] ?>" alt="">
            <div>
              <br>
              <a style="font-size: 1.6rem; color:black;" href="Product_Details.php?id=<?php echo  $row_product['product_id'] ?>"><?php echo $row_product['product_name']?></a>
              <p style="text-align:left;"><?php echo $row_product['product_size']?>'</p>
            </div>
          </div>
        </td>
            <td>Case : <?php echo $row["quantity"] ?></td>
            <td>Rs.<?php echo $row["product_price"] ?>.00</td>
            <td style="color:black;">Rs.<?php echo $row["quantity"] * $row["product_price"] ?>.00</td>
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
          <td style="color: black; text-align:left; font-weight:550;"><?php echo date('M j g:i A', strtotime($row_orders['order_datetime']));?></td>
        </tr>
      </table>
    </div>
  </div>
			</div>	
			</div>

					</div>
<br>
</br>

  <?php include 'Includes/Footer.php'; ?>

  </body>
  </html>