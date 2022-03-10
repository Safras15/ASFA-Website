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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- Custom StyleSheet -->
<link rel="stylesheet" href="./css/Style.css" />
</head>
<body>

<?php

if(isset($_POST['submit'])){
      $product_name = $_POST['product_name'];
      $product_size = $_POST['product_size'];
      $product_details = $_POST['product_details'];
      $productcategory = $_POST['productcategory'];
      $product_quantity = $_POST['product_quantity'];
      $product_price = $_POST['product_price'];

      if(isset($_FILES) & !empty($_FILES)){
        $name = $_FILES['product_image']['name'];
        $size = $_FILES['product_image']['size'];
        $type = $_FILES['product_image']['type'];
        $tmp_name = $_FILES['product_image']['tmp_name'];

        $max_size = 10000000;
        $extension = substr($name, strpos($name, '.') + 1);

        if(isset($name) && !empty($name)){
            if(($extension == "jpg" || $extension == "jpeg" || $extension == "png") && $type == "image/jpeg" || $type == "image/png" && $size<=$max_size){
                $location = "Uploads/";
                if(move_uploaded_file($tmp_name, $location.$name)){
                    //$smsg = "Uploaded Successfully";
                    $sql2 = "INSERT INTO product (product_name, cat_id, product_size, product_details, product_quantity, product_price, product_image)
                    VALUES ('$product_name', '$productcategory', '$product_size', '$product_details', '$product_quantity','$product_price','$location$name')";
                    $res = mysqli_query($conn, $sql2);
                    if($res){
                        //echo "Product Created";
                        echo "<script>alert('New product added successfully..')</script>";
                        echo "<script type='text/javascript'> document.location ='Products.php'; </script>";
                    }else{
                        $message = "Failed to Create Product";
                        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                    }
                }else{
                    $message = "Failed to Upload File";
                }
            }else{
                $message = "Only JPG files are allowed and should be less that 1MB";
            }
        }else{
            $message = "Please Select a File";
        }
    }else{

      $sql = "INSERT INTO product (product_name, cat_id, product_size, product_details, product_quantity, product_price)
    VALUES ('$product_name', '$productcategory', '$product_size', '$product_details', '$product_quantity', '$product_price')";

      if (mysqli_query($conn, $sql)) {
  
        echo "<script type='text/javascript'> document.location ='Products.php'; </script>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
}

?>
<br>
</br>

<div class="offset-md-3 col-lg-6">
<div class="card">
<div class="card-header">
<h1>Add Product</h1>
</div>
<div class="offset-md-1 col-lg-9">
<section id="content ">
	<div class="ocontent-blog bg-white py-3">
		<div class="container"> 
        <?php
        if(isset($message)){
            ?>
    <div class="alert alert-success"><?php echo $message ?></div>
        <?php
        }
        ?>
        		<form method="post" enctype="multipart/form-data" action='Add_Products.php'>
			  <div class="form-group">
			    <label for="Productname">Product Name</label>
			    <input style="font-size:1.4rem;" type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name" pattern="[a-zA-Z][a-zA-Z ]{2,}" title="--Numbers Not Allowed--">
			  </div>
              <div class="form-group">
			    <label for="Productsize">Product Size</label>
			    <input style="font-size:1.4rem;" type="text" class="form-control" name="product_size" id="product_size" placeholder="Product Size">
			  </div>
			  <div class="form-group">
			    <label for="productdescription">Product Description</label>
			    <textarea style="font-size:1.4rem;" class="form-control" name="product_details" rows="3"></textarea>
			  </div>

			  <div class="form-group">
			    <label for="productcategory">Product Category</label>
			    <select style="font-size:1.4rem; height: 3.3rem;" class="form-control" id="productcategory" name="productcategory">
				  <option value="" selected disabled>---SELECT CATEGORY---</option>

                  <?php
                  
        
                  $sql = "SELECT * FROM Category";
                  $result = mysqli_query($conn, $sql);
              
                
                      // output data of each row
                      while($row = mysqli_fetch_assoc($result)) {
              
                          ?> 
                 <option value="<?php echo $row["cat_id"] ?>"><?php echo  $row["cat_name"] ?></option> 
                      <?php
                      }
                  
                  ?>
				 
				</select>
			  </div>

			  <div class="form-group">
			    <label for="productprice">Product Quantity</label>
			    <input style="font-size:1.4rem;" type="text" class="form-control" name="product_quantity" id="product_quantity" placeholder="Product Quantity">
			  </div>

			  <div class="form-group">
			    <label for="productprice">Product Price</label>
			    <input style="font-size:1.4rem;" type="text" class="form-control" name="product_price" id="product_price" placeholder="Product Price">
			  </div>
			  <div class="form-group">
			    <label for="productimage">Product Image</label>
			    <input type="file" name="product_image" id="product_image">
			    <p class="help-block">Only jpg/png are allowed.</p>
			  </div>
			  
        <br>
			  <button style="margin-left: 33%; font-size: 2rem; width: 44%;" type="submit" name='submit' class="btn btn-default">Add Product</button>
			<br>
			</br>
			</form>
			
		</div>
	</div>

</section>
</div>
</div>
</div>

<br>
</br>
<br>
</br>
<br>
</br>

<?php include 'Includes/Footer.php'; ?>


</body>
</html>  