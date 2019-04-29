<?php 
<<<<<<< HEAD
	$dsn = "mysql:host=localhost;port=3306;dbname=dhc;charset=utf8";
	$user = "root";
	$password = "root";
=======
	$dsn = "mysql:host=localhost;port=3306;dbname=cd106g1;charset=utf8";
	$user = "cd106g1";
	$password = "cd106g1";
>>>>>>> 2170ebda4f360dc7b905c65271eb6d0b0bbaf07a
	$options = array(PDO::ATTR_CASE=>PDO::CASE_NATURAL, PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	$pdo = new PDO( $dsn, $user, $password, $options);  
?>