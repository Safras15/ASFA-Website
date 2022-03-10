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
          <h1>All Orders</h1>
<div class="container-md cart">
<table>
           <thead>
               <tr style="font-size:1.7rem;">
                   <th>ID</th>
                   <th>Name</th>
                   <th>Product Details</th>
                   <th>Total Price</th>
                   <th>Order Status</th>
                   <th>Payment Method</th>
                   <th>Delivery Method</th>
                   <th>Delivery Address</th>
                   <th>Date & Time</th>
                   <th>Operations</th>
               </tr>
           </thead>
           <tbody>

           <?php
    $sql = "SELECT orders.order_id, customer.name, orders.total_price, orders.order_status, orders.payment_method, orders.delivery_id, delivery.method, orders.delivery_address, orders.order_datetime 
    FROM orders JOIN customer ON orders.customer_id=customer.customer_id INNER JOIN delivery ON delivery.delivery_id=orders.delivery_id ORDER BY `orders`.`order_id` DESC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {

            ?>
         <tr style="font-size:1.5rem;">
            <td style="color:black;"><?php echo $row["order_id"] ?></td>
            <td><?php echo $row["name"]?></td>
            <td><a style="color: #00FA9A;" href='View_Order.php?id=<?php echo $row["order_id"] ?>'>View</a> 
            <td>Rs.<?php echo $row["total_price"] ?></td>
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
            <td><a style="font-weight:bold; color:black;" value="<?php echo $row["delivery_id"] ?>"><?php echo $row["method"] ?></a></td>
            <?php } ?>
            <td><?php echo $row["delivery_address"] ?></td>
            <td><?php echo date('M j g:i A', strtotime($row["order_datetime"]));?></td>
            <td><a style="color:red;" href='Order_Process.php?id=<?php echo $row["order_id"] ?>'>Change Status</a> 
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


    <br>
    </br>
    <br>

<?php include 'Includes/Footer.php'; ?>


</body>
</html>  