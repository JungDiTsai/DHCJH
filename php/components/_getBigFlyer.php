<?php
    require_once("_connectDHC.php");
    $errMsg='';
    try {
       $sql = 'SELECT * FROM flyer';
       $products = $pdo->query($sql);
       

    } catch (PDOException $e) {
       $errMsg .=  '錯誤原因' . $e->getMessage() . '<br>'; 
       $errMsg .=  '錯誤行號' . $e->getLine() . '<br>';
    }

    $number =  $products->rowCount();
    $products = $products->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($products);

?>