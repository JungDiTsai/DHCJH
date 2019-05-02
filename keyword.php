
<?php ////修改 admin

$pagevalue = $_REQUEST["pagevalue"];
    if( $pagevalue =='修改'){

     $id = $_REQUEST["id"];
     $no= $_REQUEST["no"];
     $psw = $_REQUEST["psw"];
     $status = $_REQUEST["status"];
     
    //  echo 'back',$id;  

    
        $errMsg = "";
            try {
             
            require_once("connectBooks.php");
            $sql = "update robot set  robotAsk=:id  , robotAns=:psw , robotStatus=:status where robotNo=:no" ;
            // $sql = "update member set  memId=:id  , memPsw=:psw , memStatus=:status where memNo=:no";
            $products = $pdo->prepare( $sql );
            $products->bindValue(":id", $id);
            $products->bindValue(":no", $no);
            $products->bindValue(":psw", $psw);
            $products->bindValue(":status", $status);
            
            $products->execute();
           

            } catch (PDOException $e) {
                $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
                $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
            }

    }  
?>
<?php ///新增
    $pagevalue = $_REQUEST["pagevalue"];
    if( $pagevalue =='新增'){
        $id = $_REQUEST["id"];
        //  $id = $_REQUEST["no"];
         $psw = $_REQUEST["psw"];
         
         $status = $_REQUEST["status"];
    
        //  echo $id;
       
        $errMsg = "";
        try {
    
            require_once("connectBooks.php");
            $sql = "INSERT INTO  robot  VALUES  (null ,  :id , :psw ,  :status);";
    
            $products = $pdo->prepare( $sql );
            $products->bindValue(":id", $id);
            $products->bindValue(":psw", $psw);
            $products->bindValue(":status", $status);
    
            $products->execute();
    
        } catch (PDOException $e) {
        $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
        $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
        }
    }
   
?>
