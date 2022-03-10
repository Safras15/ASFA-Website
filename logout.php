<?php

session_start();

unset($_SESSION['Cart']);
unset($_SESSION['customer']);

header("location:./Index.php");

?>