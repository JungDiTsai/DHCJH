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