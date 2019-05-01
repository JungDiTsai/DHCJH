<?php
try{
    require_once("php/components/_connectDHC.php");
    $sql = "SELECT * FROM orders  ORDER BY orderVote DESC LIMIT 3";
    $beautyContest = $pdo->query($sql);
}catch(PDOException $e){
    echo $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>台灣大舞台-首頁</title>
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/loadingScene.css">
    
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.carousel.min.css"></link>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.theme.default.min.css"></link>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/owl.carousel.min.js"></script>
    <!-- jQuery.js v1.11.1 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- fullPage.js v2.9.5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.5/jquery.fullpage.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.5/jquery.fullpage.min.css" rel="stylesheet"  />
    <script src="js/TweenMax.min.js"></script>
    <script src="js/ScrollMagic.min.js"></script>
    <script src="js/animation.gsap.min.js"></script>
    <!---開發時除蟲蟲用的 上線時要刪掉-->
    <script src="js/debug.addIndicators.min.js"></script>
    <script src="js/scrollMagic2.js" defer></script>
    
    <style>
            /*活動導覽顏色*/
            #fp-nav ul li a.active span,
            .fp-slidesNav ul li a.active span {
            background: rgb(255, 245, 168); 
            }
            /*非活動導覽顏色*/
            #fp-nav ul li a span,
            .fp-slidesNav ul li a span {
            border: 1px solid rgb(255, 251, 148);
            background: rgb(255, 251, 148);
            }
        </style>
</head>
<body>
<!--會員登入 克服 遊戲 header -->
    <!--載入頁面   起-->
    <div id="loadingScene" class="loading">     
        <div class="stars"></div>
        <div id="fog"></div>
        <canvas id="canvas"></canvas>
        <div id="car">
           <img src="images/loadingSceneCar.png" alt="載入車">
        </div>
        <div class="wrapper">
            <h2 class="neon pulse" data-value="Taiwan">Taiwan</h2>
            <h3 class="neon pulse" data-value="Great Stage">Great Stage</h3>
            <h4 class="neon bent" data-value="“客製”一下花車好不好！！">“客製”一下花車好不好！！</h4>
        </div>  
    </div>   
    <script> 

        window.addEventListener("load",function(){
            var storage = window.sessionStorage;
            if( storage["alreadyShow"] == undefined){
                storage["alreadyShow"] = "yes";   
                var loadFadeOut = function(){
                console.log('hi');
                $(".loading").fadeOut(1800);

                $("#introCarStageOne").css("left","0");
                $("#introCarStageOne").fadeIn(700);
                $("#introWords").css("transform","scale(1)"); 
                console.log('hi');                     
                }
            $("#car").removeClass('readyLoadingCar');
            $("#car").addClass('loadingCar');
            setTimeout(loadFadeOut,5200);   
            }else{ //已經載入過了
                $("#loadingScene").fadeOut(300);
                $("#introCarStageOne").css("left","0");
                $("#introCarStageOne").fadeIn(600);
                $("#introWords").css("transform","scale(1)"); 
                console.log('hi'); 
                //setTimeout(loadFadeOut,1000);  
            }
      
        });
         
    </script>
   
        <!--載入頁面   尾-->
    
        <!--引入header  -->
        <?php 
        require_once("php/header.php");
        ?>
        <!--引入login  -->
        <?php 
        require_once("php/loginLightBox.php");
        ?>
    <script src="js/_login.js"></script>
    <script src="js/_font_loginLightBox.js"></script>

    <?php 
    require_once("carAndRobot.php");
    ?>
    
        <!--game and customer service wrapper-->
       
        <!-- <a href="game.html">
            <div id="gameHub">
                <span>玩遊戲<br>
                        拿優惠
                </span>
                <img src="images/gameCar.png" alt="遊戲">
            </div>
        </a> -->

        <!-- <div id="customerService">
            
            <div class="chatrobot" style="display: none;">
                <div class="chatbox">
                    <div class="chatline">
                        歡迎來到台灣大舞台！可搜尋如下關鍵字，會迅速為您解答唷<br>
                        <span>#營業時間</span><br>
                        <span>#客製流程</span><br>
                        <span>#可以跟客服小姐約會嗎</span>
                    </div>
                </div>
                
                <div class="closebtn"><i class="fas fa-times-circle btnCancel"> -->
                    <!--<img src="images/serviceClose.png" alt="關閉客服">-->
                <!-- </i></div>   
                <div class="chattext">
                    <textarea name="robotAsk" class="messagebox"></textarea>
                    <div class="chatbtn">送出</div>
                </div> 
            </div>
            

            <div id="customerServiceGirl" style="cursor: pointer" >
                <img src="images/custormerService.png" alt="">
            </div>
        </div> -->
        <!-- <a href="game.html">
            <div id="gameHub">
                <span>玩遊戲<br>
                        拿優惠
                </span>
                <img src="images/gameCar.png" alt="遊戲">
            </div>
        </a> -->
        
        



    <!--FullPage起頭-->
    <div id="fullPageStart">
        <!--FullPage Section1-->
        <div class="section">
            <div id="carIntroWrap"> 
                <div class="dcontainer">
                    <div id="bgiArea" class="col-12">
                        <img id="bgiAreaBar" src="images/carIntroWrapBgiBars.png" alt="">
                        <img id="bgiAreaCircle" src="images/carIntroWrapBgiCircle.png" alt="">  
                    </div>
                        <!-- slogan ＋ 第一名花車 ＋ 來去客製按鈕 -->
                        <!-- 第一名花車 -->
                        <div id="introCarStageOne" class="col-12 col-lg-8">
                        <div  class="perspectiveIntro">
                            <div class="groupIntro ">
                                <!-- 周邊細項 -->
                                    <!-- ? -->
                                <div class="stairsA"></div>
                                    <!-- ? -->
                                <div class="stairsB"></div>
                                    <!-- 壁屏 -->
                                <div class="stairsC"></div>
                                <div class="stairsC1"></div>
                                <div class="stairsC2"></div>
                                <div class="stairsC3"></div>
                                <div class="stairsC4"></div>
                                    <!-- 上壁屏 -->
                                <div class="stairsD"></div>
                                <div class="stairsE"></div>
                                <div class="stairsF"></div>
                                <div class="stairsF1"></div>
                                <div class="stairsF2"></div>
                                <div class="stairsF3"></div>
                                <div class="stairsF4"></div>
                                <!-- 舞台 -->
                                <div class="front"></div>
                                <div class="front1"></div>
                                <div class="front2"></div>
                                <div class="back"></div>
                                <div class="up"></div>
                                <div class="down"></div>
                                <div class="left"></div>
                                <div class="right"></div>
                                <!-- 跑馬燈 -->
                                <div class="subtitles">台灣大舞台</div>
                                <div class="subtitles1"></div>
                                <div class="subtitles2"></div>
                                <!-- 樓梯三角形 -->
                                <div class="triangleA"></div>
                                <div class="triangleB"></div>
                                <div class="triangleC"></div>
                                <div class="triangleD"></div>
                                <div class="triangleE"></div>
                                <div class="triangleF"></div>
                                <!-- 樓梯 -->
                                <div class="ladderA"></div>
                                <div class="ladderB"></div>
                                <div class="ladderC"></div>
                                <div class="ladderD"></div>
                                <div class="ladderE"></div>
                                <div class="ladderF"></div>
                                <!-- 燈柱 -->
                                <div class="headlightbox"></div>
                                <div class="headlightbox1"></div>
                                <div class="headlightbox2"></div>
                                <div class="headlightbox3"></div>
                                <div class="headlightbox4"></div>
                                <div class="headlightbox5"></div>
                                <!-- 中間投射燈 -->
                                <div class="headlight"></div>
                                <div class="headlight1"></div>
                                <div class="headlight2"></div>
                                <div class="headlight3"></div>
                                <!-- 左邊投射燈 -->
                                <div class="headlight4"></div>
                                <div class="headlight5"></div>
                                <div class="headlight6"></div>
                                <div class="headlight7"></div>
                                <!-- 右邊投射燈 -->
                                <div class="headlight8"></div>
                                <div class="headlight9"></div>
                                <div class="headlight10"></div>
                                <div class="headlight11"></div>
                                <!-- 左音箱 -->
                                <div class="audioBox"></div>
                                <div class="audioBox1"></div>
                                <div class="audioBox2"></div>
                                <div class="audioBox3"></div>
                                <div class="audioBox4"></div>
                                <!-- 右音箱 -->
                                <div class="audioBox5"></div>
                                <div class="audioBox6"></div>
                                <div class="audioBox7"></div>
                                <div class="audioBox8"></div>
                                <div class="audioBox9"></div>
                                <!-- <img src="images/Fireworks5.gif" alt=""> -->
                                <img src="images/fire1.gif" alt="">
                                <img src="images/fire1.gif" alt="" class="img2">
                            </div>
                        </div>
                        </div>
                    <!-- 來去客製按鈕 -->
                    <div id="introWords" class="col-12 col-lg-3">
                        <h2>全台最大的電子花車客製平台上線啦！</h2>
                        <h3> 最蝦趴的電子花車<br>
                            都 在 這！</h3>
                        <!--<a href="customized_01.html">
                            <button class="commonBtn">
                                立即客製
                            </button>
                        </a>-->
                    </div>
                    
                </div>
            </div>
        </div>
        <!--FullPage Section2-->
        <div class="section">
            <div id="carEquipmentsIntroWrap" > 
                <div id="trigger4"></div>
                <div id="trigger5"></div>
                <h2 class="titleBgi">
                    花車介紹
                </h2>
                <div id="hint1" class="showUpHints">
                    <p>哩賀～偶是客服美女，這頁可以認識偶們花車客製的特色喔～快點選配件按鈕看看吧！</p>
                </div>
                <!--配件介紹背板-->
                <div id="trigger2"></div>
                <div class="EquipIntroWrapper">
                    <div id="equipIntroTabsSection" class="col-12 col-lg-5  popOut ">
                        <ul class="introTabs clearfix" data-tabgroup="first-tab-group">
                        <li class="tabLi" id="introSpecial"><a href="#tab1" class="activeTabs">特效</a></li>
                        <li class="tabLi" id="introDance"><a href="#tab2">舞團</a></li>
                        <li class="tabLi" id="introPole"><a href="#tab3">鋼管</a></li>
                        <li class="tabLi" id="introScreen"><a href="#tab5">銀幕</a></li>
                        <li class="tabLi" id="introSounds"><a href="#tab4">音響</a></li>     
                        <li class="tabLi" id="introInner"><a href="#tab6">塗裝</a></li>
                        </ul>
                        <section id="first-tab-group" class="tabgroup">
                        <div id="tab1">
                            <h2>特效 Effects</h2>
                            <p>最ㄅ一ㄤˋ 最華麗的舞台特效就在台灣大舞台啦～ 有天上噴發的、有地上閃耀的，讓你的五感體驗再升級！</p>
                        </div>
                        <div id="tab2">
                            <h2>舞團 Dance</h2>
                            <p>本公司力聘台灣電子花車界最最會扭最會跳的辣妹猛男舞團，給你最與眾不同的視覺體驗！</p>
                        </div>
                        <div id="tab3">
                            <h2>鋼管 Dancing Pole</h2>
                            <p>可謂花車文化的靈魂中柱啊！19K強化塑形鋼管，即便是撼天動地熱舞也能Hold住全場！</p>
                        </div>
                        <div id="tab4">
                            <h2>音響 Sounds </h2>
                            <p>一場華麗完美的演出，怎能缺少高音質的音響呢？Dolby環繞音效，讓你在戶外仍能享有高級劇院的音效品質</p>
                        </div>
                        <div id="tab5">
                            <h2>銀幕 Screen</h2>
                            <p>把你想對觀眾說的話都化作閃亮的字體，傳遞文字的力量、傳遞對台灣的愛！</p>
                        </div>
                        <div id="tab6">
                            <h2>塗裝 Painting</h2>
                            <p>高彩度、高畫質的內塗裝，提供多樣款式給你打造專屬於你的華麗電子花車！</p>
                        </div>
                        
                            <p id="equipBtnOne" class="commonBtn">
                                <a href="customized.php">
                                    立即客製
                                </a>
                            </p> 
                        
                    </section>  
                        
                    </div>
                        
                    
                    <!--配件展示-->
                    <div id="equipCarStage" class="col-12 col-lg-7 popOut">
                        <img class="introSpecialBlock one" src="images/Fireworks2.gif" alt="特效＿煙火" style="display: block;">
                        <img class="introSpecialBlock two" src="images/Fireworks1.gif" alt="特效＿煙火2" style="display: block;">
                        <!--配件展示的車-->
                        <img id="introInnerBlock" src="images/carStageEquipShing.png" alt="內塗裝" style="display: none;">
                        <img id="introCarStage" src="images/carStageEquip.png" alt="介紹用的花車">
                        <div id="introScreenBlock" style="display: none;"><!--跑馬燈的框-->
                        <span>
                        我要嗨翻全場！有看到嗎有看到嗎～可以跑字超酷的啦！嘿嘿嘿 趕快來試試看啊！台灣大舞台！
                        </span>  
                        </div>
                        <img id="introPoleBlock" src="images/pipe.png" alt="鋼管" style="display: none;">
                        <div id="lyrics" class="introSoundsBlock" style="display: none;"><!--跑馬燈的框-->
                        <span>
                            轉吧～轉啊～七彩霓虹燈！讓我看透這一個人生～讓那沒有答案的疑問，通通掉進雨後的水坑！一個兩個三個四個，五個六個七個八個，天花板總是有許多，許多數不完的彩虹燈！  
                        </span>  
                        </div>
                        <img class="introSoundsBlock one" src="images/audio1.png" alt="音響" style="display: none;">
                        <img class="introSoundsBlock two" src="images/audio1.png" alt="音響" style="display: none;">
                        <img id="introDanceBlock" src="images/danceGirlOne.gif" alt="舞團" style="display: none;">
                        <img class="introSpecialBlock three" src="images/fire1.gif" alt="特效＿火" style="display: block;">
                        <img class="introSpecialBlock four" src="images/fire1.gif" alt="特效＿火2" style="display: block;">
                        <!--<img id="pipe" src="images/pipe.png" alt="鋼管">-->
                    </div>
                    
                        <div id="equipBtnTwo" class="commonBtn">
                            <a href="customized.php">
                                立即客製
                            </a>
                        </div>
                    
                    
                </div>   
            </div>
        </div>
        <!--FullPage Section3-->
        <?php
        $errMsg=""; 
        try{

            $sql = "select * from draw";
            $draws = $pdo->query($sql);
            
            $sql = "select * from troupe";
            $troupes = $pdo->query($sql);
            
            $sql = "select * from effects";
            $effects = $pdo->query($sql);

            $sql = "select * from fireworks";
            $fireworks = $pdo->query($sql);

            $sql = "select * from pipe";
            $pipes = $pdo->query($sql);

            $sql = "select * from audio";
            $audios = $pdo->query($sql);

            $sql = "select * from host";
            $hosts = $pdo->query($sql);

        } catch(PDOException $e){
            $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
            $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
        }
        echo $errMsg;

    ?>
        <div class="section">
            <div id="tryCustormiseWrap" > 
                <div id="triggerB"></div>
                <div id="hint2" class="showUpHints">
                    <p>心動了嗎？趕快客製看看～做一台專屬於你的電子花車！阿有問題都可以點偶問問題喔～</p>
                </div>
                <h2 class="titleBgi">
                    客製試試看
                </h2>
                <div class="custBg">
                <div class="dcontainer">
                    <!--客製試試看花車-->
                    <!-- 舞台 -->
                <div class="stageTry">
                    <div id="stageView" class="stageView col-12 col-lg-6 tryCustShowAni">
                        <div id="perspectiveTry" class="perspective">
                            <div class="groupA">
                                <!-- 周邊細項 -->
                                
                                <img id="tryCustStageBack" src="images/newVersionStage20.png" alt="客製試試看花車">
                                
                                <!-- 跑馬燈 -->
                                <div class="subtitleAll disN">
                                    <div class="subtitles">
                                        <p>客製一下啦！</p>
                                    </div>
                                    <div class="subtitles1"></div>
                                    <div class="subtitles2"></div>
                                </div>
                                
                                
                                <!-- 特效 -->
                                <div class="effectAll">
                                    <div class="fireEffect">
                                        <?php 
                                        $i=1;
                                        while( $effect = $effects->fetch(PDO::FETCH_ASSOC) ){
                                        ?>
                                        <div class="fireEffect<?php echo $i ?>">
                                            <img src="<?php echo $effect["effectsGif"]; ?>" alt="">
                                            <img src="<?php echo $effect["effectsGif"]; ?>" alt="">
                                        </div>
                                        <?php $i++; } ?>
                                    </div>
                                    <div class="fireworkEffect">
                                        <div class="fireworkEffect01">
                                            <img src="images/fireworks1.gif" alt="">
                                            <img src="images/fireworks1.gif" alt="">
                                            <img src="images/fireworks2.gif" alt="">
                                        </div>
                                        <div class="fireworkEffect02">
                                            <img src="images/fireworks6.gif" alt="">
                                            <img src="images/fireworks3.gif" alt="">
                                            <img src="images/fireworks3.gif" alt="">
                                            <img src="images/fireworks8.gif" alt="">
                                            <img src="images/fireworks8.gif" alt="">
                                            <img src="images/fireworks6.gif" alt="">
                                        </div>
                                        <div class="fireworkEffect03">
                                            <img src="images/fireworks2.gif" alt="">
                                            <img src="images/fireworks7.gif" alt="">
                                            <img src="images/fireworks7.gif" alt="">
                                            <img src="images/fireworks2.gif" alt="">
                                        </div>
                                    </div>
                                </div>
                                <!-- 舞團 -->
                                <div class="danceAll">
                                <?php
                                $i = 1;
                                while( $troupe = $troupes->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                    <div class="danceDetail<?php echo $i ?>">
                                        <img src="<?php echo $troupe["troupeGif"]; ?>" alt="">
                                    </div>
                                <?php $i++; } ?>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                    <!--客製配件tabs-->
                    <div id="tryCustEquipWrap" class="tryCustEquipWrap col-12 col-lg-6 tryCustShowAni">
  
                        <ul class="tryCustTabs tryCustGroup">
                            <li><a class="tryCustActive" href="#/tryCustEquipInnerSet">舞團</a></li>
                            
                            <li><a href="#/tryCustEquipSpecial">特效</a></li>
                        </ul>
                        
                        <div id="tryCustEquipContent">
                            <section id="tryCustEquipInnerSet">
                                <!-- 舞團 -->
                                <div class="custItem danceItem">
                                    <div id="custItemContent" class="custItemContent">
                                    <?php 
                                        $sql = "select * from troupe";
                                        $troupes = $pdo->query($sql);
                                        $i=1;
                                        while ( $troupe = $troupes->fetch(PDO::FETCH_ASSOC)){
                                    ?>
                                        <div id="danceDetail<?php echo $i ?>" class="custItemContentInfo">
                                            <img src="<?php echo $troupe["troupeImgUrl"]; ?>" alt="">
                                            <p><?php echo $troupe["troupeName"]; ?></p>
                                            <p>$<?php echo $troupe["troupePrice"]; ?></p>
                                        </div>
                                    <?php $i++; }?>
                                    </div>
                                </div>
                            </section>
                            <section id="tryCustEquipSpecial" style="display:none">
                                <!-- 特效 -->
                                <div id="effectItem" class="custItem effectItem">
                                    <div id="effectCustItemContent" class="custItemContent effectItem">
                                        
                                        <?php
                                            $i = 1;
                                            while( $firework = $fireworks->fetch(PDO::FETCH_ASSOC) ){
                                        ?>
                                        <div id="fireworkEffect<?php echo $i ?>" class="custItemContentInfo fireworkInfo">
                                            <img src="<?php echo $firework["fireworkImgUrl"] ?>" alt="">
                                            <p><?php echo $firework["fireworkName"] ?></p>
                                            <p>$<?php echo $firework["fireworkPrice"] ?></p>
                                        </div>
                                        <?php $i++; } ?>
                                        <?php 
                                          $sql = "select * from effects";
                                          $effects = $pdo->query($sql);
                                          $i = 1;
                                          while( $effect = $effects->fetch(PDO::FETCH_ASSOC) ){
                                                                            ?>
                                        <div id="fireEffect<?php echo $i ?>" class="custItemContentInfo fireInfo">
                                            <img src="<?php echo $effect["effectsImgUrl"]; ?>" alt="">
                                            <p><?php echo $effect["effectsName"]; ?></p>
                                            <p effectsNo="<?php echo $effect["effectsNo"]; ?>">$<?php echo $effect["effectsPrice"]; ?></p>
                                        </div>
                                        <?php $i++; } ?>
                                    </div>
                                </div>                         
                            </section>
                        </div>
                        
                    </div>
                    
                </div>
                <div class="col-12 custBtnTop">
                    
                        <div class="commonBtn" > 
                            <a href="customized.php">
                                馬上客製 
                            </a> 
                        </div>
                    
                </div>
                          
                
                </div>
            </div>
            
        </div>
        </div>
        
        <?php
        try{
            $sql = "SELECT * FROM flyer  ORDER BY flyeDate DESC LIMIT 3";
            $flyer = $pdo->query($sql);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        ?>
        <!--FullPage Section4-->
        <div class="section">
        <!--forth wrapper try to customise a ivitation poster -->
        <?php  
            while($flyerRow = $flyer->fetchAll()){
        ?>        
            <div id="tryCustormiseFlyerWrap"> 
                <h2 class="titleBgi">客製宣傳單</h2>
                <div id="hint3" class="showUpHints">
                    <p>偶們還免費提供宣傳單的客製喔！趕快按下立即體驗的按鈕唄～</p>
                </div>

                <div class="dcontainer">
                    <div id="trigger"></div>
                    <section id="sec2">
                          
                        <div id="introFlyer2" class="introFlyerBoard">
                            <h2>近期活動</h2>
                            <div  class="introFlyer">
                                <img src="images/poster1.jpg" alt="宣傳單">
                           </div>
                        </div> 
                        <div id="introFlyer3" class="introFlyerBoard">
                            <h2>近期活動</h2>
                            <div class="introFlyer">
                                <img src="images/poster3.jpg" alt="宣傳單">
                           </div>
                        </div>  
                        <div id="introFlyerBoard" class="introFlyerBoard">  
                            <h2>近期活動</h2>
                            <div id="introFlyer" class="introFlyer">
                                    <img src="images/poster2.jpg" alt="宣傳單">
                                <div id="introFlyerFunctionTwo"  class="introFlyerFunction">                                   
                                    <h3> 免費<br>客製</h3>
                                </div>
                                
                                <div id="introFlyerFunctionOne" class="introFlyerFunction">
                                    <h3>邀請<br>好友</h3>                                        
                                </div>
                                
                                <div id="introFlyerFunctionThree"  class="introFlyerFunction">                                 
                                    <h3> 人數<br>統計</h3>
                                </div>
                            </div>
                        </div>              
                    </section>
                    <script>
                    $('.introFlyerFunction').css()
                    </script>
                    
                    <div id="flyerFunctionDetailSection">
                        <div id="flyerDetailClose" class="closebtn"><i class="fas fa-times-circle btnCancel">
                        </i></div>
                        <section id="flyerFunctionDetail1">
                            <h3>Function1. 免費客製</h3>
                            <p>此客製宣傳單為免費服務，讓您輕鬆有效綠，宣傳花車活動沒煩惱～！</p> 
                        </section>
                        
                        <section id="flyerFunctionDetail2">
                            <h3>Function2. 邀請好友</h3>
                            <p>有訂製花車的朋友可以直接匯入訂單內容，快速產生宣傳單，輕鬆邀請朋友參加活動！</p>
                        </section>
                        
                        <section id="flyerFunctionDetail3">
                            <h3>Function3. 統計人數</h3>
                            <p>這個宣傳單還有個超強大的功能～就是可以統計參加人數給您做參考喔！快來試試看！</p>
                        </section>
                    </div>
                    
                        <div class="commonBtn">
                            <a href="flyer.php">
                                立即體驗
                            </a>
                        </div>
                    
                    
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        
        
        <!--FullPage Section5-->
        <div class="section">
            <!--fifth wrapper : Beauty pageant -->
            <div id="beautyContestWrap">
                
                <div class="titleBgi">
                    花車選美
                </div>
                <div class="dcontainer">
                    <div id="trigger3"></div>
                    <div id="beautyContestSlider">
                        
                        
                    <?php
                    while($beautyContestRow = $beautyContest->fetchAll()){
                    ?>
                        <!--第一名花車-->
                        <div class="beautyContestStages slick-slide slick-active slick-current slick-center">
                            
                            <div class="crown">
                                <img src="images/crownFirstPlace.png" alt="皇冠">
                            </div>
                            <div class="rankTitle">第 一 名</div>
                            <div id="firstPlaceStage">
                            <img src="<?php echo $beautyContestRow[0]['orderImgUrl']; ?>" alt="選美車車"> 
                            <!--<img src="images/newVersionStage1.png" alt="選美車車"> -->
                            </div>
                            
                            <div id="contestLikes"> <!--撈排名資料 與喜歡數的欄位-->
                                <span class="likeContainer">
                                    <img class="likeHeart" src="images/like.png" alt="喜歡收藏">
                                    <span style="display:none"><?php echo $beautyContestRow[0]['orderNo'] ?></span>
                                </span>
                                <span ><?php echo $beautyContestRow[0]['orderVote']; ?>個喜歡</span>
                            </div>
                        </div>
                        <!--第二名花車-->
                        <div class="beautyContestStages slick-slide slick-active">
                            <div class="crown">
                                <img src="images/crown.png" alt="皇冠">
                            </div>
                            <div class="rankTitle">第 二 名</div>
                            <div id="secondPlaceStage">
                            <img src="<?php echo $beautyContestRow[1]['orderImgUrl']; ?>" alt="選美車車"> 
                            </div>
                            
                            <div id="contestLikes"> <!--撈排名資料 與喜歡數的欄位-->
                                <span class="likeContainer">
                                    <img class="likeHeart" src="images/like.png" alt="喜歡收藏">
                                    <span style="display:none"><?php echo $beautyContestRow[1]['orderNo'] ?></span>
                                </span>
                                <span ><?php echo $beautyContestRow[1]['orderVote']; ?>個喜歡</span>
                            </div>
                        </div>
        
                        <!--第三名花車-->
                        <div class="beautyContestStages slick-slide slick-active">
                            <div class="crown">
                                <img src="images/crown.png" alt="皇冠">
                            </div>
                            <div class="rankTitle">第 三 名</div>
                            <div id="thirdPlaceStage">
                            <img src="<?php echo $beautyContestRow[2]['orderImgUrl']; ?>" alt="選美車車"> 
                            </div>
                            
                            <div id="contestLikes"> <!--撈排名資料 與喜歡數的欄位-->
                                <span class="likeContainer">
                                    <img class="likeHeart" src="images/like.png" alt="喜歡收藏">
                                    <span style="display:none"><?php echo $beautyContestRow[2]['orderNo'] ?></span>
                                </span>
                                <span ><?php echo $beautyContestRow[2]['orderVote']; ?>個喜歡</span>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div id="hint4" class="showUpHints">
                        <p>阿你的花車素不素跟偶一樣美～那就快來參加花車選美比賽吧！</p>
                    </div>
                </div>   
                
                    <div class="commonBtn">
                        <a href="beautyPageant.php">
                            立馬去看
                        </a>
                    </div> 
                
                 
            </div>
        </div>
        

        <!--FullPage Section6-->
        
        <div class="section">
        <!--sixth wrapper : process  -->
            <div id="processWrap"> 
            <div id="processShineBgi"></div>
            <div id="processShineBgi2"></div>
            <div id="trigger6"></div>
            <div id="hint5" class="showUpHints">
                <p>把 "START" 點下去！看會發生什麼事？</p>
            </div>
            <h2 class="titleBgi">
                服務流程
            </h2>
            <div id="earthGroup">
                <img id="earthRotate" class="earthGroup" src="images/earthRotate.png" alt="旋轉地球">
                <img id="earth" class="earthGroup" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1037366/planet2.png">
            </div>
            
            
            <section id="parallaxContainer" data-hover-only="true" data-scalar-x="50" data-scalar-y="50" data-limit-y="100" data-limit-x="100" style="transform: translate3d(0px, 0px, 0px) rotate(0.0001deg); transform-style: preserve-3d; backface-visibility: hidden; position: relative; pointer-events: none;">
                <div class="processPara getBigSet1" data-depth="0.05">
                    <img id="paraItem7" src="images/processStar2.png" alt="">
                </div> 
                <div  class="processPara getBigSet1" data-depth="0.3">
                    <img id="paraItem1" src="images/processSatellite2.png" alt="">
                </div>
                <div class="processPara  getBigSet2" data-depth="0.6">
                    <img id="paraItem2" src="images/processSpeaker.png" alt="">
                </div>
                <div class="processPara  getBigSet2" data-depth="0.8">
                    <img id="paraItem3" src="images/processPipe.png" alt="鋼管">
                </div>
                <div class="processPara getBigSet1" data-depth="0.02">
                    <img id="paraItem4" src="images/processStar.png" alt="行星">
                </div>
                <div class="processPara  getBigSet2" data-depth="0.9">
                    <img id="paraItem5" src="images/processSpeaker.png" alt="音響">
                </div>
                <div class="processPara  getBigSet2" data-depth="0.3">
                    <img id="paraItem6" src="images/processSpeaker2.png" alt="音響">
                </div>    
                <div  class="processPara getBigSet1" data-depth="0.5">
                    <img id="paraItem8" src="images/processSatellite.png" alt="衛星">
                </div>
                <div  class="processPara  getBigSet2" data-depth="0.3">
                    <img id="paraItem9" src="images/processScreen.gif" alt="跑馬燈">
                </div>
                
                <div  class="processPara  getBigSet2" data-depth="0.6">
                    <img id="paraItem11" src="images/processGrayCar.png" alt="未客製的車">
                </div>
            </section>
            <img id="completeCar" src="images/loadingSceneCar.png" alt="">

            <img id="processWorker1" src="images/processWorker1.gif" alt="組裝工人1">
            <img id="processWorker2" src="images/processWorker2.gif" alt="組裝工人2">
            
            <div id="explosion">
                <img src="images/explosion.gif" alt="explosion">
            </div>
            <div id="processShineBgi2"></div>
            <div id="processLastStage" >
                <div id="equipCarStage" class="col-12 col-lg-4">
                    <img class="introSpecialBlock one" src="images/Fireworks2.gif" alt="特效＿煙火" style="display: block;">
                    <img class="introSpecialBlock two" src="images/Fireworks1.gif" alt="特效＿煙火2" style="display: block;">
                    <!--配件展示的車-->
                    <img id="introCarStage" src="images/newVersionStage2.png" alt="介紹用的花車">
                    <div id="introScreenBlock" style="display: none;"><!--跑馬燈的框-->
                    <span>
                    我要嗨翻全場！有看到嗎有看到嗎～可以跑字超酷的啦！嘿嘿嘿 趕快來試試看啊！台灣大舞台！
                    </span>  
                    </div>
                    <img id="introPoleBlock" src="images/pipe.png" alt="鋼管" style="display: none;">
                    <div id="lyrics" class="introSoundsBlock" style="display: none;"><!--跑馬燈的框-->
                    <span>
                        轉吧～轉啊～七彩霓虹燈！讓我看透這一個人生～讓那沒有答案的疑問，通通掉進雨後的水坑！一個兩個三個四個，五個六個七個八個，天花板總是有許多，許多數不完的彩虹燈！  
                    </span>  
                    </div>
                    <img class="introSoundsBlock one" src="images/audio1.png" alt="音響" style="display: none;">
                    <img class="introSoundsBlock two" src="images/audio1.png" alt="音響" style="display: none;">
                    <img id="processDanceBlock" src="images/dance5.gif" alt="舞團" >
                    <img class="introSpecialBlock three" src="images/fire1.gif" alt="特效＿火" style="display: block;">
                    <img class="introSpecialBlock four" src="images/fire1.gif" alt="特效＿火2" style="display: block;">
                    <!--<img id="pipe" src="images/pipe.png" alt="鋼管">-->
                </div>
            </div>
            
                <div id="processDetail4" class="commonBtn">
                    <a href="customized.php">
                        立馬客製!
                    </a>
                </div>    
            
            
            <div id="processDetail3" class="processBoard">
                <h4>Step 3.</h4>
                <p>活動全程專人服務至活動結束</p>
            </div>
            <div id="processDetail2" class="processBoard">
                <h4>Step 2.</h4>
                <p>活動當天專人駕駛運至會場</p>
            </div>
            <div id="processDetail" class="processBoard">
                <h4>Step 1.</h4>
                <p>組合客製花車物件與塗裝</p>
            </div>

            <div class="btnContainer getBigSet3">
                <div id="processStartBtn" class="button circle" href="#">START!</div>
            </div>
            </div>
        </div>
        
        <!--FullPage Section7-->
        <div class="section fp-auto-height">
            <!--  footer  -->
            <footer>
                <div id="footerBgiNew">
                    <div id="footerWords" >
                        <p>Copyright © 2019 Taiwan Great Stage Inc.</p>
                        <p>All rights reserved</p> 
                    </div>          
                </div>
            </footer>
        </div>
    </div>

    <!--聊天機器人功能-->        
    <script>
    ///////客服機器人區////
    //打開客服小姐
    $('#customerServiceGirl').click(function(){
        $('.chatrobot').fadeIn(400).css("display","block");    
        $('#gameAndService').fadeIn(400).addClass('popOutBgiBlack');
        $('#customerServiceGirl').fadeOut(300);
        //$('body').addClass('noscroll');
        //$('.chatrobot').addClass('scrollLightBox');
    });
    $('.closebtn').click(function(){
        $('.chatrobot').fadeOut(400).css("display","none");
        $('#gameAndService').removeClass('popOutBgiBlack');
        $('#customerServiceGirl').fadeIn(500);
        //$('body').removeClass('noscroll');
        //$('.chatrobot').removeClass('scrollLightBox');
    });

    //送出資料，滑鼠點擊送出
    var chatbtn = document.querySelector('.chatbtn');
    var message = document.querySelector(".messagebox");

    chatbtn.addEventListener('click',say);
    function say(e){
        if (message.value == "") {  //未輸入內容，無法發送
            e.preventDefault();
        }else {
            append("<div class='customMessage'>" + message.value + "</div>");
            answer(say);
        }
    }
    //當按下 enter 鍵時，會呼叫此函數進行回答
    message.onkeydown = keyin;
    function keyin(e) {
    var keyCode = e.which; // 取出按下的鍵
        if (keyCode == 13 && !event.shiftKey == 1) { //shift+enter，換行
            e.returnValue = false;  //停止textarea本身enter換行功能
            if (message.value == "") {  //未輸入內容，無法發送
                e.preventDefault();
            } else {
                say();
            }
        }
    }

    // 回答問題 
    function answer(say){     
    // alert(message.value);
    console.log(message.value);
        var xhr3 = new XMLHttpRequest();


        //xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr3.onload = function(){
            if(xhr3.status == 200){
                if(xhr3.responseText=='不知道怎麼回答ˊˋ'){
                    var hardToReply = ['誒豆～這個偶不知道耶','哩勒供蝦咪？？', '這個偶不懂耶～偶腦袋不好拍謝','偶看不懂你在寫蝦咪？囧','拍謝啦！看不懂～哇阿餒母湯'];
                    var replyNumber = Math.floor((Math.random()*5));
                    alert(hardToReply[replyNumber]);  
                }else{
                    //alert("hiihih"+xhr.responseText);
                    append( "<div class='avatar'><p class='avatar__text'>" + xhr3.responseText + "</p></div>")
                }
            }else{
                alert(xhr3.status);
            }
        }
        var say = "robotAsk=" + message.value;
        xhr3.open("get", "php/robot.php?"+say, true);
        xhr3.send(null);
        message.value = '';
    }


    // chatbox 加入對話
    function append(line){
        var messageContent = document.querySelector(".chatbox"); // 取出對話框
        messageContent.innerHTML += line;
        // document.querySelector(".messagebox").value = '';

        var scrollHeight = $('.chatbox').prop("scrollHeight"); //scrollbar自動在最下方
        $('.chatbox').scrollTop(scrollHeight);

    }

    </script>

    <script src="js/navmenu.js"></script>
    <script>
        //點選個配件tab 
        $('.tabgroup > div').hide();
        $('.tabgroup > div:first-of-type').show();
        $('.introTabs a').click(function(e){
          e.preventDefault();
            var $this = $(this),
                tabgroup = '#'+$this.parents('.introTabs').data('tabgroup'),
                others = $this.closest('li').siblings().children('a'),
                target = $this.attr('href');
            others.removeClass('activeTabs');
            $this.addClass('activeTabs');
            $(tabgroup).children('div').hide();
            $(target).show();
        })
      </script>
      <script>
        //點選鋼管 
        document.getElementById('introPole').addEventListener('click', function(){
          document.getElementById('introPoleBlock').style.display = 'block';
          document.getElementById('introDanceBlock').style.display = 'none';
          document.getElementsByClassName('introSpecialBlock')[0].style.display = 'none';
          document.getElementsByClassName('introSpecialBlock')[1].style.display = 'none';
          document.getElementsByClassName('introSpecialBlock')[2].style.display = 'none';
          document.getElementsByClassName('introSpecialBlock')[3].style.display = 'none';
          document.getElementsByClassName('introSoundsBlock')[0].style.display = 'none';
          document.getElementsByClassName('introSoundsBlock')[1].style.display = 'none';
          document.getElementsByClassName('introSoundsBlock')[2].style.display = 'none';
          document.getElementById('introScreenBlock').style.display = 'none';
          document.getElementById('introInnerBlock').style.display = 'none';  
        });
        //點選舞團 
        document.getElementById('introDance').addEventListener('click', function(){
          document.getElementById('introPoleBlock').style.display = 'none';
          document.getElementById('introDanceBlock').style.display = 'block';
          document.getElementsByClassName('introSpecialBlock')[0].style.display = 'none';
          document.getElementsByClassName('introSpecialBlock')[1].style.display = 'none';
          document.getElementsByClassName('introSpecialBlock')[2].style.display = 'none';
          document.getElementsByClassName('introSpecialBlock')[3].style.display = 'none';
          document.getElementsByClassName('introSoundsBlock')[0].style.display = 'none';
          document.getElementsByClassName('introSoundsBlock')[1].style.display = 'none';
          document.getElementsByClassName('introSoundsBlock')[2].style.display = 'none';
          document.getElementById('introScreenBlock').style.display = 'none';
          document.getElementById('introInnerBlock').style.display = 'none';  
        });
        //點選特效
        document.getElementById('introSpecial').addEventListener('click', function(){
          document.getElementById('introPoleBlock').style.display = 'none';
          document.getElementById('introDanceBlock').style.display = 'none';
          document.getElementsByClassName('introSpecialBlock')[0].style.display = 'block';
          document.getElementsByClassName('introSpecialBlock')[1].style.display = 'block';
          document.getElementsByClassName('introSpecialBlock')[2].style.display = 'block';
          document.getElementsByClassName('introSpecialBlock')[3].style.display = 'block';
          document.getElementsByClassName('introSoundsBlock')[0].style.display = 'none';
          document.getElementsByClassName('introSoundsBlock')[1].style.display = 'none';
          document.getElementsByClassName('introSoundsBlock')[2].style.display = 'none';
          document.getElementById('introScreenBlock').style.display = 'none';
          document.getElementById('introInnerBlock').style.display = 'none';  
        });
        //點選音響
        document.getElementById('introSounds').addEventListener('click', function(){
          document.getElementById('introPoleBlock').style.display = 'none';
          document.getElementById('introDanceBlock').style.display = 'none';
          document.getElementsByClassName('introSpecialBlock')[0].style.display = 'none';
          document.getElementsByClassName('introSpecialBlock')[1].style.display = 'none';
          document.getElementsByClassName('introSpecialBlock')[2].style.display = 'none';
          document.getElementsByClassName('introSpecialBlock')[3].style.display = 'none';
          document.getElementsByClassName('introSoundsBlock')[0].style.display = 'block';
          document.getElementsByClassName('introSoundsBlock')[1].style.display = 'block';
          document.getElementsByClassName('introSoundsBlock')[2].style.display = 'block';
          document.getElementById('introScreenBlock').style.display = 'none';
          document.getElementById('introInnerBlock').style.display = 'none';  
        });
        //點選銀幕
        document.getElementById('introScreen').addEventListener('click', function(){
          document.getElementById('introPoleBlock').style.display = 'none';
          document.getElementById('introDanceBlock').style.display = 'none';
          document.getElementsByClassName('introSpecialBlock')[0].style.display = 'none';
          document.getElementsByClassName('introSpecialBlock')[1].style.display = 'none';
          document.getElementsByClassName('introSpecialBlock')[2].style.display = 'none';
          document.getElementsByClassName('introSpecialBlock')[3].style.display = 'none';
          document.getElementsByClassName('introSoundsBlock')[0].style.display = 'none';
          document.getElementsByClassName('introSoundsBlock')[1].style.display = 'none';
          document.getElementsByClassName('introSoundsBlock')[2].style.display = 'none';
          document.getElementById('introScreenBlock').style.display = 'block';
          document.getElementById('introInnerBlock').style.display = 'none';  
        });
        //點選內塗裝
        document.getElementById('introInner').addEventListener('click', function(){
          document.getElementById('introPoleBlock').style.display = 'none';
          document.getElementById('introDanceBlock').style.display = 'none';
          document.getElementsByClassName('introSpecialBlock')[0].style.display = 'none';
          document.getElementsByClassName('introSpecialBlock')[1].style.display = 'none';
          document.getElementsByClassName('introSpecialBlock')[2].style.display = 'none';
          document.getElementsByClassName('introSpecialBlock')[3].style.display = 'none';
          document.getElementsByClassName('introSoundsBlock')[0].style.display = 'none';
          document.getElementsByClassName('introSoundsBlock')[1].style.display = 'none';
          document.getElementsByClassName('introSoundsBlock')[2].style.display = 'none';
          document.getElementById('introScreenBlock').style.display = 'none';
          document.getElementById('introInnerBlock').style.display = 'block';  
        });

      </script>
    <script>
        $( "#fullPageStart" ).fullpage({
            // 參數設定[註1]
            sectionsColor: ['#121', '#23121', '#23121', '#121', '#111','#112'],
            navigation: true, // 顯示導行列
            navigationPosition: "right", // 導行列位置
            touchSensitivity:5,
            scrollingSpeed:800,
        });
    </script>

<!--第三屏客製試試看-->
<script src="js/introCustTry.js"></script>


    <!--第四屏客製宣傳單  功能詳細說明按鈕-->
    <script>
            var detailBoard = $('#flyerFunctionDetailSection');
            var detail1 = $('#flyerFunctionDetail1');
            var detail2 = $('#flyerFunctionDetail2');
            var detail3 = $('#flyerFunctionDetail3');
           // return detailBoard ,detail1 ,detail2 ,detail3;
            //return detail1;
           // return detail2;
           // return detail3;

            $('#introFlyerFunctionOne').click(function(){
                detailBoard.fadeIn(300);
                detail2.fadeIn(600);
                detail1.fadeOut(0);
                detail3.fadeOut(0);
            });
            $('#introFlyerFunctionTwo').click(function(){
                detailBoard.fadeIn(300);
                detail1.fadeIn(600);
                detail2.fadeOut(0);
                detail3.fadeOut(0);
            });
            $('#introFlyerFunctionThree').click(function(){
                detailBoard.fadeIn(300);
                detail3.fadeIn(600);
                detail1.fadeOut(0);
                detail2.fadeOut(0);
            });
            $('#flyerDetailClose').click(function(){
                detailBoard.fadeOut(400);
            });
        

        </script>

<!--第六屏服務流程  組裝爆炸畫面-->
<script src="js/jquery-3.3.1.min.js"></script>
<script>
 $('#processStartBtn').click(function(){
     var processPara = $('.processPara img');
     processPara.css('width','8px');
     processPara.css('max-width','8px');
     processPara.css('margin','auto'); 
     processPara.css('top','40vh'); 
     processPara.css('left','45vw');
     $('#processStartBtn').fadeOut(500);
     processPara.fadeOut(450);
     $('#explosion').fadeIn(600);
     setTimeout( function(){$('#processShineBgi2').addClass('processShineBgi2');},590);
     $('#explosion').fadeOut(2500);
     setTimeout( function(){$('#completeCar').fadeIn(400);},1400); 
     setTimeout( function(){$('#processDetail').fadeIn(900).css('transform','scale(1)');},300);
     setTimeout( function(){$('#processWorker1').fadeIn(600).css('transform','scale(1)');},300);
     setTimeout( function(){$('#processWorker1').css('opacity','1');},300);
     setTimeout( function(){$('#processWorker2').fadeIn(600).css('transform','scale(1)');},300);
     setTimeout( function(){$('#processWorker2').css('opacity','1');},300);
     setTimeout( function(){$('#processDetail').fadeOut(400).css('transform','translate(-60vw,0px)');},6000);
     setTimeout( function(){$('#processWorker1').css('transform','translate(60vw,0px)');},6000);
     setTimeout( function(){$('#processWorker2').css('transform','translate(-60vw,0px)');},6000);
     setTimeout( function(){$('#processDetail2').fadeIn(900).css('top','-20vh').css('transform','scale(1)');},6000);
     setTimeout( function(){$('#processDetail2').fadeOut(1200).css('transform','translate(0px,60vw)');},13000); 
     setTimeout( function(){$('#completeCar').fadeOut(600).css('transform','translate(0px,60vw)');},13000); 
     setTimeout( function(){$('#processDetail3').fadeIn(900).css('top','-20vh').css('transform','scale(1)');},13000);
     setTimeout( function(){$('#processDetail3').fadeOut(400).css('transform','translate(60vw,0px)');},20000);  
     setTimeout( function(){$('#processLastStage').fadeIn(900);},13000);  
     setTimeout( function(){$('#processDetail4').fadeIn(1000);},21000);   
 }); 
</script>

<!--客制花車試試看的Tabsvar content = this.hash.replace('/','');-->
<script>
    (function($) {

        var tabs =  $(".tryCustTabs li a");
    
        tabs.click(function() {
            var content = this.hash.replace('/','');
            tabs.removeClass("tryCustActive");
            $(this).addClass("tryCustActive");
        $("#tryCustEquipContent").find('section').hide();
        $(content).fadeIn(200);
        });
    
    })(jQuery);
</script>

<!--選美投票-->
<script>
        var hearts = document.getElementsByClassName("likeHeart");
        for(let i=0; i< hearts.length; i++){
            hearts[i].onclick = function(e){
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
                var xhr2 = new XMLHttpRequest();
                xhr2.onload = function(){
                    //console.log(xhr2.responseText);
                    var str = e.target.parentNode.nextElementSibling.innerHTML.replace("個喜歡","");
                    console.log("------",parseInt(str)+ amount +"個喜歡" );
                    e.target.parentNode.nextElementSibling.innerHTML = parseInt(str)+ amount +"個喜歡";
                }
                xhr2.open("get",url,true);
                xhr2.send(null);
            }
        }
    </script>
    


    <script type="text/javascript" src="js/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#beautyContestSlider').slick({
            centerMode: true,
            infinite: false,
            centerPadding: '60px',
            focusOnSelect: false,
            slidesToShow: 3,
            responsive: [
                {
                breakpoint: 992,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 3,
                    //focusOnSelect: true
                }
                },
                {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '60px',
                    slidesToShow: 1,
                    //focusOnSelect: true
                }
                }
            ]
            });  
        });
    </script>
    
    <script>
    //判斷登入
    LoginState="notFound";
    OrderNo="notFound";
    window.addEventListener("load", function () {
    //產生XMLHttpRequest物件
    let xhr = new XMLHttpRequest();
    //註冊callback function
    xhr.onload = function () {
        if (xhr.status == 200) { //server端可以正確的執行
            if(xhr.responseText!="notFound"){
                LoginState =  JSON.parse(xhr.responseText);
                document.querySelector('.fa-user').src = LoginState[0]['memImgUrl'];
                document.querySelector('.fa-user').setAttribute("id","bigMember");
                console.log("LoginState:已輸入值");
            }
            console.log("Session:"+xhr.responseText)
        } else { //其它
            alert(xhr.status);
        }
    }
    //設定好所要連結的程式
    xhr.open("get", "php/components/_JudgeLogin.php", true);
    xhr.send(null);
})

//登入
function sendLogin() {
        //產生XMLHttpRequest物件
    let xhr = new XMLHttpRequest();
    //註冊callback function
    xhr.onload = function () {
        if (xhr.status == 200) { //server端可以正確的執行
            if(xhr.responseText=="帳號密碼錯誤"){
                alert(xhr.responseText);
            }
            else if(xhr.responseText=="你的帳號已被凍結"){
                alert(xhr.responseText);
            }
            else{
                window.location.reload();
            }
        } else { //其它
            alert(xhr.status);
        }
    }
    //設定好所要連結的程式
    var url = "php/components/_login.php";
    xhr.open("Post", url, true);
    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
    var data_info = "memId=" + document.getElementById("memId").value + "&memPsw="+ document.getElementById("memPsw").value;
    //送出資料
    xhr.send(data_info);
}



//登出
function LoginOut() {
    //產生XMLHttpRequest物件
    let xhr = new XMLHttpRequest();
    //註冊callback function
    xhr.onload = function () {
        if (xhr.status == 200) { //server端可以正確的執行
            alert('已成功登出');
            window.location.reload();
        } else { //其它
            alert(xhr.status);
        }
    }
    //設定好所要連結的程式
    xhr.open("get", "php/components/_logout.php", true);
    xhr.send(null);
}



//註冊帳號
function registered(){
    //產生XMLHttpRequest物件
    let xhr = new XMLHttpRequest();
    //註冊callback function
    xhr.onload = function () {
        if (xhr.status == 200) { //server端可以正確的執行
            alert(xhr.responseText);
            window.location.reload();
        } else { //其它
            alert(xhr.status);
        }
    }
    //設定好所要連結的程式
    var url = "php/components/_addMember.php";
    xhr.open("Post", url, true);
    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
    let addMemID = document.getElementById('addMemID').value;
    let addMemPsw = document.getElementById('addMemPsw').value;
    let addMemMail = document.getElementById('addMemMail').value;
    let addMemTel = document.getElementById('addMemTel').value;
    let addMemName = document.getElementById('addMemName').value;
    let addMemSex = document.querySelector('.addMemSex:checked').value;
    let addMem = [addMemID,addMemPsw,addMemName,addMemTel,addMemMail,addMemSex];
    var data_info = "addMember=" + JSON.stringify(addMem);
    //送出資料
    xhr.send(data_info);

}

//檢查帳號
    document.getElementById('addMemID').addEventListener('change',function(e){
        console.log(e.target.value);
    //產生XMLHttpRequest物件
    let xhr = new XMLHttpRequest();
    //註冊callback function
    xhr.onload = function () {
        if (xhr.status == 200) { //server端可以正確的執行
            if(xhr.responseText == "已有此帳號"){
                document.getElementById('IdStatus2').style.display="table-row";
                console.log(xhr.responseText);
                document.getElementById('registeredButton').disabled=true;
            }else{
                document.getElementById('IdStatus2').style.display="none" ;
                document.getElementById('registeredButton').disabled=false;
                console.log(xhr.responseText);
            }
        } else { //其它
            alert(xhr.status);
        }
    }
    //設定好所要連結的程式
    xhr.open("get", "php/components/_checkId.php?memId="+e.target.value, true);
    xhr.send(null);
    })
    
    </script>
    <script src="js/parallax.js"></script>
    <script src="js/processTest.js"></script>
    
</body>
</html>