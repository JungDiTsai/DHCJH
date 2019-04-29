<?php
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

  $order->bindValue(":orderNo", null);
  $order->bindValue(":memNo", 01);
  $order->bindValue(":memCouponsNo", 001);
  $order->bindValue(":totalMoney", $orderInfo->totalMoney);
  $order->bindValue(":orderName", $orderInfo->orderName);
  $order->bindValue(":orderImgUrl", $file);
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