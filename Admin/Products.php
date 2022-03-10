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
          <h1>All Products</h1>
          <a href="../Admin/Add_Products.php" class="btn">+ Add Product</a>
</div>
<div class="container-md cart">
    <table>
				<thead>
                  <tr>
                      <th>ID</th>
                      <th>Product</th>
                      <th>Category</th>
                      <th>Price</th>
                      <th>Available Quantity</th>
                      <th>Action</th>
      </tr>
				</thead>
				<tbody>

                <?php
    $sql = "SELECT * FROM product JOIN category ON product.cat_id=category.cat_id ORDER BY `product`.`product_id` DESC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {

            ?>
      
        <tr>
        <td style="color:black;"><?php echo $row["product_id"] ?></td>
        <td>
          <div class="cart-info">
            <img src="../Admin/<?php echo  $row['product_image'] ?>" alt="">
            <div>
              <br>
              <a style="font-size: 1.8rem; color:black;" href="Product_Details.php?id=<?php echo  $row['product_id'] ?>"><?php echo $row['product_name']?></a>
              <p><?php echo $row['product_size']?>'</p>
            </div>
          </div>
        </td> 
        <td> <a style="font-size: 1.6rem;" href="Categories.php?id=<?php echo  $row['cat_id'] ?>"><?php echo $row['cat_name']?></a></td>
        <td>Rs.<?php echo $row['product_price']?>.00 </td>
        <td><p style="color: black;">Case : <?php echo $row['product_quantity']?></p></td>
            <td><a style="color: #00FA9A;" href='Edit_Products.php?id=<?php echo $row["product_id"] ?>'>Edit</a> 
            | <a href='Delete_Products.php?id=<?php echo $row["product_id"] ?>'>Delete</a></td>
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

    <br>
    </br>

<?php include 'Includes/Footer.php'; ?>
</body>
</html>  