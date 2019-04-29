<?php 
<<<<<<< HEAD
	$dsn = "mysql:host=localhost;port=3306;dbname=dhc;charset=utf8";
	$user = "Jung";
	$password = "626425";
=======
	$dsn = "mysql:host=localhost;port=3306;dbname=cd106g1;charset=utf8";
	$user = "cd106g1";
	$password = "cd106g1";
>>>>>>> 55e15dfafceed96dc61a616fe5753fa037941b2d
	$options = array(PDO::ATTR_CASE=>PDO::CASE_NATURAL, PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	$pdo = new PDO( $dsn, $user, $password, $options);  
?>