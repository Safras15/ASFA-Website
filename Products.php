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
          <h1>All Products</h1>
      <form action="Search.php" method="GET">
            <input value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="input" type="text" name="search" placeholder="Search here......." required>
            <button type="submit" name="submit" class="btn">Search</button> 
          </form>
          </div>


<div class="product-center container">
    
<?php 

$sql = "SELECT * FROM product limit 10";
if(isset($_GET['id'])){
    $product_id = $_GET['id'];
   
}

$result = mysqli_query($conn, $sql);
 
while($row = mysqli_fetch_assoc($result)) {

?> 

<div class="product">
        <div class="product-header">
          <img src="Admin/<?php echo  $row['product_image'] ?>" alt="" />
          <ul class="icons">
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

          
  <section class="pagination">
    <div class=" container">
        <ul>
          <span>More</span>
        <li><span><a href="./Products.php" class='bx bx-right-arrow-alt'></a></span></li>
      </ul>
        
    </div>
</section>

<?php include 'Includes/Footer.php'; ?>

</body>
</html> 