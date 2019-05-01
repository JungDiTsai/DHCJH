<?php
$errMsg="";
// exit( $_REQUEST["orderNo"] . $_REQUEST["messageContent"]);
try {
	require_once("../php/components/_connectDHC.php"); 
	$pdo = new PDO( $dsn, $user, $password, $options);   
    //撈訊息
	$orderNo = $_REQUEST["orderNo"];
	// $memNo=1;
    $memNo =$_REQUEST["memNo"];
    // $sql = "INSERT INTO collection(memNo,orderNo ) VALUES ($memNo,$orderNo) ;";
    $sql = "SELECT * FROM collectionWHERE memNo =  $memNo AND orderNo = $orderNo";
    if($sql == 1){
        $sql = "DELETE FROM collection WHERE memNo = $memNo AND orderNo= $orderNo";
    }else{
        $sql = "INSERT INTO collection(memNo,orderNo ) VALUES ($memNo,$orderNo) ";
    };
    $sql = "SELECT * FROM collection WHERE memNo =  $memNo AND orderNo = $orderNo";
    $addcollection = $pdo ->query($sql);
    $number = $addcollection->rowCount();
    if($number!=1){
        $sql = "INSERT INTO collection(memNo,orderNo ) VALUES ($memNo,$orderNo)";
        $pdo ->exec($sql);
    }else{
        $sql = "DELETE FROM collection WHERE memNo = $memNo AND orderNo= $orderNo";
        $pdo ->exec($sql);
    }
} catch (PDOException $e) {
	$errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
	$errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
}

echo $errMsg;  
?>
