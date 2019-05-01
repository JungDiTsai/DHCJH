$(document).ready(function(){
    
    $('.danceItem, .effectItem, .subtitleItem, .audioPoleItem, .dateNLoc, .hostInfo, .orderInfo').addClass('disN');
    
    // 客製花車步驟---start
    var index = 0;
    $('.previousStep').text('重新選擇');
    $('.nextStep').text('下一步');
    // 上一步
    $('.previousStep').bind('click', function(){
        if( index > 0 ){
            index--;
            controlContent(index);
        }else if( index == 0){
            //舞台回到中心
            custReset();
            
        }
    });
    // 下一步
    $('.nextStep').bind('click', function(){
        if( index < 2 ){
            index++;
            controlContent(index);
        }else if( index == 2){
            index++;
            controlContent(index);
            getOrderInfo();
        }
        else if( index == 3){
            //判斷登入
            datevalue = $('.orderDate span').text();
            locValue = $('.orderLoc span').text();
            if( datevalue == '' || locValue == ''){
                // 顯示須填寫燈箱
                $('.mustLightBox').removeClass('disN')
            }else{
                if(LoginState=="notFound"){
                    // 顯示登入燈箱
                    let loginBox = document.querySelector('.loginBox');
                    let style = window.getComputedStyle(loginBox, null).getPropertyValue('display');
                    if (style == "block") {
                        loginBox.style.setProperty('display', "none");
                    }else{
                        loginBox.style.setProperty('display', "block");
                    }
                }else{
                    $('.checkoutBg').removeClass('disN');  //準備結帳
                }
            }
        }
    });

    //讓點選index與下方共用
    $('.btnCustStep').click(function(){
        index = $(this).index();
        $(this).addClass('custSelected').siblings().removeClass('custSelected');
        controlContent(index);
        if( index == 3){
            getOrderInfo();
        }
    });
    // 客製花車步驟---end

    // 客製花車內容步驟tab---start
    $('.btnCustStageStep').click(function(){
        var indexStage = 0;
        $(this).addClass('custStageSelected').siblings().removeClass('custStageSelected');
        indexStage = $(this).index();
        
        $('.custItem').eq(indexStage).removeClass('disN').siblings().addClass('disN');
        //所有換面

        $('.btnCustStageStep').css("transform", "rotateY(0deg)");
        $('.btnCustStageStep').children().css("transform", "rotateY(0deg)");
        for(i=0; i<=indexStage; i++){
            $('.btnCustStageStep').eq(i).css("transform", "rotateY(180deg)");
            $('.btnCustStageStep').eq(i).children().css("transform", "rotateY(-180deg)");
            // $('.rotateTest').css("transform", "rotateY(-180deg)");
        }
        switch (indexStage){
            case 0:
                $('.btnCustStageStep p').text("");
                $('#stagePattern p').text("塗裝");
                break;
            case 1:
                $('.btnCustStageStep p').text("");
                $('#stageDance p').text("舞團");
                break;
            case 2:
                $('.btnCustStageStep p').text("");
                $('#stageEffect p').text("特效");
                break;
            case 3:
                $('.btnCustStageStep p').text("");
                $('#stageSubtitle p').text("字幕");
                break;
            case 4:
                $('.btnCustStageStep p').text("");
                $('#stageaudioNPole p').text("音響鋼管");
                break;
        }
    });
    // 客製花車內容步驟tab---end

    // ======================================================
    // 客製化流程
    // ======================================================
    // 特效-----火
    $('#fireEffect1').click(function(){
        $('.fireEffect1').fadeToggle(1000);
        $('.fireEffect2, .fireEffect3').hide();
        if($(this).hasClass('custItemSelect')){
            $(this).removeClass('custItemSelect')
        }else{
            $(this).addClass('custItemSelect')
            $('#fireEffect2, #fireEffect3').removeClass('custItemSelect');
        }
    })
    $('#fireEffect2').click(function(){
        $('.fireEffect2').fadeToggle(1000);
        $('.fireEffect1, .fireEffect3').hide();
        if($(this).hasClass('custItemSelect')){
            $(this).removeClass('custItemSelect')
        }else{
            $(this).addClass('custItemSelect')
            $('#fireEffect1, #fireEffect3').removeClass('custItemSelect');
        }
    })
    $('#fireEffect3').click(function(){
        $('.fireEffect3').fadeToggle(1000);
        $('.fireEffect1, .fireEffect2').hide();
        if($(this).hasClass('custItemSelect')){
            $(this).removeClass('custItemSelect')
        }else{
            $(this).addClass('custItemSelect')
            $('#fireEffect1, #fireEffect2').removeClass('custItemSelect');
        }
    })
    // 特效-----煙火
    $('#fireworkEffect1').click(function(){
        $('.fireworkEffect01').fadeToggle();
        $('.fireworkEffect02, .fireworkEffect03').hide();
        if($(this).hasClass('custItemSelect')){
            $(this).removeClass('custItemSelect')
        }else{
            $(this).addClass('custItemSelect')
            $('#fireworkEffect2, #fireworkEffect3').removeClass('custItemSelect');
        }
    })
    $('#fireworkEffect2').click(function(){
        $('.fireworkEffect02').fadeToggle();
        $('.fireworkEffect01, .fireworkEffect03').hide();
        if($(this).hasClass('custItemSelect')){
            $(this).removeClass('custItemSelect')
        }else{
            $(this).addClass('custItemSelect')
            $('#fireworkEffect1, #fireworkEffect3').removeClass('custItemSelect');
        }
    })
    $('#fireworkEffect3').click(function(){
        $('.fireworkEffect03').fadeToggle();
        $('.fireworkEffect01, .fireworkEffect02').hide();
        if($(this).hasClass('custItemSelect')){
            $(this).removeClass('custItemSelect')
        }else{
            $(this).addClass('custItemSelect')
            $('#fireworkEffect1, #fireworkEffect2').removeClass('custItemSelect');
        }
    })

    // 字幕
    document.getElementById('subtileItemInfo').addEventListener('input', function(){
        var subInfo = $('#subtileItemInfo').val();
        $('.subtitles p').html(subInfo);
    })

    // 字幕顏色
    var hueBg = $(".color-picker .hue .bg"),
            i,
            h = 0,
            s = 100,
            l = 50,
            a = 1;
        for (i = 0; i <= 360; i += 1) {
            hueBg.append("<span style='background:hsla(" + i + ", " + s + "%, " + l + "%, " + a + ");'></span>");
        }
        $(".color-picker .hue .range input[type=range]").change(function () {
            h = $(this).val();
            var hue = "hsla(" + h + ", " + s + "%, " + l + "%, " + a + ")",
            rgb = $(".subtitles p").css("color"),
            hex_16_bytes = rgb.split("(")[1].split(")")[0].split(", "),
            hex = [];
            hex[0] = parseInt(hex_16_bytes[0]).toString(16);
            hex[1] = parseInt(hex_16_bytes[1]).toString(16);
            hex[2] = parseInt(hex_16_bytes[2]).toString(16);
            if (hex[0].length < 2) {
                hex[0] = "0" + hex[0];
            }
            if (hex[1].length < 2) {
                hex[1] = "0" + hex[1];
            }
            if (hex[2].length < 2) {
                hex[2] = "0" + hex[2];
            }
            $(".color-codes .hex").text("#" + hex.join(""))
            $(".color-codes .hsl").text(hue);
            $(".color-codes .rgb").text(rgb);
            $(".subtitles p").css({
                color : hue
            });
        });
        $(".color-picker .hue .range input[type=range]").mousemove(function () {
            h = $(this).val();
            var hue = "hsla(" + h + ", " + s + "%, " + l + "%, " + a + ")",
                rgb = $(".subtitles p").css("color"),
                hex_16_bytes = rgb.split("(")[1].split(")")[0].split(", "),
                hex = [];
            hex[0] = parseInt(hex_16_bytes[0]).toString(16);
            hex[1] = parseInt(hex_16_bytes[1]).toString(16);
            hex[2] = parseInt(hex_16_bytes[2]).toString(16);
            if (hex[0].length < 2) {
                hex[0] = "0" + hex[0];
            }
            if (hex[1].length < 2) {
                hex[1] = "0" + hex[1];
            }
            if (hex[2].length < 2) {
                hex[2] = "0" + hex[2];
            }
            $(".color-codes .hex").text("#" + hex.join(""))
            $(".color-codes .hsl").text(hue);
            $(".color-codes .rgb").text(rgb);
            $(".subtitles p").css({
                color : hue
            });
            
            $(".color-picker .lightness .bg").css({
                background: hue,
                background: "-o-linear-gradient(left,  #000000 0%, " + hue + " 50%, #ffffff 100%)",
                background: "-moz-linear-gradient(left,  #000000 0%, " + hue + " 50%, #ffffff 100%)",
                background: "-webkit-linear-gradient(left,  #000000 0%, " + hue + " 50%, #ffffff 100%)",
                background: "linear-gradient(to right,  #000000 0%, " + hue + " 50%, #ffffff 100%)"
            });
        });
        
        $(".color-picker .lightness .range input[type=range]").change(function () {
            l = $(this).val();
            var hue = "hsla(" + h + ", " + s + "%, " + l + "%, " + a + ")",
                rgb = $(".subtitles p").css("color"),
                hex_16_bytes = rgb.split("(")[1].split(")")[0].split(", "),
                hex = [];
            hex[0] = parseInt(hex_16_bytes[0]).toString(16);
            hex[1] = parseInt(hex_16_bytes[1]).toString(16);
            hex[2] = parseInt(hex_16_bytes[2]).toString(16);
            if (hex[0].length < 2) {
                hex[0] = "0" + hex[0];
            }
            if (hex[1].length < 2) {
                hex[1] = "0" + hex[1];
            }
            if (hex[2].length < 2) {
                hex[2] = "0" + hex[2];
            }
            $(".color-codes .hex").text("#" + hex.join(""))
            $(".color-codes .hsl").text(hue);
            $(".color-codes .rgb").text(rgb);
            $(".subtitles p").css({
                color : hue
            });
        });
        $(".color-picker .lightness .range input[type=range]").mousemove(function () {
            l = $(this).val();
            var hue = "hsla(" + h + ", " + s + "%, " + l + "%, " + a + ")",
                rgb = $(".subtitles p").css("color"),
                hex_16_bytes = rgb.split("(")[1].split(")")[0].split(", "),
                hex = [];
            hex[0] = parseInt(hex_16_bytes[0]).toString(16);
            hex[1] = parseInt(hex_16_bytes[1]).toString(16);
            hex[2] = parseInt(hex_16_bytes[2]).toString(16);
            if (hex[0].length < 2) {
                hex[0] = "0" + hex[0];
            }
            if (hex[1].length < 2) {
                hex[1] = "0" + hex[1];
            }
            if (hex[2].length < 2) {
                hex[2] = "0" + hex[2];
            }
            $(".color-codes .hex").text("#" + hex.join(""))
            $(".color-codes .hsl").text(hue);
            $(".color-codes .rgb").text(rgb);
            $(".subtitles p").css({
                color : hue
            });
        });
    // 音響
    $('#audioItem1').click(function(){
        $('.audioItem01').toggle();
        $('.audioItem02, .audioItem03').hide();
        if($(this).hasClass('custItemSelect')){
            $(this).removeClass('custItemSelect')
        }else{
            $(this).addClass('custItemSelect')
            $('#audioItem2, #audioItem3').removeClass('custItemSelect');
        }
    })
    $('#audioItem2').click(function(){
        $('.audioItem02').toggle();
        $('.audioItem01, .audioItem03').hide();
        if($(this).hasClass('custItemSelect')){
            $(this).removeClass('custItemSelect')
        }else{
            $(this).addClass('custItemSelect')
            $('#audioItem1, #audioItem3').removeClass('custItemSelect');
        }
    })
    $('#audioItem3').click(function(){
        $('.audioItem03').toggle();
        $('.audioItem01, .audioItem02').hide();
        if($(this).hasClass('custItemSelect')){
            $(this).removeClass('custItemSelect')
        }else{
            $(this).addClass('custItemSelect')
            $('#audioItem1, #audioItem2').removeClass('custItemSelect');
        }
    })
    // 鋼管
    $('#pole1').click(function(){
        $('.pole1').toggle();
        $('.pole2, .pole3').hide();
        if($(this).hasClass('custItemSelect')){
            $(this).removeClass('custItemSelect')
        }else{
            $(this).addClass('custItemSelect')
            $('#pole2, #pole3').removeClass('custItemSelect');
        }
    })
    $('#pole2').click(function(){
        $('.pole2').toggle();
        $('.pole1, .pole3').hide();
        if($(this).hasClass('custItemSelect')){
            $(this).removeClass('custItemSelect')
        }else{
            $(this).addClass('custItemSelect')
            $('#pole1, #pole3').removeClass('custItemSelect');
        }
    })
    $('#pole3').click(function(){
        $('.pole3').toggle();
        $('.pole1, .pole2').hide();
        if($(this).hasClass('custItemSelect')){
            $(this).removeClass('custItemSelect')
        }else{
            $(this).addClass('custItemSelect')
            $('#pole1, #pole2').removeClass('custItemSelect');
        }
    })
    // 舞團
    $('#danceDetail1').click(function(){
        $('.danceDetail1').toggle();
        $('.danceDetail2, .danceDetail3, .danceDetail4, .danceDetail5, .danceDetail6').hide();
        if($(this).hasClass('custItemSelect')){
            $(this).removeClass('custItemSelect')
        }else{
            $(this).addClass('custItemSelect').siblings().removeClass('custItemSelect');
        }
    })
    $('#danceDetail2').click(function(){
        $('.danceDetail2').toggle();
        $('.danceDetail1, .danceDetail3, .danceDetail4, .danceDetail5, .danceDetail6').hide();
        if($(this).hasClass('custItemSelect')){
            $(this).removeClass('custItemSelect')
        }else{
            $(this).addClass('custItemSelect').siblings().removeClass('custItemSelect');
        }
    })
    $('#danceDetail3').click(function(){
        $('.danceDetail3').toggle();
        $('.danceDetail1, .danceDetail2, .danceDetail4, .danceDetail5, .danceDetail6').hide();
        if($(this).hasClass('custItemSelect')){
            $(this).removeClass('custItemSelect')
        }else{
            $(this).addClass('custItemSelect').siblings().removeClass('custItemSelect');
        }
    })
    $('#danceDetail4').click(function(){
        $('.danceDetail4').toggle();
        $('.danceDetail1, .danceDetail2, .danceDetail3, .danceDetail5, .danceDetail6').hide();
        if($(this).hasClass('custItemSelect')){
            $(this).removeClass('custItemSelect')
        }else{
            $(this).addClass('custItemSelect').siblings().removeClass('custItemSelect');
        }
    })
    $('#danceDetail5').click(function(){
        $('.danceDetail5').toggle();
        $('.danceDetail1, .danceDetail2, .danceDetail3, .danceDetail4, .danceDetail6').hide();
        if($(this).hasClass('custItemSelect')){
            $(this).removeClass('custItemSelect')
        }else{
            $(this).addClass('custItemSelect').siblings().removeClass('custItemSelect');
        }
    })
    $('#danceDetail6').click(function(){
        $('.danceDetail6').toggle();
        $('.danceDetail1, .danceDetail2, .danceDetail3, .danceDetail4, .danceDetail5').hide();
        if($(this).hasClass('custItemSelect')){
            $(this).removeClass('custItemSelect')
        }else{
            $(this).addClass('custItemSelect').siblings().removeClass('custItemSelect');
        }
    })
    // 更改地址
    $('.map iframe').attr("src", 'https://maps.google.com.tw/maps?f=q&hl=zh-TW&geocode=&q=中央大學資策會&z=16&output=embed&t=');
    changeLoc();
    // 須填寫燈箱
    $('.mustBtn').click(function(){
        $('.mustLightBox').addClass('disN');
    });
    // 結帳燈箱開關
    // $('.checkoutBg').addClass('disN');
    $('#checkoutClose').click(function(){
        $('.checkoutBg').addClass('disN');
    })
    // 跳轉燈箱
    $('.checkoutStep').click(function(){
        saveOrder();
        $('.waitLightBox').removeClass('disN')
        setTimeout(function endStep(){
            $('.checkoutBg').addClass('disN');
            $('.endLightBoxBg .endLightBox').removeClass('disN');
            $('.waitLightBox').addClass('disN')
        }, 5500);
            
            
    })
    // 結束
    $('.endBtn').click(function(){
        $('.endLightBoxBg').addClass('disN');
        window.location.reload();
    });
    
    
});

function controlContent(index){
    var stepContents = ["custStage", "dateNLoc", "hostInfo", "orderInfo"];
    var key;
    for (key in stepContents){
        var stepContent = stepContents[key];
        if (key == index ){
            if( stepContent == "custStage"  ){
                $('.previousStep').text('重新選擇');
            }else{
                $('.previousStep').text('上一步');
            }
            if( stepContent == 'orderInfo'){
                $('.nextStep').text('結帳');
            }else{
                $('.nextStep').text('下一步');
            }

            $('.custStage').addClass('disN');
            $(`.${stepContent}`).removeClass('disN');
            $(`.custStep${key}`).addClass('custSelected');
        }else{
            $(`.${stepContent}`).addClass('disN');
            $(`.custStep${key}`).removeClass('custSelected');
        }
    }
}

function custReset(){
    $('.stageView .groupA').css({
        'transform' : `translateY(100px) rotateX(0deg) rotateY(0deg) rotateZ(0deg)`
    });
    //移除背景圖
    $('.stairsF, .stairsC1, .front').css('backgroundImage', "none");
    //移除舞團、移除選取
    $('.danceDetail1, .danceDetail2, .danceDetail3, .danceDetail4, .danceDetail5, .danceDetail6').hide();
    $('#danceDetail1, #danceDetail2, #danceDetail3, #danceDetail4, #danceDetail5, #danceDetail6').removeClass('custItemSelect');
    //移除火焰煙火、移除選取
    $('.fireEffect1, .fireEffect2, .fireEffect3').hide();
    $('#fireEffect1, #fireEffect2, #fireEffect3').removeClass('custItemSelect');
    $('.fireworkEffect01, .fireworkEffect02, .fireworkEffect03').hide();
    $('#fireworkEffect1, #fireworkEffect2, #fireworkEffect3').removeClass('custItemSelect');
    //還原字幕
    $('#subtileItemInfo').val('');
    $('.subtitles p').html('跑馬燈');
    //移除音響鋼管、移除選取
    $('.audioItem01, .audioItem02, .audioItem03').hide();
    $('#audioItem1, #audioItem2, #audioItem3').removeClass('custItemSelect');
    $('.pole1, .pole2, .pole3').hide();
    $('#pole1, #pole2, #pole3').removeClass('custItemSelect');
}


// ======================================================
//日曆
// ======================================================
    var yy = new Date().getFullYear(); //年
    var mm = new Date().getMonth(); //月份
    var dd = new Date().getDate();//今天日期
    var arrmm = new Array();
    arrmm[0] = "一月";
    arrmm[1] = "二月";
    arrmm[2] = "三月";
    arrmm[3] = "四月";
    arrmm[4] = "五月";
    arrmm[5] = "六月";
    arrmm[6] = "七月";
    arrmm[7] = "八月";
    arrmm[8] = "九月";
    arrmm[9] = "十月";
    arrmm[10] = "十一月";
    arrmm[11] = "十二月";
    document.querySelector("#calendarTitle").innerText = arrmm[mm];
    document.querySelector("#calendarYear").innerText = yy;
    var dayall = new Date(yy, (mm + 1), 0).getDate();//總天數
    var bd = new Date(yy + "/" + (mm + 1) + "/1").getDay();//因為回傳月份是0-11 所以要+1  抓星期他只有1-12月
    

  
    var dayfunction = () => {
        for (var i = 1; i < 7; i++) {
            var text = "";
            if (i == 1) {
                if (i - bd < 1) {
                    for (var p = 0; p < bd; p++) {
                        text += "<td class='tdclass-1'></td>";
                    }
                }
                for (var o = 1; o <= 7 - bd; o++) {
                    text += "<td class='tdclass'>" + o + "</td>";
                }
            }
            else if (i == 2) {
                for (var o = 8 - bd; o <= 14 - bd; o++) {
                    text += "<td class='tdclass'>" + o + "</td>";
                }
            }
            else if (i == 3) {
                for (var o = 15 - bd; o <= 21 - bd; o++) {
                    text += "<td class='tdclass'>" + o + "</td>";
                }
            }
            else if (i == 4) {
                for (var o = 22 - bd; o <= 28 - bd; o++) {
                    text += "<td class='tdclass'>" + o + "</td>";
                }
            }
            else if (i == 5) {
                if (bd > 4 && dayall > 28) {
                    for (var o = 29 - bd; o <= 35 - bd; o++) {
                        text += "<td class='tdclass'>" + o + "</td>";
                    }
                    var tr = document.createElement("tr");
                    document.querySelector("#caleBody").appendChild(tr).innerHTML = text;
                    text = "";
                    for (var o = 36 - bd; o <= dayall; o++) {
                        text += "<td class='tdclass'>" + o + "</td>";
                    }
                } else {
                    for (var o = 29 - bd; o <= dayall; o++) {
                        text += "<td class='tdclass'>" + o + "</td>";
                    }
                }
            }

            var tr = document.createElement("tr");
            document.querySelector("#caleBody").appendChild(tr).innerHTML = text;
        }
    }
    dayfunction();
    document.querySelector("#prevMon").addEventListener("click", (e) => {
        var num = arrmm.indexOf(document.querySelector("#calendarTitle").innerText);
        dayall = new Date(yy, num, 0).getDate();//總天數
        document.querySelector("#caleBody").innerHTML = "";
        if (num - 1 < 0) {
            num = 12;
            yy--;
        }
        bd = new Date(yy + "/" + num + "/1").getDay();
        dayfunction(bd, dayall);
        document.querySelector("#calendarTitle").innerText = arrmm[num - 1];
        document.querySelector("#calendarYear").innerText = yy;
        load();
    })
    document.querySelector("#nextMon").addEventListener("click", (e) => {
        var num = arrmm.indexOf(document.querySelector("#calendarTitle").innerText);
        if (num == 0) {
            dayall = new Date(yy, 2, 0).getDate()
            bd = new Date(yy + "/" + 2 + "/1").getDay();
        } else if (num == 11) {
            dayall = new Date(yy, num + 1, 0).getDate();//總天數
            bd = new Date(yy + "/" + (num + 1) + "/1").getDay();
        } else if (num == 10) {
            dayall = new Date(yy, num, 0).getDate();//總天數
            bd = new Date(yy + "/" + (num) + "/1").getDay();
        }
        else {
            dayall = new Date(yy, num + 2, 0).getDate();//總天數
            bd = new Date(yy + "/" + (num + 2) + "/1").getDay();
        }
        document.querySelector("#caleBody").innerHTML = "";
        if (num + 1 > 11) {
            num = -1;
            yy++;
        }
        dayfunction(bd, dayall);
        document.querySelector("#calendarTitle").innerText = arrmm[num + 1];
        document.querySelector("#calendarYear").innerText = yy;
        load();
    })

    var today = new Date();//今天日期
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();

    if (dd < 10) {
    dd = dd;
    }

    if (mm < 10) {
    mm =  mm;
    }

    today =  dd;


    var len;
    var arr = new Array();
    function load() {
        len = document.getElementsByClassName("tdclass");
        var ss;
        for (var k = 0; k <= len.length - 1; k++) {
            ss = document.getElementsByClassName("tdclass")[k];
            ss.addEventListener("click", tdclass);
            ss.style.color="rgb(255, 255, 255)";
            ss.style.cursor="pointer";

            var numF = arrmm.indexOf(document.querySelector("#calendarTitle").innerText);
            var num = arrmm.indexOf(document.querySelector("#calendarTitle").innerText)+1;
            if (document.querySelector("#calendarYear").innerText < yyyy   ) {
                ss.style.color="rgb(173, 173, 173)";
                ss.style.cursor="default";
                ss.removeEventListener("click", tdclass);
            }
            //今年且小於此月 不等於今日
            if( num<mm && document.querySelector("#calendarYear").innerText == yyyy ){
                ss.removeEventListener("click", tdclass);
                ss.style.color="rgb(168, 168, 168)";
                ss.style.cursor="default";
                
                //不等於今日
                // if(ss.innerText ==  today && num == mm && document.querySelector("#calendarYear").innerText == yyyy ){
                //     ss.style.color="rgb(0, 0, 0)";
                //     ss.style.background = "yellow";
                //     // ss.style.cursor = "not-allowed";
                //     ss.addEventListener("click", tdclass);
                // }
            }
            //同年同月 但小於今天
            if(ss.innerText<= today &&  num==mm && document.querySelector("#calendarYear").innerText == yyyy){
                ss.style.color="rgb(168, 168, 168)";
                ss.style.cursor="default";
                ss.removeEventListener("click", tdclass);
            }
            // if(ss.innerText == datevalueTemp.split("-")[2] && num == datevalueTemp.split("-")[1] && document.querySelector("#yy-sp").innerText == datevalueTemp.split("-")[0]){
            //     ss.style.background = "rgb(64, 58, 96)";
            //     ss.style.color = "rgb(255, 255, 255)";
            // }
            arr[k] = ss;
        }
    }
    function tdclass(e) {
        for(var i = 0 ; i<=len.length-1 ; i++){
            if( arr[i].style.color != "rgb(168, 168, 168)"){
                arr[i].style.color="rgb(255, 255, 255)";
                arr[i].style.background="rgb(64, 58, 96)";
            }
        }
        e.target.style.background = "rgb(247, 83, 156)";
        e.target.style.borderRadius = "50%";
        e.target.style.color = "rgb(255, 255, 255)";
        var value = document.querySelector("#calendarTitle").innerText;
        var mmtext = Number(arrmm.indexOf(value));//月
        mmtext += 1;
        datevaluetemp = document.querySelector("#calendarYear").innerText + "-" + ('00' + mmtext).slice(-2) + "-" + ('00' + e.target.innerText).slice(-2);
        datevalue = document.querySelector("#calendarYear").innerText + "-" + ('00' + mmtext).slice(-2) + "-" + ('00' + e.target.innerText).slice(-2);
        // 獲取日期
        $('.dateChoose p span:first-of-type').text(datevalue);
        // 訂單獲取日期
        $('.orderDate span').text(datevalue);
        // console.log(datevalue);
    }
    load();
// ======================================================
// 更改地址
// ======================================================
function changeLoc(){
    document.getElementById('locText').addEventListener('input', function(){
        var loc = $('#locText').val();
        var locSrc = `https://maps.google.com.tw/maps?f=q&hl=zh-TW&geocode=&q=${$('#locText').val()}&z=16&output=embed&t=`;
        $('.map iframe').attr("src", locSrc);
        //訂單獲取地址
        $('.orderLoc span').text(loc);
    })
   
        
    // $('#locText').input(function(){
    // })
}

// ======================================================
//主持人輪播
// ======================================================
$num = $('.hostInfoDetail').length;
$even = $num / 2;
$odd = ($num + 1) / 2;

if ($num % 2 == 0) {
  $('.hostInfoDetail:nth-child(' + $even + ')').addClass('active');
  $('.hostInfoDetail:nth-child(' + $even + ')').prev().addClass('prev');
  $('.hostInfoDetail:nth-child(' + $even + ')').next().addClass('next');
} else {
  $('.hostInfoDetail:nth-child(' + $odd + ')').addClass('active');
  $('.hostInfoDetail:nth-child(' + $odd + ')').prev().addClass('prev');
  $('.hostInfoDetail:nth-child(' + $odd + ')').next().addClass('next');
}

$('.hostInfoDetail').click(function() {

  $slide = $('.active').width();
  if ($(this).hasClass('next')) {
    $('.hostSliderBox').stop(false, true).animate({left: '-=' + $slide});
  } else if ($(this).hasClass('prev')) {
    $('.hostSliderBox').stop(false, true).animate({left: '+=' + $slide});
  }
  
  $(this).removeClass('prev next');
  $(this).siblings().removeClass('prev active next');
  
  $(this).addClass('active');
  $(this).prev().addClass('prev');
  $(this).next().addClass('next');
});
// ======================================================
// 獲取訂單資訊
// ======================================================
function getOrderInfo(){
    // 獲取塗裝
    var none = 'none';
    var bg0 = $('.stairsF').css('backgroundImage');
    var bg1 = $('.stairsC1').css('backgroundImage');
    var bg2 = $('.front').css('backgroundImage');
    var patternPrice = 0;
    if( bg0 != none || bg1 != none || bg2 != none ){
        patternPrice = 10000; 
        $('#orderPattern :nth-child(2)').text('如圖');
        $('#orderPattern :last-child').text(patternPrice);
    }else{
        $('#orderPattern :nth-child(2)').text('無');
        $('#orderPattern :last-child').text(patternPrice);
    }
    // 獲取舞團
    var orderDanceName = "無";
    var orderDancePrice = 0;
    orderDanceNo = 0;
    if( $('.danceItem').children().children().hasClass('custItemSelect') ){
        orderDanceName = $('.danceItem .custItemSelect p:nth-last-of-type(2)').text();
        orderDancePrice = ($('.danceItem .custItemSelect p:last-of-type').text()).replace(/[^\d]/g, '');
        orderDanceNo = $('.danceItem .custItemSelect p:last-of-type').attr('troupeNo');
    }
        $('#orderDance :nth-child(2)').text(orderDanceName);
        $('#orderDance :last-child').text(orderDancePrice);
    // 獲取特效---火焰
    var orderFireName = "無";
    var orderFirePrice = 0;
    orderFireNo = 0;
    if( $('#fireEffect1').hasClass('custItemSelect') || $('#fireEffect2').hasClass('custItemSelect') || $('#fireEffect3').hasClass('custItemSelect') ){
        orderFireName =  $('.fireInfo.custItemSelect:lt(1) p:nth-last-of-type(2)').text();
        orderFirePrice = ($('.fireInfo.custItemSelect:lt(1) p:last-of-type').text()).replace(/[^\d]/g, '');
        orderFireNo = $('.fireInfo.custItemSelect:lt(1) p:last-of-type').attr('effectsNo');
    }
        $('#orderFire :nth-child(2)').text(orderFireName);
        $('#orderFire :last-child').text(orderFirePrice);
    // 獲取特效---煙火--------?
    var orderFireworkName = "無";
    var orderFireworkPrice = 0;
    orderFireworkNo = 0;
    if( $('#fireworkEffect1').hasClass('custItemSelect') || $('#fireworkEffect2').hasClass('custItemSelect') || $('#fireworkEffect3').hasClass('custItemSelect') ){
        orderFireworkName = $('.fireworkInfo.custItemSelect p:nth-last-of-type(2)').text();
        orderFireworkPrice = ($('.fireworkInfo.custItemSelect p:last-of-type').text()).replace(/[^\d]/g, '');
        orderFireworkNo = $('.fireworkInfo.custItemSelect p:last-of-type').attr('fireworkNo');
    }
        $('#orderFirework :nth-child(2)').text(orderFireworkName);
        $('#orderFirework :last-child').text(orderFireworkPrice);
        
    // 獲取音響
    var orderAudioName =  "無";
    var orderAudioPrice = 0;
    orderAudioNo = 0;
    if( $('#audioItem1').hasClass('custItemSelect') || $('#audioItem2').hasClass('custItemSelect') || $('#audioItem3').hasClass('custItemSelect') ){
        orderAudioName =  $('.audioInfo.custItemSelect p:nth-last-of-type(2)').text();
        orderAudioPrice = ($('.audioInfo.custItemSelect p:last-of-type').text()).replace(/[^\d]/g, '');
        orderAudioNo = $('.audioInfo.custItemSelect p:last-of-type').attr('audioNo');
    }
        $('#orderAudio :nth-child(2)').text(orderAudioName);
        $('#orderAudio :last-child').text(orderAudioPrice);
    // 獲取鋼管
    var orderPoleName = "無";
    var orderPolePrice = 0;
    orderPipeNo = 0;
    if( $('#pole1').hasClass('custItemSelect') || $('#pole2').hasClass('custItemSelect') || $('#pole3').hasClass('custItemSelect')){
        orderPoleName =  $('.poleInfo.custItemSelect p:nth-last-of-type(2)').text();
        orderPolePrice = ($('.poleInfo.custItemSelect p:last-of-type').text()).replace(/[^\d]/g, '');
        orderPipeNo = $('.poleInfo.custItemSelect p:last-of-type').attr('pipeNo');
    }
        $('#orderPole :nth-child(2)').text(orderPoleName);
        $('#orderPole :last-child').text(orderPolePrice);
    // 獲取主持人
    orderHostNo = 0;
    var orderHostName =  $('.active h6 span:first-of-type').text();
    var orderHostPrice = ($('.active h6 span:last-of-type').text()).replace(/[^\d]/g, '');
    orderHostNo = $('.active h6 span:first-of-type').attr('hostNo');
        $('#orderHost :nth-child(2)').text(orderHostName);
        $('#orderHost :last-child').text(orderHostPrice);
    // 金額總計
    subtotal = 0;
    subtotal = parseInt(patternPrice) + parseInt(orderDancePrice) + parseInt(orderFirePrice) + parseInt(orderFireworkPrice) + parseInt(orderAudioPrice) + parseInt(orderPolePrice) + parseInt(orderHostPrice);
    // console.log(subtotal);
    $('.orderSub span').text(subtotal);
    $('.checkoutOrder p span').text(subtotal);
    // 付款金額總計
    $('#couponUse').change(function(){
        subtotalAll = 0;
        subtotalAll = subtotal - parseInt($('#couponUse :selected').val());
        // console.log(subtotalAll);
        $('.checkoutOrder p span').text(subtotalAll);
    });
}
// 照片存檔
// function saveCustImg(){
//     domtoimage.toJpeg(orderStage)
//         .then(function (dataUrl) {
//             console.log(dataUrl);
//             let img = dataUrl

//             // 產生XMLHttpRequest物件
//             var xhr = new XMLHttpRequest();
//             xhr.onload=function (){
//                 if( xhr.status == 200 ){
//                     console.log(xhr.responseText);
//                 }else{
//                     alert( xhr.status );
//                 }
//             }
            
//             //設定好所要連結的程式
//             var url = "php/components/_saveCustImg.php";
//             xhr.open("Post", url, true);
//             xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
//             //送出資料
//             var data_info = "imgURL=" + img;
//             xhr.send(data_info);
//         })
//         .catch(function (error) {
//             console.error('oops, something went wrong!', error);
//     });
// }
// ======================================================
// 資料寫進json--ajax
// ======================================================
function saveOrder (){   
    domtoimage.toPng(orderStagePic)
        .then(function (dataUrl) {
            console.log(dataUrl);
            let img = dataUrl

            // 產生XMLHttpRequest物件
            var xhr = new XMLHttpRequest();
            xhr.onload=function (){
                if( xhr.status == 200 ){
                    console.log(xhr.responseText);
                }else{
                    alert( xhr.status );
                }
            }
            datevalue = $('.orderDate span').text();
            locValue = $('.orderLoc span').text();
            orderName = $('#orderName').val();
            
            var orderInfo = {};
            orderInfo.memNo = LoginState[0][0];
            orderInfo.totalMoney = subtotalAll;
            orderInfo.orderName = orderName;
            orderInfo.actPlace = locValue;
            orderInfo.actStart = datevalue;
            orderInfo.hostNo = orderHostNo;
            // orderContent
            orderInfo.troupeNo = orderDanceNo;
            orderInfo.fireNo = orderFireNo;
            orderInfo.fireworkNo = orderFireworkNo;
            orderInfo.audioNo = orderAudioNo;
            orderInfo.pipeNo = orderPipeNo;

            var jsonStr = JSON.stringify(orderInfo);
            //設定好所要連結的程式
            var url = "php/components/_saveCustOrder.php?jsonStr=" + jsonStr;
            xhr.open("Post", url, true);
            xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            //送出資料
            var data_info = "imgURL=" + img;
            xhr.send(data_info);
        })
        .catch(function (error) {
            console.error('oops, something went wrong!', error);
    });

    
    // datevalue = $('.orderDate span').text();
    // locValue = $('.orderLoc span').text();
    // orderName = $('#orderName').val();

    // var xhr = new XMLHttpRequest();
    // xhr.onload=function (){
    //     if( xhr.status == 200 ){
    //         console.log(xhr.responseText);
    //     }else{
    //         alert( xhr.status );
    //     }
    // }
    
    // var orderInfo = {};
    // // orderInfo.memId = $id("memId").value;
    // // orderInfo.memCouponsNo = ;
    // orderInfo.totalMoney = subtotal;
    // orderInfo.orderName = orderName;
    // orderInfo.actPlace = locValue;
    // orderInfo.actStart = datevalue;
    // orderInfo.hostNo = orderHostNo;
    // // orderContent
    // orderInfo.troupeNo = orderDanceNo;
    // orderInfo.fireNo = orderFireNo;
    // orderInfo.fireworkNo = orderFireworkNo;
    // orderInfo.audioNo = orderAudioNo;
    // orderInfo.pipeNo = orderPipeNo;

    // var jsonStr = JSON.stringify(orderInfo);
    // // alert ( jsonStr ); 
    // var url = "php/components/_saveCustImg.php?jsonStr=" + jsonStr;
    // xhr.open("Post", url, true);
    // xhr.send( null );
}

// function endStep (){
//     $('.checkoutBg').addClass('disN');
//     $('.endLightBoxBg .endLightBox').removeClass('disN');
// }




