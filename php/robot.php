<?php
try{
    require_once("components/_connectDHC.php");
    $sql = "select * from robot where locate(robotAsk,:robotAsk)>0";
    $robotAsk = $pdo->prepare($sql);
    $robotAsk -> bindValue(":robotAsk",$_REQUEST["robotAsk"]);
    $robotAsk -> execute();
    if( $robotAsk->rowCount()==0 ){
        echo "不知道怎麼回答ˊˋ";
    }else{
        $robotAskRow = $robotAsk->fetch(PDO::FETCH_ASSOC);
        echo $robotAskRow["robotAns"];
    }


}catch(PDOException $e){
    echo $e->getMessage();
}
?>