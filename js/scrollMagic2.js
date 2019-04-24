
//首頁宣傳單展開動畫
var tl = new  TimelineMax();

var tl_01 = TweenMax.to('.introFlyerBoard' , .65 ,{ 
    width:280,
    ease: Elastic.easeOut.config(1, 0.4)
});
var tl_02 = TweenMax.to('.introFlyerBoard' , .55 ,{ 
    height:420,
    ease: Elastic.easeOut.config(1, 0.4)
});
var tl_03 = TweenMax.to('.introFlyerBoard img' , 0.4 ,{ 
    opacity:1,
    
});
var tl_035 = TweenMax.to('.introFlyerFunction' , 0.5 ,{ 
    opacity:1,
    width:75,
    height:75,
});
var tl_04 = TweenMax.to('#introFlyerFunctionOne' , 0.35 ,{ 
    y:120,
    ease: Back.easeOut.config(1.7)
});
var tl_05 = TweenMax.to('#introFlyerFunctionTwo' , 0.35 ,{ 
    y:120,
    x:-90,
    ease: Back.easeOut.config(1.7)
});
var tl_06 = TweenMax.to('#introFlyerFunctionThree' , 0.35 ,{ 
    y:120,
    x:90,
    ease: Back.easeOut.config(1.7)
});
var tl_07 = TweenMax.to('#introFlyer2' , 0.3 ,{ 
    x:-220,
    ease: Back.easeOut.config(1.7)
});
var tl_08 = TweenMax.to('#introFlyer3' , 0.3 ,{ 
    x:220,
    ease: Back.easeOut.config(1.7)
});


var anime1 = tl.add(tl_01).add(tl_02).add(tl_03).add(tl_035).add(tl_04).add(tl_05).add(tl_06).add(tl_07).add(tl_08);

var controller = new ScrollMagic.Controller();
var section_01 = new ScrollMagic.Scene({
    triggerElement: "#trigger",
    reverse: true,
    //觸發點偏移量
    offset: 100,
    //觸發點偏移量
    triggerHook: .8
}).setTween(anime1)//觸發動畫
.addIndicators({

})
.addTo(controller)



//首頁第二屏動畫   

var controller2 = new ScrollMagic.Controller();
var anime2 = new TweenMax.to('.popOut' , 1.8 ,{ 
    scale:1,
    ease: Elastic.easeOut.config(1, 0.4)
});

var section_02 = new ScrollMagic.Scene({
    triggerElement: "#trigger2",
    reverse: true,
    //觸發點偏移量
    offset: 0,
    //觸發點偏移量
    triggerHook: 1,
    name:'start2',
}).setTween(anime2)//觸發動畫
.addIndicators({

})
.addTo(controller2)



//首頁第三屏動畫   

var controller3 = new ScrollMagic.Controller();
var anime3 = new TweenMax.to('#beautyContestSlider' , 1.2 ,{ 
    left:0,
    ease: Elastic.easeOut.config(1, 0.4)
});

var section_03 = new ScrollMagic.Scene({
    triggerElement: "#trigger3",
    reverse: true,
    //觸發點偏移量
    offset: 100,
    //觸發點偏移量
    triggerHook: .8,
    name:'start3',
}).setTween(anime3)//觸發動畫
.addIndicators({

})
.addTo(controller3)

//首頁客服與遊戲動畫   

var controller4 = new ScrollMagic.Controller();
var anime4 = new TweenMax.to('#gameHub' , 1.5 ,{ 
    left:0,
    ease: Elastic.easeOut.config(1, 0.4)
});

var section_04 = new ScrollMagic.Scene({
    triggerElement: "#trigger4",
    reverse: true,
    //觸發點偏移量
    offset: 100,
    //觸發點偏移量
    triggerHook: .8,
    name:'start4',
}).setTween(anime4)//觸發動畫
.addIndicators({

})
.addTo(controller4)


var controller5 = new ScrollMagic.Controller();
var anime5 = new TweenMax.to('#customerServiceGirl' , 1.5 ,{ 
    bottom:-40,
    ease: Elastic.easeOut.config(1, 0.3)
});

var section_05 = new ScrollMagic.Scene({
    triggerElement: "#trigger5",
    reverse: true,
    //觸發點偏移量
    offset: 100,
    //觸發點偏移量
    triggerHook: .8,
    name:'start5',
}).setTween(anime5)//觸發動畫
.addIndicators({

})
.addTo(controller4)



//第六屏動畫
var tl3 = new  TimelineMax();

var tl3_01 = TweenMax.to('#earthGroup' , .7 ,{ 
    y:-500,
    ease: Elastic.easeOut.config(1, 0.4),
});
var tl3_02 = TweenMax.to('.getBigSet1' , .6 ,{ 
    scale:1,
    ease: Elastic.easeOut.config(1, 0.4)
});
var tl3_03 = TweenMax.to('.getBigSet2' , 0.4 ,{ 
    scale:1,
    ease: Elastic.easeOut.config(1, 0.4)
    
});




var anime6 = tl3.add(tl3_01).add(tl3_02).add(tl3_03).add(tl3_04).add(tl3_05).add(tl3_06);

var controller6 = new ScrollMagic.Controller();
var section_06 = new ScrollMagic.Scene({
    triggerElement: "#trigger6",
    reverse: true,
    //觸發點偏移量
    offset: 100,
    //觸發點偏移量
    triggerHook: .9
}).setTween(anime6)//觸發動畫
.addIndicators({

})
.addTo(controller6)