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


    $sql = "SELECT admin_image FROM admin WHERE admin_id=$id";
    $res = mysqli_query($conn, $sql);
    $r = mysqli_fetch_assoc($res);
 

    if(!empty($r['admin_image'])){
        if(unlink($r['admin_image'])){
            $delsql = "UPDATE admin SET admin_image='' WHERE admin_id=$id";
            if(mysqli_query($conn, $delsql)){
                header("location:Admin_Profile.php?id={$id}");
            }
        }else{
            $delsql = "UPDATE admin SET admin_image='' WHERE admin_id=$id";
            if(mysqli_query($conn, $delsql)){
                header("location:Admin_Profile.php?id={$id}");
            }
        }

}
}
?>