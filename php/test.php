<?php
$errMsg="";


try {
    $dsn = "mysql:host=localhost;port=3306;dbname=dhc;charset=utf8";
    $user = "Jung";
    $password = "626425";
    $options = array(PDO::ATTR_CASE=>PDO::CASE_NATURAL, PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	$pdo = new PDO( $dsn, $user, $password, $options);   
	$sql = "select * from message join member m join orders o on(m.memno=o.memno);";
	$products=$pdo->query($sql);  //下指令
} catch (PDOException $e) {
	$errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
	$errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
}

echo $errMsg;  
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Examples</title>
<style type="text/css">
td {
	border-bottom:1px dotted deeppink;
}	
</style>
</head>
<body> 

<?php 
// //FETCH_BOTH 兩種格式都用
// $prodRow = $products->fetch(PDO::FETCH_BOTH);
// print_r( $prodRow);
// echo "<br>";
// echo "<br>";

// //FETCH_NUM 只用數字(類似index)
// $prodRow = $products->fetch(PDO::FETCH_NUM);
// print_r( $prodRow);
// echo "<br>";
// echo "<br>";

//FETCH_ASSOC 只用欄位名稱
$prodRow = $products->fetchAll(PDO::FETCH_ASSOC);
print_r( $prodRow);
echo "<br>";
echo "<br>";

// exit("------------");

?>	   
    
</body>
</html>