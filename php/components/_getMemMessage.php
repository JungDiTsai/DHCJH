<?php
    require_once("_connectDHC.php");
    $errMsg="";
    $orderNo = $_REQUEST['orderNo'];
    try {
       $sql = "select * from orders left outer join message on  orders.orderno = message.orderno join member on message.memNo = member.memNo where orders.orderno = $orderNo;";
       $products = $pdo->query($sql);
       $number = $products->rowCount();
       if($number!=0){
           $data = $products->fetchAll();
           echo json_encode($data);
       }else{
            $sql = "select * from orders where orders.orderno = $orderNo;";
            $products = $pdo->query($sql);
            $data = $products->fetch();
            echo json_encode($data);
       }
    } catch (PDOException $e) {
       $errMsg .=  '錯誤原因' . $e->getMessage() . '<br>'; 
       $errMsg .=  '錯誤行號' . $e->getLine() . '<br>';
    }
    
?>