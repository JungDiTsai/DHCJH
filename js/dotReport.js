$(document).ready(function(){
    if(document.body.clientWidth < 1200){
        $(".dotflip").click(function(){
            var x = $('.dotflip').index(this);
            console.log(x);
            $('.dotpanel').eq(x).css('display','block');
            
        });
        $(".dotpanel").mouseleave(function(){
            $(this).css({
                "display":"none",
            });
        });
    }else{
        $(".dotflip").click(function(){
            var x = $('.dotflip').index(this);
            console.log(x);
            $('.dotpanel').eq(x).css('display','block');
            
        });
        $(".dotpanel").mouseleave(function(){
            $(this).css({
                "display":"none",
            });
        });
    }   
});

// $(document).ready(function(){
//     if(document.body.clientWidth < 1200){
//         $(".dotflip",this).click(function(){
//             var x = $('.dotflip').index(this);
//             console.log(x);
//             $('.dotpanel').eq(x).animate({width:'toggle'},350);
//         });
//         $(".dotflip",this).mouseout(function(){
//             var x = $('.dotflip').index(this);
//             // console.log(x);
//             var styleX = $('.dotpanel').eq(x).css("display");
//              console.log(styleX);
//             //  var y = $('.dotflip').index(this);
//             //  console.log(y);
//              if(styleX!='none'){
//                  $('.dotpanel').eq(x).animate({width:'toggle'},350);
//              }
//         });
//     }else{
//         $(".dotflip").click(function(){
//             var x = $('.dotflip').index(this);
//             console.log(x);
//             $('.dotpanel').eq(x).css('display','block');
            
//         });
//         $(".dotpanel").mouseleave(function(){
//             $(this).css({
//                 "display":"none",
//             });
//         });
//     }   
// });

