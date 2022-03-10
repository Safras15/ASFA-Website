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

<script src="https://kit.fontawesome.com/39d1910945.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">

<!-- Custom StyleSheet -->
<link rel="stylesheet" href="../Admin/CSS/Style.css" />
</head>
<body>

<div class="head">
          <h1>All Orders</h1>
          <a style="margin-left:68%;" href="Orders.php" class="btn">Back</a>
<div class="container-md cart">
<table>
           <thead>
               <tr>
                        <th>Product</th>
                        <th>Price</th>
						<th>Quantity</th>
						<th>Total Price</th>
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
             <td>Rs.<?php echo $row["product_price"] ?>.00</td>
            <td>Case : <?php echo $row["quantity"] ?></td>
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

       <br>
       <div class="total-price">
      <table>
        <tr>
          <td style="font-size:2rem; font-weight:600;">Total Price : </td>
          <td style="color: black; padding: 5px 50px; text-align:right; font-size:2rem;  font-weight:550;">Rs.<?php echo  $row_orders['total_price'] ?>.00/=</td>
        </tr>
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
            <br>
    </br>
    <br>
            </br>

<?php include 'Includes/Footer.php'; ?>


</body>
</html>  