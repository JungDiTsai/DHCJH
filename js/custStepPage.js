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
        }
    });
    // 下一步
    $('.nextStep').bind('click', function(){
        if( index <= 2 ){
            index++;
            controlContent(index);
        }
        else if( index == 3){
<<<<<<< HEAD
            saveCustImg();
            $('.checkoutBg').removeClass('disN');
            // location.href ='checkout.html';
=======
            location.href ='checkout.html';
>>>>>>> 5577f4b1be9c44363dea47c3bc710139cca03d97
        }
    });

    //讓點選index與下方共用
    $('.btnCustStep').click(function(){
        index = $(this).index();
        $(this).addClass('custSelected').siblings().removeClass('custSelected');
        controlContent(index);
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
    $('#fireEffect01').click(function(){
        $('.fireEffect01').fadeToggle(1000);
        $('.fireEffect02, .fireEffect03').hide();
        $(this).toggleClass('custItemSelect').siblings().removeClass('custItemSelect');
    })
    $('#fireEffect02').click(function(){
        $('.fireEffect02').fadeToggle(1000);
        $('.fireEffect01, .fireEffect03').hide();
        $(this).toggleClass('custItemSelect').siblings().removeClass('custItemSelect');
    })
    $('#fireEffect03').click(function(){
        $('.fireEffect03').fadeToggle(1000);
        $('.fireEffect01, .fireEffect02').hide();
        $(this).toggleClass('custItemSelect').siblings().removeClass('custItemSelect');
    })
    // 特效-----煙火
    $('#fireworkEffect01').click(function(){
        $('.fireworkEffect01').fadeToggle();
        $('.fireworkEffect02, .fireworkEffect03').hide();
        $(this).toggleClass('custItemSelect').siblings().removeClass('custItemSelect');
    })
    $('#fireworkEffect02').click(function(){
        $('.fireworkEffect02').fadeToggle();
        $('.fireworkEffect01, .fireworkEffect03').hide();
        $(this).toggleClass('custItemSelect').siblings().removeClass('custItemSelect');
    })
    $('#fireworkEffect03').click(function(){
        $('.fireworkEffect03').fadeToggle();
        $('.fireworkEffect01, .fireworkEffect02').hide();
        $(this).toggleClass('custItemSelect').siblings().removeClass('custItemSelect');
    })
    // 字幕
    // var subInfo = $.trim($('#subtileItemInfo').val());
    $('#subInfoSubmit').click(function(){
        // console.log($.trim($('#subtileItemInfo').val()));
        $('.subtitles p').html($.trim($('#subtileItemInfo').val()));
    });
    // 音響
    $('#audioItem01').click(function(){
        $('.audioItem01').toggle();
        $('.audioItem02, .audioItem03').hide();
    })
    $('#audioItem02').click(function(){
        $('.audioItem02').toggle();
        $('.audioItem01, .audioItem03').hide();
    })
    $('#audioItem03').click(function(){
        $('.audioItem03').toggle();
        $('.audioItem01, .audioItem02').hide();
    })
    // 鋼管
    $('#pole1').click(function(){
        $('.pole1').toggle();
        $('.pole2, .pole3').hide();
    })
    $('#pole2').click(function(){
        $('.pole2').toggle();
        $('.pole1, .pole3').hide();
    })
    $('#pole3').click(function(){
        $('.pole3').toggle();
        $('.pole1, .pole2').hide();
    })

    //更換日期-----有問題
    $('.available li').click(function(){
        $(this).addClass('choice').siblings().removeClass('choice');
    });
    // 更改地址
    $('.map iframe').attr("src", 'https://maps.google.com.tw/maps?f=q&hl=zh-TW&geocode=&q=中央大學資策會&z=16&output=embed&t=');
    changeLoc();
    // 結帳燈箱
    $('.checkoutBg').addClass('disN');
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




// ======================================================
//日曆
// ======================================================
var month_olympic = [31,29,31,30,31,30,31,31,30,31,30,31];
var month_normal = [31,28,31,30,31,30,31,31,30,31,30,31];
var month_name = ["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"];
var holder = document.getElementById("days");
var prev = document.getElementById("prev");
var next = document.getElementById("next");
var ctitle = document.getElementById("calendarTitle");
var cyear = document.getElementById("calendarYear");
var my_date = new Date();
var my_year = my_date.getFullYear();
var my_month = my_date.getMonth();
var my_day = my_date.getDate();
//取得某年某月的第一天是星期幾
function dayStart(month, year) {
    var tmpDate = new Date(year, month, 1);
    return (tmpDate.getDay());
}
//计算某年是不是闰年，通过求年份除以4的余数即可
function daysMonth(month, year) {
    var tmp = year % 4;
    if (tmp == 0) {
        return (month_olympic[month]);
    } else {
        return (month_normal[month]);
    }
}
function refreshDate(){
    var str = "";
    var totalDay = daysMonth(my_month, my_year); //获取该月总天数
    var firstDay = dayStart(my_month, my_year); //获取该月第一天是星期几
    var myclass;
    for(var i=1; i<firstDay; i++){ 
        str += "<li></li>"; //为起始日之前的日期创建空白节点
    }
    for(var i=1; i<=totalDay; i++){
        if((i<my_day && my_year==my_date.getFullYear() && my_month==my_date.getMonth()) || my_year<my_date.getFullYear() || ( my_year==my_date.getFullYear() && my_month<my_date.getMonth())){ 
            myclass = " class='dayBefore'"; //当该日期在今天之前时，以浅灰色字体显示
        }else if (i==my_day && my_year==my_date.getFullYear() && my_month==my_date.getMonth()){
            myclass = " class='choice'"; //当天日期以绿色背景突出显示
        }else{
            myclass = " class='available'"; //当该日期在今天之后时，以深灰字体显示
        }
        str += `<li ${myclass}>${i}</li>`; //创建日期节点
    }
    holder.innerHTML = str; //设置日期显示
    ctitle.innerHTML = month_name[my_month]; //设置英文月份显示
    cyear.innerHTML = my_year; //设置年份显示
}
refreshDate(); //执行该函数

prevMon.onclick = function(e){
    e.preventDefault();
    my_month--;
    if(my_month<0){
        my_year--;
        my_month = 11;
    }
    refreshDate();
}
nextMon.onclick = function(e){
    e.preventDefault();
    my_month++;
    if(my_month>11){
        my_year++;
        my_month = 0;
    }
    refreshDate();
}

// ======================================================
// 更改地址
// ======================================================
// var loc = $('#locText').val();
function changeLoc(){
    // var loc = "tokyo";
    var loc = $('#locText').val();
    $('#locBtn').click(function(){
        alert(loc);
    })
    // var locSrc = `https://maps.google.com.tw/maps?f=q&hl=zh-TW&geocode=&q=${$('#locText').val()}&z=16&output=embed&t=`;
    // $('.locInput :submit').click(function(){
    //     $('.map iframe').attr("src", locSrc);
    // })
    
}

// ======================================================
//主持人輪播
// ======================================================
<<<<<<< HEAD
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
//   $slide = $('.active').width();
  
//   if ($(this).hasClass('next')) {
//     $('.hostSliderBox').stop(false, true).animate({left: '-=' + $slide});
//   } else if ($(this).hasClass('prev')) {
//     $('.hostSliderBox').stop(false, true).animate({left: '+=' + $slide});
//   }
  
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
    // 獲取日期
    // 獲取地址
    // var loc = $('#locText').val();
    // $('.orderLoc span').text(loc);
    // 獲取塗裝
    var none = 'none';
    var bg0 = $('.stairsF').css('backgroundImage');
    var bg1 = $('.stairsC1').css('backgroundImage');
    var bg2 = $('.front').css('backgroundImage');
    var patternPrice = 0;
    // console.log(bg0);
    // console.log(bg1);
    // console.log(bg2);
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
    if( $('.danceItem').children().children().hasClass('custItemSelect') ){
        orderDanceName = $('.danceItem .custItemSelect p:nth-last-of-type(2)').text();
        orderDancePrice = ($('.danceItem .custItemSelect p:last-of-type').text()).replace(/[^\d]/g, '');
    }
        $('#orderDance :nth-child(2)').text(orderDanceName);
        $('#orderDance :last-child').text(orderDancePrice);
    // 獲取特效---火焰
    var orderFireName = "無";
    var orderFirePrice = 0;
    if( $('#fireEffect1').hasClass('custItemSelect') || $('#fireEffect2').hasClass('custItemSelect') || $('#fireEffect3').hasClass('custItemSelect') ){
        orderFireName =  $('.fireInfo.custItemSelect:lt(1) p:nth-last-of-type(2)').text();
        orderFirePrice = ($('.fireInfo.custItemSelect:lt(1) p:last-of-type').text()).replace(/[^\d]/g, '');
    }
        $('#orderFire :nth-child(2)').text(orderFireName);
        $('#orderFire :last-child').text(orderFirePrice);
    // 獲取特效---煙火--------?
    var orderFireworkName = "無";
    var orderFireworkPrice = 0;
    if( $('#fireworkEffect1').hasClass('custItemSelect') || $('#fireworkEffect2').hasClass('custItemSelect') || $('#fireworkEffect3').hasClass('custItemSelect') ){
        orderFireworkName = $('.fireworkInfo.custItemSelect p:nth-last-of-type(2)').text();
        orderFireworkPrice = ($('.fireworkInfo.custItemSelect p:last-of-type').text()).replace(/[^\d]/g, '');
        // console.log(orderFireworkName);
    }
        $('#orderFirework :nth-child(2)').text(orderFireworkName);
        $('#orderFirework :last-child').text(orderFireworkPrice);
        
    // 獲取音響
    var orderAudioName =  "無";
    var orderAudioPrice = 0;
    if( $('#audioItem1').hasClass('custItemSelect') || $('#audioItem2').hasClass('custItemSelect') || $('#audioItem3').hasClass('custItemSelect') ){
        orderAudioName =  $('.audioInfo.custItemSelect p:nth-last-of-type(2)').text();
        orderAudioPrice = ($('.audioInfo.custItemSelect p:last-of-type').text()).replace(/[^\d]/g, '');
    }
        $('#orderAudio :nth-child(2)').text(orderAudioName);
        $('#orderAudio :last-child').text(orderAudioPrice);
    // 獲取鋼管
    var orderPoleName = "無";
    var orderPolePrice = 0;
    if( $('#pole1').hasClass('custItemSelect') || $('#pole2').hasClass('custItemSelect') || $('#pole3').hasClass('custItemSelect')){
        orderPoleName =  $('.poleInfo.custItemSelect p:nth-last-of-type(2)').text();
        orderPolePrice = ($('.poleInfo.custItemSelect p:last-of-type').text()).replace(/[^\d]/g, '');
    }
        $('#orderPole :nth-child(2)').text(orderPoleName);
        $('#orderPole :last-child').text(orderPolePrice);
    // 獲取主持人
    var orderHostName =  $('.active h6 span:first-of-type').text();
    var orderHostPrice = ($('.active h6 span:last-of-type').text()).replace(/[^\d]/g, '');
        $('#orderHost :nth-child(2)').text(orderHostName);
        $('#orderHost :last-child').text(orderHostPrice);
    // 金額總計
    var subtotal = 0;
    subtotal = parseInt(patternPrice) + parseInt(orderDancePrice) + parseInt(orderFirePrice) + parseInt(orderFireworkPrice) + parseInt(orderAudioPrice) + parseInt(orderPolePrice) + parseInt(orderHostPrice);
    // console.log(subtotal);
    $('.orderSub span').text(subtotal);
}
// ======================================================
// 資料寫進session--ajax
// ======================================================



// ======================================================
// 照片存檔
// ======================================================
function saveCustImg(){

    var orderStage = document.getElementById('orderStage');
    $('.back').css({
        'transform' : " translateX(0px) translateZ(75px)"});

    domtoimage.toJpeg(orderStage)
        .then(function (dataUrl) {
            // console.log(dataUrl);
            let img = dataUrl

            // 產生XMLHttpRequest物件
            let xhr = new XMLHttpRequest();

            //設定好所要連結的程式
            var url = "_saveCustImg.php";
            xhr.open("Post", url, true);
            xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            //送出資料
            var data_info = "imgURL=" + img;
            xhr.send(data_info);
        })
        .catch(function (error) {
            console.error('oops, something went wrong!', error);
    });
}


=======
document.querySelector('.sliderBox').addEventListener('click',function(){
    let allDiv = document.querySelectorAll('.sliderBox>div')
    for (let key in allDiv) {
        let style = allDiv[key].style.left;
        switch (style) {
            case "50%":
                allDiv[key].style.setProperty("left","30%");
                allDiv[key].style.setProperty("transition",".5s");
                allDiv[key].style.setProperty("transform","translateX(-50%) translateY(-50%) scale(0.7)");
                allDiv[key].style.setProperty("z-index","2");
                break;
            case "30%":
                allDiv[key].style.setProperty("left","20%");
                allDiv[key].style.setProperty("transition",".5s");
                allDiv[key].style.setProperty("transform","translateX(-50%) translateY(-50%) scale(0.5)");
                allDiv[key].style.setProperty("z-index","1");
                break;
            case "20%":
                allDiv[key].style.setProperty("left","40%");
                allDiv[key].style.setProperty("transition",".5s");
                allDiv[key].style.setProperty("transform","translateX(-50%) translateY(-50%) scale(0.3)");
                allDiv[key].style.setProperty("z-index","1");
                break;
            case "40%":
                allDiv[key].style.setProperty("left","60%");
                allDiv[key].style.setProperty("transition",".5s");
                allDiv[key].style.setProperty("transform","translateX(-50%) translateY(-50%) scale(0.3)");
                allDiv[key].style.setProperty("z-index","1");
                break;
            case "60%":
                allDiv[key].style.setProperty("left","80%");
                allDiv[key].style.setProperty("transition",".5s");
                allDiv[key].style.setProperty("transform","translateX(-50%) translateY(-50%) scale(0.5)");
                allDiv[key].style.setProperty("z-index","1");
                break;
            case "80%":
                allDiv[key].style.setProperty("left","70%");
                allDiv[key].style.setProperty("transition",".5s");
                allDiv[key].style.setProperty("transform","translateX(-50%) translateY(-50%) scale(0.7)");
                allDiv[key].style.setProperty("z-index","2");
                break;
            case "70%":
                allDiv[key].style.setProperty("left","50%");
                allDiv[key].style.setProperty("transition",".5s");
                allDiv[key].style.setProperty("transform","translateX(-50%) translateY(-50%) scale(1)");
                allDiv[key].style.setProperty("z-index","3");
                break;
            default:
                break;
        }
    }
})
>>>>>>> 5577f4b1be9c44363dea47c3bc710139cca03d97
