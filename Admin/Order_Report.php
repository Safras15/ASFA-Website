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

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="your_website_domain/css_root/flaticon.css">
<script src="https://kit.fontawesome.com/39d1910945.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">



<!-- Custom StyleSheet -->
<link rel="stylesheet" href="./css/Style.css" />
<link rel="stylesheet" href="./css/flaticon.css" />
</head>
<body>

<div class="head">
          <h1>Orders Report</h1>
          <a style="margin-left:63%; font-size:1.4rem;" href="Reports.php" class="btn">Back</a>
          </div>
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 style="font-size:2rem;">Select Date:</h5>
                    </div>
                      <div class="card-body">
                          <form action="Order_PDF.php" method="GET">
                              <div class="row">
                                 <div class="col-md-4"> 
                                    <div class="form-group">
                                        <label for="">From Date</label>
                                        <input value="<?php if(isset($_GET['from_date'])){echo $_GET['from_date']; } ?>" type="date" name="from_date" class="form-control" placeholder="From Date" style="font-size:1.5rem; color:black;">
                                    </div>
                                 </div> 
                                 <div class="col-md-4"> 
                                    <div class="form-group">
                                        <label for="">To Date</label>
                                        <input value="<?php if(isset($_GET['to_date'])){echo $_GET['to_date']; } ?>" type="date" name="to_date" class="form-control" placeholder="To Date" style="font-size:1.5rem; color:black;">
                                    </div>
                                 </div> 
                                 <div class="col-md-4"> 
                                    <div class="form-group">
                                        <label for=""></label><br><br>
                                        <Button style="padding:4px 25px; font-align:center; font-weight:bold; font-size:1.5rem;" type="submit" class="btn btn-primary">Make PDF</button>
                                    </div>
                                 </div> 
                              </div>
                          </form>
                      </div>
                </div>
             
                
                    <div class="card-body">
                        <h6 style="font-size:2rem; font-style:italic;">Orders Report</h6>
                        <hr>
                      

                       <div class="card mt-3">
                        <table class="table table-bordered table-striped">
                            <thead style=" background-color:#243a6f; color:#fff;">
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer Name</th>
                                    <th>Total Price</th>
                                    <th>Payment Method</th>
                                    <th>Order Status</th>
                                    <th>Date & Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM orders JOIN customer ON orders.customer_id=customer.customer_id ORDER BY `orders`.`order_id` DESC";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {

                                    while($row = mysqli_fetch_assoc($result)){

                                        ?>
                                        <tr>
                
            <td style="color:black;"><?php echo $row["order_id"] ?></td>
            <td><?php echo $row["name"] ?></td>
            <td>Rs.<?php echo $row["total_price"] ?></td>
            <td><?php echo $row["payment_method"] ?></td>
            <td>
                <span class="status"><?php if($row["order_status"] == 'Cancelled'){?>
                <span style="background:#FF0000; border-radius: 4px; padding: 2px 4px;"><?php echo $row["order_status"] ?></span><?php } ?>
                <?php if($row["order_status"] == 'Delivered'){?>
                <span style="background:#7CFC00;  border-radius: 4px; padding: 2px 4px;"><?php echo $row["order_status"] ?></span><?php } ?>
                <?php if($row["order_status"] == 'In Progress'){?>
                <span style="background:#ffff00;  border-radius: 4px; padding: 2px 4px;"><?php echo $row["order_status"] ?></span><?php } ?>
                <?php if($row["order_status"] == 'Ready To Delivery'){?>
                <span style="background:#FFA500;  border-radius: 4px; padding: 2px 4px;"><?php echo $row["order_status"] ?></span><?php } ?>
                <?php if($row["order_status"] == 'Accepted'){?>
                <span style="background:#ff00ff;  border-radius: 4px; padding: 2px 4px;"><?php echo $row["order_status"] ?></span><?php } ?>
                <?php if($row["order_status"] == 'On The Way'){?>
                <span style="background:pink;  border-radius: 4px; padding: 2px 4px;"><?php echo $row["order_status"] ?></span><?php } ?>
                <?php if($row["order_status"] == 'Order Placed'){?>
                <span style="background:#00BFFF;  border-radius: 4px; padding: 2px 4px;"><?php echo $row["order_status"] ?></span><?php } ?></span>
            </td>
            <td><?php echo date('M j g:i A', strtotime($row["order_datetime"]));?></td>
           
        </tr>

      
        <?php
                                    }     
                                
                            }
                        
                            ?>


                            </tbody>
                        </table>

                        <hr>

                        <div class="cardBox3">
                        <div class="card">
                            <div>
                               <?php
                               $sql = "SELECT COUNT(order_id) AS NumberOfOrders FROM orders WHERE order_status = 'Delivered'";
                               $result = mysqli_query($conn, $sql);
                               $row = mysqli_fetch_assoc($result);
                               $NumberOfOrders = $row["NumberOfOrders"];
                                
                               ?>
                            <div class="numbers"><?php echo $row["NumberOfOrders"] ?></div>
                            <a style="font-size:1.9rem;" class="cardName">Total Delivered Orders</a>
                            </div>
                            <div class="iconBox">
                            <i class="fas fa-cart-plus"></i>
                            </div>
                            </div>
                            </div>

                            <div class="cardBox4">
                            <div class="card">
                            <div>
                               <?php
                               
                               $sql = "SELECT COUNT(order_id) AS NumberOfcancelOrders FROM orders WHERE order_status = 'Cancelled'";
                               $result = mysqli_query($conn, $sql);
                               $row = mysqli_fetch_assoc($result);
                               $NumberOfcancelOrders = $row["NumberOfcancelOrders"];
                                
                               ?>
                            <div class="numbers"><?php echo $row["NumberOfcancelOrders"] ?></div>
                            <a style="font-size:1.9rem;" class="cardName">Total Cancelled Orders</a>
                            </div>
                            <div class="iconBox">
                            <i class="fas fa-cart-plus"></i>
                            </div>
                            </div>
                            </div>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<br>
</br>
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

</html>  