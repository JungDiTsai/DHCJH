<?php 
	$dsn = "mysql:host=localhost;port=3306;dbname=test;charset=utf8";
	$user = "localhost";
	$password = "";
	$options = array(PDO::ATTR_CASE=>PDO::CASE_NATURAL, PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	$pdo = new PDO( $dsn, $user, $password, $options);  
?>