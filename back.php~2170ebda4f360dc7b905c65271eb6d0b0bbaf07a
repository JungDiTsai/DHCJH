<?php
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
                        </tr>
                    </thead>
                     <!-- php -->
                    <?php 
                    while( $prodRow = $products->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <!-- php -->
                    <tbody>
                        <tr class="back">
                            <!-- <td class="add"></td> -->
                            <th class="add" name="no"> <?php echo $prodRow["no"]; ?> </th>
                            <!-- <td><input type="" value="111"></td> -->
                            <td class="first" value=<?php echo $prodRow["no"]; ?> > <?php echo $prodRow["id"]; ?></td>
                            <td><?php echo $prodRow["psw"]; ?></td>
                            <td ><?php echo $prodRow["permission"]; ?></td>
                            <td>
                            <button type="button" class="<?php if($prodRow["status"]=="正常"){
                                 echo 'btn btn-success';}else{ echo 'btn btn-danger';}?>">
                                <?php echo $prodRow["status"]; ?></td>
                            <!-- <td><button type="button" class="btn btn-success">正常</button></td> -->
                            <td class="test"><button type="button" class="btn btn-link " value=<?php echo $prodRow["no"]; ?> >修改</button></td>
                        </tr>
                        <!-- <tr>
                            <th >2</th>
                            <td>Jacob</td>
                            <td>****</td>
                            <td>一般管理員</td>
                            <td><button type="button" class="btn btn-danger">停權</button></td>
                            <td><button type="button" class="btn btn-link">修改</button></td>
                        </tr> -->
                        <!-- <tr>
                            <th >3</th>
                            <td >Larrytd</td>
                            <td>****</td>
                            <td>一般管理員</td>
                            <td><button type="button" class="btn btn-success">正常</button></td>
                            <td><button type="button" class="btn btn-link">修改</button></td>
                        </tr>
                        <tr>
                            <th >4</th>
                            <td >judyyyyy</td>
                            <td>****</td>
                            <td>一般管理員</td>
                            <td><button type="button" class="btn btn-success">正常</button></td>
                            <td><button type="button" class="btn btn-link">修改</button></td>
                        </tr> -->
                    </tbody>
                    <?php
                    }
                    ?>
                    
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

            $('.tab-panels .tabs li a').on('click', function() {
                // alert();
            
                var $panel = $(this).closest('.tab-panels');//.tab-panels
                // console.log($panel);
            

                $panel.find('.tabs  ul li .bb').removeClass('bb');
                // console.log($panel.find('.tabs  ul li .bb').text());
                $(this).addClass('bb');

                //figure out which panel to show
                var panelToShow = $(this).attr('rel'); //panel1
                console.log(panelToShow);

                //hide current panel
                $panel.find('.panel.bb').removeClass('bb');
                $('#'+panelToShow).addClass('bb');

             });
        });
        // 
       
        var add = document.querySelectorAll('.add');
        // var addlen =  add.length;
        
        var btn = document.querySelectorAll('.test');
        var len = btn.length;
        var num;

        for(var i =0;i<len;i++){
            // console.log(i);
            
            btn[i].addEventListener('click',function(e){
                 num = e.target.value; //123
                // console.log(num);
                // add[x-1].innerHTML='123';

                var x = e.target.closest('.back');
                // console.log(x);

                var y = x.querySelector('.first').innerHTML;//mark
                // console.log(y);
                
                var el = document.querySelectorAll('.first');
                var ellen = el.length;
                // console.log(ellen);

                for(var i=0;i<ellen;i++){
                    if(num == i+1){
                        // console.log(i);
                        var answer = y;
                        // console.log('answer',answer);
                         el[i].innerHTML = `<input value="${answer}" >`  ;
                        //  console.log( el.innerHTML);
                         btn[i].getElementsByTagName('button')[0].innerText='完成'; 
                         
                         btn[i].getElementsByTagName('button')[0].addEventListener ('click',function(e){
                            
                             console.log('e',e.target.innerText);
                             if(e.target.innerText =='完成'){
                                let el = document.querySelectorAll('.first');
                                console.log(el) ;
                                let i = e.target.value;
                                let x = el[i-1].firstChild.value; //new value
                                console.log(x) ;
                                el[i-1].innerHTML= '';
                                 el[i-1].innerHTML= x;
                                 console.log(el[i-1]);
                                //  btn[i-1].getElementsByTagName('button')[0].innerText='修改'; 
                                // console.log('new',btn[i-1].getElementsByTagName('button')[0].innerText);
                             }
                         }) ;
                    }
                }
              
            });

            // function complete(data){
                // var num = data.value; 
                // console.log(data);

               
                   
                // var x = document.querySelector('.first');
                // console.log(x);
                // var y = document.querySelector('.first input').value;
                // console.log('value',y);


                // $.ajax({
                //     url:'updata.php',
                //     data:{id:y},
                //     type:'post',
                //     error:function(){                                                                 

                //         alert("失敗");

                //         },
                //     success:function(data){
                //         x.innerHTML=data;
                //     }
                // })

        //        }

        }
       
        

        </script>
        
    
</body>
</html>