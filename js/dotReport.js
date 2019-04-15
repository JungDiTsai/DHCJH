$(document).ready(function(){
    if(document.body.clientWidth < 1200){
<<<<<<< HEAD
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
=======
        $(".dotflip").click(function(){
            var x = $('.dotflip').index(this);
            console.log(x);
            $('.dotpanel').eq(x).css('display','block');
            
>>>>>>> 88cb117de0a2d0b2a6d1d6c2bcd169783bfe67cf
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
<<<<<<< HEAD
        $(".dotpanel").mouseout(function(){
            // var x = $('.dotflip').index(this);
            // var styleX = $('.dotpanel').eq(x).css("display");
            //  console.log(styleX);
             
            //  if(styleX!='none'){
            //     $('.dotpanel').css('display','none');
            //  }
=======
        $(".dotpanel").mouseleave(function(){
>>>>>>> 88cb117de0a2d0b2a6d1d6c2bcd169783bfe67cf
            $(this).css({
                "display":"none",
            });
        });
    }   
});

<<<<<<< HEAD
=======
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

>>>>>>> 88cb117de0a2d0b2a6d1d6c2bcd169783bfe67cf
