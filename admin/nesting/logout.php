<?php 
session_start();

session_destroy();
header('location:../production/login.php?durum=exit');
?>