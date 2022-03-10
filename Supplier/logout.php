<?php

session_start();

unset($_SESSION['supplier']);

header("location:../Admin/AdminLogin.php");

?>