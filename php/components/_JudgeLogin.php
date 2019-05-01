<?php 
session_start();
require_once("_connectDHC.php");
if( isset($_SESSION["member"]) === true){

	// $memId = json_decode($_SESSION["member"]);
	$errMsg ='';
	$memId = $_SESSION["member"];
	$memId = $memId[0]['memId']; //session解下來為陣列物件
	try {
	$sql = "SELECT * from member left outer join orders on(member.memno=orders.memno) where memId = '$memId'";
	$member = $pdo->prepare($sql);
	
	$member->execute();
	}
	catch (PDOException $e) {
		$errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
		$errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
	}

	$data = $member->fetchAll();
	if($data[0]["memStatus"]==0){ //判斷帳號狀態
		
		$_SESSION["member"] = $data;
		echo json_encode($data);
	}else{
		echo "你的帳號已被凍結";
	}
}else{
	echo "notFound";
}	
?>