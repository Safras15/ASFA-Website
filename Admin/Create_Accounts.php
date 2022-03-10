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
          <h1>HR Accounts</h1>
          <a href="../Admin/Add_HR.php" class="btn">+ Create Account</a>
</div>
<div class="container-md cart">
<table>
           <thead>
               <tr>
                   <th>ID</th>
                   <th>Full Name</th>
                   <th>Email</th>
                   <th>Mobile Number</th>
                   <th>Address</th>
                   <th>Creation Date</th>
                   <th>Operations</th>
               </tr>
           </thead>
           <tbody>

           <?php
    $sql = "SELECT * FROM hr ORDER BY `hr`.`hr_id` DESC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {

            ?>
         <tr>
            <td style="color:black;"><?php echo $row["hr_id"] ?></td>
            <td><?php echo $row["hr_name"] ?></td>
            <td><?php echo $row["email"] ?></td>
            <td><?php echo $row["mobile_number"] ?></td>
            <td><?php echo $row["address"] ?></td>
            <td><?php echo date('M j g:i A', strtotime($row["created_time"]));?></td>
            <td><a href='Delete_HR.php?id=<?php echo $row["hr_id"] ?>'>Delete</a></td>
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
    


    <div class="head">
          <h1>Supplier Accounts</h1>
          <a style="margin-left:54%;" href="../Admin/Add_Supplier.php" class="btn">+ Create Account</a>
</div>
    <div class="container-md cart">
<table>
           <thead>
               <tr>
               <th>ID</th>
                   <th>Full Name</th>
                   <th>Email</th>
                   <th>Mobile Number</th>
                   <th>Company</th>
                   <th>Address</th>
                   <th>Creation Date</th>
                   <th>Operations</th>
               </tr>
           </thead>
           <tbody>

           <?php
    $sql = "SELECT * FROM supplier ORDER BY `supplier`.`supplier_id` DESC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {

            ?>
         <tr>
         <td style="color:black;"><?php echo $row["supplier_id"] ?></td>
            <td><?php echo $row["supplier_name"] ?></td>
            <td><?php echo $row["email"] ?></td>
            <td><?php echo $row["mobile_number"] ?></td>
            <td><?php echo $row["company"] ?></td>
            <td><?php echo $row["address"] ?></td>
            <td><?php echo date('M j g:i A', strtotime($row["created_time"]));?></td>
            <td><a href='Delete_Supplier.php?id=<?php echo $row["supplier_id"] ?>'>Delete</a></td>
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