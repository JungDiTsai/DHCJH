$(document).ready(function(){
    // var styleX; 
    if(document.body.clientWidth < 1200){
        // $(".dotflip",this).on('tap',function(){
        //     var x = $('.dotflip').index(this);
        //     console.log(x);
        //     $('.dotpanel').eq(x).animate({width:'toggle'},350);
            
        // });
        // $(".dotflip",this).mouseout(function(){
        //     var x = $('.dotflip').index(this);
        //     // console.log(x);
        //     var styleX = $('.dotpanel').eq(x).css("display");
        //      console.log(styleX);
        //     //  var y = $('.dotflip').index(this);
        //     //  console.log(y);
        //      if(styleX!='none'){
        //          $('.dotpanel').eq(x).animate({width:'toggle'},350);
        //      }
        // });
        $(".dotflip",this).click(function(){
            var x = $('.dotflip').index(this);
            console.log(x);
            $('.dotpanel').eq(x).animate({width:'toggle'},350);
        });
        $(".dotflip",this).mouseout(function(){
            var x = $('.dotflip').index(this);
            // console.log(x);
            var styleX = $('.dotpanel').eq(x).css("display");
             console.log(styleX);
            //  var y = $('.dotflip').index(this);
            //  console.log(y);
             if(styleX!='none'){
                 $('.dotpanel').eq(x).animate({width:'toggle'},350);
             }
        });
    }else{
        $(".dotflip").click(function(){
            var x = $('.dotflip').index(this);
            console.log(x);
            $('.dotpanel').eq(x).css('display','block');
            
        });
        $(".dotpanel").mouseout(function(){
            // var x = $('.dotflip').index(this);
            // var styleX = $('.dotpanel').eq(x).css("display");
            //  console.log(styleX);
             
            //  if(styleX!='none'){
            //     $('.dotpanel').css('display','none');
            //  }
            $(this).css({
                "display":"none",
            });
        });
    }   
});

