<?php
$price = $_REQUEST["price"];
$errMsg = "";
        try {

            require_once("connectBooks.php");
            $sql = "DELETE FROM administrator WHERE adminNo=:no";

            $products = $pdo->prepare( $sql );
            $products->bindValue(":no", $no);
        

            $products->execute();

        } catch (PDOException $e) {
        $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
        $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
        }
?>
