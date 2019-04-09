$(document).ready(function(){
    //四大步驟更換
    // var _index = 0;
    $('.btnCustStep').click(function(){
        // _index = $(this).index();
        $(this).addClass('custSelected').siblings().removeClass('custSelected');
    });

    // 如果點選步驟，就增加--，移除--
    $('#custStage').click(function(){
        $('.hostInfo, .dateNLoc, .orderInfo').addClass('disN');
        $('.custStageStep, .stage').removeClass('disN');
    });
    $('#custDate').click(function(){
        $('.custStageStep, .stage, .hostInfo, .orderInfo').addClass('disN');
        $('.dateNLoc').removeClass('disN');
    });
    $('#custHost').click(function(){
        $('.custStageStep, .stage, .dateNLoc, .orderInfo').addClass('disN');
        $('.hostInfo').removeClass('disN');
    });
    $('#custInfo').click(function(){
        $('.custStageStep, .stage, .dateNLoc, .hostInfo').addClass('disN');
        $('.orderInfo').removeClass('disN');
    });

    //客製舞台步驟更換
    $('.btnCustStageStep').click(function(){
        $(this).addClass('custStageSelected').siblings().removeClass('custStageSelected');
    });

    // 如果點選客製舞台步驟，就增加--，移除--
    $('#stagePattern').click(function(){
        $('.audioPoleItem, .lightItem, .effectItem, .danceItem, .subtitleItem').addClass('disN');
        $('.patternItem').removeClass('disN');
    });
    $('#stageAudio').click(function(){
        $('.patternItem, .lightItem, .effectItem, .danceItem, .subtitleItem').addClass('disN');
        $('.audioPoleItem').removeClass('disN');
    });
    $('#stageLight').click(function(){
        $('.patternItem, .audioPoleItem, .effectItem, .danceItem, .subtitleItem').addClass('disN');
        $('.lightItem').removeClass('disN');
    });
    $('#stageEffect').click(function(){
        $('.patternItem, .audioPoleItem, .lightItem, .danceItem, .subtitleItem').addClass('disN');
        $('.effectItem').removeClass('disN');
    });
    $('#stageDance').click(function(){
        $('.patternItem, .audioPoleItem, .lightItem, .effectItem, .subtitleItem').addClass('disN');
        $('.danceItem').removeClass('disN');
    });
    $('#stageSubtitle').click(function(){
        $('.patternItem, .audioPoleItem, .lightItem, .effectItem, .danceItem').addClass('disN');
        $('.subtitleItem').removeClass('disN');
    });
    




});