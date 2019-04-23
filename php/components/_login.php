<?php
	session_start();
	require_once("_connectDHC.php");
	// $memId = $_POST["memId"];   
	// $memPsw = $_POST["memPsw"];
	$memId = "test";   
	$memPsw = "test";

	$errMsg = "";

	try {
		$sql = "select * from member join orders on(member.memno=orders.memno) where memId=:memId and memPsw=:memPsw;";
		$member = $pdo->prepare($sql);
		$member->bindValue(":memId", $memId);
		$member->bindValue(":memPsw", $memPsw);
		$member->execute();

	}catch (PDOException $e) {
		$errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
		$errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
	}
	
	if( $member->rowCount() == 0){
		echo "帳號密碼錯誤";
	}
	else{
		$data = $member->fetchAll(PDO::FETCH_ASSOC);
		if($data[0]["memState"]==0){ //判斷帳號狀態
			print_r($data);
			// echo json_encode($data,true);
			$_SESSION["member"]=$data;
		}else{
			echo "你的帳號已被凍結";
		}

	}

?>