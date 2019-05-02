
<?php 
//admin

    $errMsg="";

    try {
        require_once("dhc.php");
        $sql = "select * from administrator";
        $admin=$pdo->query($sql);  //下指令
        
        // //////////登入
        // $sql = "select * from administrator where adminId='{$memId}' and adminPsw='{$memPsw}'";
        // $admin = $pdo->query($sql);
    } catch (PDOException $e) {
        $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
        $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
    }
    // echo $sql;
    echo $errMsg;  
?>

<?php 
//member
    $errMsg="";

    try {
        require_once("dhc.php");
        $sql = "select * from member";
        $mem=$pdo2->query($sql);  //下指令
        

    } catch (PDOException $e) {
        $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
        $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
    }
    echo $errMsg;  
?>
<?php 
//宣傳單管理
    $errMsg="";

    try {
        require_once("dhc.php");
        $sql = "select * from flyimg";
        $flyimg=$pdo3->query($sql);  //下指令
        

    } catch (PDOException $e) {
        $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
        $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
    }
    echo $errMsg;  
?>
<?php 
//主持人管理
    $errMsg="";

    try {
        require_once("dhc.php");
        $sql = "select * from host";
        $host=$pdo4->query($sql);  //下指令
        

    } catch (PDOException $e) {
        $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
        $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
    }
    echo $errMsg;  
?>
<?php 
//宣傳單檢舉
    $errMsg="";

    try {
        require_once("dhc.php");
        // $sql = "select * from finform";
        $sql = "select f.flyerNo  , f.informReason , b.flyerImgUrl , m.memId , f.informStatus , f.finformWay 
        from finform as f 
        JOIN flyer as b on f.flyerNo = b.flyerNo 
        JOIN member as m on m.memNo = f.memNo";
        $finform=$pdo5->query($sql);  //下指令

        

    } catch (PDOException $e) {
        $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
        $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
    }
    echo $errMsg;  
?>
<?php 
//選美檢舉
    $errMsg="";

    try {
        require_once("dhc.php");
        $sql = "select a.orderNo , a.informReason , b.orderImgUrl , m.memId , a.informStatus , a.binformWay 
        from binform as a 
        JOIN orders as b on a.orderNo = b.orderNo 
        JOIN member as m on m.memNo = a.memNo";
        $binform=$pdo6->query($sql);  //下指令
        

    } catch (PDOException $e) {
        $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
        $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
    }
    echo $errMsg;  
?>
<?php 
//選美檢舉圖
    $errMsg="";

    try {
        require_once("dhc.php");
        $sql = "select b.orderNo as border , o.orderNO as oorder , o.orderImgUrl as img From binform b INNER JOIN orders o on (b.orderNO = o.orderNO )";
        $newjoin=$pdo9->query($sql);  //下指令
        

    } catch (PDOException $e) {
        $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
        $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
    }
    echo $errMsg;  
?>
<?php 
//選美檢舉會員
    $errMsg="";

    try {
        require_once("dhc.php");
        $sql = "select b.memNo as bmemno , m.memNO as mmemno , m.memId as mmemid From binform b INNER JOIN member m on (b.memNO = m.memNO )";
        $binformmember=$pdo12->query($sql);  //下指令
        

    } catch (PDOException $e) {
        $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
        $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
    }
    echo $errMsg;  
?>
<?php 
//宣傳單檢舉圖片
    $errMsg="";

    try {
        require_once("dhc.php");
        $sql = "select f.flyerNo as f , l.flyerNo as l , l.flyerImgUrl as flyimg From finform f INNER JOIN flyer l on (f.flyerNo = l.flyerNo )";
        $flyerimg=$pdo10->query($sql);  //下指令
        

    } catch (PDOException $e) {
        $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
        $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
    }
    echo $errMsg;  
?>
<?php 
//宣傳單檢舉會員
    $errMsg="";

    try {
        require_once("dhc.php");
        $sql = "select f.memNo as fmemno , m.memNo as mmemno , m.memId as mmemid From finform f INNER JOIN member m on (f.memNo = m.memNo )";
        $finformmember=$pdo11->query($sql);  //下指令
        

    } catch (PDOException $e) {
        $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
        $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
    }
    echo $errMsg;  
?>
<?php 
//選美留言檢舉
    $errMsg="";

    try {
        require_once("dhc.php");
        $sql = "select * from minform";
        $minform=$pdo7->query($sql);  //下指令
        

    } catch (PDOException $e) {
        $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
        $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
    }
    echo $errMsg;  
?>
<?php 
//選美留言檢舉會員
    $errMsg="";

    try {
        require_once("dhc.php");
        $sql = "select f.memNo as fmemno , m.memNo as mmemno , m.memId as mmemid From minform f INNER JOIN member m on (f.memNo = m.memNo )";
        $minformmember=$pdo13->query($sql);  //下指令
        

    } catch (PDOException $e) {
        $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
        $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
    }
    echo $errMsg;  
?>
<?php 
//優惠券
    $errMsg="";

    try {
        require_once("dhc.php");
        $sql = "select * from coupons";
        $coupons=$pdo8->query($sql);  //下指令
        

    } catch (PDOException $e) {
        $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
        $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
    }
    echo $errMsg;  
?>
<?php 
//內塗裝
    $errMsg="";

    try {
        require_once("dhc.php");
        $sql = "select * from draw";
        $draw=$pdo14->query($sql);  //下指令
        

    } catch (PDOException $e) {
        $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
        $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
    }
    echo $errMsg;  
?>
<?php 
//音響
    $errMsg="";

    try {
        require_once("dhc.php");
        $sql = "select * from audio";
        $audio=$pdo15->query($sql);  //下指令
        

    } catch (PDOException $e) {
        $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
        $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
    }
    echo $errMsg;  
?>
<?php 
//鋼管
    $errMsg="";

    try {
        require_once("dhc.php");
        $sql = "select * from pipe";
        $pipe=$pdo16->query($sql);  //下指令
        

    } catch (PDOException $e) {
        $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
        $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
    }
    echo $errMsg;  
?>
<?php 
//特效
    $errMsg="";

    try {
        require_once("dhc.php");
        $sql = "select * from effects";
        $effects=$pdo17->query($sql);  //下指令
        

    } catch (PDOException $e) {
        $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
        $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
    }
    echo $errMsg;  
?>
<?php 
//舞團
    $errMsg="";

    try {
        require_once("dhc.php");
        $sql = "select * from troupe";
        $troupe=$pdo18->query($sql);  //下指令
        

    } catch (PDOException $e) {
        $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
        $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
    }
    echo $errMsg;  
?>
<?php 
//舞團
    $errMsg="";

    try {
        require_once("dhc.php");
        $sql = "select * from troupe";
        $troupe=$pdo18->query($sql);  //下指令
        

    } catch (PDOException $e) {
        $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
        $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
    }
    echo $errMsg;  
?>
<?php 
//關鍵字
    $errMsg="";

    try {
        require_once("dhc.php");
        $sql = "select * from robot";
        $robot=$pdo19->query($sql);  //下指令
        //////訂單
        $sql = "select * from orders";
        $order=$pdo19->query($sql);

        //////宣傳單查詢
        $sql = "select * from flyer";
        $flyercheck=$pdo19->query($sql);

    } catch (PDOException $e) {
        $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
        $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
    }
    echo $errMsg;  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
  integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="lightbox2-master/dist/css/lightbox.css">
<link rel="stylesheet" href="admin.css">
<style>
        .tab-panels .panel {
            display:none; 
        }
        .tab-panels .panel.bb {
            display:block;
        }
        .tab-panels .panel.bb{
            /* display: none; */
        }
        .accchild{
            display:none; 
        }
        .childshow.accchild{
            display:block;
        }
        /* .back td img{
            width:100px;

        } */
        
        .back .hoverimg img:hover{
            cursor: pointer; 
        }
        
</style>
</head>
<body>

    <div class="container-fluid">
        <div class="row tab-panels">
            <nav class="navbar col-md-2 navbar-expand-md navbar-dark bg-dark text-light  fixed-left">
                <a id="logo"class="navbar-brand" href="back2.php"><img src="images/logo.png" alt="pic"></a>
               
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                </button>
                    
                <div class="collapse navbar-collapse tabs" id="navbarSupportedContent">
                <ul class="navbar-nav flex-column ">
                    <!--  -->
                    <li class="nav-item ">
                        <a class="nav-link text-info bb" rel="admin" >管理員帳號管理</a>
                    </li>
                    <li class="nav-item ">
                            <a class="nav-link text-info" rel="id"  >會員帳號管理</a>
                    </li>
                    <li class="nav-item dropdown">
                        <p class="text-info nav-link dropdown-toggle " id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">商品管理
                        </p>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item menu text-info menu" rel="accessories" >配件內容管理</a>
                            <a class="dropdown-item menu text-info menu" rel="flyer" >宣傳單圖片管理</a>
                            <a class="dropdown-item menu text-info" rel="host" >主持人管理</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <p class="text-info nav-link dropdown-toggle " id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">檢舉管理
                        </p>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item menu text-info" rel="flyerMes" >宣傳單檢舉管理</a>
                            <a class="dropdown-item menu text-info" rel="beauty" >選美檢舉管理</a>
                            <!-- <a class="dropdown-item menu text-info" rel="beautyMes" >選美留言檢舉管理</a> -->
                        </div>
                    </li>
                   
                    
                    <li class="nav-item menu">
                      <a class="nav-link text-info" href="#" rel="coupon" >優惠卷管理</a>
                    </li>
                    <li class="nav-item menu">
                        <a class="nav-link text-info" href="#" rel="keywordd" >客服關鍵字管理</a>
                    </li>
                    <li class="nav-item menu">
                        <a class="nav-link text-info" href="#" rel="order" >訂單查詢管理</a>
                    </li>
                    <li class="nav-item menu">
                        <a class="nav-link text-info" href="#" rel="flyercheck" >宣傳單查詢</a>
                    </li>
                    
                    
                    <a id="backlogin" class ="nav-link text-info " href="javascript:">登出</a>
                  </ul>
                </div>
            </nav>

           

            <!-- /////////管理員帳號管理/////////////// -->
            <main  id="admin" class="panel bb col-md-10 ml-auto ">
                    <h2>管理員帳號管理</h2>
                    <form class="searchbar form-inline mt-2 mt-md-0 justify-content-end">
                            <input class="form-control mr-sm-2 form-control-sm" type="text" placeholder="Search"
                                aria-label="Search">
                            <button class="btn btn-outline-info my-2 my-sm-0 btn-sm" type="submit">搜尋</button>
                    </form>
        
            <table class="table table-hover ">
                    <thead>
                        <tr>
                        <th >編號 </th>
                        <th scope="col">帳號</th>
                        
                      
                        <th scope="col">密碼</th>
                        <th scope="col">權限</th>
                        <th scope="col">狀態</th>
                        <th scope="col">修改</th>
                        <th scope="col">刪除</th>
                        </tr>
                    </thead>
                     
                    <tbody>
                        
                        <!-- 新增 -->
                        <tr class="newrow">
                            <td></td>
                            <td><input type="text" class="form-control form-control-sm"></td>
                            <td><input type="text" class="form-control form-control-sm"></td>
                            <td>
                            <select name="" id="" class="form-control form-control-sm">
                                <option >最高</option>
                                <option >一般</option>
                            </select>
                            </td>
                            <td class="change">
                            <select  class="form-control form-control-sm">
                                <option >啟用</option>
                                <option >停用</option>
                            </select>
                            </td>
                            <td>
                            <button type="button" class="btn btn-link btnclick addclick" >新增</button>
                            </td>
                            <td>

                            </td>
                        </tr>
                    <!-- php -->

                    <?php 
                    $new =0;
                     while( $admins = $admin->fetch(PDO::FETCH_ASSOC)){     
                                            
                        $new++;
                    ?>
                    <!-- php -->
                     <!--php  -->
                     <tr class="back">
                            <th class="add" name="no"  > <?php echo  $new ;?> </th>
                            <td class="first"> <?php echo $admins["adminId"]; ?></td>
                            <td ><?php echo $admins["adminPsw"]; ?></td>
                            <td><?php echo $admins["adminPer"]; ?></td>
                            <td class="change">
                            <button type="button" class="<?php if($admins["adminStatus"]=="啟用"){
                                 echo 'btn btn-success';}else{ echo 'btn btn-danger';}?> ">
                                <?php echo $admins["adminStatus"]; ?></td>
                           
                            <td class=""><button type="button" class="btn btn-link btnclick" value=<?php echo $admins["adminNo"]; ?> >修改</button></td>
                            <td class=""><button type="button" class="btn btn-link delclick" value=<?php echo $admins["adminNo"]; ?> >刪除</button></td>

                        </tr>

                        <?php
                    }
                    ?>
                    
                    </tbody>
                   
                    </table>

                   
            </main>

            <!-- /////////會員 -->
            <main id="id"  class="panel col-md-10 ml-auto ">
                    <h2>會員帳號管理</h2>
                    <form class="searchbar form-inline mt-2 mt-md-0 justify-content-end">
                            <input class="form-control mr-sm-2 form-control-sm" type="text" placeholder="Search"
                                aria-label="Search">
                            <button class="btn btn-outline-info my-2 my-sm-0 btn-sm" type="submit">搜尋</button>
                    </form>
        
            <table class="table table-hover">
                    <thead>
                        <tr>
                        <th >會員編號 </th>
                        <th scope="col">會員帳號</th>
                        <th scope="col">會員密碼</th>
                        <th scope="col">會員狀態</th>
                        <th scope="col">修改</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <!--php  -->
                        <?php 
                            $memberno =0;
                            while( $member = $mem->fetch(PDO::FETCH_ASSOC)){     
                                                    
                                $memberno++;
                        ?>
                        <!--php  -->
                        <tr class="back">
                            <th class="add" name="no"> <?php echo  $memberno ;?> </th>
                            <td class="first"> <?php echo $member["memId"]; ?></td>
                            <td ><?php echo $member["memPsw"]; ?></td>
                            <td class="change">
                            <button type="button" class="<?php if($member["memStatus"]=="啟用"){
                                 echo 'btn btn-success';}else{ echo 'btn btn-danger';}?> ">
                                <?php echo $member["memStatus"]; ?></td>
                           
                            <td class=""><button type="button" class="btn btn-link btnclick" value=<?php echo $member["memNo"]; ?> >修改</button></td>

                        </tr>
                        
                        <?php
                            }
                        ?>
                    </tbody>
                    </table>
            </main>

            <!-- ////////////////配件內容 -->
            <main  id="accessories" class="col-md-10 ml-auto panel">
                    <h2>配件內容管理</h2>
                    <form class="searchbar form-inline mt-2 mt-md-0 justify-content-end">
                            <input class="form-control mr-sm-2 form-control-sm" type="text" placeholder="Search"
                                aria-label="Search">
                            <button class="btn btn-outline-info my-2 my-sm-0 btn-sm" type="submit">搜尋</button>
                    </form>
                    <div class="card text-center" id="accessoriesnode">
                            <div class="card-header">
                              <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item ">
                                  <a class="nav-link active" rel="draw" href="#">內塗裝</a>
                                </li>
                                <li class="nav-item ">
                                  <a class="nav-link" rel="audio" href="#">音響</a>
                                </li>
                                <li class="nav-item ">
                                  <a class="nav-link " href="#" rel="pipe"  >鋼管</a>
                                </li>
                                
                                <li class="nav-item ">
                                     <a class="nav-link " href="#" rel="effects">特效</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link " href="#" rel="troupe">舞團</a>
                                </li>
                              </ul>
                            </div>
                            <!-- 內塗裝/////// -->
                            <div id="draw" class="accchild childshow ">
                                    <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                <th >編號 </th>
                                                <th scope="col">名稱</th>
                                                
                                                <th scope="col">圖片</th>
                                                <th scope="col">價格</th>
                                                <th scope="col">狀態</th>
                                                <th scope="col">修改</th>
                                                <th scope="col">刪除</th>
                                                </tr>
                                            </thead>
                                            <tbody id="drawtbody">
                                                 <!-- 新增 -->
                                                <tr class="newrow">
                                                    <td></td>
                                                    <td><input type="text" class="form-control form-control-sm"></td>
                                                    
                                                    <td> <input type="file" class="form-control form-control-sm upfile" ></td>
                                                    <td><input  type="text" class="form-control form-control-sm"></td>
                                                    <td class="change">
                                                        <select  class="form-control form-control-sm">
                                                            <option >啟用</option>
                                                            <option >停用</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                    <button type="button" class="btn btn-link btnclick addclick" >新增</button>
                                                    </td>
                                                    <td>

                                                    </td>
                                                </tr>
                                                <!--php  -->
                                                <?php 
                                                    $drawno =0;
                                                    while( $drawtotal = $draw->fetch(PDO::FETCH_ASSOC)){     
                                                                            
                                                        $drawno++;
                                                ?>
                                                <!--php  -->
                                                <tr class="back">
                                                    <th class="add" name="no"> <?php echo  $drawno ;?> </th>
                                                    <td class="first"> <?php echo $drawtotal["drawName"]; ?></td>
                                                    <td ><img class="tdimg" src="<?php echo $drawtotal["drawImgUrl"]; ?>" alt="pic"></td>
                                                    <td><?php echo $drawtotal["drawPrice"]; ?></td>
                                                  

                                                    <td class="change">
                                                    <button type="button" class="<?php if($drawtotal["drawStatus"]=="啟用"){
                                                        echo 'btn btn-success';}else{ echo 'btn btn-danger';}?> ">
                                                        <?php echo $drawtotal["drawStatus"]; ?></td>
                                                    <td class=""><button type="button" class="btn btn-link btnclick" value=<?php echo $drawtotal["drawNo"]; ?> >修改</button></td>
                                                    <td class=""><button type="button" class="btn btn-link delclick" value=<?php echo $drawtotal["drawNo"]; ?> >刪除</button></td>

                                                </tr>

                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table> 
                            </div>
                            <!-- 音響/////////// -->
                            <div id="audio" class="accchild">
                                    <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                <th >編號 </th>
                                                <th scope="col">名稱</th>
                                               
                                                <th scope="col">圖片</th>
                                                <th scope="col">價格</th>
                                                <th scope="col">狀態</th>
                                                <th scope="col">修改</th>
                                                <th scope="col">刪除</th>
                                                </tr>
                                            </thead>
                                            <tbody class="audiotbody">
                                                 <!-- 新增 -->
                                                 <tr class="newrow">
                                                    <td></td>
                                                    <td><input type="text" class="form-control form-control-sm"></td>
                                                    
                                                    <td> <input type="file" class="form-control form-control-sm upfile"  ></td>
                                                    <td><input  type="text" class="form-control form-control-sm"></td>
                                                    <td class="change">
                                                        <select  class="form-control form-control-sm">
                                                            <option >啟用</option>
                                                            <option >停用</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                    <button type="button" class="btn btn-link btnclick addclick" >新增</button>
                                                    </td>
                                                    <td>

                                                    </td>
                                                </tr>
                                                <!--php  -->
                                                <?php 
                                                    $audiono =0;
                                                    while( $audiototal = $audio->fetch(PDO::FETCH_ASSOC)){                                        
                                                    $audiono++;
                                                ?>
                                                <!--php  -->
                                                <tr class="back">
                                                    <th class="add" name="no"> <?php echo  $audiono ;?> </th>
                                                    <td class="first"> <?php echo $audiototal["audioName"]; ?></td>
                                                    <td><img src="<?php echo $audiototal["audioImgUrl"]; ?>" alt="pic"></td>
                                                    <td><?php echo $audiototal["audioPrice"]; ?></td>
                                                  

                                                    <td class="change">
                                                    <button type="button" class="<?php if($audiototal["audioStatus"]=="啟用"){
                                                        echo 'btn btn-success';}else{ echo 'btn btn-danger';}?> ">
                                                        <?php echo $audiototal["audioStatus"]; ?></td>
                                                    <td class=""><button type="button" class="btn btn-link btnclick" value=<?php echo $audiototal["audioNo"]; ?> >修改</button></td>
                                                    <td class=""><button type="button" class="btn btn-link delclick" value=<?php echo $audiototal["audioNo"]; ?> >刪除</button></td>

                                                </tr>

                                                <?php
                                                }
                                                ?>
                                               
                                            </tbody>
                                        </table> 
                            </div>
                            <!-- 鋼管////////// -->
                            <div id="pipe" class="accchild">
                                    <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                <th class="number">編號 </th>
                                                <th scope="col">名稱</th>
                                               
                                                <th scope="col">圖片</th>
                                                <th scope="col">價格</th>
                                                <th scope="col">狀態</th>
                                                <th scope="col">修改</th>
                                                <th scope="col">刪除</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <!-- 新增 -->
                                                    <tr class="newrow">
                                                    <td></td>
                                                    <td><input type="text" class="form-control form-control-sm"></td>
                                                    
                                                    <td> <input type="file" class="form-control form-control-sm upfile"  ></td>
                                                    <td><input  type="text" class="form-control form-control-sm"></td>
                                                    <td class="change">
                                                        <select  class="form-control form-control-sm">
                                                            <option >啟用</option>
                                                            <option >停用</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                    <button type="button" class="btn btn-link btnclick addclick" >新增</button>
                                                    </td>
                                                    <td>

                                                    </td>
                                                </tr>
                                                <!--php  -->
                                                <?php 
                                                    $pipeno =0;
                                                    while( $pipetotal = $pipe->fetch(PDO::FETCH_ASSOC)){                                        
                                                    $pipeno++;
                                                ?>
                                                <!--php  -->
                                                <tr class="back">
                                                    <th class="add" name="no"> <?php echo  $pipeno ;?> </th>
                                                    <td class="first"> <?php echo $pipetotal["pipeName"]; ?></td>
                                                    <td><img src="<?php echo $pipetotal["pipeImgUrl"]; ?>" alt="pic"></td>
                                                    <td><?php echo $pipetotal["pipePrice"]; ?></td>
                                                  

                                                    <td class="change">
                                                    <button type="button" class="<?php if($pipetotal["pipeStatus"]=="啟用"){
                                                        echo 'btn btn-success';}else{ echo 'btn btn-danger';}?> ">
                                                        <?php echo $pipetotal["pipeStatus"]; ?></td>
                                                    <td class=""><button type="button" class="btn btn-link btnclick" value=<?php echo $pipetotal["pipeNo"]; ?> >修改</button></td>
                                                    <td class=""><button type="button" class="btn btn-link delclick" value=<?php echo $pipetotal["pipeNo"]; ?> >刪除</button></td>

                                                </tr>

                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table> 
                            </div>
                          
                            <!-- 特效////////////// -->
                            <div id="effects" class="accchild">
                                    <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                <th class="number" >編號 </th>
                                                <th scope="col">名稱</th>
                                               
                                                <th scope="col">圖片</th>
                                                <th scope="col">價格</th>
                                                <th scope="col">動畫</th>

                                                <th scope="col">狀態</th>
                                                <th scope="col">修改</th>
                                                <th scope="col">刪除</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- 新增 -->
                                                <tr class="newrow">
                                                    <td></td>
                                                    <td><input type="text" class="form-control form-control-sm"></td>
                                                    
                                                    <td> <input type="file" class="form-control form-control-sm upfile"  ></td>
                                                    <td><input  type="text" class="form-control form-control-sm"></td>
                                                    <td> <input type="file" class="form-control form-control-sm gif"  ></td>

                                                    <td class="change">
                                                        <select  class="form-control form-control-sm">
                                                            <option >啟用</option>
                                                            <option >停用</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                    <button type="button" class="btn btn-link btnclick addclick" >新增</button>
                                                    </td>
                                                    <td>

                                                    </td>
                                                </tr>
                                                <!--php  -->
                                                <?php 
                                                    $effectsno =0;
                                                    while( $effectstotal = $effects->fetch(PDO::FETCH_ASSOC)){                                        
                                                    $effectsno++;
                                                ?>
                                                <!--php  -->
                                                <tr class="back">
                                                    <th class="add" name="no"> <?php echo  $effectsno ;?> </th>
                                                    <td class="first"> <?php echo $effectstotal["effectsName"]; ?></td>
                                                    <td><img src="<?php echo $effectstotal["effectsImgUrl"]; ?>" alt="pic"></td>
                                                    <td><?php echo $effectstotal["effectsPrice"]; ?></td>
                                                    <td class="num200"><img class="hight100"src="<?php echo $effectstotal["effectsGif"]; ?>" alt="gif"></td>


                                                    <td class="change">
                                                    <button type="button" class="<?php if($effectstotal["effectsStatus"]=="啟用"){
                                                        echo 'btn btn-success';}else{ echo 'btn btn-danger';}?> ">
                                                        <?php echo $effectstotal["effectsStatus"]; ?></td>
                                                    <td class=""><button type="button" class="btn btn-link btnclick" value=<?php echo $effectstotal["effectsNo"]; ?> >修改</button></td>
                                                    <td class=""><button type="button" class="btn btn-link delclick" value=<?php echo $effectstotal["effectsNo"]; ?> >刪除</button></td>

                                                </tr>

                                                <?php
                                                }
                                                ?>
                                               
                                            </tbody>
                                        </table> 
                            </div>
                            <!-- 舞團////////////// -->
                            <div id="troupe" class="accchild">
                                    <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                <th class="number">編號 </th>
                                                <th scope="col">名稱</th>
                                               
                                                <th scope="col">圖片</th>
                                                <th scope="col">價格</th>
                                                <th scope="col">舞團</th>

                                                <th scope="col">狀態</th>
                                                <th scope="col">修改</th>
                                                <th scope="col">刪除</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- 新增 -->
                                                <tr class="newrow">
                                                    <td></td>
                                                    <td><input type="text" class="form-control form-control-sm"></td>
                                                    
                                                    <td> <input type="file" class="form-control form-control-sm upfile"  ></td>
                                                    <td><input  type="text" class="form-control form-control-sm"></td>
                                                    <td> <input type="file" class="form-control form-control-sm gif"  ></td>
                                                   
                                                    <td class="change">
                                                        <select  class="form-control form-control-sm">
                                                            <option >啟用</option>
                                                            <option >停用</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                    <button type="button" class="btn btn-link btnclick addclick" >新增</button>
                                                    </td>
                                                    <td>

                                                    </td>
                                                </tr>
                                                <!--php  -->
                                                <?php 
                                                    $troupeno =0;
                                                    while( $troupetotal = $troupe->fetch(PDO::FETCH_ASSOC)){                                        
                                                    $troupeno++;
                                                ?>
                                                <!--php  -->
                                                <tr class="back">
                                                    <th class="add" name="no"> <?php echo  $troupeno ;?> </th>
                                                    <td class="first"> <?php echo $troupetotal["troupeName"]; ?></td>
                                                    <td><img src="<?php echo $troupetotal["troupeImgUrl"]; ?>" alt="pic"></td>
                                                    <td><?php echo $troupetotal["troupePrice"]; ?></td>
                                                  
                                                    <td class="num200"><img class="hight100"src="<?php echo $troupetotal["troupeGif"]; ?>" alt="gif"></td>
                                                    <td class="change">
                                                    <button type="button" class="<?php if($troupetotal["troupeStatus"]=="啟用"){
                                                        echo 'btn btn-success';}else{ echo 'btn btn-danger';}?> ">
                                                        <?php echo $troupetotal["troupeStatus"]; ?></td>
                                                    <td class=""><button type="button" class="btn btn-link btnclick" value=<?php echo $troupetotal["troupeNo"]; ?> >修改</button></td>
                                                    <td class=""><button type="button" class="btn btn-link delclick" value=<?php echo $troupetotal["troupeNo"]; ?> >刪除</button></td>

                                                </tr>

                                                <?php
                                                }
                                                ?>
                                               
                                            </tbody>
                                        </table> 
                            </div>
                    </div>
            </main>

            <!-- 宣傳單管理 ////////////////-->
            <main  id="flyer" class="col-md-10 ml-auto panel">
                    <h2>宣傳單圖片管理</h2>
                    <form class="searchbar form-inline mt-2 mt-md-0 justify-content-end">
                            <input class="form-control mr-sm-2 form-control-sm" type="text" placeholder="Search"
                                aria-label="Search">
                            <button class="btn btn-outline-info my-2 my-sm-0 btn-sm" type="submit">搜尋</button>
                    </form>
                    <table class="table table-hover">
                            <thead>
                                <tr>
                                <th >圖片編號 </th>
                                <th scope="col">圖片說明</th>
                                <th scope="col">圖片</th>
                                <th scope="col">圖片狀態</th>
                               
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>
                                </tr>
                            </thead>
                            <tbody id="flyertbody">
                                <!-- 新增 -->
                                <tr class="newrow">
                                    <td></td>
                                    <td><input type="text" class="form-control form-control-sm"></td>
                                    <td><form id="myform" ><input type="file" class="form-control form-control-sm" id="testfile" name="upfile"></form>
                                        </td>
                                    
                                    <td class="change">
                                    <select  class="form-control form-control-sm">
                                        <option >啟用</option>
                                        <option >停用</option>
                                    </select>
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-link btnclick addclick" >新增</button>
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                               
                                 <!--php  -->
                                    <?php 
                                        $flyimgno =0;
                                        while( $flyimgTotal = $flyimg->fetch(PDO::FETCH_ASSOC)){     
                                                                
                                            $flyimgno++;
                                    ?>
                                <!--php  -->
                               
                                <tr class="back">
                                    <th class="add" name="no"> <?php echo  $flyimgno ;?> </th>
                                    <td class="first"><?php echo $flyimgTotal["flyTitle"]; ?>
                                    </td>
                                    <td >
                                        <img class="tdimg" src="<?php echo $flyimgTotal["flyImg"]; ?>" alt="pic">    
                                        <!-- <a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-1.jpg" data-lightbox="example-1"><img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-1.jpg" alt="image-1" /></a> -->
                                 
                                    </td>
                                    <td class="change">
                                    <button type="button" class="<?php if($flyimgTotal["flyStatus"]=="啟用"){
                                        echo 'btn btn-success';}else{ echo 'btn btn-danger';}?> ">
                                        <?php echo $flyimgTotal["flyStatus"]; ?></td>
                                
                                    <td class=""><button type="button" class="btn btn-link btnclick" value=<?php echo $flyimgTotal["flyNo"]; ?> >修改</button></td>
                                    <td class=""><button type="button" class="btn btn-link delclick" value=<?php echo $flyimgTotal["flyNo"]; ?> >刪除</button></td>

                                </tr>
                                
                                <?php
                                    }
                                ?>
                            </tbody>
                            </table>
                   
            </main>
            <!-- 主持人管理/////////////////////// -->
            <main  id="host" class="col-md-10 ml-auto panel">
                    <h2>主持人管理</h2>
                    <form class="searchbar form-inline mt-2 mt-md-0 justify-content-end">
                            <input class="form-control mr-sm-2 form-control-sm" type="text" placeholder="Search"
                                aria-label="Search">
                            <button class="btn btn-outline-info my-2 my-sm-0 btn-sm" type="submit">搜尋</button>
                    </form>
                    <table class="table table-hover">
                            <thead>
                                <tr>
                                <th class="number">編號 </th>
                                <th scope="col">姓名</th>
                                <th scope="col">圖片</th>
                               
                                
                                <th scope="col">介紹</th>
                                <th scope="col">主持值</th>
                                <th scope="col">雙語值</th>
                                <th scope="col">時間值</th>
                                <th scope="col">配合值</th>
                                <th scope="col">氣氛值</th>
                                <th scope="col">主持值</th>
                                <th scope="col">價格</th>
                                <th scope="col">狀態</th>
                                <th scope="col">修改</th>
                               
                                <th scope="col">刪除</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- 新增 -->
                                <tr class="newrow">
                                    <td></td>
                                    <td><input type="text" class="form-control form-control-sm"></td>
                                    <td><input type="text" class="form-control form-control-sm"></td>
                                    <!-- <td><input type="text" class="form-control form-control-sm"></td> -->
                                    <td><input type="text" class="form-control form-control-sm"></td>
                                    <td><input type="text" class="form-control form-control-sm"></td>
                                    <td><input type="text" class="form-control form-control-sm"></td>
                                    <td><input type="text" class="form-control form-control-sm"></td>
                                    <td><input type="text" class="form-control form-control-sm"></td>
                                    <td><input type="text" class="form-control form-control-sm"></td>
                                    <td><input type="text" class="form-control form-control-sm"></td>
                                    <td><input type="text" class="form-control form-control-sm"></td>
                                    <td class="change">
                                    <select  class="form-control form-control-sm">
                                        <option >啟用</option>
                                        <option >停用</option>
                                    </select>
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-link btnclick addclick " >新增</button>
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                               
                                 <!--php  -->
                                 <?php 
                                        $hostno =0;
                                        while( $hostTotal = $host->fetch(PDO::FETCH_ASSOC)){     
                                                                
                                        $hostno++;
                                    ?>
                                <!--php  -->
                               
                                <tr class="back">
                                    <th class="add" name="no"> <?php echo  $hostno ;?> </th>
                                    <td class="first"><?php echo $hostTotal["hostName"]; ?>
                                    </td>
                                    <td ><img class="tdimg" src="<?php echo $hostTotal["hostImgUrl"]; ?>" alt="pic"></td>
                                    <td ><?php echo $hostTotal["hostContent"]; ?></td>
                                    <td ><?php echo $hostTotal["hostA"]; ?></td>
                                    <td ><?php echo $hostTotal["hostB"]; ?></td>
                                    <td ><?php echo $hostTotal["hostC"]; ?></td>
                                    <td ><?php echo $hostTotal["hostD"]; ?></td>
                                    <td ><?php echo $hostTotal["hostE"]; ?></td>
                                    <td ><?php echo $hostTotal["hostF"]; ?></td>
                                    <td ><?php echo $hostTotal["price"]; ?></td>
                                    <td class="change">
                                    <button type="button" class="num100 <?php if($hostTotal["hostStatus"]=="啟用"){
                                        echo 'btn btn-success';}else{ echo 'btn btn-danger';}?> ">
                                        <?php echo $hostTotal["hostStatus"]; ?></td>
                                
                                    <td class="num100"><button type="button" class="btn btn-link btnclick " value=<?php echo $hostTotal["hostNo"]; ?> >修改</button></td>
                                    <td class="num100"><button type="button" class="btn btn-link delclick" value=<?php echo $hostTotal["hostNo"]; ?> >刪除</button></td>

                                </tr>
                                
                                <?php
                                    }
                                ?>
                                
                            </tbody>
                            </table>
                  
            </main>
            <!-- 宣傳單檢舉//////////// -->
            <main  id="flyerMes" class="col-md-10 ml-auto panel">
                    <h2>宣傳單檢舉管理</h2>
                    <form class="searchbar form-inline mt-2 mt-md-0 justify-content-end">
                            <input class="form-control mr-sm-2 form-control-sm" type="text" placeholder="Search"
                                aria-label="Search">
                            <button class="btn btn-outline-info my-2 my-sm-0 btn-sm" type="submit">搜尋</button>
                    </form>
                    <table class="table table-hover">
                            <thead>
                                <tr>
                                <th >宣傳單編號 </th>
                                
                                 <th scope="col">檢舉原因</th>
                                <th scope="col">圖片</th>
                                <th scope="col">檢舉人帳號</th>
                                <th scope="col">檢舉狀態</th>
                                <th scope="col">處置方式</th>
                               <th scope="col">修改</th>
                               
                                </tr>
                            </thead>
                            <tbody>
                                 <!-- php -->
                                <?php 
                                $flyermesno=0;
                                while( $finformTotal = $finform->fetch(PDO::FETCH_ASSOC)){     
                               
                                $flyermesno++;    
                                ?>
                                <!-- php -->
                                
                                <tr class="back">
                                    <th class="add" name="no"> <?php echo  $finformTotal["flyerNo"] ;?> </th>
                                    <td class="first"><?php echo $finformTotal["informReason"]; ?>
                                    </td>                                                  
                                    <td class="hoverimg">    
                                        <a class="example-image-link" href="<?php echo  $finformTotal["flyerImgUrl"] ;?>" data-lightbox=" <?php echo  $flyermesno ;?>">
                                        <img class="example-image" src="<?php echo  $finformTotal["flyerImgUrl"] ;?>" alt="<?php echo  $flyermesno ;?><?php echo  $flyermesno ;?>" /></a>
                                    </td>
                                    
                                    <th class="" name=""> <?php echo  $finformTotal["memId"] ;?> </th>
                                    <td class="change">
                                    <button type="button" class="<?php if($finformTotal["informStatus"]=="已處理"){
                                        echo 'btn btn-success';}else{ echo 'btn btn-danger';}?> ">
                                        <?php echo $finformTotal["informStatus"]; ?></td>
                                    <td> <?php echo $finformTotal["finformWay"]; ?></td>
                                    <td class=""><button type="button" class="btn btn-link btnclick"  value=<?php echo $finformTotal["flyerNo"] ; ?> >修改</button></td>
                                    
                                </tr>
                                
                               <?php

                               };
                               ?>
                            </tbody>
                            </table>
                   
            </main>
            <!-- 選美檢舉//////////////// -->
            <main  id="beauty" class="col-md-10 ml-auto panel">
                    <h2>選美檢舉管理</h2>
                    <form class="searchbar form-inline mt-2 mt-md-0 justify-content-end">
                            <input class="form-control mr-sm-2 form-control-sm" type="text" placeholder="Search"
                                aria-label="Search">
                            <button class="btn btn-outline-info my-2 my-sm-0 btn-sm" type="submit">搜尋</button>
                    </form>
                    <table class="table table-hover">
                            <thead>
                                <tr>
                                <th >訂單編號 </th>
                                
                                <th scope="col">檢舉原因</th>
                                <th scope="col">圖片</th>
                                <th scope="col">檢舉會員</th>
                                <th scope="col">檢舉狀態</th>
                                <th scope="col">處置方式</th>
                                <th scope="col">修改</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <!-- php -->
                                 <?php 
                                $binformno=0;
                                while( $binformTotal = $binform->fetch(PDO::FETCH_ASSOC)){     
                                    // print_r($binformTotal);
                                $binformno ++;
                                ?>
                                <!-- php -->
                           
                                <tr class="back">
                                    <th class="add" name="no"> <?php echo  $binformTotal["orderNo"] ;?> </th>
                                    <td class="first"><?php echo $binformTotal["informReason"]; ?>
                                    </td>
                                  
                                    <td class="hoverimg">    
                                        <a class="example-image-link" href="<?php echo  $binformTotal["orderImgUrl"] ;?>" data-lightbox=" <?php echo  $binformno ;?>">
                                        <img class="example-image" src="<?php echo $binformTotal["orderImgUrl"] ;?>" alt="<?php echo  $binformno ;?>" /></a>
                                    </td>

                                    <th class="" name=""> <?php echo  $binformTotal["memId"] ;?> </th>
                                    <td class="change">
                                    <button type="button" class="<?php if($binformTotal["informStatus"]=="已處理"){
                                        echo 'btn btn-success';}else{ echo 'btn btn-danger';}?> ">
                                        <?php echo $binformTotal["informStatus"]; ?></td>

                                    <td class="first"><?php echo $binformTotal["binformWay"]; ?>
                                    <td class=""><button type="button" class="btn btn-link btnclick" value=<?php echo $binformTotal["orderNo"] ; ?> >修改</button></td>

                                </tr>
                                
                               <?php

                               }
                               ?>
                               
                               
                            </tbody>
                            </table>
                    
            </main>
            <!-- 選美留言檢舉//////////////////////// -->
            <main  id="beautyMes" class="col-md-10 ml-auto panel">
                    <h2>選美留言檢舉管理</h2>
                    <form class="searchbar form-inline mt-2 mt-md-0 justify-content-end">
                            <input class="form-control mr-sm-2 form-control-sm" type="text" placeholder="Search"
                                aria-label="Search">
                            <button class="btn btn-outline-info my-2 my-sm-0 btn-sm" type="submit">搜尋</button>
                    </form>
                    <table class="table table-hover">
                            <thead>
                                <tr>
                                <th >留言檢舉編號 </th>
                                <th scope="col">檢舉原因</th>
                               
                                <th scope="col">檢舉人編號</th>
                                <th scope="col">檢舉狀態</th>
                                <th scope="col">連結詳情</th>
                                <th scope="col">修改</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- php -->
                                <?php 
                                $minformno=0;
                                while( $minformTotal = $minform->fetch(PDO::FETCH_ASSOC)){     
                                    
                                while( $minformmemberTotal = $minformmember->fetch(PDO::FETCH_ASSOC)){     
                                $minformno ++;
                                ?>
                                <!-- php -->
                                
                                <tr class="back">
                                    <th class="add" name="no"> <?php echo  $minformno ;?> </th>
                                   <td class="first"><?php echo $minformTotal["informReason"]; ?>
                                    </td>
                                   
                                    <td class="" name=""> <?php echo  $minformmemberTotal["mmemid"] ;?> </td>
                                    <td>查看</td>
                                    <td class="change">
                                    <button type="button" class="<?php if($minformTotal["informStatus"]=="已處理"){
                                        echo 'btn btn-success';}else{ echo 'btn btn-danger';}?> ">
                                        <?php echo $minformTotal["informStatus"]; ?></td>
                                    
                                    <td class=""><button type="button" class="btn btn-link btnclick" value=<?php echo $minformTotal["minformNo"] ; ?> >修改</button></td>

                                </tr>
                                
                               <?php

                               }}
                               ?>
                                
                               
                            </tbody>
                    </table>
                    
            </main>

            <!-- 優惠券管理////////////////// -->
            <main  id="coupon" class="col-md-10 ml-auto panel">
                    <h2>優惠券管理</h2>
                    <form class="searchbar form-inline mt-2 mt-md-0 justify-content-end">
                            <input class="form-control mr-sm-2 form-control-sm" type="text" placeholder="Search"
                                aria-label="Search">
                            <button class="btn btn-outline-info my-2 my-sm-0 btn-sm" type="submit">搜尋</button>
                    </form>
                    <table class="table table-hover">
                            <thead>
                                <tr>
                                <th >優惠券編號 </th>
                                <th scope="col">優惠券名稱</th>
                                <th scope="col">折扣金額</th>
                                <th scope="col">優惠券狀態</th>
                               
                                <th scope="col">修改</th>
                                
                                </tr>
                            </thead>
                            <tbody id="coupontbody">
                                 <!-- 新增 -->
                                <tr class="newrow">
                                    <td></td>
                                    <td><input type="text" class="form-control form-control-sm"></td>
                                    <td><input type="text" class="form-control form-control-sm"></td>
                                   
                                    <td class="change">
                                    <select  class="form-control form-control-sm">
                                        <option >啟用</option>
                                        <option >停用</option>
                                    </select>
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-link btnclick addclick" >新增</button>
                                    </td>
                                   
                                </tr>
                                 <!-- php -->
                                 <?php 
                                $couponsno=0;
                                while( $couponsTotal = $coupons->fetch(PDO::FETCH_ASSOC)){     
                                $couponsno ++;
                                ?>
                                <!-- php -->
                               
                                <tr class="back">
                                    <th class="add" name="no"> <?php echo  $couponsno ;?> </th>
                                   <td class="first"><?php echo $couponsTotal["couponsName"]; ?>
                                    </td>
                                   
                                    <td class="" name=""> <?php echo  $couponsTotal["discount"] ;?> </td>
                                  
                                    <td class="change">
                                    <button type="button" class="<?php if($couponsTotal["status"]=="啟用"){
                                        echo 'btn btn-success';}else{ echo 'btn btn-danger';}?> ">
                                        <?php echo $couponsTotal["status"]; ?></td>
                                    
                                    <td class=""><button type="button" class="btn btn-link btnclick" value=<?php echo $couponsTotal["couponsType"] ; ?> >修改</button></td>
                                    
                                </tr>
                                
                               <?php

                               }
                               ?>
                               
                            </tbody>
                    </table>
                    
            </main>

            <!-- 關鍵字//////////////////////// -->
            <main  id="keywordd" class="col-md-10 ml-auto panel">
                    <h2>關鍵字管理</h2>
                    <form class="searchbar form-inline mt-2 mt-md-0 justify-content-end">
                            <input class="form-control mr-sm-2 form-control-sm" type="text" placeholder="Search"
                                aria-label="Search">
                            <button class="btn btn-outline-info my-2 my-sm-0 btn-sm" type="submit">搜尋</button>
                    </form>
                    <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">關鍵字編號</th>
                                <th >關鍵字 </th>
                                <th scope="col">關鍵字回應</th>
                                <th scope="col">關鍵字狀態</th>
                               
                               
                                <th scope="col">修改</th>
                                <th scope="col">刪除</th>

                                </tr>
                            </thead>
                            <tbody id="keywordbody">
                               <!-- 新增 -->
                               <tr class="newrow">
                                    <td></td>
                                    <td><input type="text" class="form-control form-control-sm"></td>
                                    <td><input type="text" class="form-control form-control-sm"></td>
                                   
                                    <td class="change">
                                    <select  class="form-control form-control-sm">
                                        <option >啟用</option>
                                        <option >停用</option>
                                    </select>
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-link btnclick addclick" >新增</button>
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                 <!-- php -->
                                 <?php 
                                $robotsno=0;
                                while( $robotTotal = $robot->fetch(PDO::FETCH_ASSOC)){     
                                $robotsno ++;
                                ?>
                                <!-- php -->
                               
                                <tr class="back">
                                    <th class="add" name="no"> <?php echo  $robotsno ;?> </th>
                                   <td class="first"><?php echo $robotTotal["robotAsk"]; ?>
                                    </td>
                                   
                                    <td class="" name=""> <?php echo  $robotTotal["robotAns"] ;?> </td>
                                  
                                    <td class="change">
                                    <button type="button" class="<?php if($robotTotal["robotStatus"]=="啟用"){
                                        echo 'btn btn-success';}else{ echo 'btn btn-danger';}?> ">
                                        <?php echo $robotTotal["robotStatus"]; ?></td>
                                    
                                    <td class=""><button type="button" class="btn btn-link btnclick" value=<?php echo $robotTotal["robotNo"] ; ?> >修改</button></td>
                                    <td class=""><button type="button" class="btn btn-link delclick" value=<?php echo $robotTotal["robotNo"]; ?> >刪除</button></td>
                                    
                                </tr>
                                
                               <?php

                               }
                               ?>
                                
                               
                            </tbody>
                    </table>
                    
            </main>

            <!-- 訂單查詢//////////////////////// -->
            <main  id="order" class="col-md-10 ml-auto panel">
                    <h2>訂單查詢</h2>
                    <form class="searchbar form-inline mt-2 mt-md-0 justify-content-end">
                            <input class="form-control mr-sm-2 form-control-sm" type="text" placeholder="Search"
                                aria-label="Search">
                            <button class="btn btn-outline-info my-2 my-sm-0 btn-sm" type="submit">搜尋</button>
                    </form>
                    <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">訂單編號</th>
                                    <th >會員編號 </th>
                                    <th scope="col">花車名稱</th>
                                    <th scope="col">花車圖片</th>
                                    <th scope="col">優惠卷編號</th>
                                    <th scope="col">投票數量</th>
                                    <th scope="col">宣傳單編號</th>
                                    
                                    <th scope="col">上傳花車日期</th>
                                    <th scope="col">活動地點</th>
                                    <th scope="col">活動日期</th>
                                    <th scope="col">主持人</th>
                                    <th scope="col">總金額</th>
                                    <th scope="col">是否參加選美</th>
                                  
                                    <!-- <th scope="col">修改</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $orderno=0;
                                while( $orderTotal = $order->fetch(PDO::FETCH_ASSOC)){     
                                $orderno ++;
                                ?>
                                <!-- php -->
                               
                                <tr class="back">
                                    <th class="add" name="no"> <?php echo  $orderTotal["orderNo"] ;?> </th>
                                   <td class="first"><?php echo $orderTotal["memNo"]; ?>
                                    </td>
                                   
                                    <td class="" name=""> <?php echo  $orderTotal["orderName"] ;?> </td>
                                    <td class="" name=""> <img src="../<?php echo  $orderTotal["orderImgUrl"] ;?>" alt="pic"> </td>
                                   
                                    <td class="" name=""> <?php echo  $orderTotal["memCouponsNo"] ;?> </td>
                                    <td class="" name=""> <?php echo  $orderTotal["orderVote"] ;?> </td>
                                    <td class="" name=""> <?php echo  $orderTotal["flyerNo"] ;?> </td>
                                  
                                    <td class="" name=""> <?php echo  $orderTotal["beautyDate"] ;?> </td>
                                    <td class="" name=""> <?php echo  $orderTotal["actPlace"] ;?> </td>
                                    <td class="" name=""> <?php echo  $orderTotal["actStart"] ;?> </td>
                                    <td class="" name=""> <?php echo  $orderTotal["hostNo"] ;?> </td>
                                    <td class="" name=""> <?php echo  $orderTotal["totalMoney"] ;?> </td>

                                    <td class="">
                                    <?php 
                                        if( $orderTotal["beautyState"]=="1")
                                        {   echo '有';
                                      
                                        }else{ 
                                            echo '沒有';
                                           
                                        }                                                                      
                                    ?>
                                   
                                                                            
                                    </td>
                                       
                                   
                                    
                                    <!-- <td class=""><button type="button" class="btn btn-link btnclick" value=<?php echo $orderTotal["orderNo"] ; ?> >修改</button></td> -->
                                    
                                </tr>
                                
                               <?php

                               }
                               ?>

                            </tbody>
                    </table>
                    
            </main>
             <!-- 宣傳單查詢//////////////////////// -->
             <main  id="flyercheck" class="col-md-10 ml-auto panel">
                    <h2>宣傳單查詢</h2>
                    <form class="searchbar form-inline mt-2 mt-md-0 justify-content-end">
                            <input class="form-control mr-sm-2 form-control-sm" type="text" placeholder="Search"
                                aria-label="Search">
                            <button class="btn btn-outline-info my-2 my-sm-0 btn-sm" type="submit">搜尋</button>
                    </form>
                    <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">訂單編號</th>
                                    
                                    <th scope="col">宣傳單圖片</th>
                                    
                                   
                                    
                                   
                                    <th scope="col">是否使用人數功能</th>
                                    <th scope="col">人數統計</th>

                                    <th scope="col">活動地址</th>
                                    
                                   
                                    <th scope="col">活動日期</th>
                                 
                                    <th scope="col">宣傳單狀態</th>
                                  
                                    <!-- <th scope="col">修改</th> -->
                                </tr>
                            </thead>
                            <tbody id="">
                            <?php 
                                
                                while( $flyercheckTotal = $flyercheck->fetch(PDO::FETCH_ASSOC)){     
                              
                                ?>
                                <!-- php -->
                               
                                <tr class="back">
                                    <th class="add" name="no"> <?php echo  $flyercheckTotal["orderNo"] ;?> </th>
                                   <td class="first"><img src="../<?php echo $flyercheckTotal["flyerImgUrl"]; ?>" alt="">
                                    </td>
                                   
                                   <td class="" name=""> <?php 
                                   if( $flyercheckTotal["peopleStatus"]=='0'){
                                       echo '有';
                                   }else {
                                        echo'沒有' ;
                                   }  ;?> </td>
                                    <td class="" name=""> <?php echo  $flyercheckTotal["peopleNumber"] ;?> </td>
                                    
                                   
                                    <td class="" name=""> <?php echo  $flyercheckTotal["flyeradd"] ;?> </td>
                                    <td class="" name=""> <?php echo  $flyercheckTotal["flyeDate"] ;?> </td>
 
                                    <td class="change">
                                    <?php 
                                        if($flyercheckTotal["flyeStatus"]=="1")
                                        {   $btnstatus='1';
                                           
                                        }else{ 
                                            $btnstatus='2';
                                           
                                        }                                                                     
                                    ?>
                                    <button type="button" class="<?php if( $btnstatus =='1'){
                                         echo 'btn btn-success';
                                         }else { echo'btn btn-danger' ;
                                         } ?> "> 
                                         <?php if( $btnstatus =='1'){
                                            echo '啟用';
                                            }else { echo'停用' ;
                                            } 
                                        ?>                                      
                                    </td>
                                    
                                   
                                    
                                    
                                </tr>
                                
                               <?php

                               }
                               ?>

                            </tbody>
                    </table>
                    
            </main>


        </div>
    </div>
            
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script> -->
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="lightbox2-master/dist/js/lightbox.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
        
        <script>
        
        $(document).ready(function () {
            ////登出
            $('#backlogin').on('click',function(){
                window.history.back();
            });

            panelToShow = 'admin';
            console.log(panelToShow);
            // tab事件
            $('.tab-panels .tabs li a').on('click', function() {
               
                
                var $panel = $(this).closest('.tab-panels');//.tab-panels
                // console.log($panel);
            

                $panel.find('.tabs  ul li .bb').removeClass('bb');
                // console.log($panel.find('.tabs  ul li .bb').text());
                $(this).addClass('bb');

                //figure out which panel to show
                 panelToShow = $(this).attr('rel'); //panel1
                console.log(panelToShow);

                //hide current panel
                $panel.find('.panel.bb').removeClass('bb');
                $('#'+panelToShow).addClass('bb');

                ///////點圖片放大
                


             });
            ////////配件點擊事件
            ///一開始先給他內塗裝
            $panelchildToShow ='draw';
            console.log($panelchildToShow);
            $('#accessories a').on('click', function(e) {
               //找到父層
                $accfather = $(this).closest('#accessoriesnode');
                // console.log('acc',$accfather);

                $accfather.find('ul li a').removeClass('active');
                // console.log($panel.find('.tabs  ul li .bb').text());
                $(this).addClass('active');
                
                //figure out which panel to show
                $panelchildToShow = $(this).attr('rel'); //panel1
                console.log('show',$panelchildToShow);

                //hide current panel
                $accfather.find('.accchild.childshow').removeClass('childshow');
                $('#'+$panelchildToShow).addClass('childshow');
                return $panelchildToShow;
            });
           
            ////////配件點擊事件結束 ////

            /////1.點擊修改新增input 字改完成
            //  監聽修改按鈕
             var btn = document.querySelectorAll('.btnclick');
            // console.log(btn.length);
             for(var i=0; i<btn.length;i++){
               
                 btn[i].addEventListener('click',function(e){
               
                     if(e.target.innerHTML=='修改'){
                        //  alert('修改');
                         console.log($panelchildToShow)   ;
                    //btn value
                     num = e.target.value;
                     pagevalue = e.target.innerHTML;
                     

                    
                    //當下的back
                    father = e.target.closest('.back');

                    //back.first的value
                    childvalue = father.querySelector('.first').innerHTML;
                    
                    //psw的value
                    pswvalue = father.querySelector('td:nth-child(3)').innerHTML;
                   console.log('pswvalue',pswvalue);
                    ///管理員狀態
                    status = father.querySelector('.change').innerHTML;
                    console.log(status);

                    //加入帳號input＆value
                    var child = father.querySelector('.first');                    
                   
                    ///加入密碼value
                    let psw= father.querySelector('td:nth-child(3)'); 
                    console.log('psw',psw);
                   
                    if(panelToShow == 'flyer'  )  {
                        
                        //帳號
                        child.innerHTML='';
                        child.innerHTML=`<input value="${childvalue}" >` ;
                    }else if(panelToShow == 'host'){
                         //帳號
                         child.innerHTML='';
                        child.innerHTML=`<input value="${childvalue}" >` ;
                         //back 第4個
                        fourvalue = father.querySelector('td:nth-child(4)').innerHTML;
                        console.log(fourvalue);
                        //back 第5個
                        fivevalue = father.querySelector('td:nth-child(5)').innerHTML;
                        //back 第6個
                        sixvalue = father.querySelector('td:nth-child(6)').innerHTML;
                        //back 第7個
                        sevenvalue = father.querySelector('td:nth-child(7)').innerHTML;
                        //back 第8個
                        eightvalue = father.querySelector('td:nth-child(8)').innerHTML;
                        //back 第9個
                        ninevalue = father.querySelector('td:nth-child(9)').innerHTML;
                        //back 第10個
                        tenvalue = father.querySelector('td:nth-child(10)').innerHTML;
                        //back 第11個
                        elevenvalue = father.querySelector('td:nth-child(11)').innerHTML;
                        //back 第12個
                        twelvevalue = father.querySelector('td:nth-child(12)').innerHTML;

                        //加入第4個
                        let four= father.querySelector('td:nth-child(4)'); 
                        //加入第5個
                        let five= father.querySelector('td:nth-child(5)'); 
                        //加入第6個
                        let six= father.querySelector('td:nth-child(6)'); 
                        //加入第7個
                        let seven= father.querySelector('td:nth-child(7)'); 
                        //加入第8個
                        let eight= father.querySelector('td:nth-child(8)'); 
                        //加入第9個
                        let nine= father.querySelector('td:nth-child(9)'); 
                        //加入第10個
                        let ten= father.querySelector('td:nth-child(10)'); 
                        //加入第11個    
                        let eleven= father.querySelector('td:nth-child(11)'); 
                        //加入第12個    
                        let twelve= father.querySelector('td:nth-child(12)'); 

                        four.innerHTML='';
                        four.innerHTML=`<input value="${fourvalue}" >` ;
                        five.innerHTML='';
                        five.innerHTML=`<input value="${fivevalue}" >` ;
                        six.innerHTML='';
                        six.innerHTML=`<input value="${sixvalue}" >` ;
                        seven.innerHTML='';
                        seven.innerHTML=`<input value="${sevenvalue}" >` ;
                        eight.innerHTML='';
                        eight.innerHTML=`<input value="${eightvalue}" >` ;
                        nine.innerHTML='';
                        nine.innerHTML=`<input value="${ninevalue}" >` ;
                        ten.innerHTML='';
                        ten.innerHTML=`<input value="${tenvalue}" >` ;
                        eleven.innerHTML='';
                        eleven.innerHTML=`<input value="${elevenvalue}" >` ;
                        twelve.innerHTML='';
                        twelve.innerHTML=`<input value="${twelvevalue}" >` ;
                    }else if( panelToShow == 'flyerMes' || panelToShow == 'beauty' || panelToShow =='beautyMes'){
                       //back 1 
                    //    flynum=father.querySelector('.add').innerHTML;
                       
                       //back 第6個
                       sixvalue = father.querySelector('td:nth-child(6)').innerHTML;
                       //加入第6個
                       let six= father.querySelector('td:nth-child(6)'); 
                         //加入狀態value
                        // let newstatus= father.querySelector('.change');               
                            six.innerHTML='';
                            six.innerHTML=`<select  class="form-control form-control-sm">
                                    <option >無</option>
                                    <option >下架</option></select>` ;
                           


                    }else if(panelToShow =='accessories' && $panelchildToShow=='draw' || panelToShow =='accessories' && $panelchildToShow=='audio' || panelToShow =='accessories' && $panelchildToShow=='pipe' || panelToShow =='accessories' &&$panelchildToShow=='effects' || panelToShow =='accessories' &&$panelchildToShow=='troupe'){
                        console.log($panelchildToShow);
                         //帳號
                         child.innerHTML='';
                        child.innerHTML=`<input value="${childvalue}" >` ;
                        //back 第4個
                        fourvalue = father.querySelector('td:nth-child(4)').innerHTML;
                        console.log(fourvalue);
                        //加入第4個
                        let four= father.querySelector('td:nth-child(4)'); 
                        four.innerHTML='';
                        four.innerHTML=`<input value="${fourvalue}" >` ;
                      
                    }else if(panelToShow == 'admin'){
                         //帳號
                         child.innerHTML='';
                        child.innerHTML=`<input value="${childvalue}" >` ;
                        // //密碼
                        psw.innerHTML='';
                        psw.innerHTML=`<input value="${pswvalue}" >` ;
                    }else if(panelToShow == 'id'  ){
                        console.log('aa');
                        psw.innerHTML='';
                        psw.innerHTML=`<input value="${pswvalue}" >` ;
                    }else if(panelToShow == 'coupon'){
                        console.log('coupon');
                    }else if(panelToShow == 'keywordd'){
                         //帳號
                         child.innerHTML='';
                        child.innerHTML=`<input value="${childvalue}" >` ;
                        // //密碼
                        psw.innerHTML='';
                        psw.innerHTML=`<input value="${pswvalue}" >` ;
                    }else if(panelToShow == 'flyercheck'){

                    }                   
                   

                    //加入狀態value
                    let newstatus= father.querySelector('.change');  
                    if(panelToShow == 'flyerMes' || panelToShow == 'beauty' || panelToShow =='beautyMes' )  {
                        newstatus.innerHTML='';
                        newstatus.innerHTML=`<select  class="form-control form-control-sm">
                                <option >未處理</option>
                                <option >已處理</option></select>` ;
                    }else{
                        newstatus.innerHTML='';
                        newstatus.innerHTML=`<select  class="form-control form-control-sm">
                                <option >啟用</option>
                                <option >停用</option></select>` ;
                    }                     
                   

                    //點修改後 字改完成
                    e.target.innerHTML = '完成';
                     newbtn = e.target.innerHTML;
                   
                    e.target.addEventListener('click',complete);

                     }
              
                 });
             }
             /////點擊修改新增input結束

             //2.點擊完成消除input 字改修改
             function complete(){
                if(newbtn =='完成'){
                    // alert('完成');
                    console.log(pagevalue);
                //先抓修改的值
                  var newanswer =father.querySelector('.first').firstChild.value;
                
                  var newpsw =father.querySelector('td:nth-child(3)').firstChild.value; 
                  
                  var newstatus =father.querySelector('.change select').value;
                  console.log(newstatus);
                  var newstatusnum = parseInt(newstatus);
                ////////////知道檢舉狀態沒有點未處理
                if( newstatus =="未處理" ){
                   alert('檢舉狀態未更改') ;
                   exit;
                             
                }
                  //判斷現在狀態換成class
                  if(newstatus =="啟用" || newstatus =="已處理" ){
                    
                       var z= "btn btn-success";                   
                  }else{                  
                        var z = "btn btn-danger";                    
                    }
                  
               

                ////判斷哪個表格要放哪些欄位
                if(panelToShow == 'flyer' ){
                     // 改得值放入input
                    father.querySelector('.first').innerHTML = newanswer;
                }else if(panelToShow == 'host'){
                    ///先取值
                  var newfour = father.querySelector('td:nth-child(4)').firstChild.value; 
                  var newfive = father.querySelector('td:nth-child(5)').firstChild.value; 
                  var newsix = father.querySelector('td:nth-child(6)').firstChild.value; 
                  var newseven = father.querySelector('td:nth-child(7)').firstChild.value; 
                  var neweight = father.querySelector('td:nth-child(8)').firstChild.value; 
                  var newnine = father.querySelector('td:nth-child(9)').firstChild.value; 
                  var newten = father.querySelector('td:nth-child(10)').firstChild.value; 
                  var neweleven = father.querySelector('td:nth-child(11)').firstChild.value; 
                  var newtwelve = father.querySelector('td:nth-child(12)').firstChild.value; 
                  //////////在放值
                   // 改得值放入input
                    father.querySelector('.first').innerHTML = newanswer;
                    father.querySelector('td:nth-child(4)').innerHTML= newfour;
                    father.querySelector('td:nth-child(5)').innerHTML= newfive;
                    father.querySelector('td:nth-child(6)').innerHTML= newsix;
                    father.querySelector('td:nth-child(7)').innerHTML= newseven;
                    father.querySelector('td:nth-child(8)').innerHTML= neweight;
                    father.querySelector('td:nth-child(9)').innerHTML= newnine;
                    father.querySelector('td:nth-child(10)').innerHTML= newten;
                    father.querySelector('td:nth-child(11)').innerHTML= neweleven;
                    father.querySelector('td:nth-child(12)').innerHTML= newtwelve;
                    
                }else if(panelToShow == 'flyerMes' || panelToShow == 'beauty' || panelToShow =='beautyMes' ){
                    var newsix = father.querySelector('td:nth-child(6)').firstChild.value; //上下架;                
                    father.querySelector('td:nth-child(6)').innerHTML= newsix;
                    console.log(newsix);
                }else if(panelToShow =='accessories' && $panelchildToShow=='draw' || panelToShow =='accessories' && $panelchildToShow=='audio' || panelToShow =='accessories' && $panelchildToShow=='pipe' || panelToShow =='accessories' &&$panelchildToShow=='effects' || panelToShow =='accessories' &&$panelchildToShow=='troupe'){
                    // 改得值放入input
                    father.querySelector('.first').innerHTML = newanswer;
                    var newfour = father.querySelector('td:nth-child(4)').firstChild.value; 
                    father.querySelector('td:nth-child(4)').innerHTML= newfour;

                }else if(panelToShow == 'admin' || panelToShow == 'keywordd'  ){
                     // 改得值放入input
                    father.querySelector('.first').innerHTML = newanswer;
                    father.querySelector('td:nth-child(3)').innerHTML= newpsw;

                }else if(panelToShow == 'id'){
                    father.querySelector('td:nth-child(3)').innerHTML= newpsw;
                }else if(panelToShow == 'coupon'){
                    
                }
               

                father.querySelector('.change').innerHTML= `<button type="button" class="${z}">${newstatus}</button>`;
                //把完成改成修改
                father.querySelector('.btnclick').innerHTML = '修改';
                father.querySelector('.btnclick').removeEventListener('click',complete);
               
                
                if(panelToShow == 'admin'){
                    // alert('admin');
                    urlvalue='updata2.php';
                    datavalue={ id:newanswer , no:num  ,psw:newpsw , status:newstatus ,pagevalue:pagevalue};
                   

                }else if(panelToShow =='id'){
                    // alert('id');
                    urlvalue='member.php';
                    datavalue={  no:num  ,psw:newpsw , status:newstatus , pagevalue:pagevalue};
                    // alert(newanswer);
                }else if(panelToShow =='flyer'){
                    console.log(newanswer,num,newstatus,pagevalue);
                    urlvalue='flyerimg.php';
                    datavalue={ id:newanswer , no:num  , status:newstatus , pagevalue:pagevalue};

                }else if(panelToShow =='host'){
                //    console.log(host);
                    urlvalue='host.php';
                    datavalue={ id:newanswer , no:num  , tel:newfour ,content:newfive , hostA:newsix , hostB:newseven , hostC:neweight , hostD:newnine , hostE:newten , hostF:neweleven , price:newtwelve , status:newstatus , pagevalue:pagevalue};
                }else if(panelToShow =='flyerMes' ){
                    console.log('flyerMes');
                    urlvalue='finform.php';
                    datavalue={  no:num  ,  status:newstatus  , onoff:newsix };
                   
                }else if(panelToShow == 'beauty'){
                    urlvalue='binform.php';
                    datavalue={   no:num  ,  status:newstatus  , onoff:newsix };
                   
                }else if(panelToShow =='beautyMes'){
                    urlvalue='minform.php';
                    datavalue={  no:num  ,  status:newstatus };
                   
                }else if(panelToShow =='coupon'){
                   
                    urlvalue='coupons.php';
                    datavalue={ no:num , status:newstatus  , pagevalue:pagevalue};
                    console.log(num,status,pagevalue);
                   
                }else if(panelToShow =='accessories'){
                    console.log('accessories');
                        if($panelchildToShow=='draw' ){
                            console.log('draw');
                            urlvalue='draw.php';
                            datavalue={ id:newanswer , no:num  , status:newstatus  , price:newfour, pagevalue:pagevalue};
                            console.log(newstatus , num , newanswer , newfour , pagevalue);
                        }else if($panelchildToShow=='audio'){
                            console.log('111111audio');
                            urlvalue='audio.php';
                            datavalue={ id:newanswer , no:num  , status:newstatus  , price:newfour, pagevalue:pagevalue};
                            console.log(newstatus , num , newanswer , newfour , pagevalue);

                        }else if($panelchildToShow=='pipe'){
                            urlvalue='pipe.php';
                            datavalue={ id:newanswer , no:num  , status:newstatus  , price:newfour, pagevalue:pagevalue};

                        }else if($panelchildToShow=='effects'){
                            urlvalue='effects.php';
                            datavalue={ id:newanswer , no:num  , status:newstatus  , price:newfour, pagevalue:pagevalue};

                        }else if($panelchildToShow=='troupe'){
                            urlvalue='troupe.php';
                            datavalue={ id:newanswer , no:num  , status:newstatus  , price:newfour, pagevalue:pagevalue};

                        }

                }else if(panelToShow =='order'){
                    urlvalue='order.php';
                    datavalue={  no:num  , status:newstatus  , pagevalue:pagevalue};

                }else if(panelToShow == 'keywordd'){
                    // alert('keywordd');
                    urlvalue='keyword.php';
                    datavalue={ id:newanswer , no:num  ,psw:newpsw , status:newstatus ,pagevalue:pagevalue};

                }else if(panelToShow == 'flyercheck'){
                    urlvalue='flyercheck.php';
                    datavalue={  no:num  , status:newstatus  , pagevalue:pagevalue};

                }

                

                $.ajax({
                    url:urlvalue,
                    data:datavalue,                   
                    type:'post',
                    error:function(){                                                                 

                        alert("再試一次");

                        },
                    success:function(data){
                        // x.innerHTML=data;
                        alert('成功');
                       
                      }   
                    })
 
                }
                

             }
             
             /////點擊完成結束

            ////選擇上傳檔案
            document.querySelector('#testfile').onchange = function(e){  
                 filename= e.target.value;  
                 console.log(filename);
                filenum=filename.indexOf('.');
                filenum=filename.substr(filenum+1 ,);

                // console.log(filenum); 
                console.log(typeof(filenum)); 
            // console.log(filename) ;       
               file =  document.querySelector('#testfile').files[0];
               console.log(file); 
                 readFile = new FileReader();
                readFile.readAsDataURL(file);//檔案
                readFile.addEventListener('load',function(){
                    
                    newfile = this.result;//路徑+檔名
                   
                });
                    
            }
            
            ////選擇上傳檔案結束

             ////選擇上傳圖片檔案    
             var upfileall = document.querySelectorAll('.upfile');
            var upfilelen = upfileall.length;
            
            for(var i=0;i<upfilelen;i++){
                upfileall[i].onchange= function(e){
                    upfilename= e.target.value;
                    upfilenum=upfilename.indexOf('.');
                    upfilenum=upfilename.substr(upfilenum+1 ,);
                    console.log(upfilenum,upfilename);

                    file =  this.files[0];
                    console.log(file);
                    readFile = new FileReader();
                    readFile.readAsDataURL(file);//檔案
                    readFile.addEventListener('load',function(){
                        
                    newfile = this.result;//路徑+檔名
                    
                    });
                }
            }
            ////選擇上傳gif檔案
            var gif = document.querySelectorAll('.gif');
            var giflen = gif.length;
            
            for(var i=0;i<giflen;i++){
                gif[i].onchange= function(e){
                    gifname= e.target.value;
                    gifnum=gifname.indexOf('.');
                    gifnum=gifname.substr(gifnum+1 ,);
                    console.log(gifnum,gifname);

                    filegif =  this.files[0];
                    console.log(filegif);
                    readFile = new FileReader();
                    readFile.readAsDataURL(filegif);//檔案
                    readFile.addEventListener('load',function(){
                        
                    newgiffile = this.result;//路徑+檔名
                    
                    });
                }
            }
             ////新增
             $('.addclick').on('click', function(e){
                //先抓修改的值
                var pagevalue = e.target.innerHTML;
                console.log(pagevalue);
                var newidfather = e.target.closest('.newrow ') ;

                //判斷在哪一個資料表
                if(panelToShow =='admin'){
                    // console.log('admin');
                    var newidfather = e.target.closest('.newrow ') ;
                    //帳號
                    var newid= newidfather.querySelector('td:nth-child(2) input').value;
                    //密碼
                    var newpsw= newidfather.querySelector('td:nth-child(3) input').value;
                    //權限
                    var newper= newidfather.querySelector('td:nth-child(4) select').value;
                    //狀態
                    
                    var newstatus= newidfather.querySelector('.change select').value;
                    if(newstatus =="啟用"){
                    
                        var z= "btn btn-success";
                        // alert('正常');
                    }else{
                        // alert('leave');
                        var z = "btn btn-danger";
                        
                    }
                     ////先看目前編號的長度
                    var len =  document.querySelectorAll('#admin .add ').length;                                 
                    console.log('?',len);
                    ////先組字串給append
                    var addString=`<tr><th class="add" name="no">${len+1}</th><td class="first">${newid}</td><td>${newpsw}</td><td>${newper}</td><td><button type="button" class="${z}">${newstatus}</button></td><td class="change"><button type="button" class="btn btn-link btnclick" > 修改</button></td>
                         </tr>`
                     // //加到tbody最後一的td
                    // // let aa = document.getElementsByTagName("tbody")[0];
                    $("tbody:eq(0)").append(addString);

                    ////傳到哪個php
                    urlvalue='updata2.php';
                    datavalue={ id:newid , psw:newpsw , status:newstatus , permission:newper ,pagevalue:pagevalue};
                   
                    

                }else if(panelToShow =='id' ){
                    console.log(panelToShow);
                    var newidfather = e.target.closest('.newrow ') ;
                    //帳號
                    var newid= newidfather.querySelector('td:nth-child(2) input').value;
                    console.log(newid);
                    //密碼
                    var newpsw= newidfather.querySelector('td:nth-child(3) input').value;
                    console.log(newpsw);
                    //狀態
                    var newstatus= newidfather.querySelector('.change select').value;
                    console.log(newstatus);
                    if(newstatus =="啟用"){
                    
                        var z= "btn btn-success";
                        // alert('正常');
                    }else{
                        // alert('leave');
                        var z = "btn btn-danger";
                        
                    }
                    ////先看目前編號的長度
                    var len =  document.querySelectorAll('#id .add').length;                                 
                    console.log('?',len);
                    ////先組字串給append
                    var addString=`<tr><th class="add" name="no">${len+1}</th><td class="first">${newid}</td><td>${newpsw}</td><td><button type="button" class="${z}">${newstatus}</button></td><td class="change"><button type="button" class="btn btn-link btnclick" > 修改</button></td>
                         </tr>`
                    $("tbody:eq(1)").append(addString);

                }else if(panelToShow =='coupon'){
                    // alert('coupon');
                    var newidfather = e.target.closest('.newrow ') ;
                    //帳號
                    var newid= newidfather.querySelector('td:nth-child(2) input').value;
                    console.log(newid);
                    //密碼
                    var newpsw= newidfather.querySelector('td:nth-child(3) input').value;
                    console.log(newpsw);
                    //狀態
                    var newstatus= newidfather.querySelector('.change select').value;
                    console.log(newstatus);
                    if(newstatus =="啟用"){
                    
                        var z= "btn btn-success";
                        // alert('正常');
                    }else{
                        // alert('leave');
                        var z = "btn btn-danger";
                        
                    }
                    ////先看目前編號的長度
                    var len =  document.querySelectorAll('#coupon .add').length;                                 
                    console.log('?',len);
                    ////先組字串給append
                    var addString=`<tr><th class="add" name="no">${len+1}</th><td class="first">${newid}</td><td>${newpsw}</td><td><button type="button" class="${z}">${newstatus}</button></td><td class="change"><button type="button" class="btn btn-link btnclick" > 修改</button></td>
                         </tr>`
                    $('#coupontbody').append(addString);
                    ////傳到哪個php
                    urlvalue='coupons.php';
                    datavalue={ id:newid , psw:newpsw , status:newstatus , pagevalue:pagevalue  };
                    console.log(newid,newstatus,pagevalue);

                }else if (panelToShow =='flyer'){
                    // alert(newfile);
              
                    var newidfather = e.target.closest('.newrow ') ;
                    //帳號
                    var newid= newidfather.querySelector('td:nth-child(2) input').value;
                    console.log(newid);
                    
                    //狀態
                    var newstatus= newidfather.querySelector('.change select').value;
                    console.log(newstatus);
                    if(newstatus =="啟用"){
                    
                        var z= "btn btn-success";
                        // alert('正常');
                    }else{
                        // alert('leave');
                        var z = "btn btn-danger";
                        
                    }
                     ////先看目前編號的長度
                     var len =  document.querySelectorAll('#flyer .add').length;                                 
                    console.log('?',len);
                    ////先組字串給append
                    var addString=`<tr><th class="add" name="no">${len+1}</th><td class="first">${newid}</td><td>${newpsw}</td><td><button type="button" class="${z}">${newstatus}</button></td><td class="change"><button type="button" class="btn btn-link btnclick" > 修改</button></td>
                         </tr>`
                    $('#flyertbody').append(addString);
                    ////傳到哪個php
                    

                    urlvalue='flyerimg.php';
                   
                   
                    console.log(typeof(filename));
                    ///newfile 資料路徑
                    datavalue={  filename:filename , img:newfile ,filenum:filenum ,id:newid  , status:newstatus , pagevalue:pagevalue};

                   
                }else if(panelToShow =='accessories'){
                    var newidfather = e.target.closest('.newrow ') ;
                        //帳號
                        var newid= newidfather.querySelector('td:nth-child(2) input').value;
                        console.log(newid);
                        //權限
                        var newper= newidfather.querySelector('td:nth-child(4) input').value;
                        //狀態
                        var newstatus= newidfather.querySelector('.change select').value;
                        console.log(newstatus);
                        if(newstatus =="啟用"){                        
                            var z= "btn btn-success";
                            // alert('正常');
                        }else{
                            // alert('leave');
                            var z = "btn btn-danger";                            
                        }
                    if($panelchildToShow=='draw'){
                        // console.log('111111111111');
                      
                        ////先看目前編號的長度
                        var len =  document.querySelectorAll('#draw .add').length;                                 
                       
                        ////先組字串給append
                        // var addString=`<tr><th class="add" name="no">${len+1}</th><td class="first">${newid}</td><td>${newpsw}</td><td><button type="button" class="${z}">${newstatus}</button></td><td class="change"><button type="button" class="btn btn-link btnclick" > 修改</button></td>
                            // </tr>`
                        // $('#drawtbody').append(addString);
                        ////傳到哪個php
                        urlvalue='draw.php';
                
                        ///newfile 資料路徑
                     
                        datavalue={ price:newper , upfilename:upfilename , img:newfile , upfilenum:upfilenum  ,id:newid  , status:newstatus , pagevalue:pagevalue};

                    }else if($panelchildToShow=='audio'){
                        // console.log('audio');
                        
                        // ////先看目前編號的長度
                        var len =  document.querySelectorAll('#audio .add').length;                                 
                       
                        urlvalue='audio.php';
                
                        ///newfile 資料路徑
                     
                        datavalue={ price:newper , upfilename:upfilename , img:newfile , upfilenum:upfilenum  ,id:newid  , status:newstatus , pagevalue:pagevalue};

                    }else if($panelchildToShow=='pipe'){
                        console.log('pipe');
                        var len =  document.querySelectorAll('#pipe .add').length;                                 
                       
                        urlvalue='pipe.php';
                
                        ///newfile 資料路徑
                     
                        datavalue={ price:newper , upfilename:upfilename , img:newfile , upfilenum:upfilenum  ,id:newid  , status:newstatus , pagevalue:pagevalue};

                    }else if($panelchildToShow=='effects'){
                        
                        var len =  document.querySelectorAll('#effects .add').length;                                 
                       
                        urlvalue='effects.php';
                
                        ///newfile 資料路徑
                     
                        datavalue={ price:newper , upfilename:upfilename , img:newfile , upfilenum:upfilenum  ,id:newid  , status:newstatus , pagevalue:pagevalue};

                    }else if($panelchildToShow=='troupe'){
                        console.log('troupe');
                        var len =  document.querySelectorAll('#troupe .add').length;                                 
                       
                        urlvalue='troupe.php';
                
                        ///newfile 資料路徑
                     
                        datavalue={ price:newper , upfilename:upfilename , img:newfile , upfilenum:upfilenum  , gifname:gifname , gifnum:gifnum , newgiffile:newgiffile , 
                        id:newid  , status:newstatus , pagevalue:pagevalue};

                    }

                }else if(panelToShow=='keywordd'){
                    // alert('1');
                    var newidfather = e.target.closest('.newrow ') ;
                    //帳號
                    var newid= newidfather.querySelector('td:nth-child(2) input').value;
                    console.log(newid);
                    //密碼
                    var newpsw= newidfather.querySelector('td:nth-child(3) input').value;
                    console.log(newpsw);
                    //狀態
                    var newstatus= newidfather.querySelector('.change select').value;
                    console.log(newstatus);
                    if(newstatus =="啟用"){
                    
                        var z= "btn btn-success";
                        // alert('正常');
                    }else{
                        // alert('leave');
                        var z = "btn btn-danger";
                        
                    }
                    ////先看目前編號的長度
                    var len =  document.querySelectorAll('#keywordbody .add').length;                                 
                    // console.log('?',len);
                    // ////先組字串給append
                    var addString=`<tr><th class="add" name="no">${len+1}</th><td class="first">${newid}</td><td>${newpsw}</td><td><button type="button" class="${z}">${newstatus}</button></td><td class="change"><button type="button" class="btn btn-link btnclick" > 修改</button></td>
                         </tr>`
                    $('#keywordbody').append(addString);
                    ////傳到哪個php
                    urlvalue='keyword.php';
                    datavalue={ id:newid , psw:newid , status:newstatus , pagevalue:pagevalue  };
                    console.log(newid,newid,newstatus,pagevalue);
                }
               
              

               

                // //新增列清空
                //  //帳號
                 newidfather.querySelector('td:nth-child(2) input').value ='';
                // //密碼
                newidfather.querySelector('td:nth-child(3) input').value ='';
                

                //傳到php再給資料庫

                $.ajax({
                    url: urlvalue ,
                    data:datavalue ,
                    type:'post',
                    error:function(){                                                                 

                        alert("再試一次");

                        },
                    success:function(data){
                        // x.innerHTML=data;
                        alert('成功');
                        // alert(data);
                       
                    }
                })
                ///重新刷新頁面
                window.location.reload();
                
             });
           //////////新增結束

           ////////刪除開始
           var del = document.querySelectorAll('.delclick');
           for(var i=0; i<del.length;i++){
                del[i].addEventListener('click',function(e){
                  //得到資料庫的no
                  var btnvalue = e.target.value;
                  var btnname = e.target.innerHTML;
                  console.log('page',panelToShow);
                  //回到td
                   let father = e.target.closest('.back');
                   

                  //是否確定刪除此筆資料
                    // if(confirm("是否確定刪除此筆資料")){
                    //    //按確定
                    //    father.remove();
                    // }
                    if(confirm("是否確定刪除此筆資料")){
                        //admin
                        alert("你按下確定");

                        if(panelToShow == 'admin'){
                        console.log('del');
                        urlvalue='del.php';
                        dataname={no:btnvalue , page:panelToShow}

                        }else if(panelToShow == 'id'){
                            //id     
                            console.log('id');                       
                            
                        }else if(panelToShow == 'flyer'){
                            //flyer
                            urlvalue='del.php';
                            dataname={no:btnvalue , page:panelToShow}
                        }else if(panelToShow == 'host'){
                            urlvalue='del.php';
                            dataname={no:btnvalue , page:panelToShow}
                        }else if(panelToShow =='coupon'){
                            urlvalue='del.php';
                            dataname={no:btnvalue , page:panelToShow}
                        }else if($panelchildToShow=='draw' || $panelchildToShow=='audio' || $panelchildToShow=='effects' || $panelchildToShow=='pipe' || $panelchildToShow=='troupe'){
                            // alert();
                            urlvalue='del.php';
                            dataname={no:btnvalue , page:panelToShow , acc:$panelchildToShow}
                            console.log($panelchildToShow);
                        }else if(panelToShow == 'keywordd'){
                            urlvalue='del.php';
                            dataname={no:btnvalue , page:panelToShow}
                        }
                     //傳到php再給資料庫刪除
                         $.ajax({
                                url:urlvalue,
                                data:dataname,
                                type:'post',
                                error:function(){                                                                 

                                    alert("再試一次");

                                    },
                                success:function(data){
                                    // x.innerHTML=data;
                                    alert('成功');
                                
                                }
                            })
                    }else{

                        alert("你按下取消");
                    }
                   
                   
                     ///重新刷新頁面
                     window.location.reload();
                       
                });
           }
           ////////////刪除結束

           



        });
        
       
       
          


       
       
        

        </script>
        
    
</body>
</html>