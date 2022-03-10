<?php
session_start();

include_once("Includes/connect.php");

if(!isset($_SESSION['customerid'])){
	header('location:Login.php');
}

else{
 $pid = $_GET['pid']; 
 $cid = $_GET['cid'];
 

    $delWishlist = "DELETE FROM wishlist WHERE pid='$pid' AND cid='$cid'";   
	if(mysqli_query($conn, $delWishlist)){
        echo "<script>alert('Removed From Wishlist..')</script>";
        echo "<script type='text/javascript'> document.location ='Show_Wishlist.php'; </script>";
    }

}

?>