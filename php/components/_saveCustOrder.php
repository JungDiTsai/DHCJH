<?php
// echo "hihi";
    // 存照片
    $upload_dir = "../../images/stageImages/";
    if( ! file_exists($upload_dir ))
    mkdir($upload_dir);
    $img = $_REQUEST["imgURL"]; //取得ajax的值
    
    $img = str_replace('data:image/png;base64,', '', $img);// 處理base64轉碼
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    
    $fileNum = count(glob("$upload_dir/*.*")) + 1 ;
    // $fileName = $fileNum;
    $file = $upload_dir . $fileNum . ".png";

    $success = file_put_contents($file, $data);
    echo $success ? $file : 'Unable to save the file.';  
    $orderImgUrl = "images/stageImages/" . $fileNum . ".png";

    // 寫入資料庫
    try{
        require_once("_connectDHC.php");
        $orderInfo = json_decode($_REQUEST["jsonStr"]);
        // $orderContent = array('troupeNo'=>$orderInfo['troupeNo'], 'fireNo'=>$orderInfo['fireNo'], 'fireworkNo'=>$orderInfo['fireworkNo'], 'audioNo'=>$orderInfo['audioNo'], 'pipeNo'=>$orderInfo['pipeNo']);
        $orderContent = array('troupeNo'=>$orderInfo->troupeNo, 
                              'fireNo'=>$orderInfo->fireNo, 
                              'fireworkNo'=>$orderInfo->fireworkNo, 
                              'audioNo'=>$orderInfo->audioNo, 
                              'pipeNo'=>$orderInfo->pipeNo);
        $orderContent = json_encode($orderContent);

        $sql = "INSERT INTO ORDERS (orderNo, memNo, memCouponsNo, totalMoney, orderName, orderImgUrl, orderVote, beautyState, actPlace, actStart, actContent, hostNo ) VALUE (:orderNo, :memNo, :memCouponsNo, :totalMoney, :orderName, :orderImgUrl, :orderVote, :beautyState, :actPlace, :actStart, :actContent, :hostNo )";
        $order = $pdo->prepare( $sql );
        // $order->bindValue(":orderNo", null);
        // $order->bindValue(":memNo", 01);
        // $order->bindValue(":memCouponsNo", 001);
        // // $order->bindValue(":totalMoney", $orderInfo['totalMoney']);
        // // $order->bindValue(":orderName", $orderInfo['orderName']);
        // // $order->bindValue(":orderImgUrl", $file);
        // $order->bindValue(":totalMoney", 100);
        // $order->bindValue(":orderName", 100);
        // $order->bindValue(":orderImgUrl", 100);
        // $order->bindValue(":orderVote", 0);
        // $order->bindValue(":beautyState", 1);
        // // $order->bindValue(":actPlace", $orderInfo['actPlace']);
        // $order->bindValue(":actStart", $orderInfo['actStart']);
        // $order->bindValue(":actPlace", 100);
        // $order->bindValue(":actContent", 01);
        // // $order->bindValue(":actContent", print_r($orderContent));
        // $order->bindValue(":hostNo", 100);


        $order->bindValue(":orderNo", null);
        $order->bindValue(":memNo", 01);
        $order->bindValue(":memCouponsNo", 001);
        $order->bindValue(":totalMoney", $orderInfo->totalMoney);
        $order->bindValue(":orderName", $orderInfo->orderName);
        // $order->bindValue(":orderImgUrl", $file);
        $order->bindValue(":orderImgUrl", $orderImgUrl);
        // $order->bindValue(":orderImgUrl", 'stageImages/22.jpeg');
        $order->bindValue(":orderVote", 0);
        $order->bindValue(":beautyState", 1);
        $order->bindValue(":actPlace", $orderInfo->actPlace);
        $order->bindValue(":actStart", $orderInfo->actStart);
        $order->bindValue(":actContent", $orderContent);
        $order->bindValue(":hostNo", $orderInfo->hostNo);

        $order->execute();

    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>