<?php

session_start();

unset($_SESSION['admin']);

header("location:../Admin/AdminLogin.php");

?>