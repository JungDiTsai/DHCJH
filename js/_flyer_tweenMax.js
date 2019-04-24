TweenMax.to('.firstScreen .titleBgi', 1.5, {
    y: 130,
    ease: Elastic.easeOut,
    // yoyo: true,
 });

 //初始化
 let controller = new ScrollMagic.Controller();
 //動畫
 let animation_01 = TweenMax.to('.secScreen .titleBgi', 3, {
     y: 100,
     alpha: 1,
     rotation: 360,
     ease: Elastic.easeOut,
 })
 let animation_02 = TweenMax.to('.thrScreen .titleBgi', 3, {
    rotation: 360,
    ease: Elastic.easeOut,
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
    }).setTween(animation_02,) //觸發動畫
    .addIndicators()
    .addTo(controller)

