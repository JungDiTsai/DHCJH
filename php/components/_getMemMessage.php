<?php
    require_once("_connectDHC.php");
    $errMsg="";
    $orderNo = $_REQUEST['orderNo'];
    try {
       $sql = "SELECT * FROM message join member on message.memNo = member.memNo where orderno = $orderNo;";
       $products = $pdo->query($sql);
       $number = $products->rowCount();
       if($number!=0){
           $data = $products->fetchAll();
           echo json_encode($data);
       }else{
            echo "沒有留言";
       }
    } catch (PDOException $e) {
       $errMsg .=  '錯誤原因' . $e->getMessage() . '<br>'; 
       $errMsg .=  '錯誤行號' . $e->getLine() . '<br>';
    }
    
?>