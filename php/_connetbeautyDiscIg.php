<?php
$errMsg="";

try {
	require_once("../php/components/_connectDHC.php"); 
	//撈訊息
	$sql = "SELECT message.messageNo,message.orderNo,message.memNo,message.messageContent,message.messageDate,member.memNo,member.memName,member.memImgUrl from message join member on message.memNo=member.memNo ORDER BY messageNo;";
	$message=$pdo->query($sql);  
	//撈訂單
	$sql = "SELECT orders.beautyState,orders.orderNo,orders.memNo,orders.orderName,orders.orderImgUrl,orders.orderVote,member.memNo,member.memName,member.memImgUrl FROM orders join member on orders.memNo=member.memNo where orders.beautyState=1;";
	$beautyIntend = $pdo ->query($sql);

   
} catch (PDOException $e) {
	$errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
	$errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
}

echo $errMsg;  
?>

<?php
	$messageRow = $message->fetchAll(PDO::FETCH_ASSOC);
	$messageRL = $message->rowCount();
	// echo json_encode($messageRow,JSON_UNESCAPED_UNICODE);
?>
<?php
	$beautyIntendRow = $beautyIntend->fetchAll(PDO::FETCH_ASSOC);
	$beautyIntendRL = $beautyIntend->rowCount();
	// echo json_encode($beautyIntendRow,JSON_UNESCAPED_UNICODE);
	$dara = array('beautyIntendRow' => $beautyIntendRow,'messageRow' => $messageRow);
	echo json_encode($dara);
?>
