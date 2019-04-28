<?php
    require_once("_connectDHC.php");
    $member = $_REQUEST['member'];
    
    $member = json_decode($member);
    $errMsg='';
    try {
       $sql = "UPDATE member SET memId='$member[0]',memPsw='$member[1]',memName='$member[4]',memTel=$member[3],memEmail='$member[2]' where memNo = $member[5]";
       $products = $pdo->exec($sql);
    } catch (PDOException $e) {
       $errMsg .=  '錯誤原因' . $e->getMessage() . '<br>'; 
       $errMsg .=  '錯誤行號' . $e->getLine() . '<br>';
    }


    

?>