<?php
    require_once("php/components/_connectDHC.php");
    try{
        $dsn = "mysql:host=localhost;port=3306;dbname=dhc;charset=utf8";
        $user = "Jung";
        $password = "626425";
        $options = array(PDO::ATTR_CASE=>PDO::CASE_NATURAL, PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
        $pdo = new PDO($dsn, $user, $password, $options);
        $sql = "UPDATE orders set orderVote = orderVote + {$_REQUEST["amount"]} where orderNo = {$_REQUEST["orderNo"]}";
        //exit($sql);
        $updateVotes = $pdo->exec($sql);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>