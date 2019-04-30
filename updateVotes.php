<?php
    
    try{
        require_once("php/components/_connectDHC.php");
        $sql = "UPDATE orders set orderVote = orderVote + {$_REQUEST["amount"]} where orderNo = {$_REQUEST["orderNo"]}";
        //exit($sql);
        $updateVotes = $pdo->exec($sql);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>