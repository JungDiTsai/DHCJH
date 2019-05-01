
<?php ////修改 宣傳單圖片

$pagevalue = $_REQUEST["pagevalue"];
    if( $pagevalue =='修改'){

     $id = $_REQUEST["id"];
     $no= $_REQUEST["no"];
     $tel = $_REQUEST["tel"];
     $content = $_REQUEST["content"];
     $hostA = $_REQUEST["hostA"];
     $hostB = $_REQUEST["hostB"];
     $hostC = $_REQUEST["hostC"];
     $hostD = $_REQUEST["hostD"];
     $hostE = $_REQUEST["hostE"];
     $hostF = $_REQUEST["hostF"];
     $price = $_REQUEST["price"];
     $status = $_REQUEST["status"];
     
     echo  $hostF;  

    
        $errMsg = "";
            try {
             
            require_once("connectBooks.php");
            // $sql = "update host set  hostName=:id , hostTel=:tel , hostContent=:content , hostA=:hostA ,  hostB=:hostB , hostC=:hostC  where hostNo=:no" ;
            $sql = "update host set  hostName=:id , hostStatus=:status , hostTel=:tel , hostContent=:content , hostA=:hostA ,  hostB=:hostB , hostC=:hostC , hostD=:hostD , hostE=:hostE , hostF=:hostF , price=:price  where hostNo=:no" ;
            $products = $pdo->prepare( $sql );
            $products->bindValue(":id", $id);
            $products->bindValue(":no", $no);
            $products->bindValue(":tel", $tel);
            $products->bindValue(":content", $content);
            $products->bindValue(":hostA", $hostA);
            $products->bindValue(":hostB", $hostB);
            $products->bindValue(":hostC", $hostC);
            $products->bindValue(":hostD", $hostD);
            $products->bindValue(":hostE", $hostE);
            $products->bindValue(":hostF", $hostF);
            $products->bindValue(":price", $price);
            $products->bindValue(":status", $status);
            
            $products->execute();
           

            } catch (PDOException $e) {
                $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
                $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
            }

    }  
?>
<?php ///新增
    //  $page = $_REQUEST["page"];
    //  $id = $_REQUEST["id"];
    // //  $id = $_REQUEST["no"];
    //  $psw = $_REQUEST["psw"];
    //  $permission = $_REQUEST["permission"];
    //  $status = $_REQUEST["status"];

    //  echo $id;
   
    // $errMsg = "";
    // try {

    //     require_once("connectBooks.php");
    //     $sql = "INSERT INTO  administrator  VALUES  (null , :name , :id, :psw, :permission, :status);";

    //     $products = $pdo->prepare( $sql );
    //     $products->bindValue(":id", $id);
        
    //     $products->bindValue(":psw", $psw);
    //     $products->bindValue(":permission", $permission);
    //     $products->bindValue(":status", $status);

    //     $products->execute();

    // } catch (PDOException $e) {
    // $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
    // $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
    // }
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
