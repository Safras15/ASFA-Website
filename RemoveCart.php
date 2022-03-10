<?php
 session_start();

 if(isset($_GET['id'])){
     $id = $_GET['id'];
     unset($_SESSION['Cart'][$id]);

     echo "<script>alert('The product has been removed from the Cart..)</script>";
     echo "<script type='text/javascript'> document.location ='Cart.php'; </script>";

 }

 ?>