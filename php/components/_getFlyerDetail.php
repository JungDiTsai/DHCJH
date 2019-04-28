<?php
    require_once("_connectDHC.php");
    $errMsg='';
    $orderNo = $_REQUEST['orderNo'];
    try {
      $sql = "select * from orders join flyer on flyer.flyerno= orders.flyerno join member on member.memno = orders.memno join host on orders.hostNo = host.hostNo where orders.orderNo = $orderNo;";
      $products = $pdo->query($sql);
      
   } catch (PDOException $e) {
      $errMsg = '';
      $errMsg .=  '錯誤原因' . $e->getMessage() . '<br>'; 
      $errMsg .=  '錯誤行號' . $e->getLine() . '<br>';
      echo $errMsg;
   }
   // $number =  $products->rowCount();
   $products = $products->fetch();
   // print_r($products) ;
   echo json_encode($products);
?>