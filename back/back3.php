<?php 
//admin
$errMsg="";

try {
    require_once("connectBooks.php");
	$sql = "select * from admin";
	$products=$pdo->query($sql);  //下指令
    

} catch (PDOException $e) {
	$errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
	$errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
}

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

</style>
</head>
<body>
  
    <div class="container-fluid">
        <div class="row tab-panels">
            <nav class="navbar col-md-2 navbar-expand-md navbar-dark bg-dark text-light  fixed-left">
                <a class="navbar-brand" href="#"><img src="" alt="">logo</a>
                <a href=""ddddd></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                </button>
                    
                <div class="collapse navbar-collapse tabs" id="navbarSupportedContent">
                <ul class="navbar-nav flex-column ">
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
                            <a class="dropdown-item menu text-info" rel="beautyMes" >選美留言檢舉管理</a>
                        </div>
                    </li>
                   
                    
                    <li class="nav-item menu">
                      <a class="nav-link text-info" href="#" rel="coupon" >優惠卷管理</a>
                    </li>
                    <li class="nav-item menu">
                        <a class="nav-link text-info" href="#" rel="keywordd" >客服關鍵字管理</a>
                    </li>
                    
                   
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
        
            <table class="table table-hover">
                    <thead>
                        <tr>
                        <th >管理員編號 </th>
                        <th scope="col">管理員帳號</th>
                        
                      
                        <th scope="col">管理員密碼</th>
                        <th scope="col">管理員權限</th>
                        <th scope="col">管理員狀態</th>
                        <th scope="col">修改</th>
                        <th scope="col">刪除</th>
                        </tr>
                    </thead>
                     
                    <tbody>
                        
                        <!-- 新增 -->
                        <tr class="newrow">
                            <td></td>
                            <td><input type="text" class="form-control form-control-sm"></td>
                            <td><input  value="1"type="text" class="form-control form-control-sm"></td>
                            <td>
                            <select name="" id="" class="form-control form-control-sm">
                                <option >最高</option>
                                <option >一般</option>
                            </select>
                            </td>
                            <td class="change">
                            <select  class="form-control form-control-sm">
                                <option >正常</option>
                                <option >離職</option>
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
                     while( $prodRow = $products->fetch(PDO::FETCH_ASSOC)){     
                                            
                        $new++;
                    ?>
                    <!-- php -->
                        <tr class="back">
                            <!-- <td class="add"></td> -->
                            <th class="add" name="no"> <?php echo  $new ;?> </th>
                            <!-- <td><input type="" value="111"></td> -->
                            <td class="first"> <?php echo $prodRow["id"]; ?></td>
                            <td><?php echo $prodRow["psw"]; ?></td>
                            <td ><?php echo $prodRow["permission"]; ?></td>
                            <td class="change">
                            <button type="button" class="<?php if($prodRow["status"]=="正常"){
                                 echo 'btn btn-success';}else{ echo 'btn btn-danger';}?> ">
                                <?php echo $prodRow["status"]; ?></td>
                            <!-- <td><button type="button" class="btn btn-success">正常</button></td> -->
                            <td class="test"><button type="button" class="btn btn-link btnclick" value=<?php echo $prodRow["no"]; ?> >修改</button></td>
                            <td class="test"><button type="button" class="btn btn-link delclick" value=<?php echo $prodRow["no"]; ?> >刪除</button></td>

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
                         <!-- 新增 -->
                         <tr class="newrow">
                            <td></td>
                            <td><input type="text" class="form-control form-control-sm"></td>
                            <td><input  value="1"type="text" class="form-control form-control-sm"></td>
                            
                            <td class="change">
                                <select  class="form-control form-control-sm">
                                    <option >正常</option>
                                    <option >停權</option>
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
                            $memberno =0;
                            while( $member = $mem->fetch(PDO::FETCH_ASSOC)){     
                                                    
                                $memberno++;
                        ?>
                        <!--php  -->
                        <tr class="back">
                            <th class="add" name="no"> <?php echo  $memberno ;?> </th>
                            <td class="first"> <?php echo $member["Id"]; ?></td>
                            <td ><?php echo $member["memPsw"]; ?></td>
                            <td class="change">
                            <button type="button" class="<?php if($member["memStatus"]=="正常"){
                                 echo 'btn btn-success';}else{ echo 'btn btn-danger';}?> ">
                                <?php echo $member["memStatus"]; ?></td>
                           
                            <td class="test"><button type="button" class="btn btn-link btnclick" value=<?php echo $member["No"]; ?> >修改</button></td>
                            <td class="test"><button type="button" class="btn btn-link delclick" value=<?php echo $member["No"]; ?> >刪除</button></td>

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
                    <div class="card text-center">
                            <div class="card-header">
                              <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                  <a class="nav-link " href="#">內塗裝</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link active" href="#">音響</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">鋼管</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#">燈光</a>
                                </li>
                                <li class="nav-item">
                                     <a class="nav-link " href="#">特效</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#">舞團</a>
                                </li>
                              </ul>
                            </div>

                            <div class="">
                                    <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                <th >商品編號 </th>
                                                <th scope="col">商品名稱</th>
                                                <th scope="col">圖片說明</th>
                                                <th scope="col">數量</th>
                                                <th scope="col">價格</th>
                                                <th scope="col">修改</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th >1</th>
                                                    <td>Mark</td>
                                                    <td>****</td>
                                                    <td><button type="button" class="btn btn-success">正常</button></td>
                                                    <td><button type="button" class="btn btn-link">修改</button></td>
                                                </tr>
                                                <tr>
                                                    <th >2</th>
                                                    <td>Jacob</td>
                                                    <td>****</td>
                                                    <td><button type="button" class="btn btn-danger">停權</button></td>
                                                    <td><button type="button" class="btn btn-link">修改</button></td>
                                                </tr>
                                                <tr>
                                                    <th >3</th>
                                                    <td >Larrytd</td>
                                                    <td>****</td>
                                                    <td><button type="button" class="btn btn-success">正常</button></td>
                                                    <td><button type="button" class="btn btn-link">修改</button></td>
                                                </tr>
                                                <tr>
                                                    <th >4</th>
                                                    <td >judyyyyy</td>
                                                    <td>****</td>
                                                    <td><button type="button" class="btn btn-success">正常</button></td>
                                                    <td><button type="button" class="btn btn-link">修改</button></td>
                                                </tr>
                                            </tbody>
                                            </table> 
                            </div>
                    </div>
            </main>

            <!-- 宣傳單管理 -->
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
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th >1</th>
                                    <td>勁爆你的夜</td>
                                    <td>img</td>
                                    <td><button type="button" class="btn btn-success">正常</button></td>
                                    <td><button type="button" class="btn btn-link">修改</button></td>
                                </tr>
                                <tr>
                                    <th >2</th>
                                    <td>逃去藝術風</td>
                                    <td>img</td>
                                    <td><button type="button" class="btn btn-danger">停權</button></td>
                                    <td><button type="button" class="btn btn-link">修改</button></td>
                                </tr>
                                <tr>
                                    <th >3</th>
                                    <td >來去看辣妹</td>
                                    <td>img</td>
                                    <td><button type="button" class="btn btn-success">正常</button></td>
                                    <td><button type="button" class="btn btn-link">修改</button></td>
                                </tr>
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
                                <th >主持人編號 </th>
                                <th scope="col">姓名</th>
                                <th scope="col">電話</th>
                                <th scope="col">上班時間</th>
                                <th scope="col">假別</th>
                                <th scope="col">主持人狀態</th>
                               
                                <th scope="col">修改</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th >1</th>
                                    <td>小辣椒</td>
                                    <td>091111111</td>
                                    <td>9:00</td>
                                    <td><button type="button" class="btn btn-success">無</button></td>
                                    <td><button type="button" class="btn btn-success">正常</button></td>
                                    <td><button type="button" class="btn btn-link">修改</button></td>
                                </tr>
                                <tr>
                                    <th >2</th>
                                    <td>小辣椒</td>
                                    <td>091111111</td>
                                    <td></td>
                                    <td><button type="button" class="btn btn-danger">休假</button></td>
                                    <td><button type="button" class="btn btn-success">正常</button></td>
                                    <td><button type="button" class="btn btn-link">修改</button></td>
                                </tr>
                                <tr>
                                    <th >3</th>
                                    <td >小辣椒</td>
                                    <td>091111111</td>
                                    <td></td>
                                    <td><button type="button" class="btn btn-success">無</button></td>
                                    <td><button type="button" class="btn btn-success">正常</button></td>
                                    <td><button type="button" class="btn btn-link">修改</button></td>
                                </tr>
                                <tr>
                                    <th >4</th>
                                    <td >小辣椒</td>
                                    <td>091111111</td>
                                    <td></td>
                                    <td><button type="button" class="btn btn-success">無</button></td>
                                    <td><button type="button" class="btn btn-danger">離職</button></td>
                                    <td><button type="button" class="btn btn-link">修改</button></td>
                                </tr>
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
                                <th >檢舉編號 </th>
                                <th scope="col">圖片</th>
                                <th scope="col">檢舉原因</th>
                                <th scope="col">檢舉狀態</th>
                               <th scope="col">修改</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th >1</th>
                                    <td>img</td>
                                    <td>不雅文字</td>
                                    <td><button type="button" class="btn btn-danger">尚未處理</button></td>
                                    <td><button type="button" class="btn btn-link">修改</button></td>
                                </tr>
                                <tr>
                                    <th >2</th>
                                    <td>img</td>
                                    <td>不雅文字</td>
                                    <td><button type="button" class="btn btn-danger">尚未處理</button></td>
                                    <td><button type="button" class="btn btn-link">修改</button></td>
                                </tr>
                                <tr>
                                    <th >3</th>
                                    <td>img</td>
                                    <td>不雅文字</td>
                                    <td><button type="button" class="btn btn-danger">尚未處理</button></td>
                                    <td><button type="button" class="btn btn-link">修改</button></td>
                                </tr>
                               
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
                                <th >檢舉編號 </th>
                                <th scope="col">圖片</th>
                                <th scope="col">檢舉原因</th>
                                <th scope="col">檢舉狀態</th>
                                <th scope="col">修改</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th >1</th>
                                    <td>img</td>
                                    <td>不雅文字</td>
                                    <td><button type="button" class="btn btn-danger">尚未處理</button></td>
                                    <td><button type="button" class="btn btn-link">修改</button></td>
                                </tr>
                                <tr>
                                    <th >2</th>
                                    <td>img</td>
                                    <td>不雅文字</td>
                                    <td><button type="button" class="btn btn-danger">尚未處理</button></td>
                                    <td><button type="button" class="btn btn-link">修改</button></td>
                                </tr>
                                <tr>
                                    <th >3</th>
                                    <td>img</td>
                                    <td>不雅文字</td>
                                    <td><button type="button" class="btn btn-danger">尚未處理</button></td>
                                    <td><button type="button" class="btn btn-link">修改</button></td>
                                </tr>
                               
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
                                <th scope="col">連結詳情</th>
                                <th scope="col">檢舉原因</th>
                                <th scope="col">檢舉狀態</th>
                                <th scope="col">修改</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th >1</th>
                                    <td>連結</td>
                                    <td>不雅文字</td>
                                    <td><button type="button" class="btn btn-danger">尚未處理</button></td>
                                    <td><button type="button" class="btn btn-link">修改</button></td>
                                </tr>
                                <tr>
                                    <th >2</th>
                                    <td>連結</td>
                                    <td>不雅文字</td>
                                    <td><button type="button" class="btn btn-danger">尚未處理</button></td>
                                    <td><button type="button" class="btn btn-link">修改</button></td>
                                </tr>
                                <tr>
                                    <th >3</th>
                                    <td>連結</td>
                                    <td>不雅文字</td>
                                    <td><button type="button" class="btn btn-danger">尚未處理</button></td>
                                    <td><button type="button" class="btn btn-link">修改</button></td>
                                </tr>
                               
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
                            <tbody>
                                <tr>
                                    <th >1</th>
                                    <td>跑跑跑</td>
                                    <td>1000</td>
                                    <td><button type="button" class="btn btn-success">正常</button></td>
                                    <td><button type="button" class="btn btn-link">修改</button></td>
                                </tr>
                                <tr>
                                    <th >2</th>
                                    <td>跑跑跑</td>
                                    <td>1000</td>
                                    <td><button type="button" class="btn btn-danger">停用</button></td>
                                    <td><button type="button" class="btn btn-link">修改</button></td>
                                </tr>
                                <tr>
                                    <th >3</th>
                                    <td>跑跑跑</td>
                                    <td>1000</td>
                                    <td><button type="button" class="btn btn-danger">停用</button></td>
                                    <td><button type="button" class="btn btn-link">修改</button></td>
                                </tr>
                               
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
                                <th >關鍵字 </th>
                                <th scope="col">關鍵字回應</th>
                                <th scope="col">關鍵字狀態</th>
                               
                               
                                <th scope="col">修改</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                   
                                    <td>公司介紹</td>
                                    <td>全台最大的電子花車</td>
                                    <td><button type="button" class="btn btn-success">正常</button></td>
                                    <td><button type="button" class="btn btn-link">修改</button></td>
                                </tr>
                                <tr>
                                    <td>電話</td>
                                    <td>091111111111</td>
                                    <td><button type="button" class="btn btn-success">正常</button></td>
                                    <td><button type="button" class="btn btn-link">修改</button></td>
                                    </tr>
                                <tr>
                                   
                                    <td>你好</td>
                                    <td>全台最大的電子花車</td>
                                    <td><button type="button" class="btn btn-danger">停用</button></td>
                                    <td><button type="button" class="btn btn-link">修改</button></td>
                                </tr>
                               
                            </tbody>
                    </table>
                    
            </main>

        </div>
    </div>
            
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script> -->
        <script src="jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
        <script>
        
        $(document).ready(function () {
            panelToShow = 'admin';
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

             });

            /////1.點擊修改新增input 字改完成
            //  監聽修改按鈕
             var btn = document.querySelectorAll('.btnclick');
             for(var i=0; i<btn.length;i++){
                
                 btn[i].addEventListener('click',function(e){
                     if(e.target.innerHTML=='修改'){
                         alert('修改');

                    //  //btn value
                     num = e.target.value;
                     console.log(num);
                    //當下的back
                    father = e.target.closest('.back');

                    //back.first的value
                    childvalue = father.querySelector('.first').innerHTML;
                    //psw的value
                    pswvalue = father.querySelector('td:nth-child(3)').innerHTML;
                    ///管理員狀態
                    status = father.querySelector('.change').innerHTML;
                    console.log(status);

                    //加入帳號input＆value
                    var child = father.querySelector('.first');                    
                    child.innerHTML='';
                    child.innerHTML=`<input value="${childvalue}" >` ;

                    ///加入密碼value
                    let psw= father.querySelector('td:nth-child(3)');                                   
                    psw.innerHTML='';
                    psw.innerHTML=`<input value="${pswvalue}" >` ;

                    //加入狀態value
                    let newstatus= father.querySelector('.change');                                   
                    newstatus.innerHTML='';
                    newstatus.innerHTML=`<select  class="form-control form-control-sm">
                                <option >正常</option>
                                <option >離職</option></select>` ;

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
                    alert('完成');
                //先抓修改的值
                  var newanswer =father.querySelector('.first').firstChild.value;
                //   console.log(typeof(newanswer));
                  var newpsw =father.querySelector('td:nth-child(3)').firstChild.value; 
                  var newstatus =father.querySelector('.change select').value;
                  var newstatusnum = parseInt(newstatus);
                //   console.log(typeof(x));
                  //判斷現在狀態換成class
                  if(newstatus =="正常"){
                    
                    var z= "btn btn-success";                   
                     }else{                  
                    var z = "btn btn-danger";                    
                     }
                  

                // 改得值放入input
                father.querySelector('.first').innerHTML = newanswer;
                father.querySelector('td:nth-child(3)').innerHTML= newpsw;
                father.querySelector('.change').innerHTML= `<button type="button" class="${z}">${newstatus}</button>`;
                //把完成改成修改
                father.querySelector('.btnclick').innerHTML = '修改';
                father.querySelector('.btnclick').removeEventListener('click',complete);
                alert(num);     
                
                // if(panelToShow == 'admin'){
                //     alert('admin');
                //     // datavalue={id:newanswer,no:num,psw:newpsw,status:newstatus};

                // }else if(panelToShow =='id'){
                //     // datavalue=;
                // }
                $.ajax({
                    url:'updata2.php',
                    data:{id:newanswer,no:num},
                    
                    type:'post',
                    error:function(){                                                                 

                        alert("失敗");

                        },
                    success:function(data){
                        // x.innerHTML=data;
                        alert(data);
                       
                    }
                })

                }
                

             }
             
             /////點擊完成結束

             ////新增
             $('.addclick').on('click', function(e){
                //先抓修改的值
                // let newid = e.target.closest('.newrow :nth-child(2) input') ;
                let newidfather = e.target.closest('.newrow ') ;
                //帳號
                let newid= newidfather.querySelector('td:nth-child(2) input').value;
                //密碼
                let newpsw= newidfather.querySelector('td:nth-child(3) input').value;
                //權限
                let newper= newidfather.querySelector('td:nth-child(4) select').value;
                //狀態
                let newstatus= newidfather.querySelector('.change select').value;
                console.log(typeof(newstatus));
                if(newstatus =="正常"){
                    
                    var z= "btn btn-success";
                   alert('正常');
                }else{
                    alert('leave');
                    var z = "btn btn-danger";
                    
                }
                
                ////先看目前ＮＯ的長度
                let el = (btn.length)-1;
                console.log(el);

                //加到tbody最後一的td
                // let aa = document.getElementsByTagName("tbody")[0];
                $("tbody:eq(0)").append(`<tr><th class="add" name="no">${el+1}</th><td class="first">${newid}</td><td>${newpsw}</td><td>${newper}</td><td><button type="button" class="${z}">${newstatus}</button></td><td class="change"><button type="button" class="btn btn-link btnclick" > 修改</button></td>
                </tr>`);

                //新增列清空
                 //帳號
                 newidfather.querySelector('td:nth-child(2) input').value ='';
                //密碼
                newidfather.querySelector('td:nth-child(3) input').value ='';
                

                //傳到php再給資料庫

                $.ajax({
                    url:'updata2.php',
                    data:{id:newid,psw:newpsw,permission:newper,status:newstatus},
                    type:'post',
                    error:function(){                                                                 

                        alert("失敗");

                        },
                    success:function(data){
                        // x.innerHTML=data;
                        alert(data);
                       
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
                  let btnvalue = e.target.value;
                  //回到td
                   let father = e.target.closest('.back');
                   

                  //是否確定刪除此筆資料
                    if(confirm("是否確定刪除此筆資料")){
                       //按確定
                       father.remove();
                    }
                     //傳到php再給資料庫刪除
                    $.ajax({
                        url:'del.php',
                        data:{no:btnvalue},
                        type:'post',
                        error:function(){                                                                 

                            alert("失敗");

                            },
                        success:function(data){
                            // x.innerHTML=data;
                            alert(data);
                        
                        }
                    })
                     ///重新刷新頁面
                     window.location.reload();
                       
                });
           }
            

        });
        
       
       
          


       
       
        

        </script>
        
    
</body>
</html>