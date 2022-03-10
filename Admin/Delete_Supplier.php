<?php
//Start the Session
session_start();
	
//including the database connection file.
include_once("Includes/connect.php");


if(!isset($_SESSION['admin']) && empty($_SESSION['admin']) ){
    header('location:AdminLogin.php');
   }
 

if(isset($_GET['id'])){
    $supplier_id = $_GET['id'];
   $sql = "DELETE FROM supplier WHERE supplier_id='$supplier_id'";
   $result = mysqli_query($conn, $sql);
   
   if(mysqli_query($conn, $sql)){
    echo "<script>alert('Supplier Account Deleted successfully..')</script>";
    echo "<script type='text/javascript'> document.location ='Create_Accounts.php'; </script>";
}

}

?>