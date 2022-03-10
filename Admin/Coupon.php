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
<link rel="stylesheet" href="./css/Style.css" />
</head>
<body>


<div class="head">
          <h1>All Coupons</h1>
          <a href="../Admin/Add_Coupon.php" class="btn">+ Add Coupon</a>

<div class="container-md cart">
<table>
           <thead>
               <tr>
                   <th>Coupon ID</th>
                   <th>Coupon Code</th>
                   <th>Discount</th>
                   <th>Status</th>
                   <th>Operations</th>
               </tr>
           </thead>
           <tbody>

           <?php
    $sql = "SELECT * FROM coupon ORDER BY `coupon`.`coupon_id` DESC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {

            ?>
         <tr>
            <td style="color:black;"><?php echo $row["coupon_id"] ?></td>
            <td><?php echo $row["coupon_code"] ?></td>
            <td><?php echo $row["discount"] ?>%</td>
           
            <td>
                <span class="status"><?php if($row["status"] == 'Valid'){?>
                <span style="background:#7CFC00; border-radius: 4px; padding: 2px 4px;"><?php echo $row["status"] ?></span><?php } ?>
                <?php if($row["status"] == 'Blocked'){?>
                <span style="background:#FF0000;  border-radius: 4px; padding: 2px 4px;"><?php echo $row["status"] ?></span><?php } ?>
            </td>
          
            <td><a style="color: #00FA9A;" href='Activate_Customers.php?id=<?php echo $row["customer_id"] ?>'>Edit</a>
            | <a href='Block_Customers.php?id=<?php echo $row["customer_id"] ?>'>Delete</a></td>
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