<?php

//Start the Session
session_start();
	
//including the database connection file.
include_once("Includes/connect.php");

if(!isset($_SESSION['customer']) && empty($_SESSION['customer']) ){
  header('location:Login.php');
 }

?>

<html>
<head>
<?php include 'Includes/Navigation2.php'; ?>


<!-- Custom StyleSheet -->
<link rel="stylesheet" href="./css/Style.css" />
</head>

<body>

<?php

$message  = '';

if(isset($_POST['submit'])){
	 
	 
	$order_id = $_POST['order_id'];
    $reason = $_POST['reason'];
    $order_status = 'Cancelled';

 
    $insertCancel = "INSERT INTO order_tracking (order_id, order_status, reason )
	VALUES ('$order_id', '$order_status', '$reason')";  

	if(mysqli_query($conn, $insertCancel)){
    $up_sql = "UPDATE orders SET order_status='Cancelled'  WHERE order_id=$order_id";
 mysqli_query($conn, $up_sql);

 echo "<script>alert('Your placed order has been Cancelled..')</script>";
 echo "<script type='text/javascript'> document.location ='myaccount.php'; </script>";

    }

}
 

$cid =$_SESSION['customerid'];

$sql = "SELECT * FROM customer where customer_id = $cid";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


 ?>


<div class="container text-white">
    <h2 class='text-center text-white'>My Account</h2>

		<div class="head">
          <h1>Cancel Order</h1>
		  <form method='post'>
      <?php echo $message ?>
			<div class="container-md cancel">
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
                  $prodID = $row["product_id"] 
 			?>

      

       <tr>
       <td>

       <?php 
                        
                        $sql_product = "SELECT * FROM product  WHERE product_id='$prodID'";
                        $result_prod = mysqli_query($conn, $sql_product);
                      
                     $row_prod = mysqli_fetch_assoc($result_prod);
                     
                      
                        
                        ?>


          <div class="cart-info">
            <img src="Admin/<?php echo  $row_prod['product_image'] ?>" alt="">
            <div>
              <br>
              <a style="font-size: 1.6rem; color:black;" href="Product_Details.php?id=<?php echo  $row_prod['product_id'] ?>"><?php echo $row_prod['product_name']?></a>
              <p style="text-align:left;"><?php echo $row_prod['product_size']?>'</p>
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
          <td style="color: black; text-align:left; font-weight:550;"><?php echo date('M j g:i A', strtotime($row_orders["order_datetime"]));?></td>
        </tr>
      </table>

    </div>
  </div>
			</div>	
			</div>

					</div>
					<div class="container-md reason">		
						<br>	
			<label>Reason for cancelling the Order</label>
			<br>
 		 <textarea class="form-control" name='reason' id="" cols="62" rows="4" placeholder="Type...."></textarea>
		  </div>
		  <div class="reasonbtn">
		  <input type="hidden" name='order_id' value='<?php echo $_GET['id'] ?>'>
                <input type='submit' name='submit' value='Cancel Order' class="btn">
				</div>
			</form>
				<br>
			</br>
<?php include 'Includes/Footer.php'; ?>
    
</body>
</html>