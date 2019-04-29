
<?php ////修改 檢舉宣傳單狀態

  
   
     $no= $_REQUEST["no"];
     $status = $_REQUEST["status"];
     $onoff = $_REQUEST["onoff"];//方式
    //  $flynum = $_REQUEST["flynum"];//宣傳單編號

     if($onoff=='無'){
         $statusnum = '1';
     }else {
        $statusnum = '0';
     }
     echo  $onoff.'='.$status. '-' .$no;  

    
        $errMsg = "";
            try {
            
            require_once("connectBooks.php");
            // $sql ="update finform set informStatus='已處理' , finformWay='無' where finformNo='12' ";
            $sql = "update finform set  informStatus=:status  , finformWay=:onoff    where  flyerNo=:no" ;
           
            $products = $pdo->prepare( $sql );         
            $products->bindValue(":no", $no);          
            $products->bindValue(":status", $status);
            $products->bindValue(":onoff", $onoff);
            $products->execute();
            ///////
            
            $sql2 = "update flyer set  flyeStatus=:statusnum    where  flyerNo=:no" ;
            $products2 = $pdo->prepare( $sql2 );         
            $products2->bindValue(":no", $no);          
            $products2->bindValue(":statusnum", $statusnum);
            $products2->execute();
           


            } catch (PDOException $e) {
                $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
                $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
            }

   
?>
<?php ///新增
    
?>

