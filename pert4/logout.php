<?php
session_start();

session_destroy();

echo "<script> alert('Dadah...'); 
location.href='login.php' </script>";
?>