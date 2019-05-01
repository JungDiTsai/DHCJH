$(document).ready(function(){
    // 舞台旋轉
    var rotDeg = 0;
    $('.btnRotL').click(function(){
        if( rotDeg >= -30){
            rotDeg -= 5;
            $('.stageView .groupA').css({
                'transform' : `translateY(100px) rotateX(0deg) rotateY(${rotDeg}deg) rotateZ(0deg)`
            });
        }
    });
    $('.btnRotR').click(function(){
        if( rotDeg <= 30){
            rotDeg += 5;
            $('.stageView .groupA').css({
                'transform' : `translateY(100px) rotateX(0deg) rotateY(${rotDeg}deg) rotateZ(0deg)`
            });
        }
    });
    $('.btnCenter').click(function(){
        rotDeg = 0;
        $('.stageView .groupA').css({
            'transform' : `translateY(100px) rotateX(0deg) rotateY(${rotDeg}deg) rotateZ(0deg)`
        });
    });


    // $('.scaleSlider').on('change', function() {
    //     // var effectObject = $('effectAll').();
    //     var width = document.getElementById('fire').naturalWidth / 10;
    //     $('#fire').width(width*this.value);
    //     // console.log(this.value);
    // });
    

});
