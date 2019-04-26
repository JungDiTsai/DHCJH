<?php
    require_once("_connectDHC.php");
    $errMsg='';
    $orderNo = $_REQUEST['orderNo'];
    $str = $_REQUEST['str'];
    $MymemNo = $_REQUEST['MymemNo'];
   //  echo $orderNo;
    try {
        $sql = "SELECT flyerNo from orders where orderNo = $orderNo";
        $products = $pdo->query($sql);
        $products = $products->fetch();
        $flyerNo = $products['flyerNo'];
        $sql = "INSERT into finform value (null,:flyerNo,:memNo,:informReason,'未處理');";
        $products = $pdo->prepare($sql);
        $products->bindValue(':flyerNo',$flyerNo);
        $products->bindValue(':memNo',$MymemNo);
        $products->bindValue(':informReason',$str);
        $products->execute();
        $number = $products->rowCount();
        echo "已收到你的檢舉訊息，我們將盡快為你處理";
      
   } catch (PDOException $e) {
      $errMsg = '';
      $errMsg .=  '錯誤原因' . $e->getMessage() . '<br>'; 
      $errMsg .=  '錯誤行號' . $e->getLine() . '<br>';
      echo $errMsg;
   }
?>