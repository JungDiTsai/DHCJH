<?php
    require_once("_connectDHC.php");

    $flyerSetting = json_decode( $_REQUEST['flyerSetting'] );
    $orderNo = $_REQUEST['orderNo'];

    if($flyerSetting[3]==''){
        $flyerSetting[3]= date("Y/m/d");
    }
    $errMsg='';
    
    try {

        $sql ="SELECT * From flyer where orderNo = $orderNo";
        $products = $pdo->query($sql);
        $number = $products->rowCount();


        if($number==1){
            $sql ="UPDATE flyer SET flyerImgUrl='$flyerSetting[0]' where orderNo = $orderNo";
            $products = $pdo->exec($sql);
            echo "異動 $number 筆資料";
        }else{

            // 新增flyer資料
            $sql ="INSERT into flyer value (null,:orderNo,:flyeImgUrl,0,:flyeStatus,:flyeDate,:flyeradd,:peopleState,:flyerText)";
            $products = $pdo->prepare($sql);
            $products->bindValue(':orderNo',$orderNo);
            $products->bindValue(':flyeImgUrl',$flyerSetting[0]);
            $products->bindValue(':flyeDate',$flyerSetting[3]);
            $products->bindValue(':flyerText',$flyerSetting[8]);
            $products->bindValue(':peopleState',$flyerSetting[9]);
            $products->bindValue(':flyeStatus',$flyerSetting[10]);
            $products->bindValue(':flyeradd',$flyerSetting[7]);
            $products->execute();
            $number = $products->rowCount();
            echo "異動 $number 筆資料";

            //取得新增的flyer資料的flyerNo
            $sql = "SELECT flyerNo FROM flyer WHERE orderNo = $orderNo";
            $products = $pdo->query($sql);
            $date =  $products->fetchAll();
            $number = (count($date)-1);
            $flyerNo = $date[$number]['flyerNo'] ;

            //寫入orderrs資料表的flyerNo欄位
            $sql = "UPDATE orders set flyerNo=$flyerNo where orderNo = $orderNo";
            $products = $pdo->exec($sql);
        }
    } catch (PDOException $e) {
        $errMsg .=  '錯誤原因' . $e->getMessage() . '<br>'; 
        $errMsg .=  '錯誤行號' . $e->getLine() . '<br>';
        echo $errMsg;
    }
    ?>