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
    </link>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.theme.default.min.css">
    </link>
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
</head>

<body>
    <input type="checkbox" id=menu_control>
    
    <?php require_once("php/header.php");?>
    <?php require_once("php/loginLightBox.php");?>
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
                                <img src="images/customized/cust_stage_innerPattern/cust_stage_pattern_02.jpg" alt="">
                                <img src="images/customized/cust_stage_innerPattern/cust_stage_pattern_03.jpg" alt="">
                                <img src="images/customized/cust_stage_innerPattern/cust_stage_pattern_04.jpg" alt="">
                                <img src="images/customized/cust_stage_innerPattern/cust_stage_pattern_05.jpg" alt="">
                                <img src="images/customized/cust_stage_innerPattern/cust_stage_pattern_06.jpg" alt="">
                                <img src="images/customized/cust_stage_innerPattern/cust_stage_pattern_07.jpg" alt="">
                                <img src="images/customized/cust_stage_innerPattern/cust_stage_pattern_08.jpg" alt="">
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
                                    placeholder="輸入想在宣傳單傳達的內容 ( 限120字 )" v-on:change="settingContent"></textarea>
                            </div>
                        </div>
                        <div class="btnBar">
                            <button class="commonBtnSmall" id="back" v-on:click="clickNO">上一步</button>
                            <button class="commonBtnSmall" id="next" v-on:click="clickOK">下一步</button>
                        </div>
                    </div>

                    <div class="clothCurtain">
                        <div>
                            <p>如有舞台客製訂單者，可指定訂單，即可匯入宣傳單內，無訂單者，也可以免費體驗客製宣傳單估能。<br><br>＊公開體驗宣傳單將於發布達24小時移除＊</p>
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
        <h2 class="titleBgi">客製宣傳單</h2>
        <div class="wrap">
            <div class="bigCarcouselBox">
                <div class="card one">
                    <div class="ElongationBox">
                        <div class="blockBox">
                            <img src="images/flyer/2.jpg" alt="">
                            <img src="images/flyer/flyerPin.png" alt="">
                            <img src="images/flyer/flyerPin.png" alt="">
                        </div>
                        <div class="cardContent">
                        </div>
                    </div>
                </div>

                <div class="card two">
                    <div class="ElongationBox">
                        <div class="blockBox">
                            <img src="images/flyer/3.jpg" alt="">
                            <img src="images/flyer/flyerPin.png" alt="">
                            <img src="images/flyer/flyerPin.png" alt="">
                        </div>
                        <div class="cardContent"></div>
                    </div>
                </div>

                <div class="card three">
                    <div class="ElongationBox">
                        <div class="blockBox">
                            <img src="images/flyer/1.jpg" alt="">
                            <img src="images/flyer/flyerPin.png" alt="">
                            <img src="images/flyer/flyerPin.png" alt="">
                        </div>
                        <div class="cardContent"></div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel owl-theme">
                <div class="item"><img src="images/flyer/1.jpg" class="flyer"></div>
                <div class="item"><img src="images/flyer/2.jpg" class="flyer"></div>
                <div class="item"><img src="images/flyer/3.jpg" class="flyer"></div>
                <div class="item"><img src="images/flyer/4.jpg" class="flyer"></div>
                <div class="item"><img src="images/flyer/1.jpg" class="flyer"></div>
                <div class="item"><img src="images/flyer/2.jpg" class="flyer"></div>
                <div class="item"><img src="images/flyer/3.jpg" class="flyer"></div>
                <div class="item"><img src="images/flyer/4.jpg" class="flyer"></div>
                <div class="item"><img src="images/flyer/5.jpg" class="flyer"></div>
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
                    <p onclick="flyerReport()">檢舉</p>
                </div>
            </div>
            <div class="flyerArea">
                <img src="images/flyer/1.jpg" alt="宣傳單">
                <div class="envelopeHeader">
                    <h4>闖闖看淘氣大舞台</h4>
                    <span>活動時間 2019-08-28</span>
                </div>
            </div>
            <div class="envelopeContent">
                <div class="envelopeTitle">
                    <div class="titleImg"><img src="images/member2.jpg" alt=""></div>
                    <div class="titleName">
                        <p>Christina</p><span>參加人數 <mark>24</mark> 人</span>
                    </div>
                </div>
                <div class="envelopeDetail">
                    <p>主持人</p>
                    <p>潘佳麗</p>
                    <p>地點</p>
                    <p>桃園市桃園區八德路中壢巷54號</p>
                    <p>活動時間</p>
                    <p>2019-08-29</p>
                    <span>
                        簡介<br>
                        從小朋友喜歡的兒童汽車、氣墊遊戲及特色胖卡市集，舞台活動更邀請到波力、MOMO哥哥姐姐們及BabyBoss職業體驗城等知名卡童玩偶陪伴大家一起玩樂，更首創300公分高的馬卡龍色系大舞台地景唷。
                    </span>
                </div>
                <div class="envelopeBar">
                    <button class="commonBtnSmall">我要參加</button>
                </div>
            </div>
        </div>
    </div>


    <script src="js/_login.js"></script>
    <script src="js/_font_loginLightBox.js"></script>
    <script src="js/_flyer_vue.js"></script>
    <script src="js/_flyer_tweenMax.js"></script>
    <script>
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
            }else{
                let str = '';
                 for (let i = 0; i < LoginState.length; i++) {
                     if(i==LoginState.length-1){
                         str +=LoginState[i][16];
                     }else{
                         str +=LoginState[i][16]+',';
                     }

                 }
                 let enterData = prompt(`請輸入你要匯入訂單的 "完整名稱"  ${str}`,'');
                 if(str.match(enterData)==null||str.match(enterData)==""){
                     alert('沒有這個訂單請重新輸入');
                 }else{
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
            let str = prompt("請輸入檢舉原因","");
            console.log(str);

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
                //document.querySelector('.blackBox').style.setProperty('display', 'none');
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
                    this.getElementsByTagName('div')[0].style.setProperty('z-index', 100);

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
                } else {
                    e.target.setAttribute('src', 'images/icon/iconMore.png');
                    document.querySelector('.envelopeContent').style.setProperty('opacity',
                        '0');
                    document.querySelector('.envelopeContent').style.setProperty('left',
                        '-150%');
                    document.querySelector('.envelopeContent').style.setProperty('transition',
                        '1s');
                }
            })

            document.querySelector('.flyerArea').addEventListener('mouseover', function () {
                document.querySelector('.envelopeHeader').style.setProperty('bottom', '-10%');
                document.querySelector('.envelopeHeader').style.setProperty('transition', '1s');
            })
            let flyers = document.getElementsByClassName('item');
            for (let i = 0; i < flyers.length; i++) {
                flyers[i].addEventListener('click', function (e) {
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

            //對拖拉圖片設定-------------------------------
            AllToolImg[i].addEventListener('dragstart', function (e) {
                let aa = e.target.src;
                console.log(aa);
                e.dataTransfer.setData('image/jpeg', aa)
            })
            AllToolImg[i].addEventListener('dragend', function (e) {
                //拖拉圖片結束後，對圖片設定
            })

            //對置入的盒子做設定---------------------------
            A4Box.addEventListener('dragover', function (e) {
                e.preventDefault();
            });

            A4Box.addEventListener('drop', function (e) {
                let thisImg = e.dataTransfer.getData('image/jpeg');
                this.getElementsByTagName('img')[0].src = thisImg;
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