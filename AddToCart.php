<?php
 session_start();
if(isset($_GET['id'])){

    if(isset($_GET['quantity'])){
        $quantity = $_GET['quantity'];
    }else{
        $quantity = 1;
    }
     $id = $_GET['id'];

   $_SESSION['Cart'][$id] = array('quantity' => $quantity);

   if($quantity >= 1){
   header('location:Cart.php');  
   }else{
    echo "<script>alert('Cannot add product to your cart... Please insert quantity')</script>";
    unset($_SESSION['Cart'][$id]);
    echo "<script type='text/javascript'> document.location ='Products.php'; </script>";
   }                                                                                

 }
?>