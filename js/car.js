var startGame = document.getElementById('startGame');


var canvas = document.querySelector('canvas');
var ctx = canvas.getContext('2d');
var scoreHeading = document.querySelector("#score");
var carEnd = document.getElementById('carEnd');
var endButton = document.getElementById('endButton');

var speed = 35,
	score = 2,
	trafficSpeed = 10,
	playerCarLanes = [27, 195, 365],
	playerCarCurrentLane = playerCarLanes[1],//195
	trafficCarsArray = [{lane: playerCarLanes[2], posY: -260}],
	collision = false

startGame.addEventListener('click',gogogo);
function gogogo(){
    // alert('1');
    
    var carStart = document.getElementById('carStart');
    carStart.style.display='none';
    canvasH = canvas.height;
    canvasW = canvas.width;
    speed = 35;
	score = 5;
	trafficSpeed = 10;
	playerCarLanes = [27, 195, 365];
	playerCarCurrentLane = playerCarLanes[1];//195
	trafficCarsArray = [{lane: playerCarLanes[2], posY: -260}];
	collision = false
    drawFrame();
}
// deviders
var canvasH = canvas.height; //700
// console.log(canvasH);
var canvasW = canvas.width;//500
ctx.lineWidth = 10;//白線寬度
ctx.setLineDash([100, 150]);//白線間隔
ctx.strokeStyle = '#F7F7F9';

// player car 
var playerCar = new Image();
// document.querySelector('#blue-car').style.width='1%';
playerCar.src = document.querySelector('#blue-car').getAttribute('src');
function drawPlayerCar() {  //.................
	ctx.drawImage(playerCar, playerCarCurrentLane-27, 500); //blue car 開始位置
}

// traffic randomizer紅色車子
var trafficCar = new Image();
trafficCar.src = document.querySelector('#red-car').getAttribute('src');
function trafficRandomizer() { //.................
	var trafficLane = playerCarLanes[Math.floor(Math.random() * playerCarLanes.length)];
	trafficCarsArray.push({lane: trafficLane, posY: -260});
}
var max = 1500;
var min = 500;
(function randomInterval() {
	var int = Math.floor(Math.random() * (max - min +1 )) + min;
	timerId = window.setTimeout(function() {
		// console.log(int);
		trafficRandomizer();
		randomInterval();
	}, int);
}());

// change lane
document.addEventListener('keydown', function(event) {
	var arrow = event.key;
	var currentCarLane = playerCarLanes.indexOf(playerCarCurrentLane);
	var newLane = currentCarLane;
	if( arrow == 'ArrowLeft' && currentCarLane !== 0 ) {
		newLane = currentCarLane - 1;
	} else if( arrow == 'ArrowRight' && currentCarLane !== 2 ) {
		newLane = currentCarLane + 1;
	}
	playerCarCurrentLane = playerCarLanes[newLane];
});

// draw frame
function drawFrame() {
	ctx.clearRect(0, 0, canvasW, canvasH);
	// devider 1
	canvasH += speed;
	ctx.beginPath();
	ctx.moveTo(166, canvasH);
	ctx.lineTo(166, 0);
	// devider 2
	ctx.moveTo(332, canvasH);
	ctx.lineTo(332, 0);
	ctx.stroke();
	// car
	drawPlayerCar();
	// traffic
	for( var i = 0; i < trafficCarsArray.length; i++ ) {
		var thisCar = trafficCarsArray[i];
		var trafficLane = thisCar.lane;
		var trafficPosY = thisCar.posY += trafficSpeed;
		ctx.drawImage(trafficCar, trafficLane, trafficPosY);
		// collision
		if( trafficLane == playerCarCurrentLane && trafficPosY > 280 ) {
			window.cancelAnimationFrame(drawFrame);
            collision = true;
           //////////失敗的話     
			var carStart = document.getElementById('carStart');
            var backpage = document.getElementById('backpage');
			carStart.style.display='block';
			carStart.style.float='left';
			backpage.style.float='left';
			backpage.style.display='block';
			backpage.onclick= beforepage;
			function beforepage(){
				window.history.back();
			}
            scoreHeading.textContent = 5;
            
            // gogogo();
                return false;	
        }
        

		// remove car when out of frame and add score
		if( trafficPosY > 700 ) {
			trafficCarsArray.splice(thisCar, 1);
            scoreHeading.textContent = score -= 1;
            if(scoreHeading.textContent ==0){
              
             ////////////成功的話
                carEnd.style.display='block';
                return false;
            }else{
                //  alert('1');
            }
		}
	}
	window.requestAnimationFrame(drawFrame);
}
// window.requestAnimationFrame(drawFrame);

// retry
// document.onclick = function() {
// 	if( collision ) {
// 		ctx.clearRect(0, 0, canvasW, canvasH);
// 		trafficCarsArray = [];
// 		playerCarCurrentLane = playerCarLanes[1];
// 		score = 0;
// 		scoreHeading.textContent = 0;
// 		drawFrame();
// 		collision = false;
// 	}
// }

// window.focus();
