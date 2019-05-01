<?php
    require_once("_connectDHC.php");
    $errMsg="";
    $orderNo = $_REQUEST['orderNo'];
    $input = $_REQUEST['input'];
    $memNo = $_REQUEST['memNo'];
    $date = date("Y-m-d");
    // echo $orderNo.",".$input.",".$memNo.",".$date;
    try {
       $sql = "INSERT into message value (null,$orderNo,$memNo,'$input','$date');";
       $products = $pdo->exec($sql);
       echo "留言成功";
    } catch (PDOException $e) {
       $errMsg .=  '錯誤原因' . $e->getMessage() . '<br>'; 
       $errMsg .=  '錯誤行號' . $e->getLine() . '<br>';
    }
    
?>