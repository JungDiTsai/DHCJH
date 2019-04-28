var temp = 0;
$(document).ready(function(){
    // 上傳圖片
    $('#patternUpload').change(function(e){
        var file = e.target.files[0];
        var reader = new FileReader();   
        var patternImg = document.createElement('img');         
        reader.onload = function(e){
            // $('#imgPreview').attr("src", reader.result);
            patternImg.src = reader.result;
            $(patternImg).insertBefore('.patternWrap>img:first-of-type');
        }
        reader.readAsDataURL(file);
    })
    // 點擊換圖
    $('.stairsF, .stairsC1, .front').click(function (){
        $(this).toggleClass('patternSelected')
               .siblings().removeClass('patternSelected');
        if($('.stairsF').hasClass('patternSelected')){
            let img = $('.patternItemContent img');
            for (let i = 0; i < img.length; i++) {
                img[i].addEventListener('click',changeBgPattern)
            }
            temp = 1;
        }else if($('.stairsC1').hasClass('patternSelected')){
            let img = $('.patternItemContent img');
            for (let i = 0; i < img.length; i++) {
                img[i].addEventListener('click',changeBgPattern)
            }
            temp = 2;
        }else if($('.front').hasClass('patternSelected')){
            let img = $('.patternItemContent img');
            for (let i = 0; i < img.length; i++) {
                img[i].addEventListener('click',changeBgPattern)
            }
            temp = 3;
        }
    });
    // 預設選取，點選圖片立即加載
    $('.stageView .stairsF').addClass('patternSelected');
    let img = $('.patternItemContent img');
    for (let i = 0; i < img.length; i++) {
        img[i].addEventListener('click',changeBgPattern)
    }
    // 預設目標區域外，取消選取
    $(document).mouseup(function(e){
        var _con = $('.stairsF, .stairsC1, .front');   // 設置目標區域
        if(!_con.is(e.target) && _con.has(e.target).length === 0){ 
            $('.stairsF, .stairsC1, .front').removeClass('patternSelected');
        }
    });
    // 訂單資訊頁取消選取
    $('#orderStage .stairsF, #orderStage .stairsC1, #orderStage .front').off('click');
});

function changeBgPattern(){
    imgSrc = $(this).attr('src');
    if(temp == 0){
        $('.stairsF').css('backgroundImage', `url(${imgSrc})`);
    }
    if(temp == 1){
        $('.stairsF').css('backgroundImage', `url(${imgSrc})`);
    }
    else if(temp == 2){
        $('.stairsC1').css('backgroundImage', `url(${imgSrc})`);
    }
    else if(temp == 3){
        $('.front').css('backgroundImage', `url(${imgSrc})`);
        $('.back').css('backgroundImage', `url(${imgSrc})`);        
        $('.left').css('backgroundImage', `url(${imgSrc})`);
        $('.right').css('backgroundImage', `url(${imgSrc})`);
        $('.down').css('backgroundImage', `url(${imgSrc})`);
    }
}