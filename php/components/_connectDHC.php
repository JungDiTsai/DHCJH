<?php 
	$dsn = "mysql:host=localhost;port=3306;dbname=cd106g1;charset=utf8";
	$user = "cd106g1";
	$password = "cd106g1";
	$options = array(PDO::ATTR_CASE=>PDO::CASE_NATURAL, PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	$pdo = new PDO( $dsn, $user, $password, $options);  
?>