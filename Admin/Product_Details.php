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
</head>

<body>
<?php 

if(isset($_GET['id'])){
  $product_id = $_GET['id'];
  $sql = "SELECT * FROM product WHERE product_id = '$product_id'";
  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_assoc($result);

  $product_name  = $row['product_name'];
  $product_size  = $row['product_size']; 
  $cat_id  = $row['cat_id']; 
  $product_details  = $row['product_details'];
  $product_image  = $row['product_image'];
  $product_price  = $row['product_price'];
}

?>

<br>
</br>
<br>


      <!-- Product Details -->
      <section class="section product-detail">
        <div class="details container-md">
          <div class="left">
            <div style="border:5px;" class="main">
            <img src="../Admin/<?php echo $product_image ?>" alt="" />
            </div>
            <div class="thumbnails">
            </div>
          </div>
          <div class="right">
            <h1><?php echo $product_name ?></h1>
            <div class="price">Rs.<?php echo $product_price ?>.00</div>
            <form>
              <div>
                <select>
                  <option value="Select Size" selected disabled><?php echo $product_size ?></option>
                </select>
              </div>
            </form>

            
            <?php
                  $sql2 = "SELECT * FROM category where cat_id = '$cat_id'";
                  $result2 = mysqli_query($conn, $sql2); 
                  
                      $row2 = mysqli_fetch_assoc($result2)
                          ?> 

        <p>Category: 
        <a style="color:#ff7c9c; font-size:2rem;" href="Products.php?id=<?php echo $cat_id ?>"><?php echo $row2["cat_name"] ?>.</a></P>
        <br>
    
           
            
           
        
        <p>In Stock: 
        <?php if($row["product_quantity"] >= 1 ){?>
        <a style="color:#ff7c9c; font-size:2rem;" href="#"><?php echo $row["product_quantity"] ?>.</a>
        <?php }else{ ?> 
        <a style="color:#ff7c9c; font-size:2rem;">Out of Stock.</a>
		    <?php } ?>
        <a style="font-size: 1.7rem; background-color:#ff7c9c; color:black; border-radius: 38px; padding: 3px 20px; text-transform: none; margin-left: 50%; font-weight: 550;"
              href='Edit_Products.php?id=<?php echo  $row['product_id'] ?>'>Edit Product</a></P>
        <br>
      

        <?php
       $sql = "SELECT SUM(quantity) AS TotalProducts FROM orderitems WHERE product_id = '$product_id'";
       $result = mysqli_query($conn, $sql);
       $row = mysqli_fetch_assoc($result);  
       $NumberOfProducts = $row["TotalProducts"];
        ?>
<p>Sold Out: 
<?php if($row["TotalProducts"] >= 1 ){?>
<a style="color:#ff7c9c; font-size:2rem;" href="#"><?php echo $row["TotalProducts"] ?>.</a></p>
<?php }else{ ?> 
  <a style="color:#ff7c9c; font-size:2rem;" href="#">0.</a>
  <?php } ?>
<br>
</br>
        
            <h3 style="font-weight: bold;">Product Detail</h3>
            <p><?php echo $product_details ?></p>
            <br><p>1 Box = 1000pcs</p>
            <p>1 Case = 10000pcs</p></br>
         
          </div>
        </div>
      </section>

    



      <?php include 'Includes/Footer.php'; ?>
  
  </body>
  </html>