<?php
//Start the Session
session_start();
	
//including the database connection file.
include_once("Includes/connect.php");

if(!isset($_SESSION['admin']) && empty($_SESSION['admin']) ){
    header('location:AdminLogin.php');
   }


if(isset($_GET['id'])){
    $catid = $_GET['id'];
   $sql = "DELETE FROM category WHERE cat_id='$catid'";
   $result = mysqli_query($conn, $sql);

   if(mysqli_query($conn, $sql)){
    echo "<script>alert('Category Deleted successfully..')</script>";
    echo "<script type='text/javascript'> document.location ='Categories.php'; </script>";
}

}

?>
