
<?php ////修改 檢舉選美狀態

    // $page = $_REQUEST["page"];
   
     $no= $_REQUEST["no"];
     $status = $_REQUEST["status"];
     
     echo  $no;  

    
        $errMsg = "";
            try {
             
            require_once("connectBooks.php");
            $sql = "update binform set  informStatus=:status    where  binformNo=:no" ;
            $products = $pdo->prepare( $sql );         
            $products->bindValue(":no", $no);          
            $products->bindValue(":status", $status);
            
            $products->execute();
           

            } catch (PDOException $e) {
                $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
                $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
            }

   
?>
<<<<<<< HEAD

<?php ////修改 檢舉宣傳單狀態

  
   
     $no= $_REQUEST["no"];
     $status = $_REQUEST["status"];
     $onoff = $_REQUEST["onoff"];//方式
    //  $flynum = $_REQUEST["flynum"];//宣傳單編號

     if($onoff=='無'){
         $statusnum = 1;
     }else {
        $statusnum = 0;
     }
    //  echo  $onoff.'='.$status. '-' .$no;  

    
        $errMsg = "";
            try {
            
            require_once("connectBooks.php");
            // // $sql ="update finform set informStatus='已處理' , finformWay='無' where finformNo='12' ";
            $sql = "update binform set  informStatus=:status  , binformWay=:onoff    where  orderNo=:no" ;
           
            $products = $pdo->prepare( $sql );         
            $products->bindValue(":no", $no);          
            $products->bindValue(":status", $status);
            $products->bindValue(":onoff", $onoff);
            $products->execute();
            ///////
           
            $sql2 = "update orders set  beautyState=1 where  orderNo=:no" ;
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



=======
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
>>>>>>> 2170ebda4f360dc7b905c65271eb6d0b0bbaf07a
