
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
            $sql = "update administrator set  adminId=:id  , adminPsw=:psw , adminStatus=:status where adminNo=:no" ;
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
         $permission = $_REQUEST["permission"];
         $status = $_REQUEST["status"];
    
         echo $id;
       
        $errMsg = "";
        try {
    
            require_once("connectBooks.php");
            $sql = "INSERT INTO  administrator  VALUES  (null , :name , :id, :psw, :permission, :status);";
    
            $products = $pdo->prepare( $sql );
            $products->bindValue(":id", $id);
            $products->bindValue(":name", '員工');
            $products->bindValue(":psw", $psw);
            $products->bindValue(":permission", $permission);
            $products->bindValue(":status", $status);
    
            $products->execute();
    
        } catch (PDOException $e) {
        $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
        $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
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
