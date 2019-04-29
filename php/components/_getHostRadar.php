<?php
$errMsg="";
    try{
        require_once("_connectDHC.php");
        $sql = "SELECT * FROM host";
        $host = $pdo->query($sql);
        
        $i=0;
        while ($hostInfo = $host->fetch(PDO::FETCH_ASSOC)){
            $hostContent[$i] = array(
                'hostA'=>$hostInfo['hostA'],
                'hostB'=>$hostInfo['hostB'],
                'hostC'=>$hostInfo['hostC'],
                'hostD'=>$hostInfo['hostD'],
                'hostE'=>$hostInfo['hostE'],
                'hostF'=>$hostInfo['hostF'],
            );
            $i++;
        }

        $hostContent = json_encode($hostContent);
        echo $hostContent;

    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>