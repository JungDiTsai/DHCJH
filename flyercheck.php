
<?php ////修改 檢舉宣傳單狀態

    
    $pagevalue = $_REQUEST["pagevalue"];

     $no= $_REQUEST["no"];
     $status = $_REQUEST["status"];
     
     echo  $no;  

    
        $errMsg = "";
            try {
             
            require_once("connectBooks.php");
            $sql = "update flyer set  flyeStatus=:status    where  flyerNo=:no" ;
            $products = $pdo->prepare( $sql );         
            $products->bindValue(":no", $no);          
            $products->bindValue(":status", $status);
            
            $products->execute();
           

            } catch (PDOException $e) {
                $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
                $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
            }

   
?>
<?php ///新增
    
?>

