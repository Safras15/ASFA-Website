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
<?php 

if(isset($_GET['id'])){
  $product_id = $_GET['id'];
  $sql = "SELECT * FROM product WHERE product_id = '$product_id'";
  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_assoc($result);

  $product_name  = $row['product_name'];
  $product_size  = $row['product_size']; 
  $cat_id  = $row['cat_id']; 
  $quantity = $_GET['quantity'];
  $product_details  = $row['product_details'];
  $product_image  = $row['product_image'];
  $product_price  = $row['product_price'];
}

?>


      <!-- Product Details -->
      <section class="section product-detail">
        <div class="details container-md">
          <div class="left">
            <div class="main">
            <img src="Admin/<?php echo $product_image ?>" alt="" />
            </div>
            <div class="thumbnails">
              <div class="thumbnail">
                <img src="./Images/Drywall Screw.jpg" alt="">
              </div>
              <div class="thumbnail">
                <img src="./Images/Anchor Bolt.png" alt="">
              </div>
              <div class="thumbnail">
                <img src="./Images/Concrete Nail.png" alt="">
              </div>
              <div class="thumbnail">
                <img src="./Images/Self-Tapping Screw.png" alt="">
              </div>
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
    
            <form action='AddToCart.php' class="form">
              <p>Case:
              <input type="hidden" name='id' value='<?php echo  $product_id ?>'>
              
              <input type="number" class='form-control' name='quantity' value='1'> 
              <?php if($row["product_quantity"] >= 1 ){ ?> 
              <button style="font-weight: bold; font-size: 1.8rem; border: pink;" type='submit' name="submit" class="addCart">Add To Cart</button></p>
              <?php }else{ ?> 
              <a style="font-weight: 530; font-style: italic; font-size: 1.8rem; color:#f60091;">"Cannot Add To Cart"</a>
                <?php } ?> 
                </form>
        
        <p>In Stock: 
        <?php if($row["product_quantity"] >= 1 ){?>
        <a style="color:#ff7c9c; font-size:2rem;" href="#"><?php echo $row["product_quantity"] ?>.</a>
        <?php }else{ ?> 
        <a style="color:#ff7c9c; font-size:2rem;">Out of Stock.</a></P>
		    <?php } ?>
        <br>
    


        <?php
      
        $c_id = $_SESSION['customerid'];
                  $sql_Check = "SELECT * FROM wishlist WHERE pid='$product_id' AND cid='$c_id'";
                  $result_check = mysqli_query($conn, $sql_Check);
                  
                  $row = mysqli_fetch_assoc($result_check)
                          ?> 
<?php  if (mysqli_num_rows($result_check) == 1) {  ?>
  <br>
    <a style="color:#f60091; font-size:1.8rem;  font-style: italic; font-weight: bold;">"Already exists in wishlist."</a></P>
    <?php }else{ ?> 
      <a style="font-size: 1.7rem; background-color:#ff7c9c; color:black; border-radius: 38px; padding: 10px 20px; text-transform: none; font-weight:bold;" href="wishlist.php?id=<?php echo $_GET['id'] ?>" class="btn"><i style="font-size:1.4rem;" class='bx bxs-heart'></i></i>Add To Wishlist</a>
      
		    <?php } ?>
</br><br>
        
            <h3 style="font-weight: bold;">Product Detail</h3>
            <p><?php echo $product_details ?></p>
            <br><p>1 Box = 1000pcs</p>
            <p>1 Case = 10000pcs</p></br>
         
          </div>
        </div>
      </section>

    

  <!-- Related -->
  <section class="section featured">
    <div class="top container">
      <h1>Related Products</h1>
      <a style="margin-left:63%;" href="Products.php" class="btn">View more</a>
    </div>
    
    <div class="product-center container">

<?php
$sql_related = "SELECT * FROM product where product_id != $product_id  order by rand() limit 4";
 
$result_related = mysqli_query($conn, $sql_related);
  
while($row_related = mysqli_fetch_assoc($result_related)) {
 
?>

<div class="product">
        <div class="product-header">
          <img src="Admin/<?php echo  $row_related['product_image'] ?>" alt="" />
          <ul class="icons">
          <span><a href='Product_Details.php?id=<?php echo  $row_related['product_id'] ?>' class='bx bx-caret-right-square'></a></span>
            <?php if($row_related["product_quantity"] >= 1 ){ ?> 
            <span><a href='AddToCart.php?id=<?php echo  $row_related["product_id"] ?>' class="bx bx-shopping-bag"></a></span>
            <?php }else{ ?>
               <span><a href="Product_Details.php?id=<?php echo  $row_related['product_id'] ?>" class='bx bx-error-alt'></a></span>
               <?php  } ?> 
          </ul>
        </div>
        <div class="product-footer"></div>
          <a href="Product_Details.php?id=<?php echo $row_related['product_id']?>"><h3><?php echo  $row_related['product_name'] ?></h3></a>
        <h4 class="size">Size: <?php echo  $row_related['product_size'] ?>'</h4>
        <?php if($row_related["product_quantity"] >= 1 ){ ?> 
        <h5 class="price">Rs.<?php echo  $row_related['product_price'] ?>.00</h5>
        <?php }else{ ?>
            <a><h3 style="color:red; font-weight:bold;">Out of Stock</h3></a>
            <?php  } ?> 
     
      </div>
      <?php
                  } 
                
                  ?>
  
      </section>

      <?php include 'Includes/Footer.php'; ?>
  
  </body>
  </html>