<?php
try{
    require_once("php/components/_connectDHC.php");
    $sql = "SELECT * FROM orders  ORDER BY orderVote DESC ";
    $beautyContest = $pdo->query($sql);
}catch(PDOException $e){
    echo $e->getMessage();
}
?>
<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/beautyPageant.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
    <input type="checkbox" id=menu_control>
    <?php require_once("php/header.php");?>
    <?php require_once("php/loginLightBox.php");?>
<<<<<<< HEAD
<<<<<<< HEAD
=======
    <?php require_once("php/uploadbeauty.php");?>
=======
    <?php //require_once("php/uploadbeauty.php");// ?>
>>>>>>> 8df98826346e787d3a2029d1853e139be8aeb54e
    <script src="js/_login.js"></script>
    <script src="js/_font_loginLightBox.js"></script>
>>>>>>> ee1f6061ae65be512238b8b9aa6e483557bd014f
    <!-- beauty pageant 第一屏幕 -->
    <div class="beautyPageantWrap">
    <div id="musicContent">
            <canvas id="canvasMusic"></canvas>
            <audio id="audioMusic" volume="0.1" controls autoplay loop style="display : none" src="audios\backloop.mp3"></audio>
            <script>
            document.getElementById('audioMusic').volume=0.1;
            </script>
        </div>
        <div class="beautyRankingContainer">
            <div class="beautyRankingHeader">
                <div class="discoBallContainer">
                    <div id="discoBallLight"></div>
                    <div id="discoBall">
                        <div id="discoBallMiddle"></div>
                    </div>
                    <div class="light"></div>
                </div>
                <div class="beautyRankingSlogan">最土最有力</div>
                <button id="beautyRankingimgsBtn" class="beautyRankingBtn">季排名</button>
                <button id="beautyRankingimgsMonthBtn" class="beautyRankingBtn">總排名</button>
                <div class="beautyRankingSlogan">最俗最在地</div>
            </div>
            <div class="beautyRanking">
                <div id="beautyRankingimgs">
                <?php while($beautyContestRow = $beautyContest->fetchAll()){ ?>
                    <div id="beautyRankingbg1" class="beautyRankingbg">
                        <img src="<?php echo $beautyContestRow[5]['orderImgUrl']; ?>" alt="選美車車">
                        <h3><?php echo $beautyContestRow[5]['orderName'];?></h3>
                        <div class="beautyRankingSocialBtns">
                            <i><img class="likeHeart" src="images/like.png" alt="喜歡收藏"></i><span style="display:none"><?php echo $beautyContestRow[5]['orderNo'] ?></span>
                            <p class="likeCount"><?php echo $beautyContestRow[5]['orderVote'];?>個喜歡</p>
                            <i class="far fa-comment showOrderLightBox" alt="留言" orderNo="<?php echo $beautyContestRow[5]['orderNo'] ?>"></i>
                            <i class="far fa-bookmark" alt="分享"></i>
                        </div>
                    </div>
                    <div id="beautyRankingbg2" class="beautyRankingbg">
                       <img src="<?php echo $beautyContestRow[3]['orderImgUrl']; ?>"  alt=""onclick="window.location.href='beautyDiscuss.html'">
                        <h3><?php echo $beautyContestRow[3]['orderName']; ?></h3>
                        <div class="beautyRankingSocialBtns">
                            <i><img class="likeHeart" src="images/like.png" alt="喜歡收藏"></i><span style="display:none"><?php echo $beautyContestRow[3]['orderNo'] ?></span>
                            <p class="likeCount"><?php echo $beautyContestRow[3]['orderVote'];?>個喜歡</p>
                            <i class="far fa-comment showOrderLightBox" alt="留言" orderNo="<?php echo $beautyContestRow[3]['orderNo'] ?>" ></i>
                            <i class="far fa-bookmark" alt="分享"></i>
                        </div>
                    </div>
                    <div id="beautyRankingbg3" class="beautyRankingbg">
                        <img src="<?php echo $beautyContestRow[4]['orderImgUrl']; ?>" alt="">
                        <h3><?php echo $beautyContestRow[4]['orderName']; ?></h3>
                        <div class="beautyRankingSocialBtns">
                            <i><img class="likeHeart" src="images/like.png" alt="喜歡收藏"></i><span style="display:none"><?php echo $beautyContestRow[4]['orderNo'] ?></span>
                            <p class="likeCount"><?php echo $beautyContestRow[4]['orderVote'];?>個喜歡</p>
                            <i class="far fa-comment showOrderLightBox" alt="留言" orderNo="<?php echo $beautyContestRow[4]['orderNo'] ?>"></i>
                            <i class="far fa-bookmark" alt="分享"></i>
                        </div>
                    </div>
                </div>
                <div id="beautyRankingimgsMonth">
                    <div id="beautyRankingbg4" class="beautyRankingbg">
                        <img src="<?php echo $beautyContestRow[1]['orderImgUrl']; ?>" alt="">
                        <h3><?php echo $beautyContestRow[1]['orderName']; ?></h3>
                        <div class="beautyRankingSocialBtns">
                            <i><img class="likeHeart" src="images/like.png" alt="喜歡收藏"></i><span style="display:none"><?php echo $beautyContestRow[1]['orderNo'] ?></span>
                            <p class="likeCount"><?php echo $beautyContestRow[1]['orderVote'];?>個喜歡</p>
                            <i class="far fa-comment showOrderLightBox" alt="留言" orderNo="<?php echo $beautyContestRow[1]['orderNo'] ?>"></i>
                            <i class="far fa-bookmark" alt="分享"></i>
                        </div>
                    </div>
                    <div id="beautyRankingbg5" class="beautyRankingbg">
                        <img src="<?php echo $beautyContestRow[0]['orderImgUrl']; ?>" alt="">
                        <h3><?php echo $beautyContestRow[0]['orderName']; ?></h3>
                        <div class="beautyRankingSocialBtns">
                            <i><img class="likeHeart" src="images/like.png" alt="喜歡收藏"></i><span style="display:none"><?php echo $beautyContestRow[0]['orderNo'] ?></span>
                            <p class="likeCount"><?php echo $beautyContestRow[0]['orderVote'];?>個喜歡</p>
                            <i class="far fa-comment showOrderLightBox" alt="留言" orderNo="<?php echo $beautyContestRow[0]['orderNo'] ?>"></i>
                            <i class="far fa-bookmark" alt="分享"></i>
                        </div>
                    </div>
                    <div id="beautyRankingbg6" class="beautyRankingbg">
                        <img src="<?php echo $beautyContestRow[2]['orderImgUrl']; ?>" alt="">
                        <h3><?php echo $beautyContestRow[2]['orderName']; ?></h3>
                        <div class="beautyRankingSocialBtns">
                            <i><img class="likeHeart" src="images/like.png" alt="喜歡收藏"></i><span style="display:none"><?php echo $beautyContestRow[2]['orderNo'] ?></span>
                            <p class="likeCount"><?php echo $beautyContestRow[2]['orderVote'];?>個喜歡</p>
                            <i class="far fa-comment showOrderLightBox" alt="留言" orderNo="<?php echo $beautyContestRow[2]['orderNo'] ?>"></i>
                            <i class="far fa-bookmark" alt="分享"></i>
                        </div>
                    </div>
                </div>
                <?php 
                }
                ?>
                <div class="paginationPanel">
                    <ul class="pagination">
                        <li id="dot0" class="pageDot"></li>
                        <li id="dot1" class="pageDot"></li>
                        <li id="dot2" class="pageDot"></li>
                    </ul>
                </div>
            </div>
        </div> 
    </div>
    <!-- 第二屏幕 選美大舞台-->
    <div class="beautyDiscWrap">
        
        <div class="beautyDiscContainer">
            <h2 class="titleBgi">花車大選美</h2>
            <div class="beautyDiscFilter">
                <!-- 選項篩選 全部時間 排序 上傳時間  還有一個上傳按鈕-->
                <form action="" method="" action="">
                    <div class="beautyDiscFilterBox">
                    排序:<select name="listList" id="listList">
                            <option value="0" disabled selected hidden>顯示順序</option>
                            <option value="1">上傳時間</option>
                            <option value="2">喜歡數</option>
                        </select>
                    </div>
                </form>
                <!-- <i class="fas fa-plus-circle" alt="參加選美"></i> 功能開發中 -->
            </div>
            <div class="beautyDiscStageContainerWrap">
             <?php require_once("php/beautyDiscIg.php");?>
            </div>
        </div>
    </div>

    <?php require_once("php/footer.php");?>
        <!-- <script>
        var hearts = document.getElementsByClassName("likeHeart");
        for(let i=0; i< hearts.length; i++){
            heartss[i].onclick = function(e){
                // let orderNo = e.target.parentNode.nextElementSibling.innerText;
                let orderNo = e.target.nextElementSibling.innerText;
                let amount;
                console.log(orderNo);

                if(e.target.src.indexOf("images/like.png") != -1 ){
                    e.target.src = "images/likeAlready.png";
                    amount = 1;
                }else{
                    e.target.src = "images/like.png";
                    amount = -1;
                }
                let url = "updateVotes.php?orderNo=" + orderNo + "&amount=" + amount;
                var xhr3 = new XMLHttpRequest();
                xhr3.onload = function(){
                    //console.log(xhr2.responseText);
                    var str = e.target.parentNode.nextElementSibling.innerHTML.replace("個喜歡","");
                    console.log("------",parseInt(str)+ amount +"個喜歡" );
                    e.target.parentNode.nextElementSibling.innerHTML = parseInt(str)+ amount +"個喜歡";
                }
                xhr3.open("get",url,true);
                xhr3.send(null);
            }
        }
    </script> -->
    <div id="memOrderLightBox">
         <div id="LightBox">
            <i class="fas fa-times fa-2x" id="hiddenBox"></i>
            <img src="images/stageImages/2.png" alt="">
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
                          if(xhr.responseText!="沒有留言"){
                            document.getElementById('allMessage').innerText = '';
                              let data = JSON.parse(xhr.responseText);
                              for (let i = 0; i < data.length; i++) {
                                 let li = document.createElement('li');
                                 let img = document.createElement('img');
                                 img.src = data[i]['memImgUrl'];
                                 li.appendChild(img);
                                 let p = document.createElement('p');
                                 p.innerText = data[i]['messageContent'];
                                 li.appendChild(p);
                                 document.getElementById('allMessage').appendChild(li);
                              }
                          }else{
                             console.log('沒有留言');
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
    <script src="js/beautyRankingScale.js"></script>
    <script src="js/beautyPagentSwipe.js"></script>
    <script>
        
       
    </script>
    <script src="js/musicBar.js"></script>
    <!-- <script src="js/dotReport.js"></script> -->
    <script src="js/navmenu.js"></script>
    <script src="js/discoBall.js"></script>
<<<<<<< HEAD
=======
    
>>>>>>> ee1f6061ae65be512238b8b9aa6e483557bd014f
</body>
</html>