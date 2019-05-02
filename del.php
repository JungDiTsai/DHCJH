

<?php ///刪除admin
     $no = $_REQUEST["no"];
     $page = $_REQUEST["page"];
    
    if($page =='admin'){
        $errMsg = "";
        try {

            require_once("connectBooks.php");
            $sql = "DELETE FROM administrator WHERE adminNo=:no";

            $products = $pdo->prepare( $sql );
            $products->bindValue(":no", $no);
        

            $products->execute();

        } catch (PDOException $e) {
        $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
        $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
        }

    }else if($page =='id'){  
        ///刪除member
       

    }else if($page =='flyer'){
        //刪除flyer
        // echo $no;
        $errMsg = "";
        try {

            require_once("connectBooks.php");
            
            $sql = "DELETE FROM flyimg WHERE  flyNo=:no ";
            // echo $no;
            $products = $pdo->prepare( $sql );
            $products->bindValue(":no", $no);
        
            // echo $no;
            $products->execute();

            } catch (PDOException $e) {
            $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
            $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
        }

    }else if ($page =='host'){
         //刪除host
        //  echo $no;
         $errMsg = "";
         try {
 
             require_once("connectBooks.php");
             
             $sql = "DELETE FROM host  WHERE  hostNo=:no ";
             // echo $no;
             $products = $pdo->prepare( $sql );
             $products->bindValue(":no", $no);
         
            //  echo $no;
             $products->execute();
 
             } catch (PDOException $e) {
             $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
             $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
         }

    }else if($page =='coupon'){
         //刪除coupon
        //  echo $no;
         $errMsg = "";
         try {
 
             require_once("connectBooks.php");
             
             $sql = "DELETE FROM coupons  WHERE  couponsType=:no ";
             // echo $no;
             $products = $pdo->prepare( $sql );
             $products->bindValue(":no", $no);
         
            //  echo $no;
             $products->execute();
 
             } catch (PDOException $e) {
             $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
             $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
         }
    }else if($page =='accessories'){
        $acc = $_REQUEST["acc"];
        // echo  $acc;
                if($acc =='draw'){
                    // echo  $acc;
                    $errMsg = "";
                    try {
            
                        require_once("connectBooks.php");
                        
                        $sql = "DELETE FROM draw  WHERE  drawNo=:no ";
                        // echo $no;
                        $products = $pdo->prepare( $sql );
                        $products->bindValue(":no", $no);
                    
                        // echo $no;
                        $products->execute();
            
                        } catch (PDOException $e) {
                        $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
                        $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
                    }
                }else if($acc =='audio'){
                    // echo  $acc;
                    $errMsg = "";
                    try {
            
                        require_once("connectBooks.php");
                        
                        $sql = "DELETE FROM audio  WHERE  audioNo=:no ";
                        // echo $no;
                        $products = $pdo->prepare( $sql );
                        $products->bindValue(":no", $no);
                    
                        // echo $no;
                        $products->execute();
            
                        } catch (PDOException $e) {
                        $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
                        $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
                    }
                }else if($acc=='pipe'){
                    // echo  $acc;
                    $errMsg = "";
                        try {
                
                            require_once("connectBooks.php");
                            
                            $sql = "DELETE FROM pipe  WHERE  pipeNo=:no ";
                            // echo $no;
                            $products = $pdo->prepare( $sql );
                            $products->bindValue(":no", $no);
                        
                            // echo $no;
                            $products->execute();
                
                            } catch (PDOException $e) {
                            $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
                            $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
                        }
                }else if($acc=='effects'){
                    // echo  $acc;
                    $errMsg = "";
                    try {
            
                        require_once("connectBooks.php");
                        
                        $sql = "DELETE FROM effects  WHERE  effectsNo=:no ";
                        // echo $no;
                        $products = $pdo->prepare( $sql );
                        $products->bindValue(":no", $no);
                    
                        // echo $no;
                        $products->execute();
            
                        } catch (PDOException $e) {
                        $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
                        $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
                    }
                }else if($acc=='troupe'){
                    // echo  $acc;
                    $errMsg = "";
                    try {
            
                        require_once("connectBooks.php");
                        
                        $sql = "DELETE FROM troupe  WHERE  troupeNo=:no ";
                        // echo $no;
                        $products = $pdo->prepare( $sql );
                        $products->bindValue(":no", $no);
                    
                        // echo $no;
                        $products->execute();
            
                        } catch (PDOException $e) {
                        $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
                        $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
                    }
                }
            
    }else if($page =='keywordd'){
        $errMsg = "";
                    try {
            
                        require_once("connectBooks.php");
                        
                        $sql = "DELETE FROM robot  WHERE  robotNo=:no ";
                        // echo $no;
                        $products = $pdo->prepare( $sql );
                        $products->bindValue(":no", $no);
                    
                        // echo $no;
                        $products->execute();
            
                        } catch (PDOException $e) {
                        $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
                        $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
                    }
    }
    
?> 
