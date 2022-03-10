<?php
//Start the Session
session_start();
	
//including the database connection file.
include_once("Includes/connect.php");

if(!isset($_SESSION['admin']) && empty($_SESSION['admin']) ){
    header('location:AdminLogin.php');
   }


if(isset($_GET['id']) & !empty($_GET['id'])){
    $id = $_GET['id'];


    $sql = "SELECT product_image FROM product WHERE product_id=$id";
    $res = mysqli_query($conn, $sql);
    $r = mysqli_fetch_assoc($res);
 

    if(!empty($r['product_image'])){
        if(unlink($r['product_image'])){
            $delsql = "UPDATE product SET product_image='' WHERE product_id=$id";
            if(mysqli_query($conn, $delsql)){
                header("location:Edit_Products.php?id={$id}");
            }
        }else{
            $delsql = "UPDATE product SET product_image='' WHERE product_id=$id";
            if(mysqli_query($conn, $delsql)){
                header("location:Edit_Products.php?id={$id}");
            }
        }

}
}
?>