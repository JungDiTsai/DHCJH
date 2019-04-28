<?php
$errMsg = "";
// if( isset($_SESSION["memId"]) === false ){  //尚未登入
//     echo "<center>尚未登入，<a href='login.html'>請登入</a></center><br>";
//     $_SESSION["where"] = $_SERVER["PHP_SELF"];
// }else{
    // $orderMemNo = 1;
    // $email = "sara168@gmail.com";
    try{
    require_once("connectBooks.php");

    //啟動交易管理
    $pdo->beginTransaction();

    //寫入訂單主檔
    $sql = "INSERT INTO ORDERS VALUES (orderNo=null, memNo=:memNo, memCouponsNo=:memCouponsNo, totalMoney=:totalMoney, orderImgUrl=:orderImgUrl, actPlace=:actPlace, actStart=:actStart)";
    $custOrder = $pdo->prepare($sql);
    $custOrder->bindValue(":memNo", memNo);
    $custOrder->bindValue(":memCouponsNo", memCouponsNo);
    $custOrder->bindValue(":totalMoney", subtotal);
    $custOrder->bindValue(":orderImgUrl", orderImgUrl);
    $custOrder->bindValue(":actPlace", locValue);
    $custOrder->bindValue(":actStart", datevalue);

    $custOrder->execute();

    //取得訂單編號
    $orderNo = $pdo->lastInsertId();

    //寫入訂單明細 `orderitems` (`orderNo`, `productNo`, `quantity`)
    // $sql = "INSERT INTO ORDERITEMS VALUES ( $orderNo, :productNo, :quantity)";
    // $orderItems = $pdo->prepare($sql);

    // foreach( $_SESSION["qty"] as $psn => $qty ){
    //     $orderItems->bindValue(":productNo", $psn);
    //     $orderItems->bindValue(":quantity", $qty);
    //     $orderItems->execute();
    // };
    
    $pdo->commit();

    }catch (PDOException $e){
        $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
        $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";  	
    }
// }

  
//   if( $member->rowCount() == 0 ){ //找不到
//     //傳回空的JSON字串
//     echo "{}";
//   }else{ //找得到
//     //取回一筆資料
//     $memRow = $member->fetch(PDO::FETCH_ASSOC);

//     //送出json字串
//     echo json_encode($memRow);
//   }	
?>