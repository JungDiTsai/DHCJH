<?php ////修改
     $name = $_REQUEST["id"];
     $no = $_REQUEST["no"];
     $psw = $_REQUEST["psw"];
     $status = $_REQUEST["status"];
     echo $name."--" .$no;
   
    $errMsg = "";
    try {

        require_once("connectBooks.php");
        $sql = "update admin set  id=:id , psw=:psw , status=:status where no=:no";
        $products = $pdo->prepare( $sql );
        $products->bindValue(":id", $name);
        $products->bindValue(":no", $no);
        $products->bindValue(":psw", $psw);
        $products->bindValue(":status", $status);
        $products->execute();

    } catch (PDOException $e) {
    $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
    $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
    }
?>
<?php ///新增
     $id = $_REQUEST["id"];
     $psw = $_REQUEST["psw"];
     $permission = $_REQUEST["permission"];
     $status = $_REQUEST["status"];
     echo $id;
   
    $errMsg = "";
    try {

        require_once("connectBooks.php");
        $sql = "INSERT INTO  admin VALUES  (null, :id, :no, :permission, :status);";

        $products = $pdo->prepare( $sql );
        $products->bindValue(":id", $id);
        $products->bindValue(":no", $psw);
        $products->bindValue(":permission", $permission);
        $products->bindValue(":status", $status);

        $products->execute();

    } catch (PDOException $e) {
    $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
    $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
    }
?>


