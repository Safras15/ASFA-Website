<?php

//Start the Session
session_start();

//including the database connection file.
include_once("Includes/connect.php");

?>

<html>
<head>
<?php include ('Includes/Navigation2.php');

$Cart = $_SESSION['Cart'];

?>
</head>


<body>
       <!-- Cart Items -->
  <div class="container-md cart">
    <table>
      <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Action</th>
      </tr>


    
      <?php
foreach($Cart as $key => $value){

  $sql = "SELECT * FROM product where product_id = $key";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result)
  

        ?>

      <tr>
        <td>
          <div class="cart-info">
            <img src="Admin/<?php echo  $row['product_image'] ?>" alt="">
            <div>
              <br>
              <a style="font-size: 1.8rem;" href="Product_Details.php?id=<?php echo  $row['product_id'] ?>"><?php echo $row['product_name']?></a>
              <p><?php echo $row['product_size']?>'</p>
            </div>
          </div>
        </td>
        <td>Rs.<?php echo $row['product_price']?>.00 </td>
        <td><p>Case : <?php echo $value['quantity']?></p></td>
        <td style="color: black;">Rs.<?php echo $row['product_price'] * $value['quantity'] ?>.00</td>
        <td><a style="background: #f60091; padding: 0.5rem 1.8rem; border-radius: 3rem; color:white;" href='RemoveCart.php?id=<?php echo $key; ?>'>Remove</a></td>
      </tr>

      <?php

$total = $total +  ($row['product_price'] * $value['quantity']);

    }
    
    ?>
     
    </table>

    <div class="total-price">
      <table>
        <tr>
          <td>Delivery Fee</td>
          <td style="color: black;">Free</td>
        </tr>
        <tr>
          <td>Total</td>
          <td style="color: black;">Rs.<?php echo $total; ?>.00/=</td>
        </tr>
      </table>


      <?php 
      if($_SESSION['Cart']){?>
      <a href="Checkout.php" class="checkout btn">Proceed To Checkout</a>
      <?php } ?>
    </div>
  </div>


  <?php include 'Includes/Footer.php'; ?>


  </body>
  </html>