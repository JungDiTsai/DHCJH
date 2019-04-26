// TweenMax.to('.box_01',2,{
//     x:560,
//     //repeat:-1,
//     yoyo:true,
//     repeatDelay: 1,
//     ease: Bounce.easeOut,
// });

// TweenMax.from('.box_02',2,{
//     x:560,
//     //repeat:-1,
//     yoyo:true,
//     repeatDelay: 2,
//     ease: Bounce.easeOut,
// });

// TweenMax.fromTo('.box_03',2,{
//     x:300,
//     },
//     {x:900,
//     //repeat:-1,
//     yoyo:true,
//     ease: Bounce.easeOut,
// });

// TweenMax.rotationX('.mainbar',360)

function alerts(){
    alert("done!");
};

var tl = new  TimelineMax({
    //方法
   repeat: 1,
   yoyo: true,
   onComplete: alerts,//呼叫函式名稱
 });

var tl_01 = TweenMax.to('.box_01' , 1 ,{ x: 100});
var tl_02  =  TweenMax.to('.box_02' , 1 ,{ y: 100});
var tl_03  =  TweenMax.to('.box_03' , 1 ,{ y: 100 , x: 100});

tl.add(tl_01);
tl.add(tl_02);
tl.add(tl_03);
tl.stop();

document.getElementById('play').onclick=function(){
    tl.play();
}
document.getElementById('stop').onclick = function () {
    tl.stop();
 }

function parallaxs(){
    var scene = document.getElementById('parallaxContainer');
    var parallax = new Parallax(scene);
}
parallaxs();

//初始化
var controller = new ScrollMagic.Controller();

//動畫
var animation_01 = TweenMax.to('#scrollTest', 1, {
    y: 100,
    rotation: 360
})

//觸發事件


var section_01 = new ScrollMagic.Scene({
    triggerElement: "#triggle",

}).setTween(animation_01)//觸發動畫
.addIndicators()
.addTo(controller)