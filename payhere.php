<?php

//Start the Session
session_start();
//including the database connection file.
include_once("Includes/connect.php");
	
include_once ('Includes/Navigation2.php');

if(!isset($_SESSION['customer']) && empty($_SESSION['customer']) ){
	header('location:Login.php');
}

?>

<html>
<head>

<!-- Bootstrap core CSS -->
<script src="https://kit.fontawesome.com/39d1910945.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" type="text/css">
    
<link rel="stylesheet" href="/CSS/Style.css" type="text/css">
</head>


<body>
<button class="button" type="submit" id="payhere-payment" ></button>


<?php include 'Includes/Footer.php'; ?>
</body>

<script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

<script>
    // Called when user completed the payment. It can be a successful payment or failure
    payhere.onCompleted = function onCompleted(orderId) {
        alert("Your order is placed Successfully..");
        location.href= "myaccount.php";
        //Note: validate the payment and show success or failure page to the customer
    };

    // Called when user closes the payment without completing
    payhere.onDismissed = function onDismissed() {
        //Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Called when error happens when initializing payment such as invalid parameters
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:"  + error);
    };

    // Put the payment variables here
    var payment = {

    <?php 
    $c_id = $_SESSION['customerid'];
				
	$sql = "SELECT orders.order_id, customer.name, customer.email, customer.company, customer.mobile_number, orders.total_price, orders.payment_method, orders.delivery_address, orders.order_datetime 
	FROM orders JOIN customer ON orders.customer_id=customer.customer_id WHERE customer.customer_id='$c_id' ORDER BY `order_id` DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

    ?>
       
        "sandbox": true,
        "merchant_id": "1218868",    // Replace your Merchant ID
        "return_url": undefined,     // Important
        "cancel_url": undefined,     // Important
        "notify_url": "http://sample.com/notify",
        "order_id": "<?php echo $row["order_id"] ?>",
        "items": "",
        "amount": "<?php echo $row["total_price"] ?>",
        "currency": "LKR",
        "first_name": "<?php echo $row['name']; ?>",
        "last_name": "",
        "email": "<?php echo $row['email']; ?>",
        "phone": "<?php echo $row['mobile_number']; ?>",
        "address": "<?php echo $row['delivery_address']; ?>",
        "city": "",
        "country": "Sri Lanka",
        "delivery_address": "<?php echo $row['delivery_address']; ?>",
        "delivery_city": "Company: <?php echo $row['company']; ?>",
        "delivery_country": "Sri Lanka",
        "custom_1": "",
        "custom_2": ""

        <?php }
             }
         ?>
    };

    // Show the payhere.js popup, when "PayHere Pay" is clicked
    document.getElementById('payhere-payment').onclick = function (e) {
        payhere.startPayment(payment);
    };
</script>
</html>



