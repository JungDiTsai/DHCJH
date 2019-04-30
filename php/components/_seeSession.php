<?php 
session_start(); 
print_r($_SESSION["member"]);
echo '<br>';

echo $_SERVER['PHP_SELF'];
?>