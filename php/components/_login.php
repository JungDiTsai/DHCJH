<?php
	session_start();
	$memId = $_POST["memId"];   
	$memPsw = $_POST["memPsw"];
	$errMsg = "";

	try {
		require_once("_connectDHC.php");
		$sql = "select * from member where memId=:memId and memPsw=:memPsw";
		$member = $pdo->prepare($sql);
		$member->bindValue(":memId", $memId);
		$member->bindValue(":memPsw", $memPsw);
		$member->execute();
		// -------綁定欄位資料---------------------------
		$member->bindColumn("memNo", $memNo);
		$member->bindColumn("memId",$memId);
		$member->bindColumn("memId",$memPsw);
		$member->bindColumn("memName", $memName);
		$member->bindColumn("memTel", $memTel);
		$member->bindColumn("memEmail", $memEmail);
		$member->bindColumn("memImgUrl", $memImgUrl);
		$member->bindColumn("memGender", $memGender);
		$member->bindColumn("memState", $memState);
		// ---------------------------------------------
	}catch (PDOException $e) {
		$errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
		$errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
	}
	
	if( $member->rowCount() == 0){
		echo "查無此帳號";
	}
	else if($member->rowCount() != 0 && $member->rowCount() == 0){
		echo "密碼錯誤";
	}
	else{
		$data = $member->fetch();
		//write to session
		
		if($memGender==0){ //判斷性別
			$memGender = "小姐";
		}else if($memGender==0){
			$memGender = "先生";
		}else{
			$memGender = "會員";
		}
	
		if($memState==0){ //判斷帳號狀態
			// $Combination = array($memName,$memImgUrl,$memGender);
			$Combination = array("memNO"=>$memNo,"memId"=>$memId,"memPsw"=>$memPsw,"memName"=>$memName,"memTel"=>$memTel,"memEmail"=>$memEmail,"memImgUrl"=>$memImgUrl,"memGender"=>$memGender);
			echo json_encode($Combination);
			$_SESSION["member"]=$Combination;
		}else{
			echo "你的帳號已被凍結";
		}

	}



?>