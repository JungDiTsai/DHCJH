<?php
    require_once("_connectDHC.php");
    $addMember = json_decode($_REQUEST['addMember']);

    $errMsg='';
    try {
    $sql ="INSERT into member value (null,:memId,:memPsw,:memName,:memTel,:memEmail,:memImgUrl,:memState,:memGender)";
       $products = $pdo->prepare($sql);
       $products->bindValue(':memId',$addMember[0]);
       $products->bindValue(':memPsw',$addMember[1]);
       $products->bindValue(':memName',$addMember[2]);
       $products->bindValue(':memTel',$addMember[3]);
       $products->bindValue(':memEmail',$addMember[4]);
       $products->bindValue(':memImgUrl',"images/member/member.jpg");
       $products->bindValue(':memState','啟用');
       $products->bindValue(':memGender',$addMember[5]);
       $products->execute();
    //    $number = $products->rowCount();
    //    echo "異動 $number 筆資料";
        echo "註冊成功";
    } catch (PDOException $e) {
        // echo $_REQUEST['flyerSetting'];
        $errMsg .=  '錯誤原因' . $e->getMessage() . '<br>'; 
        $errMsg .=  '錯誤行號' . $e->getLine() . '<br>';
        echo $errMsg;
    }
?>