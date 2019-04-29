<?php
    require_once("_connectDHC.php");
    $orderNo = $_REQUEST['orderNo'];
    
    $errMsg='';
    try {
       $sql = "DELETE FROM `collection` WHERE orderNo = $orderNo;";
       $products = $pdo->exec($sql);
    } catch (PDOException $e) {
       $errMsg .=  '錯誤原因' . $e->getMessage() . '<br>'; 
       $errMsg .=  '錯誤行號' . $e->getLine() . '<br>';
    }

?>