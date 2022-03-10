<?php
//Start the Session
session_start();
	
//including the database connection file.
include_once("Includes/connect.php");


if(!isset($_SESSION['admin']) && empty($_SESSION['admin']) ){
    header('location:AdminLogin.php');
   }
 

if(isset($_GET['id'])){
    $hr_id = $_GET['id'];
   $sql = "DELETE FROM hr WHERE hr_id='$hr_id'";
   $result = mysqli_query($conn, $sql);
  
   
   if(mysqli_query($conn, $sql)){
    echo "<script>alert('HR Account Deleted successfully..')</script>";
    echo "<script type='text/javascript'> document.location ='Create_Accounts.php'; </script>";
}

}

?>