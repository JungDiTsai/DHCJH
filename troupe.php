
<?php ////修改 宣傳單圖片

    $pagevalue = $_REQUEST["pagevalue"];
    if( $pagevalue =='修改'){
     $price = $_REQUEST["price"];
     $id = $_REQUEST["id"];
     $no= $_REQUEST["no"];
     $status = $_REQUEST["status"];
     
     echo  $no;  

    
        $errMsg = "";
            try {
             
            require_once("connectBooks.php");
            
            $sql = "update troupe set  troupeName=:id  , troupePrice=:price , troupeStatus=:status  where troupeNo=:no" ;
            $products = $pdo->prepare( $sql );
            $products->bindValue(":id", $id);
            $products->bindValue(":no", $no);
            $products->bindValue(":price", $price);
            $products->bindValue(":status", $status);
            
            $products->execute();
           

            } catch (PDOException $e) {
                $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
                $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
               echo  $errMsg;
            }

    }  
?>
<?php ///新增
         $pagevalue = $_REQUEST["pagevalue"];
         if($pagevalue =='新增'){
     
             $status = $_REQUEST["status"];
             $id = $_REQUEST["id"];
             $price = $_REQUEST["price"];
             
             $upfilename = $_REQUEST["upfilename"];
             $img = $_REQUEST["img"];
             $upfilenum = $_REQUEST["upfilenum"];

             $gifname = $_REQUEST["gifname"];
             $gifnum = $_REQUEST["gifnum"];
             $img2 = $_REQUEST["newgiffile"];

            echo    $gifname ,'-', $gifnum , '-', $img2;
          ////// 轉檔 & 存檔第一個
             if($upfilenum=='jpg' || $upfilenum=='jpeg' ){
                 $num='jpeg';
                 $type='.jpg';
             }else if($upfilenum=='png'){
                 $num = 'png';
                 $type='.png';
             }else if($upfilenum=='gif'){
                // echo '請選擇jpg或png檔案類型';
                $num = 'gif';
                $type='.gif';
            }
        ///////轉檔 & 存檔第二個
            if($gifnum=='jpg' || $gifnum=='jpeg' ){
                $num2='jpeg';
                $type2='.jpg';
            }else if($gifnum=='png'){
                $num2 = 'png';
                $type2='.png';
            }else if($gifnum=='gif'){
                // echo '請選擇jpg或png檔案類型';
                $num2 = 'gif';
                $type2='.gif';
            }
             if($num != null){
                 $jpeg = 'data:image/'.  $num  .';base64';
                 $img = str_replace($jpeg, '', $img);
                
         
                 $img = str_replace(' ', '+', $img);
                 $data = base64_decode($img);
                 // $file = "images/" . uniqid() . $type;
                 $file = "images/customized/" . uniqid() . $type;
                 
                 $success = file_put_contents($file, $data);
                 $output = ($success) ? '<img src="'. $file .'" alt="Canvas Image" />' : '<p>Unable to save the file.</p>';
                //  echo  $output;
             }
             ////////////////////////////第二個
             if($num2 != null){
                $jpeg2 = 'data:image/'.  $num2  .';base64';
                $img2 = str_replace($jpeg2, '', $img2);
         
        
                $img2 = str_replace(' ', '+', $img2);
                $data2 = base64_decode($img2);
                // $file = "images/" . uniqid() . $type;
                $file2 = "images/customized/" . uniqid() . $type2;
                
                $success = file_put_contents($file2, $data2);
                $output = ($success) ? '<img src="'. $file2 .'" alt="Canvas Image" />' : '<p>Unable to save the file.</p>';
                // echo   $file2;
            }
         
         $errMsg = "";
         try {
     
         require_once("connectBooks.php");
         $sql = "INSERT INTO  troupe  VALUES  (null , :id , :price , :status , :file , :file2 );";
     
         $products = $pdo->prepare( $sql );
         $products->bindValue(":id", $id);
         
         $products->bindValue(":file", $file);
         $products->bindValue(":price", $price);
         $products->bindValue(":file2", $file2);
         
         $products->bindValue(":status", $status);
     
         $products->execute();
     
         } catch (PDOException $e) {
             $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
             $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
         }
     }
?>


