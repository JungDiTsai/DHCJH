
<?php ////修改 檢舉選美狀態

    // $page = $_REQUEST["page"];
   
     $no= $_REQUEST["no"];
     $status = $_REQUEST["status"];
     
    //  echo  $no;  

    
        $errMsg = "";
            try {
             
            require_once("connectBooks.php");
            $sql = "update minform set  informStatus=:status    where  minformNo=:no" ;
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
