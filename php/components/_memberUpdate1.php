<?php
    require_once("_connectDHC.php");
    $member = $_REQUEST['member'];
    
    $member = json_decode($member);
    $errMsg='';
    try {
       $sql = "UPDATE member SET memId='$member[0]',memName='$member[3]',memTel='$member[2]',memEmail='$member[1]' where memNo = $member[4]";
       $products = $pdo->exec($sql);
    } catch (PDOException $e) {
       $errMsg .=  '錯誤原因' . $e->getMessage() . '<br>'; 
       $errMsg .=  '錯誤行號' . $e->getLine() . '<br>';
    }

?>