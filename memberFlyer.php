<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>宣傳單管理</title>
    <link rel="stylesheet" href="css/memberFlyer.css?<?php echo time();?>">
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
        <!-- 我的宣傳單 -->
        <div class="col-md-10">
            <article class="AllflyerBox">
                <h3>所有宣傳單</h3>
                <table>
                    <thead>
                        <tr>
                            <th>NO.</th>
                            <th>名稱</th>
                            <th>狀態</th>
                            <th>統計狀態</th>
                            <th>人數</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    try {
                        $member =$_SESSION['member'][0][0];
                        $sql = "SELECT * from member left outer join orders on member.memno= orders.memno join flyer on orders.orderno = flyer.orderno where member.memno = $member and flyer.flyeStatus != 2;";
                        $products = $pdo->query($sql);
                     } catch (PDOException $e) {
                        $errMsg = '';
                        $errMsg .=  '錯誤原因' . $e->getMessage() . '<br>'; 
                        $errMsg .=  '錯誤行號' . $e->getLine() . '<br>';
                        echo $errMsg;
                     }
                     $products = $products->fetchAll(PDO::FETCH_ASSOC);
                     foreach ($products as $key => $data) {
                    ?>
                    <tr class="flyerTr">
                        <td><?php echo $data['orderNo'] ?></td>
                        <td><?php echo $data['orderName'] ?></td>
                        <td>
                            <?php 
                                if(strtotime(date('Y/m/d'))>strtotime($data['flyeDate'])){ echo '已過期'; }
                                else{
                                    if($data['flyeStatus']==1){
                            ?>
                                   <label>
                                        <input type="checkbox" class="cbox flyeStatus" checked value="<?php echo $data['orderNo'] ?>">
                                        <span class="btnBox">
                                            <span class="btn"></span>
                                        </span>
                                        <p class="txt">公開</p>
                                    </label>
                                <?php
                                    }
                                    else{
                                ?>
                                    <label>
                                        <input type="checkbox" class="cbox flyeStatus" value="<?php echo $data['orderNo'] ?>">
                                        <span class="btnBox">
                                            <span class="btn"></span>
                                        </span>
                                        <p class="txt">關閉</p>
                                    </label>
                            <?php
                                    }
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                            if(strtotime(date('Y/m/d'))>strtotime($data['flyeDate'])){ echo '已過期'; }
                            else{
                                if($data['peopleStatus']==1){
                            ?>
                                    <label>
                                        <input type="checkbox" class="cbox peopleStatus" checked value="<?php echo $data['orderNo'] ?>">
                                        <span class="btnBox">
                                            <span class="btn"></span>
                                        </span>
                                        <p class="txt">開啟</p>
                                    </label>
                            <?php
                                }
                                else{
                            ?>
                                    <label>
                                        <input type="checkbox" class="cbox peopleStatus" value="<?php echo $data['orderNo'] ?>">
                                        <span class="btnBox">
                                            <span class="btn"></span>
                                        </span>
                                        <p class="txt">關閉</p>
                                    </label>
                            <?php
                                }
                            }
                            ?>
                        </td>
                        <td><?php echo $data['peopleNumber'] ?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </article>
            <article class="detailFlyer">
                <h4></h4>
                <img src="" alt="">
                <table>
                    <tr>
                        <td>活動地點</td>
                        <td id="actadd"></td>
                    </tr>
                    <tr>
                        <td>活動日期</td>
                        <td id="actdata"></td>
                    </tr>
                    <tr>
                        <td>活動簡介</td>
                        <td id="actcontent"></td>
                    </tr>
                </table>
                <div class="btnBar">
                    <button class="commonBtn" id="deleteFlyer">刪除</button>
                    <button class="commonBtn" id="changeFlyer">修改</button>

                </div>
            </article>
        </div>
    </div>

    <script>
        //點擊修改
        document.getElementById('changeFlyer').addEventListener('click',function(){
            window.location.href = "flyer.php"
        })
        //點擊更改宣傳單狀態
        let flyeStatus = document.querySelectorAll('.flyeStatus');
        for (let i = 0; i < flyeStatus.length; i++) {
            flyeStatus[i].addEventListener('change',function(){
                if(flyeStatus[i].checked){
                    flyeStatus[i].parentNode.querySelector('p').innerText = '公開';

                    var xhr = new XMLHttpRequest();
                      //註冊callback function
                      xhr.onreadystatechange = function(){
                        if( xhr.readyState == XMLHttpRequest.DONE ){ //server端執行完畢
                          if( xhr.status == 200){ //server端可以正確的執行
                               console.log(xhr.responseText);
                          }else{ //其它
                              alert( xhr.status );
                          }
                        }
                      } 
                      //設定好所要連結的程式
                      var url = "php/components/_memFlyer_flyerStatus.php?orderNo=" + flyeStatus[i].value + "&setting=" + 1;
                      xhr.open("get", url, true);
                      //送出資料
                      xhr.send(null);


                }else{
                    flyeStatus[i].parentNode.querySelector('p').innerText = '關閉';

                    var xhr = new XMLHttpRequest();
                      //註冊callback function
                      xhr.onreadystatechange = function(){
                        if( xhr.readyState == XMLHttpRequest.DONE ){ //server端執行完畢
                          if( xhr.status == 200){ //server端可以正確的執行
                               console.log(xhr.responseText);
                          }else{ //其它
                              alert( xhr.status );
                          }
                        }
                      } 
                      //設定好所要連結的程式
                      var url = "php/components/_memFlyer_flyerStatus.php?orderNo=" + flyeStatus[i].value + "&setting=" + 0;
                      xhr.open("get", url, true);
                      //送出資料
                      xhr.send(null);
                }
            
            })
        }

        //點擊更改統計人數狀態
        let peopleStatus = document.querySelectorAll('.peopleStatus');
        for (let i = 0; i < peopleStatus.length; i++) {
            peopleStatus[i].addEventListener('change',function(){
                if(peopleStatus[i].checked){
                    peopleStatus[i].parentNode.querySelector('p').innerText = '開啟';

                    var xhr = new XMLHttpRequest();
                      //註冊callback function
                      xhr.onreadystatechange = function(){
                        if( xhr.readyState == XMLHttpRequest.DONE ){ //server端執行完畢
                          if( xhr.status == 200){ //server端可以正確的執行
                               console.log(xhr.responseText);
                          }else{ //其它
                              alert( xhr.status );
                          }
                        }
                      } 
                      //設定好所要連結的程式
                      var url = "php/components/_memFlyer_peopleStatus.php?orderNo=" + peopleStatus[i].value + "&setting=" + 1;
                      xhr.open("get", url, true);
                      //送出資料
                      xhr.send(null);


                }else{
                    peopleStatus[i].parentNode.querySelector('p').innerText = '關閉';

                    var xhr = new XMLHttpRequest();
                      //註冊callback function
                      xhr.onreadystatechange = function(){
                        if( xhr.readyState == XMLHttpRequest.DONE ){ //server端執行完畢
                          if( xhr.status == 200){ //server端可以正確的執行
                               console.log(xhr.responseText);
                          }else{ //其它
                              alert( xhr.status );
                          }
                        }
                      } 
                      //設定好所要連結的程式
                      var url = "php/components/_memFlyer_peopleStatus.php?orderNo=" + peopleStatus[i].value + "&setting=" + 0;
                      xhr.open("get", url, true);
                      //送出資料
                      xhr.send(null);
                      event.cancelBubble=true;
                }
            
            })
        }

        //點擊更改宣傳單詳情
        let flyerTr = document.querySelectorAll('.flyerTr');
        for (let i = 0; i < flyerTr.length; i++) {
            flyerTr[i].addEventListener('click',function(e){
                let data = e.currentTarget.querySelector('td').innerText;
                console.log(e.currentTarget.querySelector('td').innerText);

                  //產生XMLHttpRequest物件
                  var xhr = new XMLHttpRequest();
                  //註冊callback function
                  xhr.onreadystatechange = function(){
                    if( xhr.readyState == XMLHttpRequest.DONE ){ //server端執行完畢
                      if( xhr.status == 200){ //server端可以正確的執行
                           console.log(JSON.parse(xhr.responseText));
                           let data = JSON.parse(xhr.responseText);
                           document.querySelector('.detailFlyer h4').innerText = data[1];
                           document.querySelector('.detailFlyer img').src = data[2];
                           document.getElementById('actadd').innerText = data[6];
                           document.getElementById('actdata').innerText = data[5];
                           document.getElementById('actcontent').innerText = data[8];
                      }else{ //其它
                          alert( xhr.status );
                      }
                    }
                  } 
                  //設定好所要連結的程式
                  var url = "php/components/_memFlyer_selectFlyer.php?orderNo=" + data;
                  xhr.open("get", url, true);
                  //送出資料
                  xhr.send(null);

            })
        }

        //點擊刪除宣傳單
        document.getElementById('deleteFlyer').addEventListener('click',function(){
            let orderNo = document.querySelector('.detailFlyer h4').innerText;
              if(orderNo!=""){
                  //產生XMLHttpRequest物件
                    var xhr = new XMLHttpRequest();
                    //註冊callback function
                    xhr.onreadystatechange = function(){
                      if( xhr.readyState == XMLHttpRequest.DONE ){ //server端執行完畢
                        if( xhr.status == 200){ //server端可以正確的執行
                             console.log(xhr.responseText);
                          //    window.location.reload();
                        }else{ //其它
                            alert( xhr.status );
                        }
                      }
                    } 
                    //設定好所要連結的程式
                    var url = "php/components/_memFlyerDelete.php?orderNo=" + orderNo;
                    xhr.open("get", url, true);
                    //送出資料
                    xhr.send(null);
              }else{
                  alert("還沒選取宣傳單");
              }
            
        })
    </script>
</body>
</html>