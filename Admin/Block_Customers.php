<?php
//Start the Session
session_start();
	
//including the database connection file.
include_once("Includes/connect.php");


if(!isset($_SESSION['admin']) && empty($_SESSION['admin']) ){
    header('location:AdminLogin.php');
   }
 

if(isset($_GET['id'])){
    $customer_id = $_GET['id'];
   $sql = "UPDATE customer SET status='Blocked' WHERE customer_id='$customer_id'";

   if ($conn->query($sql) === TRUE) {
     echo '<script>alert("The Customer is Blocked Successfully.......")</script>';
     echo "<script type='text/javascript'> document.location ='Customers.php'; </script>";
     
   } else {
     echo "Error updating record: " . $conn->error;
   }
}
?>