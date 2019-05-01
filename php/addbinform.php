<?php
$errMsg="";
// exit( $_REQUEST["orderNo"] . $_REQUEST["messageContent"]);
try {
	require_once("../php/components/_connectDHC.php"); 
    //撈訊息
	$orderNo = $_REQUEST["orderNo"];
	$memNo=1;
    $memNo =$_REQUEST["memNo"];
    $informReason=$_REQUEST["informReason"];
	$informStatus="未處理";
	$binformWay="無";
	$sql = "INSERT INTO binform(orderNo,memNo,informReason,informStatus,binformWay)
	VALUES($orderNo,$memNo,'$informReason','$informStatus','$binformWay')";
	$addmessage = $pdo ->exec($sql);
	
} catch (PDOException $e) {
	$errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
	$errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
}

echo $errMsg;  
?>
