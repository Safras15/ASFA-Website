<?php
//Start the Session
session_start();
	
//including the database connection file.
include_once("Includes/connect.php");


if(!isset($_SESSION['hr']) && empty($_SESSION['hr']) ){
        header('location:../Admin/AdminLogin.php');
       }
   
 

if(isset($_GET['id'])){
    $ID = $_GET['id'];
   $sql = "DELETE FROM contactus WHERE ID='$ID'";
   $result = mysqli_query($conn, $sql);
   
   echo '<script>alert("The Message is Deleted Successfully.......")</script>';
   echo "<script type='text/javascript'> document.location ='Inquiries.php'; </script>";

}

?>