<?php
$price = $_REQUEST["price"];
$name = $_REQUEST["no"];
$couponstype = $_REQUEST["couponstype"];

echo $couponstype. '-' .$name;
$errMsg = "";
        try {

            require_once("dhc.php");
            $sql = "INSERT INTO memcoupons VALUES (NULL , :name , :couponstype , '2019-04-25' , '未使用') ";

            $products = $pdo->prepare( $sql );
            $products->bindValue(":name", $name);
            $products->bindValue(":couponstype", $couponstype);
            // $products->bindValue(":date", date(Y-m-d));
        

            $products->execute();

        } catch (PDOException $e) {
        $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
        $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
        }
?>
