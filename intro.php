<!DOCTYPE html5>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="Shortcut Icon" type="image/x-icon" href="images/logo.ico">
    <link rel="stylesheet" href="css/intro.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet"  href="css/base.css" />
    <link rel="stylesheet"  href="css/demo.css" />
    <script src="js/jquery-3.3.1.min.js"></script>

    <style type="text/css">
    #teamIntroWrap{
        background-image:url(images/teamIntroBgi.jpg) ;
        background-size:cover ;
        background-position:center ;
    }
    .sliderBox{
        outline: 1px solid #000;
        height: 100vh;
        position: relative;
        color: beige;
        transform: scale(.9);
    }
    .sliderBox .introBox{
        background-image:url(images/teamIntroBgi.png);
        width: 300px;
        height: 500px;
        position: absolute;
        top:50%;
        transform: translateX(-50%) translateY(-50%);
        /* 對文字做設定 */
        line-height: 40px;
        color:#000;
        text-align: center;
        font-size: 50px;
        
    }

    #a1{
        /* background: rgb(255, 251, 0); */
        z-index: 3;
        opacity: 1;
        filter: drop-shadow(0px 0px 35px rgb(255, 248, 187));
    }
    #a2{
        /* background: rgb(8, 168, 8); */
        z-index: 2;
        transform: translateX(-50%) translateY(-50%) scale(0.7);
    }
    #a3{
        /* background: rgb(12, 143, 12); */
        z-index: 1;
        transform: translateX(-50%) translateY(-50%) scale(0.4);
    }
    #a4{
        /* background: rgb(247, 255, 170); */
        z-index: 1;
        transform: translateX(-50%) translateY(-50%) scale(0.4);
    }
    #a5{
        /* background: #aff; */
        z-index: 1;
        transform: translateX(-50%) translateY(-50%) scale(0.7);
    }
    .memImg{
      width: 100px;
        /* transform: translateX(100%) translateY(100%); */
        float: left;
    }
    .memImg img{
        margin-top: 0px;
        margin-left: -135px;
        width: 120%;
        transform: translateX(50%);
        filter: drop-shadow(0px 0px 15px rgb(255, 248, 187));

    }
    .introductionSec{  
        margin-top: 40px;
        width:190px;
        float: left;
        font-size: 22px;
        color: beige;
    }
    .introductionSec li{
        list-style:none;
        margin-left: -80px;
        color: beige;
        font-size: 18px;
        line-height: 32px;
        z-index:5;
        font-family:"微軟正黑體";
    }
    .introBox{
        opacity: 0.6;
        transition: 1s ease;
    }
    .introBox h5{
        margin-top:100px;
        font-size: 40px;
        line-height: 0px;
        color: beige;
        font-family:"微軟正黑體";
        
    }
    .introBox p{
        font-size: 16px;
        line-height: 0px;
        color: beige;
        margin-top: 40px;
        font-family:"微軟正黑體";
    }

    </style>
</head>

<body onload="draw();">
    <input type="checkbox" id=menu_control>
    <?php require_once("php/header.php");?>
    <?php require_once("php/loginLightBox.php");?>
    <!-- intro first scene-->	
    <script src="js/_login.js"></script>
    <script src="js/_font_loginLightBox.js"></script>
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
                      <h2 class="titleBgi introTimeTitle">在地與國際</h2>
                      <p class="excerpt">「台灣大舞台」代表台灣參加 巴西嘉年華， 並在72個國家596支參賽隊 伍中奪的金牌， 這份殊榮不只是肯定我們團 隊，也證明了台灣文化的魅 力。</p>
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
                      <h2 class="titleBgi introTimeTitle">酬神與謝神</h2>
                      <p class="excerpt">威尼斯嘉年華會是義大利威尼斯最重要的慶典之一，每年都在大齋首日前2個禮拜開始，並在懺悔節結束；此慶典是以各式各樣精美製作的面具而聞名於世。</p>
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
                    <span class="title">2016閃閃嘉年華</span>
                  </span>
                  <span class="more__element">
                    <span class="content">
                      <h2 class="titleBgi introTimeTitle">台灣大舞台</h2>
                      <p class="excerpt">閃閃嘉年華，我們試圖以舞台車嫣然綻放的壯觀意象，隱喻為台灣人民蓬勃的生命氣息，以乘載著島國文化之獨特美學，去呼應台灣搖滾的生猛力道。</p>
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
    <div id="teamIntroWrap">
<<<<<<< HEAD
=======
      <div class="titleBgi">工人介紹</div>
>>>>>>> ec9dec12ef877dd006de92ebdca04af0126cc5b2
    <div class="sliderBox">
       <div class="introBox" id="a1" style="left:50%">
           <h5>蔡仲廸</h5>
           <p>Jundi Tsai</p>
           <div class="memImg">
               <img src="images/teamMemberJ.png" alt="蔡仲廸">
           </div>
           <div class="introductionSec">
               
               <ul>
                   <li>組長擔當</li>
                   <li>選美頁撰寫</li>
                   <li>選美討論區</li>
                   <li>選美收藏功能</li>
                   <li>大舞台故事頁面設計</li>
                   <li>大舞台故事頁面撰寫</li>
                   <li>header撰寫</li>
               </ul>

           </div>
       </div>
       <div class="introBox" id="a2" style="left:30%">
            <h5>洪婉琪</h5>
            <p>Hall Hong</p>
            <div class="memImg">
                <img src="images/teamMemberH.png" alt="蔡仲廸">
            </div>
            <div class="introductionSec">
                    
                    
                    
                    
                    
                
                <ul>
                    <li></li>
                    <li>後端登入頁面</li>
                    <li>後端所有頁面</li>
                    <li>後端所有功能</li>
                    <li>串接天氣API</li>
                    <li>選美燈箱頁面</li>
                    <li>首頁賽車遊戲</li>
                </ul>

            </div>
       </div>
       <div class="introBox" id="a3" style="left:40%">
            <h5>陳俊昊</h5>
            <p>Hao Chen</p>
            <div class="memImg">
                <img src="images/teamMemberHow.png" alt="蔡仲廸">
            </div>
            <div class="introductionSec">
                
                <ul>
                    <li>Wireframe繪製</li>
                    <li>客製舞台頁面設計</li>
                    <li>客製舞台頁面功能</li>
                    <li>客製頁面資料串接</li>
                    <li>舞台配件繪製</li>
                    <li>客製舞台流程規劃</li>
                    <li>PPT製作</li>
                </ul>

            </div>
       </div>
       <div class="introBox" id="a4" style="left:60%">
            <h5>楊竣宇</h5>
            <p>Jeff oung</p>
            <div class="memImg">
                <img src="images/teamMemberJeff.png" alt="蔡仲廸">
            </div>
            <div class="introductionSec">
                
                <ul>
                    <li>3D舞台模板建形</li>
                    <li>會員中心頁面撰寫</li>
                    <li>客製宣傳單頁面撰寫</li>
                    <li>MySQL資料庫建立</li>  
                    <li>前台登入頁面撰寫</li>
                    <li>串接Gmail API</li>
                    <li>體驗客製宣傳單 </li>
                    <li>Restful API撰寫</li>
                </ul>

            </div>
       </div>
       <div class="introBox" id="a5" style="left:70%">
            <h5>侯建呈</h5>
            <p>Danny Hou</p>
            <div class="memImg">
                <img src="images/teamMemberDanny.png" alt="蔡仲廸">
            </div>
            <div class="introductionSec">
                
                <ul>
                    <li>UI元件設計</li>
                    <li>UI整體統整</li>
                    <li>首頁設計撰寫</li>
                    <li>客服機器人撰寫</li>
                    <li>Loading動畫撰寫</li>
                    <li>成員介紹頁撰寫</li>
                    <li>客服機器人功能</li>
                    <li>選美投票功能</li>
                </ul>

            </div>
       </div>
    
    </div>
    </div>
    
    <script>
    document.querySelector('.sliderBox').addEventListener('click',function(){
        let allDiv = document.querySelectorAll('.sliderBox div')
        for (let key in allDiv) {
            let style = allDiv[key].style.left;
            switch (style) {
                case "50%":
                    allDiv[key].style.setProperty("left","30%");
                    allDiv[key].style.setProperty("transition",".5s");
                    allDiv[key].style.setProperty("transform","translateX(-50%) translateY(-50%) scale(0.7)");
                    allDiv[key].style.setProperty("z-index","2");
                    allDiv[key].style.setProperty("opacity",".6");
                    allDiv[key].style.setProperty("filter"," drop-shadow(0px 0px 0px rgb(255, 248, 187))");
                    break;
                case "30%":
                    allDiv[key].style.setProperty("left","40%");
                    allDiv[key].style.setProperty("transition",".5s");
                    allDiv[key].style.setProperty("transform","translateX(-50%) translateY(-50%) scale(0.4)");
                    allDiv[key].style.setProperty("z-index","1");
                    allDiv[key].style.setProperty("opacity",".6");
                    allDiv[key].style.setProperty("filter"," drop-shadow(0px 0px 0px rgb(255, 248, 187))");
                    break;
                case "70%":
                    allDiv[key].style.setProperty("left","50%");
                    allDiv[key].style.setProperty("transition",".5s");
                    allDiv[key].style.setProperty("transform","translateX(-50%) translateY(-50%) scale(1)");
                    allDiv[key].style.setProperty("z-index","3");
                    allDiv[key].style.setProperty("opacity","1");
                    allDiv[key].style.setProperty("filter"," drop-shadow(0px 0px 35px rgb(255, 248, 187))");
                    break;
                case "40%":
                    allDiv[key].style.setProperty("left","60%");
                    allDiv[key].style.setProperty("transition",".5s");
                    allDiv[key].style.setProperty("transform","translateX(-50%) translateY(-50%) scale(0.4)");
                    allDiv[key].style.setProperty("z-index","1");
                    allDiv[key].style.setProperty("opacity",".6");
                    allDiv[key].style.setProperty("filter"," drop-shadow(0px 0px 0px rgb(255, 248, 187))");
                    break;
                case "60%":
                    allDiv[key].style.setProperty("left","70%");
                    allDiv[key].style.setProperty("transition",".5s");
                    allDiv[key].style.setProperty("transform","translateX(-50%) translateY(-50%) scale(0.7)");
                    allDiv[key].style.setProperty("z-index","2");
                    allDiv[key].style.setProperty("opacity",".6");
                    allDiv[key].style.setProperty("filter"," drop-shadow(0px 0px 0px rgb(255, 248, 187))");
                    break;
                default:
                    break;
            }
        }
    })</script>
    
    <!-- <div class="introTime">
        <h2 class="titleBgi introTimeTitle">團隊介紹</h2>   
        <div class="introStage">
      
          <div class="people">
              <img class="peopleFirst" src="images/intro/intropeople1-1.png" alt="">
                  <img class="peopleSec" src="images/intro/intropeople2-1.png" alt="">
                  <img class="peopleThree" src="images/intro/intropeople3-1.png" alt="">
                  <img class="peopleFourth" src="images/intro/intropeople4-1.png" alt="">
                  <img class="peopleFiv" src="images/intro/intropeople5-1.png" alt="">

              </div> -->
              <!-- 跑馬燈 -->
              <!-- <div class="led">
                  <marquee direction="right" height="30" scrollamount="5" behavior="alternate">團隊介紹</marquee>
              </div>
          </div>
      </div> -->
      <?php // require_once("php/footer.php"); ?>




  
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
<script src="js/navmenu.js"></script>
</html>