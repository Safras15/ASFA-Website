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
<link rel="stylesheet" href="./css/Style.css" />
</head>
<body>


<div class="head">
          <h1>All Inquiries</h1>
<div class="container-md cart">
<table>
           <thead>
               <tr>
                   <th style="text-align:center;">ID</th>
                   <th>Full Name</th>
                   <th>Email</th>
                   <th>Subject</th>
                   <th>Message</th>
                   <th>Time</th>
                   <th>Operations</th>
               </tr>
           </thead>
           <tbody>

           <?php
    $sql = "SELECT * FROM contactus ORDER BY `contactus`.`ID` DESC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {

            ?>
         <tr>
            <td style="color:black; text-align:center;"><?php echo $row["ID"] ?></td>
            <td><?php echo $row["full_name"] ?></td>
            <td><?php echo $row["email"] ?></td>
            <td><?php echo $row["subject"] ?></td>
            <td><?php echo $row["message"] ?></td>
            <td><?php echo date('M j g:i A', strtotime($row["timestamp"]));?></td>
            <td><a style="color: #00FA9A;" href='#'>Reply</a> 
            | <a href='Delete_Message.php?id=<?php echo $row["ID"] ?>'>Delete</a></td>
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
    <br>
    </br>

<?php include 'Includes/Footer.php'; ?>
</body>
</html>  