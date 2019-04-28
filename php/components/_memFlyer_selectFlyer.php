<?php
    require_once("_connectDHC.php");
    $orderNo = $_REQUEST['orderNo'];
    $errMsg='';
    try {
        
        $sql = "SELECT * from flyer where orderNo = $orderNo;";
        $products = $pdo->query($sql);

    } catch (PDOException $e) {
       $errMsg .=  '錯誤原因' . $e->getMessage() . '<br>'; 
       $errMsg .=  '錯誤行號' . $e->getLine() . '<br>';
    }
    // echo "hihi";
       $products = $products->fetch();
       echo json_encode($products);
       
?>