$(document).ready(function(){
    if(document.body.clientWidth < 1200){
        $(".beautyDiscStageContainer").on('vclick','.dotflip',function(){
            var x = $('.dotflip').index(this);
            console.log(x);
            $('.dotpanel').eq(x).css('display','block');
            
        });
       $('.dotpanel li').on('vclick',function(){
        $('.dotpanel').css('display','none');
       });
    //    $(document).on('vclick', '#button', function(){ 
    //     console.log("click");
    //     });
    }else{
        $(".beautyDiscStageContainerWrap").on('click','.dotflip',function(){
            var x = $('.dotflip').index(this);
            // console.log(x);
            $('.dotpanel').eq(x).css('display','block');
            
        });
        $(".beautyDiscStageContainerWrap").on('mouseleave','.dotpanel',function(){
            // $('.dotpanel').css('display','none');
            var x = $('.dotpanel').index(this);
            console.log(x);
            $('.dotpanel').eq(x).css('display','none');
            // var x = $('.dotpanel').index(this);
            // $(this).css({
            //     "display":"none",
            // });
            //目前先註冊事件 
            // alert();
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

