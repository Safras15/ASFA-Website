<?php
//Start the Session
session_start();
	
//including the database connection file.
include_once("Includes/connect.php");


if(!isset($_SESSION['admin']) && empty($_SESSION['admin']) ){
    header('location:AdminLogin.php');
   }
 

if(isset($_GET['id'])){
    $delivery_id = $_GET['id'];
   $sql = "DELETE FROM delivery WHERE delivery_id='$delivery_id'";
   $result = mysqli_query($conn, $sql);
 
   if(mysqli_query($conn, $sql)){
    echo "<script>alert('Delivery Method Deleted successfully..')</script>";
    echo "<script type='text/javascript'> document.location ='Delivery_Details.php'; </script>";
}

}

?>