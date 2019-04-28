
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/flyer.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- owl.carousel.js -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.carousel.min.css">
   
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.theme.default.min.css">
   
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/owl.carousel.min.js"></script>
    <!-- 動畫套件 -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js'></script>
    <!-- 卷軸動畫套件 -->
    <script src="js/minified/ScrollMagic.min.js"></script>
    <script src="js/minified/plugins/debug.addIndicators.min.js"></script>
    <script src="js/minified/plugins/animation.gsap.min.js"></script>
    <!-- jquer UI -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- vue -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js'></script>
    <!-- QR code.js -->
    <script src="js/jquery-qrcode-0.14.0.min.js"></script>
    <!-- 螢幕截圖 -->
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <!-- 數字跳動 js -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/countup.js/1.9.3/countUp.min.js'></script>
</head>

<body>
    <input type="checkbox" id=menu_control>

    <?php require_once("php/header.php");?>
    <?php require_once("php/loginLightBox.php");?>
    <?php require_once("php/components/_connectDHC.php"); ?>
    <!-- flyer內容 -->
    <div id="app">
        <article class="firstScreen">
            <div id="selectOpen">
                <div id="selectOpenBox">
                    <h3>開啟宣傳單輔助功能</h3>
                    <label>統計人數
                        <input type="checkbox" name="people" value="open" v-on:change="settingPeople">
                        <div id="selectPeoPle"></div>
                    </label>
                    
                    <label>開放參加
                        <input type="checkbox" name="open" value="open" v-on:change="settingJoin">
                        <div id="selectJoin"></div>
                    </label>
                    <button class="commonBtnSmall" v-on:click="clickSelectBox">確定</button>
                </div>
            </div>
            <div class="wrap">
                <h2 class="titleBgi">客製宣傳單</h2>
                <div class="stepsBar">
                    <div class="stepBox" v-on:click="clickStep" value="0">
                        <div class="circle step">壹</div>
                        <p>選擇背景圖片</p>
                    </div>
                    <div class="stepBox" v-on:click="clickStep" value="1">
                        <div class="circle">貳</div>
                        <p>選擇日期</p>
                    </div>
                    <div class="stepBox" v-on:click="clickStep" value="2">
                        <div class="circle">參</div>
                        <p>選擇活動地點</p>
                    </div>
                    <div class="stepBox" v-on:click="clickStep" value="3">
                        <div class="circle">肆</div>
                        <p>輸入文字</p>
                    </div>
                </div>
                <div class="doIt">
                    <div class="backBlock">
                        <div id="A4page" value="">
                            <img src="" alt="">
                            <h5></h5>
                            <div id="A4qrcode"><img src="" alt=""></div>
                        </div>
                        <div id="moveBtn" v-if="stepIndex!=0">
                            <span v-on:click="moveLeft">&larr;</span>
                            <span v-on:click="moveTop">&uarr;</span>
                            <span v-on:click="moveBottom">&darr;</span>
                            <span v-on:click="moveRight">&rarr;</span>
                        </div>
                        <div id="tool">
                            <i class="fas fa-search-plus" v-on:click="clickPlus"></i>
                            <i class="fas fa-search-minus" v-on:click="clickMinus"></i>
                            <i class="fas fa-redo-alt" v-on:click="clickRedo"></i>
                            <i class="fas fa-undo-alt" v-on:click="clickUndo"></i>
                            <i class="fas fa-palette" v-on:click="clickColorPicker"></i>
                            <i class="fas fa-trash-alt" v-on:click="clickTrash"></i>
                            <div id="colorPicker">
                                <div style="background: rgb(255, 105, 0);" v-on:click="clickColor"></div>
                                <div style="background: rgb(252, 185, 0);" v-on:click="clickColor"></div>
                                <div style="background: rgb(123, 220, 181);" v-on:click="clickColor"></div>
                                <div style="background: rgb(0, 208, 132);" v-on:click="clickColor"></div>
                                <div style="background: rgb(142, 209, 252)" v-on:click="clickColor"></div>
                                <div style="background: rgb(6, 147, 227)" v-on:click="clickColor"></div>
                                <div style="background: rgb(247, 141, 167)" v-on:click="clickColor"></div>
                                <input type="text" placeholder="rgb(255,255,255)" v-on:input="bindColor" v-model="setting[6]">
                            </div>
                        </div>
                    </div>

                    <div class="whiteBlock">
                        <div>
                            <h4 class="doNow" v-on:click="clickStep" value="0">圖片</h4>
                            <h4 v-on:click="clickStep" value="1">日期</h4>
                            <h4 v-on:click="clickStep" value="2">地點</h4>
                            <h4 v-on:click="clickStep" value="3">文字</h4>
                        </div>
                        <div id="toolBox">
                            <div id="toolinnerBox">
                                <label>
                                    <img src="images/icon/updateIcon.png" id="updateIcon">
                                    <form id="updateInput">
                                        <input type="file" name="updateInput" v-on:change="updateInput">
                                    </form>
                                </label>
                                <?php
                                    try {
                                        $sql = 'SELECT flyImg from flyimg where flyStatus="啟用";';
                                        $products = $pdo->query($sql);
                                        
                                     } catch (PDOException $e) {
                                        $errMsg = '';
                                        $errMsg .=  '錯誤原因' . $e->getMessage() . '<br>'; 
                                        $errMsg .=  '錯誤行號' . $e->getLine() . '<br>';
                                        echo $errMsg;
                                     }
                                     $products = $products->fetchAll(PDO::FETCH_ASSOC);
                                     foreach ($products as $key => $row) {                 
                                ?>
                                    <img src="<?php echo  $row['flyImg'];?>" alt="">
                                <?php } ?>
                            </div>
                            <div id="selectDay">
                                <label>
                                    <img src="images/icon/dateIcon.png">
                                    <input type="text" id="datepicker">
                                </label>
                                <p>活動日期</p>
                            </div>
                            <div id="textPlace">
                                <p><input type="text" placeholder="輸入活動地點" v-model="place"
                                        v-on:change="settingPlace"><br>QRcod即為活動地點的GoogleMap</p>
                                <div id="QRCODE"></div>
                            </div>
                            <div id="textWord">
                                <textarea name="" id="" cols="30" rows="3" maxlength="120"
                                    placeholder="輸入活動簡介 ( 限120字 )" v-on:change="settingContent"></textarea>
                            </div>
                        </div>
                        <div class="btnBar">
                            <button class="commonBtnSmall" id="back" v-on:click="clickNO">上一步</button>
                            <button class="commonBtnSmall" id="next" v-on:click="clickOK">下一步</button>
                        </div>
                    </div>

                    <div class="clothCurtain">
                        <div>
                            <p>如有舞台客製訂單者，可指定訂單，即可匯入宣傳單內，無訂單者，也可以免費體驗客製宣傳單估能。<br><br>＊公開體驗宣傳單將於發布達三天後移除＊</p>
                        </div>
                        <div>
                            <button class="commonBtnSmall" id="enterOrder">匯入訂單</button>
                            <button class="commonBtnSmall start">免費體驗</button>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>
    
    
    <article class="secScreen">
        <h2 class="titleBgi">最新宣傳</h2>
        <div class="wrap">
        <?php
            try {
                $sql = 'select * from flyer left outer join orders on flyer.orderno= orders.orderno join host on orders.hostNo = host.hostNo where flyeStatus != 0  order by flyer.orderno desc limit 3;';
                $products = $pdo->query($sql);
         
             } catch (PDOException $e) {
                $errMsg = '';
                $errMsg .=  '錯誤原因' . $e->getMessage() . '<br>'; 
                $errMsg .=  '錯誤行號' . $e->getLine() . '<br>';
                echo $errMsg;
             }
             $number =  $products->rowCount();
             $products = $products->fetchAll(PDO::FETCH_ASSOC);
        ?>
            <div class="bigCarcouselBox">
                <div class="card one">
                    <div class="ElongationBox">
                        <div class="blockBox">
                            <img src="<?php echo $products[$number-1]['flyerImgUrl'] ?>" alt="">
                            <img src="images/flyer/flyerPin.png" alt="">
                            <img src="images/flyer/flyerPin.png" alt="">
                        </div>
                        <div class="cardContent">
                            <table>
                                <tr>
                                    <th>主持人</th>
                                    <td><?php echo $products[$number-1]['hostName'] ?></td>
                                </tr>
                                <tr>
                                    <th>地點</th>
                                    <td><?php echo $products[$number-1]['flyeradd'] ?></td>
                                </tr>
                                <tr>
                                    <th>活動時間</th>
                                    <td><?php echo $products[$number-1]['flyeDate'] ?></td>
                                </tr>
                                <tr>
                                    <th>簡介</th>
                                    <td><?php echo $products[$number-1]['flyerText'] ?></td>
                                </tr>
                                <tr>
                                    <th>參加人數</th>
                                    <td>
                                        <span>
                                            <?php echo $products[$number-1]['peopleNumber']; ?>
                                        </span>人<button class="commonBtnSmall joinAct" order="<?php echo $products[$number-1]['orderNo'] ?>">參加</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card two">
                    <div class="ElongationBox">
                        <div class="blockBox">
                            <img src="<?php echo $products[$number-2]['flyerImgUrl'] ?>" alt="">
                            <img src="images/flyer/flyerPin.png" alt="">
                            <img src="images/flyer/flyerPin.png" alt="">
                        </div>
                        <div class="cardContent">
                        <table>
                                <tr>
                                    <th>主持人</th>
                                    <td><?php echo $products[$number-2]['hostName'] ?></td>
                                </tr>
                                <tr>
                                    <th>地點</th>
                                    <td><?php echo $products[$number-2]['flyeradd'] ?></td>
                                </tr>
                                <tr>
                                    <th>活動時間</th>
                                    <td><?php echo $products[$number-2]['flyeDate'] ?></td>
                                </tr>
                                <tr>
                                    <th>簡介</th>
                                    <td><?php echo $products[$number-2]['flyerText'] ?></td>
                                </tr>
                                <tr>
                                    <th>參加人數</th>
                                    <td>
                                        <span>
                                            <?php echo $products[$number-2]['peopleNumber']; ?> 
                                        </span>人<button class="commonBtnSmall joinAct" order="<?php echo $products[$number-2]['orderNo'] ?>">參加</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card three">
                    <div class="ElongationBox">
                        <div class="blockBox">
                            <img src="<?php echo $products[$number-3]['flyerImgUrl'] ?>" alt="">
                            <img src="images/flyer/flyerPin.png" alt="">
                            <img src="images/flyer/flyerPin.png" alt="">
                        </div>
                        <div class="cardContent">
                        <table>
                                <tr>
                                    <th>主持人</th>
                                    <td><?php echo $products[$number-3]['hostName'] ?></td>
                                </tr>
                                <tr>
                                    <th>地點</th>
                                    <td><?php echo $products[$number-3]['flyeradd'] ?></td>
                                </tr>
                                <tr>
                                    <th>活動時間</th>
                                    <td><?php echo $products[$number-3]['flyeDate'] ?></td>
                                </tr>
                                <tr>
                                    <th>簡介</th>
                                    <td><?php echo $products[$number-3]['flyerText'] ?></td>
                                </tr>
                                <tr>
                                    <th>參加人數</th>
                                    <td>
                                        <span>
                                            <?php echo $products[$number-3]['peopleNumber']; ?>
                                        </span>人<button class="commonBtnSmall joinAct" order="<?php echo $products[$number-3]['orderNo'] ?>">參加</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel owl-theme">
            <?php
                
                $errMsg='';
                try {
                    $sql = 'SELECT * FROM flyer where flyeStatus != 0;';
                    $products = $pdo->query($sql);
                    foreach( $products as $i=>$prodRow){
            ?>
                    <div class="item"><img order="<?php echo $prodRow['orderNo']?>" src="<?php echo $prodRow['flyerImgUrl'] ?>" class="flyer"></div>
            <?php   }
                 } catch (PDOException $e) {
                    $errMsg .=  '錯誤原因' . $e->getMessage() . '<br>'; 
                    $errMsg .=  '錯誤行號' . $e->getLine() . '<br>';
                }
            ?>
            </div>
    </article>
    
    <article class="thrScreen">
        
        <h2 class="titleBgi">小試身手</h2>
        <div class="wrap">
            
            <ul id="showflyer2">
                <?php
                    $json = file_get_contents("php/components/24hours.json");
                    $jsonData = json_decode ($json, true);
                    $number = count($jsonData);
                    $i=0;
                    while($i<$number){

                ?>
                <li><img src="<?php echo $jsonData[$i]["src"] ?>"></li>
                <?php
                $i++;
                }
                ?>	 
            </ul>
        </div>
    </article>

    
    <!-- 宣傳單燈箱 -->
    <div class="blackBox">
        <div class="envelopeLightBox">
            <i class="fas fa-times fa-2x" id="hiddenEnvelopeLightBox"></i>
            <img src="images/icon/iconMore.png" alt="查看更多" id="envelopeIcon">
            <div id="QrcodeIcon">
                <img src="images/icon/QRcodeIcon.png" alt="查看更多">
                <div>
                    <p onclick="flyerReport()" order="" id="flyerReport">檢舉</p>
                </div>
            </div>
            <div class="flyerArea">
                <img src="images/flyer/member_3.jpg" alt="宣傳單">
                <div class="envelopeHeader">
                    <h4></h4>
                    <span></span>
                </div>
            </div>
            <div class="envelopeContent">
                <div class="envelopeTitle">
                    <div class="titleImg"><img src="" alt=""></div>
                    <div class="titleName">
                        <p></p>
                        <span>參加人數 <mark id='MyNumber'></mark> 人</span>
                    </div>
                </div>
                <div class="envelopeDetail">
                    <p>主持人</p>
                    <p></p>
                    <p>地點</p>
                    <p></p>
                    <p>活動時間</p>
                    <p></p>
                    <span>
                        簡介<br>
                        <span>從小朋友喜歡的兒童汽車、氣墊遊戲及特色胖卡市集，舞台活動更邀請到波力、MOMO哥哥姐姐們及BabyBoss職業體驗城等知名卡童玩偶陪伴大家一起玩樂，更首創300公分高的馬卡龍色系大舞台地景唷。</span>
                    </span>
                </div>
                <div class="envelopeBar">
                    <button class="commonBtnSmall joinAct" order="">我要參加</button>
                </div>
            </div>
        </div>
    </div>


    <script src="js/_login.js"></script>
    <script src="js/_font_loginLightBox.js"></script>
    <script src="js/_flyer_vue.js"></script>
    <script src="js/_flyer_tweenMax.js"></script>
    <script>
        //點擊參加活動
        function joinAct(){
            
            let joinAct = document.querySelectorAll('.joinAct');
            
            for (let i = 0; i < joinAct.length; i++) {
                joinAct[i].addEventListener('click',function(e){
                    let orderNo = e.target.getAttribute('order');

                    //依統計人數狀態拒絕執行或執行
                    
                    var xhr = new XMLHttpRequest();
                    //註冊callback function
                    xhr.onreadystatechange = function(){
                        if( xhr.readyState == XMLHttpRequest.DONE ){ //server端執行完畢
                          if( xhr.status == 200){ //server端可以正確的執行
                               alert(xhr.responseText);
                          }else{ //其它
                              alert( xhr.status );
                          }
                        }
                    } 
                    //設定好所要連結的程式
                    var url = "php/components/_joinAct.php?orderNo=" + orderNo ;
                    xhr.open("get", url, true);
                    //送出資料
                    xhr.send(null);
                    
                })
            }
        }
        joinAct();
        //跳動數字function
        function JumpNumber(number){
            var countOptions = {
            useEasing: true,
            separator: ''
        }

            var count = new CountUp('MyNumber', 0, number, 0, 5, countOptions)

            // start the counting and give it a callback when done
            count.start()
        }
        //匯入訂單
        document.getElementById('enterOrder').addEventListener('click',function(){
            if(LoginState=="notFound"){
                 // 顯示登入燈箱
                let loginBox = document.querySelector('.loginBox');
                let style = window.getComputedStyle(loginBox, null).getPropertyValue('display');
                if (style == "block") {
                    loginBox.style.setProperty('display', "none");
                } else {
                    loginBox.style.setProperty('display', "block");
                }
            }else if(LoginState[0]['orderName']==null){
                alert('請先有花車才能使用此功能喔');
            }
            else{
                let str = '';
                 for (let i = 0; i < LoginState.length; i++) {
                     if(i==LoginState.length-1){
                         str +=LoginState[i]['orderName'];
                     }else{
                         str +=LoginState[i]['orderName']+',';
                     }

                 }
                 let enterData = prompt(`請輸入你要匯入訂單的名稱  ${str}`,'');
                 if(str.match(enterData)==null||str.match(enterData)==""){
                     alert('沒有這個訂單請重新輸入');
                 }
                 else{
                    OrderNo = enterData;
                     console.log(OrderNo);
                     alert('已匯入您的訂單');
                     let clothCurtain = document.querySelector('.clothCurtain');
                     clothCurtain.style.setProperty('animation', `blurFadeInOut 2s ease-in backwards`);
                     setTimeout(function () {
                         clothCurtain.style.display = "none"
                     }, 2000);
                 }
            }
        })
        //點擊檢舉輸入原因 傳到後端
        function flyerReport(){
            if(LoginState!="notFound"){
                let MymemNo = LoginState[0][0];
                let str = prompt("請輸入檢舉原因","");
                let orderNo = document.getElementById('flyerReport').getAttribute('order');
                if(str==""){
                    alert('您沒有輸入原因，請重新輸入');
                }else{
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function(){
                        if( xhr.readyState == XMLHttpRequest.DONE ){ //server端執行完畢
                            if( xhr.status == 200){ //server端可以正確的執行
                               alert(xhr.responseText);
                            }else{ //其它
                              alert( xhr.status );
                            }
                        }
                    } 
                    //設定好所要連結的程式
                    var url = "php/components/_sendFinform.php?orderNo=" + orderNo +"&str=" + str + "&MymemNo=" + MymemNo;
                    xhr.open("get", url, true);
                    //送出資料
                    xhr.send(null);
                }
                
            }else{
                // 顯示登入燈箱
                alert('親愛的訪客您好 , 必須先登入才能使用檢舉功能');
                let loginBox = document.querySelector('.loginBox');
                let style = window.getComputedStyle(loginBox, null).getPropertyValue('display');
                if (style == "block") {
                    loginBox.style.setProperty('display', "none");
                } else {
                    loginBox.style.setProperty('display', "block");
                }
            }
        }
        //點擊免費體驗
        document.querySelector('.start').addEventListener('click', function () {
            let clothCurtain = document.querySelector('.clothCurtain');
            clothCurtain.style.setProperty('animation', `blurFadeInOut 2s ease-in backwards`);
            setTimeout(function () {
                clothCurtain.style.display = "none"
            }, 2000);
        })

        // 宣傳單燈箱
        function envelopeLightBox() {

            //點擊 close BOX 
            document.getElementById('hiddenEnvelopeLightBox').addEventListener('click', function () {
                document.querySelector('.blackBox').style.display = 'none';
            });
            //點擊QRcodeICON
            document.getElementById('QrcodeIcon').addEventListener('click', function (e) {
                let style = window.getComputedStyle(this.getElementsByTagName('div')[0])
                    .getPropertyValue('display');
                if (style != "none") {
                    this.getElementsByTagName('div')[0].style.setProperty('display', 'none');
                    this.getElementsByTagName('div')[0].style.setProperty('z-index', '-1');
                } else {
                    this.getElementsByTagName('div')[0].style.setProperty('display',
                        'inline-block');
                    this.getElementsByTagName('div')[0].style.setProperty('z-index',30);

                }
                e.stopPropagation();
            })
            //點擊更多頁面ICON
            document.getElementById('envelopeIcon').addEventListener('click', function (e) {
                
                
                let envelopeContent = document.querySelector('.envelopeContent')
                let style = window.getComputedStyle(envelopeContent).getPropertyValue('left')
                if (style !== '0px') {
                    e.target.setAttribute('src', 'images/icon/iconBack.png');
                    document.querySelector('.envelopeContent').style.setProperty('opacity',
                        '1');

                    document.querySelector('.envelopeContent').style.setProperty('left', '0');
                    document.querySelector('.envelopeContent').style.setProperty('transition',
                        '1s');
                    let number=document.querySelector('.titleName mark').innerText;
                    JumpNumber(parseInt(number));
                } else {
                    e.target.setAttribute('src', 'images/icon/iconMore.png');
                    document.querySelector('.envelopeContent').style.setProperty('opacity',
                        '0');
                    document.querySelector('.envelopeContent').style.setProperty('left',
                        '-150%');
                    document.querySelector('.envelopeContent').style.setProperty('transition',
                        '1s');
                }
                return false;
            })

            document.querySelector('.flyerArea').addEventListener('mouseover', function () {
                document.querySelector('.envelopeHeader').style.setProperty('bottom', '-10%');
                document.querySelector('.envelopeHeader').style.setProperty('transition', '1s');
            })
            let flyers = document.getElementsByClassName('item');
            for (let i = 0; i < flyers.length; i++) {
                flyers[i].addEventListener('click', function (e) {
                    
                    let orderNo = e.target.getAttribute('order');

                      var xhr = new XMLHttpRequest();
                      xhr.onreadystatechange = function(){
                        if( xhr.readyState == XMLHttpRequest.DONE ){ 
                          if( xhr.status == 200){
                              let data = JSON.parse(xhr.responseText);
                              console.log(data);
                               document.querySelector('.flyerArea img').src = data[16];
                               document.querySelector('#QrcodeIcon div p').setAttribute('order',data['orderNo']);
                               document.querySelector('.envelopeBar button').setAttribute('order',data['orderNo']);
                               document.querySelector('.envelopeHeader h4').innerText= data['orderName'];
                               document.querySelector('.envelopeHeader span').innerText= data['flyeDate'];
                               document.querySelector('.titleImg img').src= data[29];
                               document.querySelector('.titleName p').innerText= data['memName'];
                               document.querySelector('.titleName mark').innerText= data['peopleNumber'];
                               document.querySelector('.envelopeDetail p:nth-of-type(2)').innerText= data['hostName'];
                               document.querySelector('.envelopeDetail p:nth-of-type(4)').innerText= data['flyeradd'];
                               document.querySelector('.envelopeDetail p:nth-of-type(6)').innerText= data['flyeDate'];
                               document.querySelector('.envelopeDetail span').innerText= data['flyerText'];
                          }else{ //其它
                              alert( xhr.status );
                          }
                        }
                      } 
                      //設定好所要連結的程式
                      var url = "php/components/_getFlyerDetail.php?orderNo=" + orderNo;
                      xhr.open("get", url, true);
                      //送出資料
                      xhr.send(null);
                    document.querySelector('.blackBox').style.setProperty('display', 'block');
                })
            }
        }
        envelopeLightBox();

        // 大輪播圖卡更換
        let cards = document.querySelectorAll('.card');

        for (let i = 0; i < cards.length; i++) {
            cards[i].addEventListener('click', function () {
                let screenWidth = document.body.clientWidth;
                let listenMove = this.style.getPropertyValue('transform');
                if (screenWidth >= 768) {
                    if (listenMove !== 'translateX(-50%)') {
                        this.style.setProperty('transform', 'translateX(-50%)');
                        this.style.setProperty('z-index', '5');
                        this.querySelector('.cardContent').style.setProperty('transform', 'translateX(100%)');
                    } else {
                        this.style.setProperty('z-index', '-1');
                        this.style.setProperty('transform', 'translateX(0%)');
                        this.querySelector('.cardContent').style.setProperty('transform', 'translateX(0%)');
                    }
                } else {
                    if (listenMove !== 'translateX(-100%)') {
                        this.style.setProperty('transform', 'translateX(-100%)');
                        this.style.setProperty('z-index', '5');
                        this.querySelector('.cardContent').style.setProperty('transform', 'translateX(100%)');
                    } else {
                        this.style.setProperty('transform', 'translateX(0%)');
                        this.style.setProperty('z-index', '-1');
                        this.querySelector('.cardContent').style.setProperty('transform', 'translateX(0%)');
                    }
                }

                if (i == 2) {
                    document.querySelector('.one').style.setProperty('z-index', '5');
                }
            })
        }
        //   大輪播捲動
        window.addEventListener('scroll', function (e) {
            let nowScrollHeight = window.pageYOffset;
            let secScreen = document.querySelector('.secScreen').offsetTop;
            let screenWidth = document.body.clientWidth;

            //滑到第二個螢幕的位置出現相框
            if (nowScrollHeight >= secScreen) {
                document.querySelector('.one').style.setProperty('z-index', '5');
                document.querySelector('.bigCarcouselBox').style.setProperty('opacity', '1');
                document.querySelector('.bigCarcouselBox').style.setProperty('bottom', '150px')
                //判斷螢幕大小對 相框加大
                if (screenWidth >= 768) {
                    document.querySelector('.bigCarcouselBox').style.setProperty('transform', 'scale(1.2)');
                } else {
                    document.querySelector('.bigCarcouselBox').style.setProperty('transform', 'scale(1)');
                }
                document.querySelector('.bigCarcouselBox').style.setProperty('position', 'fixed')
                document.querySelectorAll('.card')[0].querySelector('.cardContent').style.setProperty(
                    'transform', 'translateX(0%)')
            } else {
                document.querySelector('.bigCarcouselBox').style.setProperty('bottom', '0px')
                document.querySelector('.bigCarcouselBox').style.setProperty('opacity', '0')
                document.querySelector('.bigCarcouselBox').style.setProperty('position', 'absolute')
            }

            //如果高度超過第二個螢幕的設定高則向下滑動消失
            if (nowScrollHeight > secScreen + 500) {
                document.querySelector('.one').style.setProperty('transform', 'translateY(300%)');
                document.querySelector('.two').style.setProperty('z-index', '5');
            } else {
                document.querySelector('.one').style.setProperty('z-index', '5');
                document.querySelector('.two').style.setProperty('z-index', '4');
                document.querySelector('.one').style.setProperty('transform', 'translateY(0%)');
            }
            if (nowScrollHeight > secScreen + 1000) {
                document.querySelector('.two').style.setProperty('transform', 'translateY(300%)');
            } else {
                document.querySelector('.two').style.setProperty('transform', 'translateY(0%)')
            }
            if (nowScrollHeight > secScreen + 1500) {
                document.querySelector('.three').style.setProperty('transform', 'translateY(300%)')
            } else {
                document.querySelector('.three').style.setProperty('transform', 'translateY(0%)')
            }
            if (nowScrollHeight > secScreen + 1700) {
                document.querySelectorAll('.titleBgi')[1].style.setProperty('position', 'absolute');
            }

        })

        //觸碰時實現擴張效果
        document.querySelector('.one').addEventListener('mouseover', function () {
            document.querySelector('.three').style.setProperty('transform', 'rotateZ(-10deg)')
            document.querySelector('.two').style.setProperty('transform', 'rotateZ(10deg)')
        })
        document.querySelector('.two').addEventListener('mouseover', function () {
            document.querySelector('.three').style.setProperty('transform', 'rotateZ(-10deg)')
        })
    </script>
    <!-- owl輪播 JS -->
    <script src="js/carcousel.js"></script>
    <!-- jquery UI datepicker -->
    <script>
        $(function () {
            $("#datepicker").datepicker();
        });
        $('#selectDay input').on('change', function () {
            $('#selectDay p').html('活動日期' + ' : <span>' + this.value + '</span>');
            let arr = this.value.split("/");
            let date = arr[1];
            let month = arr[0];
            let year = arr[2];
            let newarr= [arr[2],arr[0],arr[1]];
            console.log(newarr);
            $('#A4page h5').text(newarr.join("-"));
        })
    </script>
    <!-- 拖拉功能 -->
    <script>
        //客製使用的共同變數
        let AllToolImg = document.querySelectorAll('#toolinnerBox img');
        let A4Box = document.getElementById('A4page');

        for (let i = 1; i < AllToolImg.length; i++) {
            AllToolImg[i].addEventListener('click', function (e) {
                let aa = e.target.src;
                A4Box.getElementsByTagName('img')[0].src = aa;
            })
            //對拖拉圖片設定-------------------------------
            AllToolImg[i].addEventListener('dragstart', function (e) {
                let aa = e.target.src;
                console.log(aa);
                e.dataTransfer.setData('image/jpeg', aa)
            })
            //對拖拉日期文字做設定-------------------------
            document.querySelector('#A4page h5').addEventListener('mousedown', function (e) {
                console.log(e.clientX,e.clientY);
            });

            //對置入的盒子做設定---------------------------
            A4Box.addEventListener('dragover', function (e) {
                e.preventDefault();
            });

            A4Box.addEventListener('drop', function (e) {
                let thisImg = e.dataTransfer.getData('image/jpeg');
                let thish5 = e.dataTransfer.getData('text');
                if(thisImg!=""){
                    this.getElementsByTagName('img')[0].src = thisImg;
                }
            })
        }

        //QrCode生成
        document.querySelector('#textPlace input').addEventListener('input', function () {
            var theURL = encodeURIComponent(this.value);
            $('#QRCODE').text('');
            $('#QRCODE').qrcode({ //產生QRCode
                text: `https://www.google.com.tw/maps/search/${theURL}`,
                mode: 0,
                // mode:1,
                // label: 'https://www.silvia.com',
                // fontname: 'tahoma',
                // fontcolor: 'tomato',
                size: 60,
                fill: '#456789',
                background: '#fff',
                fill: '#000',
            });
            let img = document.querySelector('#QRCODE canvas').toDataURL();
            console.log(img);
            document.querySelector('#A4qrcode img').src = img;
        })
    </script>
</body>

</html>