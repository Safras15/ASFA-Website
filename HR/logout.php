<?php

session_start();

unset($_SESSION['hr']);

header("location:../Admin/AdminLogin.php");

?>