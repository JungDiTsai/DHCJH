<<<<<<< HEAD
TweenMax.to('.firstScreen .titleBgi', 1.5, {
    y: 130,
    ease: Elastic.easeOut,
    // yoyo: true,
 });
=======
function getRandom(min,max){
    return Math.floor(Math.random()*(max-min+1))+min;
};

TweenMax.to('.firstScreen .titleBgi', 3, {
    y: 100,
    alpha: 1,
    ease: Power3.easeOut,
})



>>>>>>> 2170ebda4f360dc7b905c65271eb6d0b0bbaf07a

 //初始化
 let controller = new ScrollMagic.Controller();
 //動畫
<<<<<<< HEAD
 let animation_01 = TweenMax.to('.secScreen .titleBgi', 3, {
     y: 100,
=======
let animation_01 = TweenMax.to('.secScreen .titleBgi', 3, {
     y: 125,
>>>>>>> 2170ebda4f360dc7b905c65271eb6d0b0bbaf07a
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
    //  .addIndicators()
     .addTo(controller)
 //觸發事件
 let section_02 = new ScrollMagic.Scene({
        triggerElement: ".thrScreen",
        triggerHook: 0.5,
        reverse:false
<<<<<<< HEAD
    }).setTween(animation_02,) //觸發動畫
    .addIndicators()
=======
    }).setTween(animation_02) //觸發動畫
    // .addIndicators()
>>>>>>> 2170ebda4f360dc7b905c65271eb6d0b0bbaf07a
    .addTo(controller)

