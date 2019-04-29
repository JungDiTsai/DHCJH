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
=======
    <?php require_once("php/uploadbeauty.php");?>
    <script src="js/_login.js"></script>
    <script src="js/_font_loginLightBox.js"></script>
>>>>>>> ee1f6061ae65be512238b8b9aa6e483557bd014f
    <!-- beauty pageant 第一屏幕 -->
    <div class="beautyPageantWrap">
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
                    <div id="beautyRankingbg1" class="beautyRankingbg">
                        <img src="images/beautyPageant/rank/newVersionStage1.png" alt="">
                        <h3>霹靂大舞台</h3>
                        <div class="beautyRankingSocialBtns">
                            <i class="far fa-heart"></i>
                            <i class="far fa-comment" alt="留言"></i>
                            <i class="fas fa-external-link-alt" alt="分享"></i>
                            <i class="far fa-bookmark" alt="分享"></i>
                        </div>
                        <p class="likeCount">891個喜歡</p>
                    </div>
                    <div id="beautyRankingbg2" class="beautyRankingbg">
                       <img src="images/beautyPageant/rank/newVersionStage2.png"  alt=""onclick="window.location.href='beautyDiscuss.html'">
                        <h3>超級大舞台</h3>
                        <div class="beautyRankingSocialBtns">
                            <i class="far fa-heart"></i>
                            <i class="far fa-comment" alt="留言"></i>
                            <i class="fas fa-external-link-alt" alt="分享"></i>
                            <i class="far fa-bookmark" alt="分享"></i>
                        </div>
                        <p class="likeCount">1622個喜歡</p>
                    </div>
                    <div id="beautyRankingbg3" class="beautyRankingbg">
                        <img src="images/beautyPageant/rank/newVersionStage3.png" alt="">
                        <h3>火花大舞台</h3>
                        <div class="beautyRankingSocialBtns">
                            <i class="fas fa-heart"></i>
                            <i class="far fa-comment" alt="留言"></i>
                            <i class="fas fa-external-link-alt" alt="分享"></i>
                            <i class="far fa-bookmark" alt="分享"></i>
                        </div>
                        <p class="likeCount">384個喜歡</p>
                    </div>
                </div>
                <div id="beautyRankingimgsMonth">
                    <div id="beautyRankingbg4" class="beautyRankingbg">
                        <img src="images/beautyPageant/rank/newVersionStage2.png" alt="">
                        <h3>台南大舞台</h3>
                        <div class="beautyRankingSocialBtns">
                            <i class="far fa-heart"></i>
                            <i class="far fa-comment" alt="留言"></i>
                            <i class="fas fa-external-link-alt" alt="分享"></i>
                            <i class="far fa-bookmark" alt="分享"></i>
                        </div>
                        <p class="likeCount">123個喜歡</p>
                    </div>
                    <div id="beautyRankingbg5" class="beautyRankingbg">
                        <img src="images/beautyPageant/rank/newVersionStage3.png" alt="">
                        <h3>嬤嬤大舞台</h3>
                        <div class="beautyRankingSocialBtns">
                            <i class="far fa-heart"></i>
                            <i class="far fa-comment" alt="留言"></i>
                            <i class="fas fa-external-link-alt" alt="分享"></i>
                            <i class="far fa-bookmark" alt="分享"></i>
                        </div>
                        <p>789個喜歡</p>
                    </div>
                    <div id="beautyRankingbg6" class="beautyRankingbg">
                        <img src="images/beautyPageant/rank/newVersionStage1.png" alt="">
                        <h3>花火大舞台</h3>
                        <div class="beautyRankingSocialBtns">
                            <i class="far fa-heart"></i>
                            <i class="far fa-comment" alt="留言"></i>
                            <i class="fas fa-external-link-alt" alt="分享"></i>
                            <i class="far fa-bookmark" alt="分享"></i>
                        </div>
                        <p class="likeCount">456個喜歡</p>
                    </div>
                </div>
                <div class="paginationPanel">
                    <ul class="pagination">
                        <li id="dot0" class="pageDot"></li>
                        <li id="dot1" class="pageDot"></li>
                        <li id="dot2" class="pageDot"></li>
                    </ul>
                </div>
            </div>
        </div> 
        <div id="musicContent">
            <canvas id="canvasMusic"></canvas>
            <audio id="audioMusic" controls autoplay loop style="display : none" src="audios\backloop.mp3"></audio>
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
                    排序:<select name="" id="">
                            <option value="" disabled selected hidden>顯示順序</option>
                            <option value="">上傳時間</option>
                            <option value="">喜歡數</option>
                        </select>
                    </div>
                </form>
                <i class="fas fa-plus-circle" alt="參加選美"></i>
            </div>
            <div class="beautyDiscStageContainer">
             <?php /*require_once("php/beautyDiscIg.php");*/?>
             <?php require_once("php/beautyDiscIg.php");?>
            </div>
        </div>
    </div>

    <footer>
            <p>Copyright © 2019 Taiwan Great Stage Inc.</p>
            <p>All rights reserved</p>
            <div>
                <a href="#"><img src="images/facebook (1).png" alt="FB"></a> 
                <a href="#"><img src="images/instagram (1).png" alt="IG"></a> 
                <a href="#"><img src="images/youtube (1).png" alt="YouTube"></a>        
            </div>
        </footer>
    <script src="js/beautyRankingScale.js"></script>
    <script src="js/beautyPagentSwipe.js"></script>
    <script>
        
       
    </script>
    <script src="js/musicBar.js"></script>
    <script src="js/dotReport.js"></script>
    <script src="js/navmenu.js"></script>
    <script src="js/discoBall.js"></script>
<<<<<<< HEAD
=======
    
>>>>>>> ee1f6061ae65be512238b8b9aa6e483557bd014f
</body>
</html>