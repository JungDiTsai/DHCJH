<?php ////修改mem

$pagevalue = $_REQUEST["pagevalue"];
if( $pagevalue =='修改'){

    
     $no= $_REQUEST["no"];
     $psw = $_REQUEST["psw"];
     $status = $_REQUEST["status"];
     
     echo $psw;
    
        $errMsg = "";
        try {
           
            require_once("connectBooks.php");
            $sql = "update member set  memPsw=:psw , memStatus=:status  where memNo=:no";
            $products = $pdo->prepare( $sql );
           
            $products->bindValue(":no", $no);
            $products->bindValue(":psw", $psw);
            $products->bindValue(":status", $status);
            $products->execute();
           

        } catch (PDOException $e) {
        $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
        $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
        echo  $errMsg;
        }
    }

?>


 


