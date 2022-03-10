<?php
//Start the Session
session_start();
	
//including the database connection file.
include_once("Includes/connect.php");

if(!isset($_SESSION['supplier']) && empty($_SESSION['supplier']) ){
    header('location:../Admin/AdminLogin.php');
   }
?>


<html>
<head>
<?php include 'Includes/Navigation2.php'; ?>

<link rel="stylesheet" type="text/css" href="your_website_domain/css_root/flaticon.css">
<script src="https://kit.fontawesome.com/39d1910945.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">

<!-- Custom StyleSheet -->
<link rel="stylesheet" href="../Supplier/CSS/Style.css" />
<link rel="stylesheet" href="./css/flaticon.css" />
</head>
<body>
    
<div class="cardBox">
    <div class="card">
        <div>
            <?php
       $sql = "SELECT COUNT(product_id) AS TotalProducts FROM product;";
       $result = mysqli_query($conn, $sql);
       $row = mysqli_fetch_assoc($result);
       $NumberOfProducts = $row["TotalProducts"];
        ?>
            <div class="numbers"><?php echo $row["TotalProducts"] ?></div>
            <a href="../Supplier/Products.php" class="cardName">Products</a>
        </div>
        <div class="iconBox">
        <i style="color: #00FF7F;" class="flaticon-screws"></i>
        </div>
    </div>
</div>


<section class="section all-products" id="products">
    <div class="title">
          <h1>All Products</h1>
        </div>


<div class="product-center container">
    
<?php 

$sql = "SELECT * FROM product";
if(isset($_GET['id'])){
    $cat_id = $_GET['id'];
    $sql .= " WHERE cat_id = '$cat_id'";
}

$result = mysqli_query($conn, $sql);
 
while($row = mysqli_fetch_assoc($result)) {

?> 

<div class="product">
        <div class="product-header">
          <img src="../Admin/<?php echo  $row['product_image'] ?>" alt="" />
           <ul class="icons">
            <span><a href='Product_Details.php?id=<?php echo  $row['product_id'] ?>' class='bx bx-caret-right-square'></a></span>
            <span><a href='Add_Quantity.php?id=<?php echo  $row['product_id'] ?>' class='bx bx-plus-medical'></a></span>
          </ul>
        </div>

        <div class="product-footer"></div>
          <a href="Product_Details.php?id=<?php echo $row['product_id']?>"><h3><?php echo  $row['product_name'] ?></h3></a>
        <h4 class="size">Size: <?php echo  $row['product_size'] ?>'</h4>
        <h4 class="price">Rs.<?php echo  $row['product_price'] ?>.00</h4>

            <?php if($row["product_quantity"] >= 1 ){ ?> 
            <h5 class="quantity">In Stock : <?php echo  $row['product_quantity'] ?></h5>
            <?php }else{ ?>
            <a><h3 style="color:red; font-weight:bold;">Out of Stock</h3></a>
            <?php  } ?> 
      </div>
      <?php
                  } 
                
                  ?>
      
            
                  </section>

          
</section>



<br>
    </br>

<?php include 'Includes/Footer.php'; ?>
</body>
</html>  