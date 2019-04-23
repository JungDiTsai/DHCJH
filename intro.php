<!DOCTYPE html5>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/intro.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet"  href="css/base.css" />
    <link rel="stylesheet"  href="css/demo.css" />
</head>
<body onload="draw();">
    <input type="checkbox" id=menu_control>
    <?php require_once("php/header.php");?>
    <?php require_once("php/loginLightBox.php");?>
    <!-- intro first scene-->	
    <div id="canvasScene"></div>
    <section class="page-wrapper" id="coidea">

            <div class="slider">
              
              <ul class="slider-list">
                
                <li class="slider-list__item slider-list__item_active">
                  <span class="back__element">
                    <img src="images/intro/stagepurple.png" />
                  </span>
                  <span class="main__element">
                    <!-- <img src="assets/img/ladysteel.png" /> -->
                  </span>
                  <span class="front__element">
                    <img src="images/intro/rocklady.png" />
                  </span>
                  <span class="title__element">
                    <p class="title">2019巴西嘉年華</p>
                  </span>
                  <span class="more__element">
                    <span class="content">
                      <p class="headline">2019年2月21日</p>
                      <p class="excerpt">里約熱內盧嘉年華大遊行</p>
                      <!-- <span class="link">
                        <div class="fill"></div>
                        <a href="#">Open catalog</a>
                      </span> -->
                    </span>
                  </span>
                 </li>
      
                <li class="slider-list__item">
                  <span class="back__element">
                    <img src="images/intro/stageyellow.png" />
                  </span>
                  <span class="main__element">
                    <!-- <img src="assets/img/bottle_grapes_001.png" /> -->
                  </span>
                  <span class="front__element">
                    <img src="images/intro/ladysteel.png" />
                  </span>
                  <span class="title__element">
                    <p class="title">2017威尼斯嘉年華</p>
                  </span>
                  <span class="more__element">
                    <span class="content">
                      <p class="headline">2017年2月12日</p>
                      <p class="excerpt">威尼斯嘉年華會</p>
                      <!-- <span class="link">
                        <div class="fill fill-dark"></div>
                        <a href="#">Open catalog</a>
                      </span> -->
                    </span>
                  </span>
                 </li>
      
                 <li class="slider-list__item">
                  <span class="back__element">
                    <img src="images/intro/stagered.png" />
                  </span>
                  <span class="main__element">
                    <!-- <img src="assets/img/bottle_strawberry_003.png" /> -->
                  </span>
                  <span class="front__element">
                    <img src="images/intro/rockman.png" />
                  </span>
                  <span class="title__element">
                    <span class="title">2016尼斯嘉年華</span>
                  </span>
                  <span class="more__element">
                    <span class="content">
                      <p class="headline">2016年2月13日</p>
                      <p class="excerpt">法國尼斯嘉年華</p>
                      <!-- <span class="link">
                          <div class="fill"></div>
                        <a href="#">Open catalog</a>
                      </span> -->
                    </span>
                  </span>
                 </li>
                 
              </ul>
              
              <div class="slider__nav-bar">
                <a class="nav-control"></a>
                <a class="nav-control"></a>
                <a class="nav-control"></a>
              </div>
              
              <div class="slider__controls">
                <a class="slider__arrow slider__arrow_prev"></a>
                <a class="slider__arrow slider__arrow_next"></a>
              </div>
      
            </div>      
      
          </section>

    <!-- -----團隊介紹---------------- --> 
    
    <div class="introTime">
        <h2 class="titleBgi introTimeTitle">團隊介紹</h2>   
        <div class="introStage">
        
            <div class="people">
                <img class="peopleFirst" src="images/intro/intropeople1-1.png" alt="">
                    <img class="peopleSec" src="images/intro/intropeople2-1.png" alt="">
                    <img class="peopleThree" src="images/intro/intropeople3-1.png" alt="">
                    <img class="peopleFourth" src="images/intro/intropeople4-1.png" alt="">
                    <img class="peopleFiv" src="images/intro/intropeople5-1.png" alt="">

                </div>
                <!-- 跑馬燈 -->
                <div class="led">
                    <marquee direction="right" height="30" scrollamount="5" behavior="alternate">團隊介紹</marquee>
                </div>
            </div>
        </div>
    <script>
    
    </script>
  
    <script>
        
        /* 登入燈箱 JS*/
        // 點擊icon開啟登入燈箱----------------------------
        document.querySelector('.fas.fa-user').addEventListener('click', function (e){
            // 顯示登入燈箱
            let loginBox = document.querySelector('.loginBox');
            let style = window.getComputedStyle(loginBox, null).getPropertyValue('display');
            if(style=="block"){
                loginBox.style.setProperty('display',"none");
                e.target.style.setProperty('color',"#2cffff");
            }else{
                loginBox.style.setProperty('display',"block");
                e.target.style.setProperty('color',"rgb(252, 211, 28)");
            }
        })
        // 點擊關閉----------------------------
        document.querySelector('.loginBox .fa-times').addEventListener('click', function () {
            let loginBox = document.querySelector('.loginBox');
            let style = window.getComputedStyle(loginBox, null).getPropertyValue('display');
            if(style=="block"){
                loginBox.style.setProperty('display',"none");
            }
        })
        // 點擊註冊------------------------------
        document.querySelector('.loginBox .showRegistered').addEventListener('click', function () {
            // 隱藏登入燈箱
            let loginBox = document.querySelector('.loginBox');
            loginBox.style.setProperty('display',"none");
            // 顯示註冊燈箱
            let registeredBox = document.querySelector('.registeredBox');
            let style = window.getComputedStyle(registeredBox, null).getPropertyValue('display');
            if(style=="none"){
                registeredBox.style.setProperty('display',"block");
            }
        })
        // 點擊忘記密碼------------------------------
        document.querySelector('.loginBox .showForgotPSW').addEventListener('click', function () {
            // 隱藏登入燈箱
            let loginBox = document.querySelector('.loginBox');
            loginBox.style.setProperty('display',"none");
            // 顯示忘記密碼燈箱
            let forgotBox = document.querySelector('.forgotBox');
            let style = window.getComputedStyle(forgotBox, null).getPropertyValue('display');
            if(style=="none"){
                forgotBox.style.setProperty('display',"block");
            }
        })

        /* 註冊燈箱 JS*/
        // 點擊關閉----------------------------
        document.querySelector('.registeredBox .fa-times').addEventListener('click',function(){
            let registeredBox = document.querySelector('.registeredBox');
            let style = window.getComputedStyle(registeredBox, null).getPropertyValue('display');
            if(style=="block"){
                registeredBox.style.setProperty('display',"none");
            }
        })
        // 點擊回到登入----------------------------
        document.querySelector('.registeredBox .backLogin').addEventListener('click',function(){
            // 隱藏註冊燈箱
            let registeredBox = document.querySelector('.registeredBox');
            registeredBox.style.setProperty('display',"none");
            // 顯示登入燈箱
            let loginBox = document.querySelector('.loginBox');
            let style = window.getComputedStyle(loginBox, null).getPropertyValue('display');
            if(style=="none"){
                loginBox.style.setProperty('display',"block");
            }
        })

        /* 忘記密碼燈箱 JS*/
        // 點擊關閉----------------------------
        document.querySelector('.forgotBox .fa-times').addEventListener('click',function(){
            let forgotBox = document.querySelector('.forgotBox');
            let style = window.getComputedStyle(forgotBox, null).getPropertyValue('display');
            if(style=="block"){
                forgotBox.style.setProperty('display',"none");
            }
        })
        // 點擊回到登入----------------------------
        document.querySelector('.forgotBox .backLogin').addEventListener('click',function(){
            // 隱藏忘記密碼燈箱
            let forgotBox = document.querySelector('.forgotBox');
            forgotBox.style.setProperty('display',"none");
            // 顯示登入燈箱
            let loginBox = document.querySelector('.loginBox');
            let style = window.getComputedStyle(loginBox, null).getPropertyValue('display');
            if(style=="none"){
                loginBox.style.setProperty('display',"block");
            }
        })

        /* 忘記密碼燈箱 JS*/
        // 點擊關閉----------------------------
        document.querySelector('.forgotBox .fa-times').addEventListener('click',function(){
            let forgotBox = document.querySelector('.forgotBox');
            let style = window.getComputedStyle(forgotBox, null).getPropertyValue('display');
            if(style=="block"){
                forgotBox.style.setProperty('display',"none");
            }
        })
        // 點擊回到登入----------------------------
        document.querySelector('.forgotBox .backLogin').addEventListener('click',function(){
            // 隱藏忘記密碼燈箱
            let forgotBox = document.querySelector('.forgotBox');
            forgotBox.style.setProperty('display',"none");
            // 顯示登入燈箱
            let loginBox = document.querySelector('.loginBox');
            let style = window.getComputedStyle(loginBox, null).getPropertyValue('display');
            if(style=="none"){
                loginBox.style.setProperty('display',"block");
            }
        })
        
        //螢幕寬度
        let screenWidth = document.body.clientWidth;
        if(screenWidth<=768){
            
        }
    </script>
</body>
<script src="js/three.js"></script>
<script src="js/loaders/OBJLoader.js"></script>
<script src="js/loaders/MTLLoader.js"></script>
<script src="js/controls/OrbitControls.js"></script>
<script src="js/libs/stats.min.js"></script>
<script src="js/libs/dat.gui.min.js"></script>
<script src="js/libs/Tween.js"></script>
<script src="js/Projector.js"></script>
<script src="js/introthree.js"></script>
<script src="js/demo.js"></script>
<script src="js/anime.min.js"></script>
</html>