<?php
//Start the Session
session_start();
	
//including the database connection file.
include_once("Includes/connect.php");
?>


<html>
<head>
<?php include 'Includes/Navigation.php'; ?>
</head>
<body>
      <!--Tools-->
      <img src="./Images/Tools.png" class="tools-img" alt=""/>

      <div class="Tools-Content">
        <h2> <span class="discount">50% </span> SALE OFF</h2>
        <h1>
          <span>Month End</span>
          <span>Sales</span>
        </h1>
        <a href="./Products.php" class="btn">Shop Now</a>
      </div>
    </header>



    <!--Main-->
    <main>
      <section class="section advert">
        <div class="advert-center container">
          <div class="advert-box">
            <div class="dotted">
              <div class="content">
                <h2>
                  Blind <br />
                  Riverts
                </h2>
                <h4>Worlds Best Brands</h4>
              </div>
            </div>
            <img src="./Images/M1.png" alt=""/>
          </div>
          <div class="advert-box">
            <div class="dotted">
              <div class="content">
                <h2>
                  Self-Tapping <br />
                  Screws
                </h2>
                <h4>Worlds Best Brands</h4>
              </div>
            </div>
            <img src="./Images/M2.png" alt=""/>
          </div>
          <div class="advert-box">
            <div class="dotted">
              <div class="content">
                <h2>
                  Drywall <br />
                  Screws
                </h2>
                <h4>Worlds Best Brands</h4>
              </div>
            </div>
            <img src="./Images/M3.PNG" alt=""/>
          </div>
        </div>
      </section>

      <!--Featured Products-->
      <section class="section featured">
        <div class="title">
          <h1>Featured Products</h1>
        </div>

<div class="product-center container">

<?php 

$sql = "SELECT * FROM product limit 4";
if(isset($_GET['id'])){
    $cat_id = $_GET['id'];
    $sql .= " WHERE cat_id = '$cat_id'";
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

         

    <!--Latest Products-->
    <section class="section featured">
      <div class="title">
        <h1>Latest Products</h1>
      </div>

      <div class="product-center container">
<?php 

$sql = "SELECT * FROM product limit 4,4";
if(isset($_GET['id'])){
    $cat_id = $_GET['id'];
    $sql .= " WHERE cat_id = '$cat_id'";
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

       

    <!--Product Banner-->
    <section class="section">
      <div class="product-banner">
        <div class="left">
          <img src="./Images/dryfinal.jpg" alt="">
        </div>
        <div class="right">
          <div class="content">
            <h2><span class="discount">30%</span>SALE OFF</h2>
            <h1>
              <span>Black</span>
              <span>Drywall Screws</span>
            </h1> 
            <a href="./Products.php" class="btn">Shop Now</a>
          </div>
        </div>
      </div>
    </section>

    <!--Brands-->
    <section class="section">
      <div class="brands-center container">
        <div class="brand">
          <img src="./Images/Rivert Brand.jpg" alt="">
        </div>
        <div class="brand">
          <img src="./Images/Lituo Brand.PNG" alt="">
        </div>
        <div class="brand">
          <img src="./Images/Star Brand.png" alt="">
        </div>
        <div class="brand">
          <img src="./Images/Fongparean Brand.jpg" alt="">
        </div>
        <div class="brand">
          <img src="./Images/Hilti Brand.jpg" alt="">
        </div>
        <div class="brand">
          <img src="./Images/Wasung Screw Brand.jpg" alt="">
        </div>
      </div>
    </section>

   
    <script src="./JS/Script.js"></script>
    <?php include 'Includes/Footer.php'; ?>

</body>
</html>    