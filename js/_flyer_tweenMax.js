function getRandom(min,max){
    return Math.floor(Math.random()*(max-min+1))+min;
};

TweenMax.to('.firstScreen .titleBgi', 3, {
    y: 150,
    alpha: 1,
    ease: Power3.easeOut,
})




 //初始化
let controller = new ScrollMagic.Controller();
 //動畫
let animation_01 = TweenMax.to('.secScreen .titleBgi', 3, {
     y: 100,
     alpha: 1,
     rotation: 360,
     ease: Elastic.easeOut,
})

var animation_02 = new TimelineMax({}).to('.thrScreen .titleBgi', 2, {
    alpha: 1,
    x: 0,
    ease: Bounce.easeOut,
}).to('#showflyer2 li:nth-of-type(odd)', 1, {
    ease: Expo.easeOut,
    alpha: 1,
    x: 0, 
}).to('#showflyer2 li:nth-of-type(even)', 1, {
    ease: Expo.easeOut,
    alpha: 1,
    x: 0, 
})

 //觸發事件
 let section_01 = new ScrollMagic.Scene({
         triggerElement: ".secScreen",
         triggerHook: 0.3,
         reverse:false
     }).setTween(animation_01,) //觸發動畫
     .addIndicators()
     .addTo(controller)

 //觸發事件
 let section_02 = new ScrollMagic.Scene({
        triggerElement: ".thrScreen",
        triggerHook: 0.5,
        reverse:false
    }).setTween(animation_02) //觸發動畫
    .addIndicators()
    .addTo(controller)

