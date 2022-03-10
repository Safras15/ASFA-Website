<?php

//Start the Session
session_start();
	
//including the database connection file.
include_once("Includes/connect.php");

?>

<html>
<head>

<?php include 'Includes/Navigation2.php'; ?>
</head>

<body>
      <!-- Products -->
    <section class="section all-products" id="products">
      <div class="top container">
          <h1>My Wishlist</h1>
          </div>


          <div class="product-center container">

    
<?php 

$c_id = $_SESSION['customerid'];

$sql = "SELECT * FROM wishlist JOIN product on product.product_id=wishlist.pid  WHERE cid='$c_id'";

$result = mysqli_query($conn, $sql);
 
while($row = mysqli_fetch_assoc($result)) {

?> 
<div class="product">
        <div class="product-header">
          <img src="Admin/<?php echo  $row['product_image'] ?>" alt="" />
          <ul class="icons">
          <span><a href="Delete_Wishlist.php?pid=<?php echo $row["product_id"] ?>&cid=<?php echo $_SESSION['customerid'] ?>" class='bx bx-x'></a></span>
          <span><a href='Product_Details.php?id=<?php echo  $row['product_id'] ?>' class='bx bx-caret-right-square'></a></span>
            <?php if($row["product_quantity"] >= 1 ){ ?> 
            <span><a href='AddToCart.php?id=<?php echo  $row["product_id"] ?>' class="bx bx-shopping-bag"></a></span>
            <?php }else{ ?>
               <span><a href="Product_Details.php?id=<?php echo  $row['product_id'] ?>" class='bx bx-error-alt'></a></span>
               <?php  } ?> 
          </ul>
        </div>
        <div class="product-footer"></div>
          <a href="Product_Details.php?id=<?php echo $row['product_id']?>"><h3><?php echo  $row['product_name'] ?></h3></a>
        <h4 class="size">Size: <?php echo  $row['product_size'] ?>'</h4>
        <?php if($row["product_quantity"] >= 1 ){ ?> 
        <h5 class="price">Rs.<?php echo  $row['product_price'] ?>.00</h5>
        <?php }else{ ?>
            <a><h3 style="color:red; font-weight:bold;">Out of Stock</h3></a>
            <?php  } ?> 
      
      </div>
      <?php
                  } 
                
                  ?>
      
            
                  </section>

               
                <br>
                </br>
                <br>
                </br>

<?php include 'Includes/Footer.php'; ?>

</body>
</html> 