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

if (isset($_GET['search'])){
    $search = $_GET['search'];
    $sql = "SELECT * FROM product JOIN category ON product.cat_id=category.cat_id where product_name LIKE '%$search%' or product_size LIKE '%$search%' or cat_name LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);
    

if(mysqli_num_rows($result) > 0){
    foreach($result as $row)
    {

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
        <h5 class="price">Rs.<?php echo  $row['product_price'] ?>.00</h5>
      </div>

<?php
    }
}else{
    echo  '<script>alert("There is no products matching your search.....")</script>';
    echo "<script type='text/javascript'> document.location ='Products.php'; </script>";
}
}
?> 
 </section>

<?php include 'Includes/Footer.php'; ?>

</body>
</html> 