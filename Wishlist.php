<?php
session_start();

include_once("Includes/connect.php");

if(!isset($_SESSION['customerid'])){
	header('location:Login.php');
}
else{
 $c_id = $_SESSION['customerid']; 
 $p_id = $_GET['id'];

 $sql_Check = "SELECT * FROM wishlist where pid = $p_id AND cid = $c_id";
 $result_check = mysqli_query($conn, $sql_Check);

 if (mysqli_num_rows($result_check) == 1) { 
    echo "<script>alert('Product already exist in Wishlist..')</script>";
    echo "<script type='text/javascript'> document.location ='Show_Wishlist.php'; </script>";
    
 }else{

    $insertWishlist = "INSERT INTO wishlist (pid, cid) VALUES ('$p_id', '$c_id')"; 

	if(mysqli_query($conn, $insertWishlist)){
        echo "<script>alert('Added To Wishlist..')</script>";
        echo "<script type='text/javascript'> document.location ='Show_Wishlist.php'; </script>";
    }

 }
}

?>