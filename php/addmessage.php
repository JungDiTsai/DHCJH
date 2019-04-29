<?php
$errMsg="";
// exit( $_REQUEST["orderNo"] . $_REQUEST["messageContent"]);
try {
	$dsn = "mysql:host=localhost;port=3306;dbname=dhc;charset=utf8";
	$user = "Jung";
	$password = "626425";
	$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	$pdo = new PDO( $dsn, $user, $password, $options);   
    //撈訊息
	$orderNo = $_REQUEST["orderNo"];
	$memNo=1;
    $memNo =$_REQUEST["memNo"];
    $messageContent=$_REQUEST["messageContent"];
	$sql = "INSERT INTO message(orderNo,memNo,messageContent)
	VALUES($orderNo,$memNo,'$messageContent')";
	$addmessage = $pdo ->exec($sql);
	
} catch (PDOException $e) {
	$errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
	$errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
}

echo $errMsg;  
?>
