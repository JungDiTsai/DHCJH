<?php
    require_once("_connectDHC.php");
    $orderNo = $_REQUEST['orderNo'];
    $errMsg='';

    try {
        $sql = "SELECT flyerNo FROM flyer where orderNo = $orderNo;";
        $products = $pdo->query($sql);
        $flyerNO = $products->fetch();
        echo $flyerNO[0];
       
       $sql = "UPDATE orders SET flyerNo = null where orderNo = $orderNo;";
       $products = $pdo->exec($sql);
       $sql = "UPDATE finform SET flyerNo = null where flyerNo = $flyerNO[0];";
       $products = $pdo->exec($sql);
       $sql = "DELETE FROM flyer WHERE orderNo = $orderNo;";
       $products = $pdo->exec($sql);
       $sql = "DELETE FROM finform WHERE flyerNo = null;";
       $products = $pdo->exec($sql);
    } catch (PDOException $e) {
       $errMsg .=  '錯誤原因' . $e->getMessage() . '<br>'; 
       $errMsg .=  '錯誤行號' . $e->getLine() . '<br>';
    }
?>