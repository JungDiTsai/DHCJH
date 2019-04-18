// $(document).ready(function(){
//     //四大步驟更換
//     // var _index = 0;
//     $('.btnCustStep').click(function(){
//         // _index = $(this).index();
//         $(this).addClass('custSelected').siblings().removeClass('custSelected');
//     });

// // 如果點選步驟，就增加--，移除--
// $('#custStage').click(function(){
//     $('.hostInfo, .dateNLoc, .orderInfo').addClass('disN');
//     $('.custStageStep, .stage').removeClass('disN');
// });
// $('#custDate').click(function(){
//     $('.custStageStep, .stage, .hostInfo, .orderInfo').addClass('disN');
//     $('.dateNLoc').removeClass('disN');
// });
// $('#custHost').click(function(){
//     $('.custStageStep, .stage, .dateNLoc, .orderInfo').addClass('disN');
//     $('.hostInfo').removeClass('disN');
// });
// $('#custInfo').click(function(){
//     $('.custStageStep, .stage, .dateNLoc, .hostInfo').addClass('disN');
//     $('.orderInfo').removeClass('disN');
// });

// //客製舞台步驟更換
// $('.btnCustStageStep').click(function(){
//     $(this).addClass('custStageSelected').siblings().removeClass('custStageSelected');
// });

// // 如果點選客製舞台步驟，就增加--，移除--
// $('#stagePattern').click(function(){
//     $('.audioPoleItem, .lightItem, .effectItem, .danceItem, .subtitleItem').addClass('disN');
//     $('.patternItem').removeClass('disN');
// });
// $('#stageAudio').click(function(){
//     $('.patternItem, .lightItem, .effectItem, .danceItem, .subtitleItem').addClass('disN');
//     $('.audioPoleItem').removeClass('disN');
// });
// $('#stageLight').click(function(){
//     $('.patternItem, .audioPoleItem, .effectItem, .danceItem, .subtitleItem').addClass('disN');
//     $('.lightItem').removeClass('disN');
// });
// $('#stageEffect').click(function(){
//     $('.patternItem, .audioPoleItem, .lightItem, .danceItem, .subtitleItem').addClass('disN');
//     $('.effectItem').removeClass('disN');
// });
// $('#stageDance').click(function(){
//     $('.patternItem, .audioPoleItem, .lightItem, .effectItem, .subtitleItem').addClass('disN');
//     $('.danceItem').removeClass('disN');
// });
// $('#stageSubtitle').click(function(){
//     $('.patternItem, .audioPoleItem, .lightItem, .effectItem, .danceItem').addClass('disN');
//     $('.subtitleItem').removeClass('disN');
// });
    
    
//     //內塗裝點選下一步
//     if($('#stagePattern').hasClass('custStageSelected')){
//         $('.nextStep').click(function(){
//             //重新選擇變成上一步
//             $('.previousStep').text('上一步');
//             //跳轉音響鋼管頁面
//             $('.patternItem, .lightItem, .effectItem, .danceItem, .subtitleItem').addClass('disN');
//             $('.audioPoleItem').removeClass('disN');
//             //滅燈亮燈
//             $('#stagePattern').removeClass('custStageSelected').next().addClass('custStageSelected');
//             console.log("01");
//         })
//     }

//     // //音響鋼管點選下一步
//     if($('#stageAudio').hasClass('custStageSelected')){
//         $('.nextStep').click(function(){
//             //跳轉燈光頁
//             $('.patternItem, .audioPoleItem, .effectItem, .danceItem, .subtitleItem').addClass('disN');
//             $('.lightItem').removeClass('disN');
//             //滅燈亮燈
//             $('#stagePattern').removeClass('custStageSelected').next().addClass('custStageSelected');
//             console.log("02");
//         })
//     }
// });

// ======================================================
//客製步驟功能
// ======================================================
// var index = 0;
// var temp = 0;
// $(document).ready(function(){
//     $('.dateNLoc, .hostInfo, .orderInfo').addClass('disN');
//     $('.audioPoleItem, .lightItem, .effectItem, .danceItem, .subtitleItem').addClass('disN');
//     $('.previousStep').text('重新選擇');
//     $('.nextStep').text('下一步');
//     // 上一步
//     $('.previousStep').bind('click', function(){
//         index = temp;
//         index--;
//         temp = index;
//         console.log(index);
//         controlContent(index);
//     });
//     // 下一步
//     $('.nextStep').bind('click', function(){
//         index = temp;
//         index++;
//         temp = index;
//         console.log(index);
//         controlContent(index);
//     });

//     //讓點選index與下方共用
//     $('.btnCustStageStep').click(function(index){
//         temp = index = $(this).index();
//         console.log(index);
//         $(this).addClass('custStageSelected').siblings().removeClass('custStageSelected');
//         controlContent(index);
//     });
    
//     $('.btnCustStep').click(function(){
//         index = $(this).index();
//         if(index > 0){
//             index = index+5;
//         }else{
//             index = index;
//         }
//         $(this).addClass('custSelected').siblings().removeClass('custSelected');
//         controlContent(index);
//         temp = index;
//     });
    
// });


// function controlContent(index){
//     var stepContents = ["patternItem", "audioPoleItem", "lightItem", "effectItem", "danceItem", "subtitleItem", "dateNLoc", "hostInfo", "orderInfo"];
//     var key;
//     for (key in stepContents){
//         var stepContent = stepContents[key];
//         if (key == index ){
//             if( stepContent == "patternItem"  ){
//                 $('.previousStep').text('重新選擇');
//             }else{
//                 $('.previousStep').text('上一步');
//             }
//             if( stepContent == 'orderInfo'){
//                 $('.nextStep').text('結帳');
//             }else{
//                 $('.nextStep').text('下一步');
//             }
//             if(index < 6){
//                 $('.custStage').removeClass('disN');
//                 $(`.${stepContent}`).removeClass('disN');
//                 $(`.custStageStep${key}`).addClass('custStageSelected');
//                 $('.custStep0').addClass('custSelected');
//                 $(".custStep6, .custStep7, .custStep8").removeClass('custSelected');
//             }else
//                 $('.custStage').addClass('disN');
//                 $(`.${stepContent}`).removeClass('disN');
//                 $(`.custStep${key}`).addClass('custSelected');
//         }else{
//             if( index < 6 ){
//                 $(`.${stepContent}`).addClass('disN');
//                 $(`.custStageStep${key}`).removeClass('custStageSelected');
//             }else{
//                 $(`.${stepContent}`).addClass('disN');
//                 $(`.custStep${key}`).removeClass('custSelected');
//             }
//         }
//     }
// }


$(document).ready(function(){
    
    $('.danceItem, .effectItem, .subtitleItem, .audioPoleItem, .dateNLoc, .hostInfo, .orderInfo').addClass('disN');

    // 客製花車步驟---start
    var index = 0;
    $('.previousStep').text('重新選擇');
    $('.nextStep').text('下一步');
    // 上一步
    $('.previousStep').bind('click', function(){
        index--;
        controlContent(index);
    });
    // 下一步
    $('.nextStep').bind('click', function(){
        index++;
        controlContent(index);
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