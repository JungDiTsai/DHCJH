
<?php ////修改 宣傳單圖片

    $pagevalue = $_REQUEST["pagevalue"];
    if( $pagevalue =='修改'){

     $id = $_REQUEST["id"];
     $no= $_REQUEST["no"];
   
     $status = $_REQUEST["status"];
     
    //  echo  $pagevalue;  
    
    
        $errMsg = "";
            try {
             
            require_once("connectBooks.php");
            $sql = "update flyimg set  flyTitle=:id   , flyStatus=:status  where flyNo=:no" ;
            // $sql = "update member set  memId=:id  , memPsw=:psw , memStatus=:status where memNo=:no";
            $products = $pdo->prepare( $sql );
            $products->bindValue(":id", $id);
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
  
    
     
     $pagevalue = $_REQUEST["pagevalue"];
     if($pagevalue =='新增'){

            $status = $_REQUEST["status"];
            $id = $_REQUEST["id"];
            $filename = $_REQUEST["filename"];

            
            $img = $_REQUEST["img"];
            $filenum = $_REQUEST["filenum"];
            // echo   $filename;  

        //     // 轉檔 & 存檔
            if($filenum=='jpg' || $filenum=='jpeg'){
                $num='jpeg';
                $type='.jpg';
            }else if($filenum=='png'){
                $num = 'png';
                $type='.png';
            }else{
                // echo '請選擇jpg或png檔案類型';
            }

            if($num != null){
                $jpeg = 'data:image/'.  $num  .';base64';
                $img = str_replace($jpeg, '', $img);
                // $img = str_replace('data:image/{$num};base64,', '', $img);
        
                $img = str_replace(' ', '+', $img);
                $data = base64_decode($img);
                // $file = "images/" . uniqid() . $type;
                $file = "images/flyerimg" . uniqid() . $type;
                
                $success = file_put_contents($file, $data);
                $output = ($success) ? '<img src="'. $file .'" alt="Canvas Image" />' : '<p>Unable to save the file.</p>';
            //    echo  $output;
            }
       
        
        $errMsg = "";
        try {

        require_once("connectBooks.php");
        $sql = "INSERT INTO  flyimg  VALUES  (null , :id ,  :file ,  :status);";

        $products = $pdo->prepare( $sql );
        $products->bindValue(":id", $id);
        
        $products->bindValue(":file", $file);
        
        $products->bindValue(":status", $status);

        $products->execute();

        } catch (PDOException $e) {
        $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
        $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
        }
    }
?>


