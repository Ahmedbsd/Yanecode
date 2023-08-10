<?php
session_start();
unset($_SESSION['U_ID']);
header("location: login.php"); 
?>