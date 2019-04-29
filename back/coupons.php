
<?php ////修改 coupnos  

    $pagevalue = $_REQUEST["pagevalue"];   
    if( $pagevalue =='修改'){
    
     $no= $_REQUEST["no"];
 
     $status = $_REQUEST["status"];   
     echo  $pagevalue;  
     
        $errMsg = "";
            try {
             
            require_once("connectBooks.php");
            $sql = "update coupons set status=:status  where couponsType=:no" ;
            $products = $pdo->prepare( $sql );
           
            $products->bindValue(":no", $no);
            
            $products->bindValue(":status", $status);            
            $products->execute();
           
            } catch (PDOException $e) {
                $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
                $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
            }
    }  
?>
<?php ///新增
    // phpinfo();
    
     $pagevalue = $_REQUEST["pagevalue"];

     if( $pagevalue =='新增'){
         
     $id = $_REQUEST["id"];
     
     $psw = $_REQUEST["psw"];
    
     $status = $_REQUEST["status"];
     echo $pagevalue;
        $errMsg = "";
        try {
            echo $id;

            require_once("connectBooks.php");
           
            $sql = "INSERT INTO  coupons  VALUES  ( null  , :id , :psw  ,  :status  );";

            $products = $pdo->prepare( $sql );
            $products->bindValue(':id', $id);    
            $products->bindValue(":psw", $psw);       
            $products->bindValue(":status", $status);
            
            $products->execute();

        } catch (PDOException $e) {
            $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
            $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
            echo $errMsg;
        }
    }
   
?>

<?php ///刪除
//      $no = $_REQUEST["no"];
//      $delete = $_REQUEST["delete"];
    
//    if($delete =='刪除'){
//     echo $no;
//     $errMsg = "";
//     try {

//         require_once("connectBooks.php");
//         $sql = "DELETE FROM administrator WHERE adminNo=:no ";

//         $products = $pdo->prepare( $sql );
//         $products->bindValue(":no", $no);
       

//         $products->execute();

//     } catch (PDOException $e) {
//     $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
//     $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
//     }

//    }
    
?> 
