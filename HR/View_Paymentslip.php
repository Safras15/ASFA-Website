<?php
//Start the Session
session_start();
	
//including the database connection file.
include_once("Includes/connect.php");

if(!isset($_SESSION['hr']) && empty($_SESSION['hr']) ){
    header('location:../Admin/AdminLogin.php');
 }
?>


<html>
<head>
<?php include 'Includes/Navigation2.php'; ?>

<script src="https://kit.fontawesome.com/39d1910945.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">

<!-- Custom StyleSheet -->
<link rel="stylesheet" href="../HR/CSS/Style.css" />
</head>
<body>

<div class="head">
          <h1>Payment Slip</h1>
          <a style="margin-left:65%;" href="Orders.php" class="btn">Back</a>
</div>
<br>

           <?php

 
     $o_id = $_GET['id'];
             
                $sql = "SELECT * FROM orders WHERE order_id='$o_id'";
            
                $result = mysqli_query($conn,$sql);

                $row = mysqli_fetch_assoc($result);

               ?>
               <div class="paymentslip">
            <img style="width: 90rem; height:50%; margin-left:10%;" src="Uploads/<?=$row['payment_image']?>" >
                   </div> 

            <br>
    </br>
    <br>
            </br>
            <br>
    </br>
    <br>
            </br>

<?php include 'Includes/Footer.php'; ?>


</body>
</html>  