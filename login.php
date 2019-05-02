<?php
$id = $_REQUEST["id"];   
$psw = $_REQUEST["psw"];
require_once("dhc.php");
$errMsg = "";
// echo 'dd';
try {
	
	$sql = "select * from administrator where adminId='{$id}'  and adminPsw='{$psw}' ";
	$admin = $pdo->query($sql);
	if( $admin->rowCount() == 0){
		echo '帳密錯誤請重新輸入';
	}else{
		$adminRow = $admin->fetchObject();
		echo '成功';
		// header('Location:back2.php');
	
		// echo $adminRow->adminId, ",您好";

	}
}catch (PDOException $e) {
	$errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
	$errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
}



     
