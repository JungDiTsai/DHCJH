<?php
    $orderNo =  $_REQUEST['orderNo'];

    require_once("_connectDHC.php");

    $errMsg='';
    try {
       $sql = "SELECT * from orders where orderNo = $orderNo";
       $products = $pdo->query($sql);
       $data = $products->fetch();

       $hostNo = $data['hostNo'];
       $sql = "SELECT * from host where hostNo = $hostNo";
       $products = $pdo->query($sql);
       $hostNo = $products->fetch(); //取得主持人細項資料

       $datailAll = json_decode($data['actContent']); //取得所有細節編號

       $troupeNo = $datailAll->troupeNo; //取得舞團細節編報
       $sql = "SELECT * from troupe where troupeNo = $troupeNo";
       $products = $pdo->query($sql);
       $troupeNo = $products->fetch(); //取得舞團細項資料
    //    $troupeNo = json_encode($troupeNo);

       $fireNo = $datailAll->fireNo;
       $sql = "SELECT * from effects where effectsNo = $fireNo";
       $products = $pdo->query($sql);
       $fireNo = $products->fetch(); //取得噴火細項資料
    //    $fireNo = json_encode($fireNo);
    
       $fireworkNo = $datailAll->fireworkNo;
       $sql = "SELECT * from fireworks where fireworkNo = $fireworkNo";
       $products = $pdo->query($sql);
       $fireworkNo = $products->fetch(); //取得煙火細項資料
    //    $fireworkNo = json_encode($fireworkNo);
    
    $audioNo = $datailAll->audioNo;
    $sql = "SELECT * from audio where audioNo = $audioNo";
    $products = $pdo->query($sql);
    $audioNo = $products->fetch(); //取得音響細項資料
    // $audioNo = json_encode($audioNo);
    
       $pipeNo = $datailAll->pipeNo;
       $sql = "SELECT * from pipe where pipeNo = $pipeNo";
       $products = $pdo->query($sql);
       $pipeNo = $products->fetch(); //取得鋼管細項資料
       //    $pipeNo = json_encode($pipeNo);
       
          $dataAll = Array();
          $dataAll["data"] = $data;
          $dataAll["troupeNo"] = $troupeNo;
          $dataAll["fireNo"] = $fireNo;
          $dataAll["fireworkNo"] = $fireworkNo;
          $dataAll["audioNo"] = $audioNo;
          $dataAll["pipeNo"] = $pipeNo;
          $dataAll["hostNo"] = $hostNo;
          
          echo json_encode($dataAll);
   
    } catch (PDOException $e) {
       $errMsg .=  '錯誤原因' . $e->getMessage() . '<br>'; 
       $errMsg .=  '錯誤行號' . $e->getLine() . '<br>';
    }
?>