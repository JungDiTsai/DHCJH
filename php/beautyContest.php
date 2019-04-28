<?php
try{
    $dsn = "mysql:host=localhost;port=3306;dbname=dhc;charset=utf8";
    $user = "root";
    $password = "root";
    $options = array(PDO::ATTR_CASE=>PDO::CASE_NATURAL, PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
    $pdo = new PDO($dsn, $user, $password, $options);
    $sql = "SELECT * FROM orders  ORDER BY orderVote DESC LIMIT 3";
    $beautyContest = $pdo->query($sql);
}catch(PDOException $e){
    echo $e->getMessage();
}
?>