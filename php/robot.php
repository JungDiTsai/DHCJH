<?php
try{
    $dsn = "mysql:host=localhost;port=3306;dbname=dhc;charset=utf8";
    $user = "root";
    $password = "root";
    $options = array(PDO::ATTR_CASE=>PDO::CASE_NATURAL, PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
    $pdo = new PDO($dsn, $user, $password, $options);
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