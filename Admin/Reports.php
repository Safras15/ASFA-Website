<?php
//Start the Session
session_start();
	
//including the database connection file.
include_once("Includes/connect.php");

?>


<html>
<head>
<?php include 'Includes/Navigation2.php'; ?>

<link rel="stylesheet" type="text/css" href="your_website_domain/css_root/flaticon.css">
<script src="https://kit.fontawesome.com/39d1910945.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">

<!-- Custom StyleSheet -->
<link rel="stylesheet" href="./css/Style.css" />
<link rel="stylesheet" href="./css/flaticon.css" />
</head>
<body>

<div class="head">
          <h1>All Reports</h1>
          </div>

<div class="cardBox2">
<div class="card">
        <div>
        <?php
        $sql = "SELECT SUM(total_price) AS Total FROM orders WHERE order_status = 'Delivered'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $Total = $row["Total"];
        ?>
            <a href="../Admin/Sales_Report.php" class="cardName">Sales Report</a>
            <div class="numbers">(Rs.<?php echo $row["Total"] ?>.00)</div>
        </div>
        <div class="iconBox">
        <i style="color: #FF00FF;" class="fas fa-rupee-sign"></i>
        </div>
    </div>

    <br>

    <div class="card">
        <div>
        <?php
        $sql = "SELECT SUM(product_quantity) AS TotalProducts FROM product;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $NumberOfProducts = $row["TotalProducts"];
        ?>
        <a href="../Admin/Stock_Report.php" class="cardName">Stocks Report</a>
           <div class="numbers">(<?php echo $row["TotalProducts"] ?>)</div>
        </div>
        <div class="iconBox">
        <i style="color: #00FF7F;" class="flaticon-screws"></i>
        </div>
    </div>

    <br>

    <div class="card" href="../Admin/Customers.php">
        <div>
            <?php
        $sql = "SELECT COUNT(customer_id) AS NumberOfCustomers FROM customer";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $NumberOfCustomers = $row["NumberOfCustomers"];
        ?>
        <a href="../Admin/Customer_Report.php" class="cardName">Customers Report</a>
            <div class="numbers">(<?php echo $row["NumberOfCustomers"] ?>)</div>
        </div>
        <div class="iconBox">
        <i style="color: #FF6347;" class="fas fa-users"></i>
        </div>
    </div>

    <br>

    <div class="card">
        <div>
        <?php
        $sql = "SELECT COUNT(order_id) AS NumberOfOrders FROM orders";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $NumberOfOrders = $row["NumberOfOrders"];
        ?>
        <a href="../Admin/Order_Report.php" class="cardName">Orders Report</a>
            <div class="numbers">(<?php echo $row["NumberOfOrders"] ?>)</div>
        </div>
        <div class="iconBox">
        <i style="color: #FFFF00;" class="fas fa-cart-plus"></i>
        </div>
    </div>
</div>


<br>
    </br>

<?php include 'Includes/Footer.php'; ?>
</body>
</html>  