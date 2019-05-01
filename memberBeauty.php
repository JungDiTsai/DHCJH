<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>台灣大舞台-我的發表</title>
    <link rel="Shortcut Icon" type="image/x-icon" href="images/logo.ico">
    <link rel="stylesheet" href="css/memberBeauty.css">
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
      <!-- 我的收藏Card -->
      
      <article class="cardGroup col-md-10">
          <div class="myBeauty">
               <div class="beautyMessage">
                    <h3>我的選美</h3>
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
                             $errMsg='';
                             try {
                                $member =$_SESSION['member'][0][0];
                                $sql = "SELECT * from message where orderno = $data[0];";
                                $products = $pdo->query($sql);
                                $number = $products->rowCount();
                             } catch (PDOException $e) {
                                $errMsg .=  '錯誤原因' . $e->getMessage() . '<br>'; 
                                $errMsg .=  '錯誤行號' . $e->getLine() . '<br>';
                             }
                    ?>
                    <p><span><?php echo $data['orderName']; ?></span> 共有 <?php echo $number; ?>筆 留言<br><a orderNo="<?php echo $data['orderNo'];?>" class="showOrderLightBox">立即查看</a></p>
                    <?php } ?>
               </div>
          </div>
          
          <div class="myFootprint">
                <div class="myMessage">
                    <h3>我的留言</h3>
                    <?php
                         try {
                            $member =$_SESSION['member'][0][0];

                            $sql = "SELECT * from message join orders on orders.orderNo= message.orderNo where message.memno = $member order by messageNo desc ;";
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
                    <p>你在 <?php echo $data['orderName']; ?> 的留言 :<br><span><?php echo $data['messageContent'];?></span></p>
                         <?php } ?>
                </div>
                
          </div>
      </article>
      <div id="memOrderLightBox">
         <div id="LightBox">
            <i class="fas fa-times fa-2x" id="hiddenBox"></i>
            <img src="images/stageImages/2.png" alt="" id="_OrderImg">
            <div id="allMessage">  
            </div>
            <div id="my_Message">
               <input type="text" id="sendMessage">
               <button id="sendMessageBtn">送出</button>
            </div>
         </div>
      </div>
      <script>
         //點擊送出 送出訊息
         document.getElementById('sendMessageBtn').addEventListener('click',function(e){
            let orderNo = e.target.getAttribute('orderNo');
            let input = document.getElementById('sendMessage').value;
            let memNo = LoginState[0][0];

              //產生XMLHttpRequest物件
              let xhr = new XMLHttpRequest();
              //註冊callback function
              xhr.onload = function(){
                  if( xhr.status == 200){ //server端可以正確的執行
                      if(xhr.responseText=="留言成功"){
                        let li = document.createElement('li');
                        let img = document.createElement('img');
                        img.src = LoginState[0]['memImgUrl'];
                        li.appendChild(img);
                        let p = document.createElement('p');
                        p.innerText = input;
                        li.appendChild(p);
                        document.getElementById('allMessage').appendChild(li);

                        let p2 = document.createElement('p');
                        
                        let beforeNode = document.querySelector('.myMessage p');
                        p2.innerHTML = `你回復的新留言 :<br><span>${input}</span>`;
                        p2.style.background = "#ffa";
                        document.querySelector('.myMessage').insertBefore(p2,beforeNode);
                      }
                  }else{ //其它
                      alert( xhr.status );
                  }
              }  
              //設定好所要連結的程式
              var url = "php/components/_memSendMessage.php";
              xhr.open("Post", url, true);
              xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
              //送出資料
              var data_info = "orderNo=" + orderNo + "&input=" + input + "&memNo=" + memNo;
              xhr.send( data_info );
            
         })

         //點擊關閉燈窗
         document.getElementById('hiddenBox').addEventListener('click',function(){
            document.getElementById('memOrderLightBox').style.display="none";
         })
         //點擊立即查看 顯示燈窗
         let showOrderLightBox = document.querySelectorAll('.showOrderLightBox');
         for (let i = 0; i < showOrderLightBox.length; i++) {
            showOrderLightBox[i].addEventListener('click',function(e){
               document.getElementById('memOrderLightBox').style.display="block";
               let orderNo = e.target.getAttribute('orderNo');
               document.getElementById('sendMessageBtn').setAttribute('orderNo',orderNo)

                 //產生XMLHttpRequest物件
                 var xhr = new XMLHttpRequest();
                 //註冊callback function
                 xhr.onreadystatechange = function(){
                   if( xhr.readyState == XMLHttpRequest.DONE ){ //server端執行完畢
                     if( xhr.status == 200){ //server端可以正確的執行
                           document.getElementById('allMessage').innerText = '';
                           let data = JSON.parse(xhr.responseText)
                          if(Array.isArray(data)){
                              for (let i = 0; i < data.length; i++) {
                                 let li = document.createElement('li');
                                 let img = document.createElement('img');
                                 img.src = data[i]['memImgUrl'];
                                 li.appendChild(img);
                                 let p = document.createElement('p');
                                 p.innerText = data[i]['messageContent'];
                                 li.appendChild(p);
                                 document.getElementById('allMessage').appendChild(li);
                                 document.getElementById('_OrderImg').src = data[i]['orderImgUrl'];
                              }
                          }else{
                             document.getElementById('_OrderImg').src = data['orderImgUrl'];
                          }
                          
                     }else{ //其它
                         alert( xhr.status );
                     }
                   }
                 } 
                 //設定好所要連結的程式
                 var url = "php/components/_getMemMessage.php?orderNo=" + orderNo;
                 xhr.open("get", url, true);
                 //送出資料
                 xhr.send(null);
            })
         }
         
      </script>
</body>
</html>