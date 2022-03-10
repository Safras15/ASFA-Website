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

<script src="https://kit.fontawesome.com/39d1910945.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- Custom StyleSheet -->
<link rel="stylesheet" href="./css/Style.css" />
</head>
<body>

<?php


if(isset($_POST['submit'])){
    $product_quantity = $_POST['product_quantity'];
    $product_id = $_POST['hiddenID'];

		
			$sql_update = "UPDATE product SET product_quantity='$product_quantity' WHERE product_id='$product_id'";
		
		if (mysqli_query($conn, $sql_update)) {
		   
			echo "<script>alert('Quantity Added Successfully..')</script>";
			echo "<script type='text/javascript'> document.location ='../Supplier/Products.php'; </script>";
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
<h1>Add Quantity</h1>
</div>
<div class="offset-md-1 col-lg-9">
<section id="content ">
	<div class="ocontent-blog bg-white py-3">
		<div class="container"> 
        		<form method="post" enctype="multipart/form-data">
				<input type="hidden" name='hiddenID' value='<?php echo $product_id?>'>
			  <div class="form-group">
			    <label for="Productname">Product Name</label>
			    <a style="font-size:1.4rem; color:black;" type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name"><?php echo $row['product_name']; ?></a>
			  </div>

              <div class="form-group">
			    <label for="Productsize">Product Size</label>
			    <a style="font-size:1.4rem; color:black;" type="text" class="form-control" name="product_size" id="product_size" placeholder="Product Size"><?php echo $row['product_size']; ?></a>
			  </div>

              <div class="form-group">
			    <label style="font-size:2.4rem; font-weight:bold;" for="productquantity">Product Quantity</label>
			    <input style="font-size:2.2rem; font-weight:bold;" type="text" class="form-control" value='<?php echo $row['product_quantity']; ?>' name="product_quantity" id="product_quantity" placeholder="Product Quantity">
			  </div>

			

	<img src="<?php echo $row['product_image']; ?>" alt="" height='150' width='150' style="border-radius: 5px 5px 0 0;"><br>

			
			  <br>
			  <button style="margin-left: 33%; font-size: 2rem; width: 44%;" type="submit" name='submit' class="btn btn-default">Add Quantity</button>
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