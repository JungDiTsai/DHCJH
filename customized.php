<?php
    $errMsg="";
    try{
        require_once("php/components/_connectDHC.php"); 

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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>台灣大舞台-電子花車客製</title>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- customzied css -->
    <link rel="stylesheet" href="css/customized.css">
    <!-- jQuery CDN -->
    <link rel="Shortcut Icon" type="image/x-icon" href="images/logo.ico">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
<input type="checkbox" id=menu_control>
<?php require_once("php/header.php"); ?>
<?php require_once("php/loginLightBox.php"); ?>

    <!-- customized start -->
    <div class="custBg">
        
        <!-- 客製步驟 -->
        <div class="custTitleWrap">
            <div class="custTitle titleBgi">
                <h3>客製舞台</h3>
            </div>
            <div class="custStep">
                <div class="btnCustStep custStep0 custSelected" id="custStage">
                    <h4>花車配備</h4>
                </div>
                <div class="btnCustStep custStep1" id="custDate">
                    <h4>日期地點</h4>
                </div>
                <div class="btnCustStep custStep2" id="custHost">
                    <h4>主持人</h4>
                </div>
                <div class="btnCustStep custStep3" id="custInfo">
                    <h4>訂單資訊</h4>
                </div>
            </div>
        </div>

        <div class="custWrap">
            <!-- 客製舞台 -->
            <div class="custStage">
                
                <!-- 舞台 -->
                <div class="stage">
                    <div class="stageView col-md-6">
                        <div class="perspective">
                            <div class="groupA">
                                <!-- 周邊細項 -->
                                    <!-- ? -->
                                <div class="stairsA"></div>
                                    <!-- ? -->
                                <div class="stairsB"></div>
                                    <!-- 壁屏 -->
                                <div class="stairsC1"></div>
                                <div class="stairsC2"></div>
                                <div class="stairsC3"></div>
                                <div class="stairsC4"></div>
                                <!-- 上壁屏 -->
                                <div class="stairsF"></div>
                                <div class="stairsF2"></div>
                                <div class="stairsF3"></div>
                                <div class="stairsF4"></div>
                                <!-- 舞台 -->
                                <div class="front"></div>
                                <div class="back"></div>
                                <div class="up"></div>
                                <div class="down"></div>
                                <div class="left"></div>
                                <div class="right"></div>
                                <!-- 跑馬燈 -->
                                <div class="subtitleAll disN">
                                    <div class="subtitles">
                                        <p>跑馬燈</p>
                                    </div>
                                    <div class="subtitles1"></div>
                                    <div class="subtitles2"></div>
                                </div>
                                <!-- 樓梯三角形 -->
                                <div class="triangleA"></div>
                                <div class="triangleB"></div>
                                <div class="triangleC"></div>
                                <div class="triangleD"></div>
                                <div class="triangleE"></div>
                                <div class="triangleF"></div>
                                <!-- 樓梯 -->
                                <div class="ladder ladderA"></div>
                                <div class="ladder ladderB"></div>
                                <div class="ladder ladderC"></div>
                                <div class="ladder ladderD"></div>
                                <div class="ladder ladderE"></div>
                                <div class="ladder ladderF"></div>
                                <div class="ladder ladderG"></div>
                                <div class="ladder ladderH"></div>
                                <!-- 燈柱 -->
                                <div class="headlightbox headlightbox0"></div>
                                <div class="headlightbox headlightbox1"></div>
                                <div class="headlightbox headlightbox2"></div>
                                <div class="headlightbox headlightbox3"></div>
                                <div class="headlightbox headlightbox4"></div>
                                <div class="headlightbox headlightbox5"></div>
                                <!-- 投射燈 -->
                                <div class="headlightAll disN">
                                    <!-- 中間投射燈 -->
                                    <div class="headlight headlight0"></div>
                                    <div class="headlight headlight1"></div>
                                    <div class="headlight headlight2"></div>
                                    <div class="headlight headlight3"></div>
                                    <!-- 左邊投射燈 -->
                                    <div class="headlight headlight4"></div>
                                    <div class="headlight headlight5"></div>
                                    <div class="headlight headlight6"></div>
                                    <div class="headlight headlight7"></div>
                                    <!-- 右邊投射燈 -->
                                    <div class="headlight headlight8"></div>
                                    <div class="headlight headlight9"></div>
                                    <div class="headlight headlight10"></div>
                                    <div class="headlight headlight11"></div>
                                </div>
                                <!-- 音箱 -->
                                <div class="audioAll">
                                    <div class="audioItem01">
                                        <!-- 左音箱 -->
                                        <div class="audioBox0"></div>
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
                                    </div>
                                    <div class="audioItem02">
                                        <!-- 左音箱 -->
                                        <div class="audioBox0"></div>
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
                                    </div>
                                    <div class="audioItem03">
                                        <!-- 左音箱 -->
                                        <div class="audioBox0"></div>
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
                                    </div>
                                </div>    
                                <!-- 鋼管 -->
                                <div class="poleAll">
                                    <div class="pole1">
                                        <div class="poleItem"></div>
                                    </div>
                                    <div class="pole2">
                                        <div class="poleItem"></div>
                                        <div class="poleItem"></div>
                                        <div class="poleItem"></div>
                                    </div>
                                    <div class="pole3">
                                        <div class="poleItem"></div>
                                        <div class="poleItem"></div>
                                        <div class="poleItem"></div>
                                        <div class="poleItem"></div>
                                        <div class="poleItem"></div>
                                    </div>
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
                        <div class="stageControl">
                            <div class="btnRotL">
                                <img src="images/customized/cust_stage_innerPattern/cust_stage_control_rotate_right.svg" alt="">
                            </div>
                            <div class="btnCenter">
                                <img src="images/customized/cust_stage_innerPattern/cust_stage_control_rotate_center.svg" alt="">
                            </div>
                            <div class="btnRotR">
                                <img src="images/customized/cust_stage_innerPattern/cust_stage_control_rotate_right.svg" alt="">
                            </div>
                        </div>
                    </div>

                    <!-- 客製舞台步驟 -->
                    <div class="custAllItem col-md-6">
                        <!-- 客製舞台步驟 -->
                        <ul class="custStageStep">
                            <li class="btnCustStageStep custStageSelected" id="stagePattern">
                                <div class="stageInfoRotate">
                                    <img src="images/customized/new_cust/stage_item_pattern_icon.svg" alt="">
                                    <p>塗裝</p>
                                </div>
                            </li>
                            <li class="btnCustStageStep" id="stageDance">
                                <div class="stageInfoRotate">
                                    <img src="images/customized/new_cust/stage_item_dance_icon.svg" alt="">
                                    <p></p>
                                </div>
                            </li>
                            <li class="btnCustStageStep" id="stageEffect">
                                <div class="stageInfoRotate">
                                    <img src="images/customized/new_cust/stage_item_effect_icon.svg" alt="">
                                    <p></p>
                                </div>
                            </li>
                            <li class="btnCustStageStep" id="stageSubtitle">
                                <div class="stageInfoRotate">
                                    <img src="images/customized/new_cust/stage_item_subtitle_icon.svg" alt="">
                                    <p></p>
                                </div>
                            </li>
                            <li class="btnCustStageStep" id="stageaudioNPole">
                                <div class="stageInfoRotate">
                                    <img src="images/customized/new_cust/stage_item_audio_icon.svg" alt="">
                                    <p></p>
                                </div>
                            </li>
                        </ul>

                        <div class="custStageAll">
                            <!-- 塗裝 -->
                            <div class="custItem patternItem">
                                <div class="custItemContent patternItemContent">
                                    <div class="patternWrap">
                                        <!-- <form action="_fileUpload.php" method="POST" enctype="multipart/form-data"> -->
                                        <!-- <input type="hidden" name="MAX_FILE_SIZE" value="2048"> -->
                                        <label for="patternUpload">
                                            <input type="file" name="patternUpload" id="patternUpload">
                                            <!-- <img src="images/customized/cust_stage_innerPattern/pattern_upload.svg" alt=""> -->
                                        </label>
                                        <!-- </form> -->
                                        <?php while( $draw = $draws->fetch(PDO::FETCH_ASSOC) ){ ?>
                                        <img src="<?php echo $draw["drawImgUrl"]; ?>" alt="">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <!-- 舞團 -->
                            <div class="custItem danceItem">
                                <div class="custItemContent">
                                <?php 
                                    $sql = "select * from troupe";
                                    $troupes = $pdo->query($sql);
                                    $i=1;
                                    while ( $troupe = $troupes->fetch(PDO::FETCH_ASSOC)){
                                ?>
                                    <div id="danceDetail<?php echo $i ?>" class="custItemContentInfo">
                                        <img src="<?php echo $troupe["troupeImgUrl"]; ?>" alt="">
                                        <p><?php echo $troupe["troupeName"]; ?></p>
                                        <p troupeNo="<?php echo $troupe["troupeNo"]; ?>">$<?php echo $troupe["troupePrice"]; ?></p>
                                    </div>
                                <?php $i++; }?>
                                </div>
                            </div>
                            <!-- 特效 -->
                            <div class="custItem effectItem">
                                <div class="custItemContent">
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
                                    <?php
                                        $i = 1;
                                        while( $firework = $fireworks->fetch(PDO::FETCH_ASSOC) ){
                                    ?>
                                    <div id="fireworkEffect<?php echo $i ?>" class="custItemContentInfo fireworkInfo">
                                        <img src="<?php echo $firework["fireworkImgUrl"] ?>" alt="">
                                        <p><?php echo $firework["fireworkName"] ?></p>
                                        <p fireworkNo="<?php echo $firework["fireworkNo"]; ?>" >$<?php echo $firework["fireworkPrice"] ?></p>
                                    </div>
                                    <?php $i++; } ?>
                                </div>
                            </div>
                            <!-- 字幕 -->
                            <div class="custItem subtitleItem">
                                <div class="custItemContent">
                                    <div class="custItemContentInfo">
                                        <textarea id="subtileItemInfo" cols="30" rows="3" maxlength="30" placeholder="請輸入您想要呈現的文字"></textarea>
                                    </div>
                                </div>
                                <div class="custItemControl">
                                    <div class="color-picker">
                                        <div class="cont">
                                            <div class="hue">
                                                <div class="bg"></div>
                                                <div class="range"><input type="range" min="0" max="360" value="0"></div>
                                            </div>
                                            <div class="lightness">
                                                <div class="bg"></div>
                                                <div class="range"><input type="range" min="0" max="100" value="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 音響 -->
                            <div class="custItem audioPoleItem">
                                <div class="custItemContent">
                                    <?php
                                        $i=1;
                                        while( $audio = $audios->fetch(PDO::FETCH_ASSOC)){ 
                                    ?>   
                                    <div id="audioItem<?php echo $i; ?>" class="custItemContentInfo audioInfo">
                                        <img src="<?php echo $audio["audioImgUrl"]; ?>" alt="">
                                        <p><?php echo $audio["audioName"]; ?></p>
                                        <p audioNo="<?php echo $audio["audioNo"]; ?>" >$<?php echo $audio["audioPrice"]; ?></p>
                                    </div>
                                    <?php $i++; } ?>
                                    <?php
                                        $i=1;
                                        while( $pipe = $pipes->fetch(PDO::FETCH_ASSOC)){ 
                                    ?>      
                                    <div id="pole<?php echo $i ?>" class="custItemContentInfo poleInfo">
                                        <img src="<?php echo $pipe["pipeImgUrl"]; ?>" alt="">
                                        <p><?php echo $pipe["pipeName"]; ?></p>
                                        <p pipeNo="<?php echo $pipe["pipeNo"]; ?>" >$<?php echo $pipe["pipePrice"]; ?></p>
                                    </div> 
                                    <?php $i++; } ?>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <!-- 日期與地點 -->
            <div class="dateNLoc">
                <!-- calendar -->
                <table class="calendar">
                    <thead>
                        <tr>
                            <td id="prevMon" rowspan="2"><i class="fa fa-chevron-left" aria-hidden="true"></i></td>
                            <td id="calendarTitle" colspan="5">Month</td>
                            <td id="nextMon" rowspan="2"><i class="fa fa-chevron-right" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td id="calendarYear" colspan="5">Year</td>
                        </tr>
                        <tr id="weekdate">
                            <th>日</th>
                            <th>一</th>
                            <th>二</th>
                            <th>三</th>
                            <th>四</th>
                            <th>五</th>
                            <th>六</th>
                        </tr>
                    </thead>
                    <tbody id="caleBody">
                    </tbody>
                </table>
                
                <div class="infoNLoc"> 
                    <div class="dateChoose">
                        <p>選擇日期：
                            <span></span>
                         <span id="weather"></span>
                        </p>
                        
                    </div>
                    
                    <!-- loc -->
                    <div class="loc">
                        <div class="locInput">
                            <input id="locText" type="text" placeholder="請輸入活動地址">
                        </div>
                        <div class="map">
                            <iframe src='https://maps.google.com.tw/maps?f=q&hl=zh-TW&geocode=&q=中央大學資策會&z=16&output=embed&t='></iframe>
                        </div> 
                    </div>
                </div>
            </div>

            <!-- 主持人 -->
            <div class="hostInfo">
                <div class="hostWrap">
                    <div class="hostSliderBox">
                        <?php 
                            while ($host = $hosts->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <div class="hostInfoDetail">
                            <img src="<?php echo $host["hostImgUrl"] ?>" alt="">
                            <h6><span hostNo="<?php echo $host["hostNo"]?>"><?php echo $host["hostName"]?></span><span>$<?php echo $host["price"]?></span></h6>
                            <ul>
                                <li><?php echo $host["hostContent"]?></li>
                            </ul>
                            <div class="card">
                                <canvas class="chartRadar" width="260" height="180"></canvas>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <!-- 訂單資訊 -->
            <div class="orderInfo">
                <div class="orderDateNloc">
                    <p class="orderDate">選擇日期：<span></span></p>
                    <p class="orderLoc">活動地點：<span></span></p>
                    <div id="orderStage">
                        <div id="orderStagePic" class="perspective">
                            <div class="groupA">
                                <!-- 周邊細項 -->
                                    <!-- ? -->
                                <div class="stairsA"></div>
                                    <!-- ? -->
                                <div class="stairsB"></div>
                                    <!-- 壁屏 -->
                                <div class="stairsC1"></div>
                                <div class="stairsC2"></div>
                                <div class="stairsC3"></div>
                                <div class="stairsC4"></div>
                                <!-- 上壁屏 -->
                                <div class="stairsF"></div>
                                <div class="stairsF2"></div>
                                <div class="stairsF3"></div>
                                <div class="stairsF4"></div>
                                <!-- 舞台 -->
                                <div class="front"></div>
                                <div class="back"></div>
                                <div class="up"></div>
                                <div class="down"></div>
                                <div class="left"></div>
                                <div class="right"></div>
                                <!-- 跑馬燈 -->
                                <div class="subtitleAll disN">
                                    <div class="subtitles">
                                        <p>跑馬燈</p>
                                    </div>
                                    <div class="subtitles1"></div>
                                    <div class="subtitles2"></div>
                                </div>
                                <!-- 樓梯三角形 -->
                                <div class="triangleA"></div>
                                <div class="triangleB"></div>
                                <div class="triangleC"></div>
                                <div class="triangleD"></div>
                                <div class="triangleE"></div>
                                <div class="triangleF"></div>
                                <!-- 樓梯 -->
                                <div class="ladder ladderA"></div>
                                <div class="ladder ladderB"></div>
                                <div class="ladder ladderC"></div>
                                <div class="ladder ladderD"></div>
                                <div class="ladder ladderE"></div>
                                <div class="ladder ladderF"></div>
                                <div class="ladder ladderG"></div>
                                <div class="ladder ladderH"></div>
                                <!-- 燈柱 -->
                                <div class="headlightbox headlightbox0"></div>
                                <div class="headlightbox headlightbox1"></div>
                                <div class="headlightbox headlightbox2"></div>
                                <div class="headlightbox headlightbox3"></div>
                                <div class="headlightbox headlightbox4"></div>
                                <div class="headlightbox headlightbox5"></div>
                                <!-- 投射燈 -->
                                <div class="headlightAll disN">
                                    <!-- 中間投射燈 -->
                                    <div class="headlight headlight0"></div>
                                    <div class="headlight headlight1"></div>
                                    <div class="headlight headlight2"></div>
                                    <div class="headlight headlight3"></div>
                                    <!-- 左邊投射燈 -->
                                    <div class="headlight headlight4"></div>
                                    <div class="headlight headlight5"></div>
                                    <div class="headlight headlight6"></div>
                                    <div class="headlight headlight7"></div>
                                    <!-- 右邊投射燈 -->
                                    <div class="headlight headlight8"></div>
                                    <div class="headlight headlight9"></div>
                                    <div class="headlight headlight10"></div>
                                    <div class="headlight headlight11"></div>
                                </div>
                                <!-- 音箱 -->
                                <div class="audioAll">
                                    <div class="audioItem01">
                                        <!-- 左音箱 -->
                                        <div class="audioBox0"></div>
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
                                    </div>
                                    <div class="audioItem02">
                                        <!-- 左音箱 -->
                                        <div class="audioBox0"></div>
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
                                    </div>
                                    <div class="audioItem03">
                                        <!-- 左音箱 -->
                                        <div class="audioBox0"></div>
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
                                    </div>
                                </div>    
                                <!-- 鋼管 -->
                                <div class="poleAll">
                                    <div class="pole1">
                                        <div class="poleItem"></div>
                                    </div>
                                    <div class="pole2">
                                        <div class="poleItem"></div>
                                        <div class="poleItem"></div>
                                        <div class="poleItem"></div>
                                    </div>
                                    <div class="pole3">
                                        <div class="poleItem"></div>
                                        <div class="poleItem"></div>
                                        <div class="poleItem"></div>
                                        <div class="poleItem"></div>
                                        <div class="poleItem"></div>
                                    </div>
                                </div>
                                <!-- 特效 -->
                                <div class="effectAll">
                                    <div class="fireEffect">
                                        <?php 
                                            $sql = "select * from effects";
                                            $effects = $pdo->query($sql);
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
                                    $sql = "select * from troupe";
                                    $troupes = $pdo->query($sql);
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
                </div>
                
                <div class="orderDetail">
                    <div class="orderText">
                        <h5 class="orderSub">金額總計：<span></span>元</h5>
                        <input id="orderName" type="text" placeholder="花車名稱(八個字以內)" maxlength="8" required>
                    </div>
                    <div class="orderDetailCust">
                        <h6>舞台配備</h6>
                        <table>
                            <tr id="orderPattern">
                                <th>塗裝：</th>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr id="orderDance">
                                <th>舞團：</th>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr id="orderFire">
                                <th>火焰：</th>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr id="orderFirework">
                                <th>煙火：</th>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr id="orderAudio">
                                <th>音響：</th>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr id="orderPole">
                                <th>鋼管：</th>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>字幕機：</th>
                                <td>贈送</td>
                                <td>0</td>
                            </tr>
                            <tr id="orderHost">
                                <th>主持人：</th>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- 步驟按鈕 -->
        <div class="btnStep">
            <div class="previousStep commonBtnSmall"></div>
            <div class="nextStep commonBtnSmall"></div>
        </div>
        
    </div>

    <!-- checkout -->
    <div class="checkoutBg disN">
        <div class="checkoutTitle titleBgi">
            <h3>結 帳</h3>
        </div>
        
        <!-- 訂購人資訊 -->
        <div class="checkoutInfo col-12">
            <div id="checkoutClose"></div>
            <div class="checkoutOrder">
                <!-- 總金額 -->
                <p><span>0</span>圓</p>
            </div>
        </div>

        <div class="checkOutAll col-12">    
            <!-- 訂購人資料 -->
            <form action="#" class="checkoutInfoForm col-12 col-lg-6">
                <h4>訂購人資訊</h4>
                <table>
                    <tr>
                        <th><label for="orderPerName">姓名</label></th>
                        <td>
                            <input type="text" id="orderPerName">
                        </td>
                    </tr>
                    <tr>
                        <th><label for="orderEmail">信箱</label></th>
                        <td><input type="email" name="orderEmail" id="orderEmail"></td>
                    </tr>
                    <tr>
                        <th><label for="orderPhone">聯絡電話</label></th>
                        <td><input type="text" id="orderPhone" placeholder="0911-111111"></td>
                    </tr>
                    <tr>
                        <th>折價券</th>
                        <td>
                            <select name="couponUse" id="couponUse">                                
                                <!-- <option value="0">無</option>
                                <option class="memCoupons" value="0">無</option> -->
                            </select>
                        </td>
                    </tr>
                </table>
            </form>
            <!-- 信用卡資訊 -->
            <form action="" class="cardInfo col-12 col-lg-6">
                <h4>付款資訊</h4>
                <table>
                    <tr>
                        <th><label for="cardHolderName">持卡人姓名</label></th>
                        <td><input type="text" id="cardHolderName"></td>
                    </tr>
                    <tr>
                        <th><label for="cardNum" placeholder="1111-1111-1111-1111">信用卡號碼</label></th>
                        <td><input type="text" id="cardNum" maxlength="19"></td>
                    </tr>
                    <tr>
                        <th><label for="cardExpiredDate">到期日期</label></th>
                        <td><input type="text" id="cardExpiredDate" placeholder="MM/YY" maxlength="5"></td>
                    </tr>
                    <tr>
                        <th><label for="cardCVC">CVC</label></th>
                        <td><input type="text" id="cardCVC" maxlength="3"></td>
                    </tr>
                </table>
            </form>
        </div>

        <!-- 確認結帳 -->
        <div class="paymentStep">
            <div class="checkoutStep commonBtnSmall">確認付款</div>
        </div>  

    </div>

    <!-- 結帳等待燈箱 -->
    <div class="waitLightBox disN">
        <div class="waitTitle">
            <h4>結帳中，請稍後</h4>
        </div>
    </div>
    <!-- 未填寫日期地址燈箱 -->
    <div class="mustLightBox disN">
        <div class="mustTitle">
            <h4>請選擇活動日期與地址</h4>
        </div>
        <div class="mustBtn commonBtnSmall">確定</div>
    </div>
    <!-- 結帳完成燈箱 -->
    <div class="endLightBoxBg disN">
        <div class="endLightBox disN">
            <div class="endTitle">
                <h3>結帳完成</h3>
                <p>感謝您對於台灣大舞台的支持</p>
            </div>
            <a class="commonBtn" href="flyer.php">客製宣傳單</a>
            <p>您可以客製您的活動宣傳單，並由台灣大舞台為您宣傳。</p>
            <!-- <a class="commonBtn" href="beautyPageant.php">參加選美</a> -->
            <div class="endBtn commonBtnSmall">返回</div>
        </div>
    </div>


    

    <!-- 多數功能 -->
    <script src="js/custStepPage.js?<?php echo time();?>"></script>
    <!-- 舞台背景客製 -->
    <script src="js/custAddPattern.js?<?php echo time();?>"></script>
    <!-- 舞台背景功能按鈕 -->
    <script src="js/custFunctionBtn.js?<?php echo time();?>"></script>
    <!-- 雷達圖內容 -->
    <script src="js/custRadarChart.js?<?php echo time();?>"></script>
    <!-- for radar chart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <!-- domtoimage -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
    <!-- API -->
    <script src="js/api.js?<?php echo time();?>"></script>
    <script src="js/navmenu.js"></script>
    <script src="js/_custLogin.js?<?php echo time();?>"></script>
    <script src="js/_font_loginLightBox.js"></script>
</body>
</html>