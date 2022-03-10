<?php
//Start the Session
session_start();
	
//including the database connection file.
include_once("Includes/connect.php");


if(!isset($_SESSION['supplier']) && empty($_SESSION['supplier']) ){
	header('location:../Admin/AdminLogin.php');
   }
 

if(isset($_GET['id'])){
    $product_id = $_GET['id'];
   $sql = "DELETE FROM product WHERE product_id='$product_id'";
   $result = mysqli_query($conn, $sql);
   header('location:Products.php');

}

?>