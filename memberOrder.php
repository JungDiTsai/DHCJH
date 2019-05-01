<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>台灣大舞台-我的訂單</title>
    <link rel="Shortcut Icon" type="image/x-icon" href="images/logo.ico">
    <link rel="stylesheet" href="css/memberOrder.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
    <?php require_once("php/header.php");?>
    <?php require_once("php/loginLightBox.php");?>
    <?php require_once("php/components/_connectDHC.php"); ?>
    <!-- 並排 -->
    <div class="wrap">
        <?php require_once("php/memberTopNav.php");?>
        <!-- 會員中心訂單管理 -->
        <div id="memberOrder" class="col-md-10">
            <div class="allOrderBox">
                <h3>所有訂單</h3>
                <table>
                    <tr class="orderBoxTitle">
                        <th>編號</th>
                        <th>花車名稱</th>
                        <th>金額</th>
                    </tr>
                    <?php
                        try {
                            $member =$_SESSION['member'][0][0];
                            $sql = "SELECT * from orders where memNo = $member;";
                            $products = $pdo->query($sql);
                         } catch (PDOException $e) {
                            $errMsg = '';
                            $errMsg .=  '錯誤原因' . $e->getMessage() . '<br>'; 
                            $errMsg .=  '錯誤行號' . $e->getLine() . '<br>';
                            echo $errMsg;
                         }
                         $products = $products->fetchAll();
                         foreach ($products as $key => $data) {
                    ?>
                    <tr class="orderTr" value="<?php echo $data[0] ?>">
                        <td><?php echo $data[0] ?></td>
                        <td><?php echo $data['orderName'] ?></td>
                        <td><?php echo $data['totalMoney'] ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="orderDetails">
                <div class="bckColor">
                    <h4></h4>
                    <div class="detailContent">
                        <div class="col-5 col-xl-2">活動日期 :</div>
                        <div class="col-7 col-xl-10"><?php echo $_SESSION['member'][0]['actStart'] ?></div>
                        <div class="col-5 col-xl-2">活動地點 :</div>
                        <div class="col-7 col-xl-10"><?php echo $_SESSION['member'][0]['actPlace'] ?></div>
                        <div class="col-5 col-xl-2 big">總金額 :</div>
                        <div class="col-7 col-xl-10 big"><?php echo $_SESSION['member'][0]['totalMoney'] ?></div>
                    </div>
                    <div class="detailHost">
                        <!-- <div class="col-12">主持人</div> -->
                        <div class="col-4 col-xl-2">姓名 :</div>
                        <div class="col-8 col-xl-10"></div>
                        <div class="col-4 col-xl-2">電話 :</div>
                        <div class="col-8 col-xl-10"></div>
                    </div>
                </div>
                <div class="detailStage">
                    <div class="detailStageImg">
                        <img src="images/stage_full.png" alt="">
                    </div>
                    
                    <table>
                        <tr>
                            <th>品項</th>
                            <th>名稱</th>
                            <th>價錢</th>
                        </tr>
                        <tr>
                            <td>音響</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>鋼管</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>煙火</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>特效</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>舞團</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>字幕機</td>
                            <td>贈送款</td>
                            <td>0</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.onload = function(){
            let orderNo = <?php echo $_SESSION['member'][0]['orderNo'] ?>;
            var xhr = new XMLHttpRequest();
                  //註冊callback function
                  xhr.onreadystatechange = function(){
                    if( xhr.readyState == XMLHttpRequest.DONE ){ //server端執行完畢
                      if( xhr.status == 200){ //server端可以正確的執行
                           console.log(JSON.parse(xhr.responseText));
                           let data = JSON.parse(xhr.responseText);
                           //塞值主持人內容
                           document.querySelectorAll('.detailHost div')[1].innerText = data['hostNo']['hostName'];
                           document.querySelectorAll('.detailHost div')[3].innerText = data['hostNo']['hostTel'];
                           //塞值訂單細項內容
                           document.querySelectorAll('.detailStageImg img')[0].src = data['data']['orderImgUrl'];
                           document.querySelectorAll('.detailStage tr')[1].querySelectorAll('td')[1].innerText = data['audioNo']['audioName'];
                           document.querySelectorAll('.detailStage tr')[1].querySelectorAll('td')[2].innerText = data['audioNo']['audioPrice'];
                           document.querySelectorAll('.detailStage tr')[2].querySelectorAll('td')[1].innerText = data['pipeNo']['pipeName'];
                           document.querySelectorAll('.detailStage tr')[2].querySelectorAll('td')[2].innerText = data['pipeNo']['pipePrice'];
                           document.querySelectorAll('.detailStage tr')[3].querySelectorAll('td')[1].innerText = data['fireworkNo']['fireworkName'];
                           document.querySelectorAll('.detailStage tr')[3].querySelectorAll('td')[2].innerText = data['fireworkNo']['fireworkPrice'];
                           document.querySelectorAll('.detailStage tr')[4].querySelectorAll('td')[1].innerText = data['fireNo']['effectsName'];
                           document.querySelectorAll('.detailStage tr')[4].querySelectorAll('td')[2].innerText = data['fireNo']['effectsPrice'];
                           document.querySelectorAll('.detailStage tr')[5].querySelectorAll('td')[1].innerText = data['troupeNo']['troupeName'];
                           document.querySelectorAll('.detailStage tr')[5].querySelectorAll('td')[2].innerText = data['troupeNo']['troupePrice'];

                      }else{ //其它
                          alert( xhr.status );
                      }
                    }
                  } 
                  //設定好所要連結的程式
                  
                  console.log(orderNo);
                  var url = "php/components/_searchOrderDetail.php?orderNo=" + orderNo;
                  xhr.open("get", url, true);
                  //送出資料
                  xhr.send(null);
                
        }
        let orderTr = document.querySelectorAll('.orderTr');
        for (let i = 0; i < orderTr.length; i++) {
            orderTr[i].addEventListener('click',function(e){
                for (let i = 0; i < orderTr.length; i++) {
                    orderTr[i].classList.remove('orderBoxSelected');
                }
                e.currentTarget.classList.toggle('orderBoxSelected');
                let orderNo = e.currentTarget.getAttribute('value');

                  //產生XMLHttpRequest物件
                  var xhr = new XMLHttpRequest();
                  //註冊callback function
                  xhr.onreadystatechange = function(){
                    if( xhr.readyState == XMLHttpRequest.DONE ){ //server端執行完畢
                      if( xhr.status == 200){ //server端可以正確的執行
                           console.log(JSON.parse(xhr.responseText));
                           let data = JSON.parse(xhr.responseText);
                           //塞值編號
                           document.querySelector('.bckColor h4').innerText = data['data']['orderName'];
                           //塞值訂單內容
                           document.querySelectorAll('.detailContent div')[1].innerText = data['data']['actStart'];
                           document.querySelectorAll('.detailContent div')[3].innerText = data['data']['actPlace'];
                           document.querySelectorAll('.detailContent div')[5].innerText = data['data']['totalMoney'];
                           //塞值主持人內容
                           document.querySelectorAll('.detailHost div')[1].innerText = data['hostNo']['hostName'];
                           document.querySelectorAll('.detailHost div')[3].innerText = data['hostNo']['hostTel'];
                           //塞值訂單細項內容
                           document.querySelectorAll('.detailStageImg img')[0].src = data['data']['orderImgUrl'];
                           document.querySelectorAll('.detailStage tr')[1].querySelectorAll('td')[1].innerText = data['audioNo']['audioName'];
                           document.querySelectorAll('.detailStage tr')[1].querySelectorAll('td')[2].innerText = data['audioNo']['audioPrice'];
                           document.querySelectorAll('.detailStage tr')[2].querySelectorAll('td')[1].innerText = data['pipeNo']['pipeName'];
                           document.querySelectorAll('.detailStage tr')[2].querySelectorAll('td')[2].innerText = data['pipeNo']['pipePrice'];
                           document.querySelectorAll('.detailStage tr')[3].querySelectorAll('td')[1].innerText = data['fireworkNo']['fireworkName'];
                           document.querySelectorAll('.detailStage tr')[3].querySelectorAll('td')[2].innerText = data['fireworkNo']['fireworkPrice'];
                           document.querySelectorAll('.detailStage tr')[4].querySelectorAll('td')[1].innerText = data['fireNo']['effectsName'];
                           document.querySelectorAll('.detailStage tr')[4].querySelectorAll('td')[2].innerText = data['fireNo']['effectsPrice'];
                           document.querySelectorAll('.detailStage tr')[5].querySelectorAll('td')[1].innerText = data['troupeNo']['troupeName'];
                           document.querySelectorAll('.detailStage tr')[5].querySelectorAll('td')[2].innerText = data['troupeNo']['troupePrice'];

                      }else{ //其它
                          alert( xhr.status );
                      }
                    }
                  } 
                  //設定好所要連結的程式
                  var url = "php/components/_searchOrderDetail.php?orderNo=" + orderNo;
                  xhr.open("get", url, true);
                  //送出資料
                  xhr.send(null);
                
            });
        }
    </script>
</body>
</html>