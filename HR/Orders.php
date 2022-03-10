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
<link rel="stylesheet" href="../HR/CSS/Style.css" />
</head>
<body>

<div class="head">
          <h1>All Orders</h1>
<div class="container-md cart">
<table>
           <thead>
               <tr>
                   <th>ID</th>
                   <th>Name</th>
                   <th>Product Details</th>
                   <th>Total Price</th>
                   <th>Order Status</th>
                   <th>Payment Method</th>
                   <th>Payment Slip</th>
                   <th>Delivery Address</th>
                   <th>Date & Time</th>
                   <th>Operations</th>
               </tr>
           </thead>
           <tbody>

           <?php
    $sql = "SELECT * FROM orders JOIN customer ON orders.customer_id=customer.customer_id ORDER BY `orders`.`order_id` DESC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {

            ?>
         <tr>
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

            <?php if($row["payment_method"] == 'Bank Deposit'){?>
            <!--<td><a style="color: #00FA9A;" href='View_Paymentslip.php?id='>Image</a></td>-->

            <td> <?php
            echo "<a href=\"View_Paymentslip.php?id=$row[order_id]\">Image</a>"
            ?>
            </td>
                <?php }else{ ?>
                    <td>No image</td>
                    <?php } ?>
            <td><?php echo $row["address"] ?></td>
            <td><?php echo date('M j g:i A', strtotime($row["order_datetime"]));?></td>
            <td><a href='Order_Process.php?id=<?php echo $row["order_id"] ?>'>Check Payment</a> 
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