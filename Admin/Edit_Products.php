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
    $product_price = $_POST['product_price'];
    $product_id = $_POST['hiddenID'];

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
						
			$sql2 = "UPDATE product SET product_name='$product_name', product_size='$product_size', product_details='$product_details',  
			cat_id='$productcategory', product_price='$product_price', product_image='$location$name'  WHERE product_id='$product_id'";
 
						$res = mysqli_query($conn, $sql2);
						if($res){
							//echo "Product Created";
							echo "<script>alert('Updated In Successfully..')</script>";
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
		} 
		
			$sql_update = "UPDATE product SET product_name='$product_name', product_size='$product_size', product_details='$product_details',  
			cat_id='$productcategory', product_price='$product_price' WHERE product_id='$product_id'";
		
		if (mysqli_query($conn, $sql_update)) {
		   
			echo "<script>alert('Updated Successfully..')</script>";
			echo "<script type='text/javascript'> document.location ='Products.php'; </script>";
		} else {
		  echo "Error: " . $sql_update . "<br>" . mysqli_error($conn);
		}

}


if(isset($_GET['id'])){
    $product_id = $_GET['id'];
   $sql = "SELECT * FROM product  WHERE product_id='$product_id'";
   $result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

}



?>

<br>
</br>

<div class="offset-md-3 col-lg-6">
<div class="card">
<div class="card-header">
<h1>Edit Product</h1>
</div>
<div class="offset-md-1 col-lg-9">
<section id="content ">
	<div class="ocontent-blog bg-white py-3">
		<div class="container"> 
        		<form method="post" enctype="multipart/form-data">
				<input type="hidden" name='hiddenID' value='<?php echo $product_id?>'>
			  <div class="form-group">
			    <label for="Productname">Product Name</label>
			    <input style="font-size:1.4rem;" type="text" class="form-control" value='<?php echo $row['product_name']; ?>' name="product_name" id="product_name" placeholder="Product Name" pattern="[a-zA-Z][a-zA-Z ]{2,}" title="--Numbers Not Allowed--">
			  </div>

              <div class="form-group">
			    <label for="Productsize">Product Size</label>
			    <input style="font-size:1.4rem;" type="text" class="form-control" value='<?php echo $row['product_size']; ?>' name="product_size" id="product_size" placeholder="Product Size">
			  </div>

			  <div class="form-group">
			    <label for="productdescription">Product Description</label>
			    <textarea style="font-size:1.4rem;" class="form-control" name="product_details" rows="3"> <?php echo $row['product_details']; ?> </textarea>
			  </div>

			  <div class="form-group">
			    <label for="productcategory">Product Category</label>
			    <select style="font-size:1.4rem; height: 3.3rem;" class="form-control" id="productcategory" name="productcategory">
				 
				 
				  <?php
                  
        
                  $sql2 = "SELECT * FROM category";
                  $result2 = mysqli_query($conn, $sql2);
              
                
                      // output data of each row
                      while($row2 = mysqli_fetch_assoc($result2)) {
              
                          ?> 
				 <option value="<?php echo $row2["cat_id"] ?>" <?php
				 
				 if($row2["cat_id"] == $row['cat_id']){ echo 'selected';

				 }else{
					 echo '';
				 }
				 ?>><?php echo  $row2["cat_name"] ?></option> 
                      <?php
                      }
                  
                  ?>
				 
				</select>
			  </div>
			  

              <div class="form-group">
			    <label for="productquantity">Product Quantity</label>
			    <input style="font-size:1.4rem;" type="text" class="form-control" value='<?php echo $row['product_quantity']; ?>' name="product_quantity" id="product_quantity" placeholder="Product Quantity">
			  </div>

			  <div class="form-group">
			    <label for="productprice">Product Price</label>
			    <input style="font-size:1.4rem;" type="text" class="form-control" value='<?php echo $row['product_price']; ?>'  name="product_price" id="product_price" placeholder="Product Price">
			  </div>

			  <?php if(isset($row['product_image']) && !empty($row['product_image'])){
				  ?>
	<img src="<?php echo $row['product_image']; ?>" alt="" height='150' width='150' style="border-radius: 5px 5px 0 0;"><br>
	<a href="Delete_Product_Image.php?id=<?php echo $row['product_id'];?>">Delete Image</a><br>

				  <?php
			  }else{

 ?>
  <div class="form-group">
			    <label for="productimage">Product Image</label>
			    <input type="file" name="product_image" id="product_image">
			    <p class="help-block">Only jpg/png are allowed.</p>
			  </div>

				  <?php
			  } ?>
			
			  <br>
			  <button style="margin-left: 33%; font-size: 2rem; width: 44%;" type="submit" name='submit' class="btn btn-default">Edit Product</button>
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