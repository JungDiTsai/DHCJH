<?php
    $orderNo =  $_REQUEST['orderNo'];
    $setting = $_REQUEST['setting'];

    require_once("_connectDHC.php");

    $errMsg='';
    try {
       $sql = "UPDATE flyer SET peopleStatus=$setting where orderNo = $orderNo";
       $products = $pdo->exec($sql);
       if($setting==1){
            echo "修改成功 啟動";
       }
       else{
            echo "修改成功 關閉";
       }
    } catch (PDOException $e) {
       $errMsg .=  '錯誤原因' . $e->getMessage() . '<br>'; 
       $errMsg .=  '錯誤行號' . $e->getLine() . '<br>';
    }
?>