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
    <script src="js/jquery-3.3.1.min.js"></script>
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