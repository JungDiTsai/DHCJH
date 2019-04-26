<?php
$price = $_REQUEST["price"];
echo $price;
$errMsg = "";
        try {

            require_once("dhc.php");
            $sql = "update coupons set status=:status  where couponsType=:no" ;

            $products = $pdo->prepare( $sql );
            $products->bindValue(":no", $no);
        

            $products->execute();

        } catch (PDOException $e) {
        $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
        $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
        }
?>
