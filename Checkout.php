<?php

//Start the Session
session_start();
//including the database connection file.
include_once("Includes/connect.php");
	
include_once ('Includes/Navigation2.php');

$Cart = $_SESSION['Cart'];

if(!isset($_SESSION['customer']) && empty($_SESSION['customer']) ){
	header('location:Login.php');
}


$message = '';
$_POST['agree'] = 'false';

if(isset($_POST['submit'])){
	 
	if($_POST['agree'] == true){
        $name = $_POST['name'];
        $companyName = $_POST['company'];
        $address = $_POST['address'];
        $address2 = $_POST['address2'];
        $city = $_POST['city'];
        $zipcode = $_POST['zipcode'];
        $email = $_POST['email'];
        $mobile_number = $_POST['mobile_number'];
        $country = '';
        $agree = $_POST['agree'];
        $payment = $_POST['paymentMethod'];
        $deliveryaddress = $_POST['deliveryaddress'];
        $product_id = $_POST['product_id'];
        $cid = $_SESSION['customerid']; 

        $sql = "SELECT * FROM customer where customer_id = $cid";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        
        
        if (mysqli_num_rows($result) == 1) {
        // update query
        $up_sql = "UPDATE customer SET name='$name', company='$companyName', address='$address', address2='$address2', city='$city',  zipcode='$zipcode', email='$email', mobile_number='$mobile_number'  WHERE customer_id=$cid";
        $updated = mysqli_query($conn, $up_sql);

        if($updated){

        if(isset($_SESSION['Cart'])){
	      $total = 0;
	      foreach($Cart as $key => $value){
	 
	      $sql_cart = "SELECT * FROM product where product_id = $key";
	      $result_cart = mysqli_query($conn, $sql_cart);
	      $row_cart = mysqli_fetch_assoc($result_cart);
	      $total = $total +  ($row_cart['product_price'] * $value['quantity']);
         }
        }

        if($_POST['paymentMethod'] == 'Cash' || $_POST['paymentMethod'] =='Cheque'){
     
                      $sql = "INSERT INTO orders (customer_id, total_price, order_status, payment_method, delivery_id, delivery_address)
                      VALUES ('$cid', '$total', 'Order Placed', '$payment', '7', '$deliveryaddress')";
                      $result = mysqli_query($conn, $sql);

                     if($result){
                      $orderid = mysqli_insert_id($conn);
                      foreach($Cart as $key => $value){
                 
                      $sql_cart = "SELECT * FROM product where product_id = $key";
                      $result_cart = mysqli_query($conn, $sql_cart);
                      $row_cart = mysqli_fetch_assoc($result_cart);
                      $product_price = $row_cart["product_price"];
                      $product_name = $row_cart["product_name"];
                      $q = $value["quantity"];
              
                      $insertorderitems = "INSERT INTO orderitems (order_id, product_id, product_name, quantity, product_price) 
                      VALUES ('$orderid', '$key', '$product_name', '$q', '$product_price')";
                      
              
                      if(mysqli_query($conn, $insertorderitems)){
                          
                      unset($_SESSION['Cart']);
                      echo "<script>alert('Your order is placed Successfully..')</script>";
                      echo "<script type='text/javascript'> document.location ='myaccount.php'; </script>";
                      }
                        
              
            }
                    }
                    }
        
                    } 
        
                    
                    
                    if($_POST['paymentMethod'] == 'Credit Card'){
     
                      $sql = "INSERT INTO orders (customer_id, total_price, order_status, payment_method, delivery_id, delivery_address)
                      VALUES ('$cid', '$total', 'Order Placed', '$payment', '7', '$deliveryaddress')";
                      $result = mysqli_query($conn, $sql);

                     if($result){
                      $orderid = mysqli_insert_id($conn);
                      foreach($Cart as $key => $value){
                 
                      $sql_cart = "SELECT * FROM product where product_id = $key";
                      $result_cart = mysqli_query($conn, $sql_cart);
                      $row_cart = mysqli_fetch_assoc($result_cart);
                      $product_price = $row_cart["product_price"];
                      $product_name = $row_cart["product_name"];
                      $q = $value["quantity"];
              
                      $insertorderitems = "INSERT INTO orderitems (order_id, product_id, product_name, quantity, product_price) 
                      VALUES ('$orderid', '$key', '$product_name', '$q', '$product_price')";
                      
              
                      if(mysqli_query($conn, $insertorderitems)){
                          
                        unset($_SESSION['Cart']);
                        echo "<script type='text/javascript'> document.location ='payhere.php'; </script>";
                     
                      }
                        
              
            }
                    }
                    }
        
                    } 
        
                    if(isset($_FILES) & !empty($_FILES)){

                      $name = $_FILES['payment_image']['name'];
                      $size = $_FILES['payment_image']['size'];
                      $type = $_FILES['payment_image']['type'];
                      $tmp_name = $_FILES['payment_image']['tmp_name'];
              
                      $max_size = 10000000;
                      $extension = substr($name, strpos($name, '.') + 1);
              
                      if(isset($name) && !empty($name)){
                          if(($extension == "jpg" || $extension == "jpeg" || $extension == "png") && $type == "image/jpeg" || $type == "image/png" && $size<=$max_size){
                      
                              $location = "HR/Uploads/";
                              if(move_uploaded_file($tmp_name, $location.$name)){
     
                                $insertOrder = "INSERT INTO orders (customer_id, total_price, order_status, payment_method, delivery_id, payment_image, delivery_address)
                                VALUES ('$cid', '$total', 'Order Placed', '$payment', '7','$name', '$deliveryaddress')";
                      $res = mysqli_query($conn, $insertOrder);

                     if($res){
                      $orderid = mysqli_insert_id($conn);
                      foreach($Cart as $key => $value){
                 
                      $sql_cart = "SELECT * FROM product where product_id = $key";
                      $result_cart = mysqli_query($conn, $sql_cart);
                      $row_cart = mysqli_fetch_assoc($result_cart);
                      $product_price = $row_cart["product_price"];
                      $product_name = $row_cart["product_name"];
                      $q = $value["quantity"];
              
                      $insertorderitems = "INSERT INTO orderitems (order_id, product_id, product_name, quantity, product_price) 
                      VALUES ('$orderid', '$key', '$product_name', '$q', '$product_price')";
                      
              
                      if(mysqli_query($conn, $insertorderitems)){
                          
                      unset($_SESSION['Cart']);
                     
                      echo "<script>alert('Your order is placed Successfully..')</script>";
                      echo "<script type='text/javascript'> document.location ='myaccount.php'; </script>";
                     
                      }
                        
                    }
                     }
                    }
            }
                    }
                    }
        
        
        }
        
      
        
        else{
        $message = 'agree to terms & conditions';
         }
         
        }

        $cid = $_SESSION['customerid'];
        $sql = "SELECT * FROM customer where customer_id = $cid";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

?>


<html>
<head>

<!-- Bootstrap core CSS -->
<script src="https://kit.fontawesome.com/39d1910945.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" type="text/css">
    
<link rel="stylesheet" href="/CSS/Style.css" type="text/css">

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function() {
   $(".form-check-input").change(function () {              
      if($("#bankdeposit").is(':checked')) {
         $('.form-group').show('required');
      }else{
         $('.form-group').hide();
      }        
   });
});
</script>


</head>

<body class="bg-light"> 
<div class="container" id="blur">

<br>
  <main>
  <div class="py-5 text-center">
      <h1 style="font-size: 3rem; ">Checkout Form</h1>
    </div>

    <form method="post" enctype="multipart/form-data">
      <?php echo $message ?>
      <div class="offset-md-2 col-lg-8">
        <h1 class="mb-3">Billing Details</h1>
          <div class="row g-3">
            <div class="col-sm-12">
              <label for="firstName" class="form-label">Full name</label>
              <input style="font-size: 1.4rem; color: black;" type="text" class="form-control" name="name" placeholder="" pattern="[a-zA-Z][a-zA-Z ]{2,}" title="--Numbers Not Allowed--" value="<?php if(isset($row['name'])) { echo $row['name']; } ?>" required="">
            </div>


            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input style="font-size: 1.4rem; color: black;" type="email" class="form-control" name="email" placeholder="" value="<?php if(isset($row['email'])) { echo $row['email']; } ?>" required>
            </div>

            <div class="col-12">
              <label for="company" class="form-label">Company Name</label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input style="font-size: 1.4rem; color: black;" type="text" class="form-control" name="company" placeholder="" pattern="[a-zA-Z][a-zA-Z ]{2,}" title="--Numbers Not Allowed--" value="<?php if(isset($row['company'])) {echo $row['company']; } ?>" required>
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Address 1</label>
              <input style="font-size: 1.4rem; color: black;" type="text" class="form-control" name="address" placeholder="" value="<?php if(isset($row['address'])) {echo $row['address']; } ?>" required>
            </div>

            <div class="col-12">
              <label for="address2" class="form-label">Address 2</label>
              <input style="font-size: 1.4rem; color: black;" type="text" class="form-control" name="address2" placeholder="" value="<?php if(isset($row['address2'])) {echo $row['address2']; } ?>">
            </div>

            <div class="col-12">
              <label for="mobile" class="form-label">Mobile Number</label>
              <input style="font-size: 1.4rem; color: black;" type="text" class="form-control" name="mobile_number" placeholder="" maxlength="10" pattern="^[0-9]{10}$" title="-Only 10 Digit Mobile Numbers are Allowed-" value="<?php if(isset($row['mobile_number'])) {echo $row['mobile_number']; } ?>" required>
            </div>

          

            <div class="col-md-5">
              <label for="country" class="form-label">Country</label>
              <select style="font-size: 1.4rem; color: black;" class="form-select" name="country">
                <option value="">Sri Lanka</option>
              </select>
            </div>

            <div class="col-md-3">
              <label for="city" class="form-label">City</label>
              <input style="font-size: 1.4rem; color: black;" type="text" class="form-control" name="city" placeholder="" value="<?php if(isset($row['city'])) {echo $row['city']; } ?>" required>
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label">ZipCode</label>
              <input style="font-size: 1.4rem; color: black;" type="text" class="form-control" name="zipcode" placeholder="" value="<?php if(isset($row['zipcode'])) {echo $row['zipcode']; } ?>" required>
            </div>
          </div>
          <br>
          <h1 style="font-size:1.6rem;" class="mb-3">Select Delivery Address</h1>

           <div class="my-3">
             <div class="form-check">
               <input value='<?php if(isset($row['address'])) {echo $row['address']; } ?>' name="deliveryaddress" type="radio" class="form-check-input" required Checked>
              <label style="font-size:1.4rem; color:black;" class="form-check-label" for="address">Address 1</label>
             </div>
             
            <div class="form-check">
              <input value='<?php if(isset($row['address2'])) {echo $row['address2']; } ?>' name="deliveryaddress" type="radio" class="form-check-input" required>
              <label style="font-size:1.4rem; color:black;" class="form-check-label" for="address2">Address 2</label>
             </div>
           </div>

          <hr class="my-4">

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="save-info">
            <label class="form-check-label" for="save-info">Save this information for next time</label>
          </div>

          <hr class="my-4">
          
      
          <h1 class="heading">Your order</h1>

          <table class="table table-bordered extra-padding bg-white text-dark">
          <tr>
        <th style="color: #fff; font-size: 1.8rem; background-color: #243a6f;">Product</th>
        <th style="color: #fff; font-size: 1.8rem; background-color: #243a6f;">Price</th>
      </tr>

<?php 


if(isset($_SESSION['Cart'])){
	
  $total = 0;
	foreach($Cart as $key => $value){
	 
	$sql = "SELECT * FROM product where product_id = $key";
  $val = $value['quantity'];
  $res = mysqli_query($conn, "UPDATE product SET product_quantity=product_quantity-$val where product_id = $key");
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  
	$total = $total +  ($row['product_price'] * $value['quantity']);

?>
				<tr>
        <td>
          <div class="cart-info">
            <img style="width: 6rem; height: 6rem;" src="Admin/<?php echo $row['product_image'] ?>" alt="">
            <div>
              <a style="font-size: 1.5rem;"><?php echo $row['product_name'] ?></a>
              <p>Case : <?php echo $value['quantity']?></p>
            </div>
          </div>
        </td>
        
        <td style="color: black;">Rs.<?php echo $row['product_price'] * $value['quantity'] ?>.00</td>
      </tr>
     
<?php
 }
}

?>
			
      </table>

        <table class="table table-bordered extra-padding bg-white text-dark">
				<tbody>
					<tr>
						<th style='color:#2638a0;'>Cart Subtotal</th>
						<td style="color: black;">Rs.<?php echo $total ?>.00</td>
					</tr>
					<tr>
						<th style='color:#2638a0;'>Delivery Fee</th>
						<td>
							Free Delivery				
						</td>
					</tr>
					<tr>
						<th style='color:#2638a0;'>Order Total</th>
						<td style='color:black;'><strong>Rs.<?php echo $total ?>.00/=</strong> </td>
					</tr>
				</tbody>
			</table>

          <hr class="my-4">

          <h1 class="mb-3">Payment Method</h1>

          <div class="my-3">
            <div class="form-check">
              <input value='Cash' id="Cash" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="cash">Cash on Delivery</label>
            </div>
            <div class="form-check">
              <input value='Cheque' name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="Cheque">Cheque</label>
            </div>
            <div class="form-check">
              <input value='Bank Deposit' id="bankdeposit" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="deposit">Bank Deposit</label>
            </div>

            <div class="form-group" style="display:none">
			    <label for="paymentimage">Payment Slip</label>
			    <input type="file" name="payment_image" id="payment_image">
			    <p class="help-block">Only jpg/png are allowed.</p>
			  </div>
            
            <div class="form-check">
              <input value='Credit Card' id="creditcard" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="credit card">Credit Card</label>
            </div>
          </div>
          </form>
        

          <hr class="my-4">

          <div class="form-check">
            <input type="checkbox" class="form-check-input" name="agree" value='true'>
            <label class="form-check-label" for="same-address">I've read and accept the <a href="#">terms &amp; conditions.</a></label>
          </div>

          <hr class="my-4">

          <input style="font-size: 1.4rem;" class="w-100 btn btn-primary btn-lg" name="submit" type="submit" value="Pay Now">
        
      </div>
    </div>
</form>
  </main>
 

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2021 asfahardware.lk</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="./ContactUs.php">Support</a></li>
    </ul>
  </footer>
</div>

<?php include 'Includes/Footer.php'; ?>

    
    </body>
    </html>

    