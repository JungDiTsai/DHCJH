<?php
    require_once("_connectDHC.php");
    $orderNo = $_REQUEST['orderNo'];
    $peopleNumber = "";
    $errMsg='';
    try {
        $sql = "SELECT peopleStatus FROM flyer WHERE flyerNo = (select flyerNo from orders where orderNo = $orderNo); ";
        $products = $pdo->query($sql);
        $products = $products->fetch();
        $peopleStatus = $products['peopleStatus'];

        if($peopleStatus==1){
            $sql = "SELECT flyerNo FROM orders WHERE orderNo = $orderNo; ";
            $products = $pdo->query($sql);
            $products = $products->fetch();
            $flyerNo = $products['flyerNo'];

            $sql = "SELECT peopleNumber FROM flyer WHERE flyerNo = $flyerNo; ";
            $products = $pdo->query($sql);
            $products = $products->fetch();
            $peopleNumber = $products['peopleNumber'];

            $sql ="UPDATE flyer set peopleNumber = $peopleNumber+1 where flyerNo = $flyerNo;";
            $products = $pdo->exec($sql);

            echo '你已經報名參加';
        }else{
            echo "此活動暫時不開放參加";
        }

        
    } catch (PDOException $e) {
        // echo $_REQUEST['flyerSetting'];
        $errMsg .=  '錯誤原因' . $e->getMessage() . '<br>'; 
        $errMsg .=  '錯誤行號' . $e->getLine() . '<br>';
        echo $errMsg;
    }
?>