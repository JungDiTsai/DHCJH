<?php
    require_once("_connectDHC.php");
	$memId = $_REQUEST["memId"];   
    $errMsg = "";
	try {
    	$sql = "select * from member where memId = :memId;";
		$member = $pdo->prepare($sql);
		$member->bindValue(":memId", $memId);
		$member->execute();

	}catch (PDOException $e) {
		$errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
		$errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
	}
	// echo $errMsg;
	if( $member->rowCount() == 0){
		echo "帳號可使用";
	}
	else{
        echo "已有此帳號";
        // $data = $member->fetch();
        // print_r($data);
	}
?>