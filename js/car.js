
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
				price=$('#test').text();
				console.log(price);
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
//判斷登入
LoginState="notFound";
OrderNo="notFound";
window.addEventListener("load", function () {
    //產生XMLHttpRequest物件
    let xhr = new XMLHttpRequest();
    //註冊callback function
    xhr.onload = function () {
        if (xhr.status == 200) { //server端可以正確的執行
            if(xhr.responseText!="notFound"){
                LoginState =  JSON.parse(xhr.responseText);
                document.querySelector('.fa-user').src = LoginState[0]['memImgUrl'];
                document.querySelector('.fa-user').setAttribute("id","bigMember");
                console.log("LoginState:已輸入值");

            }
            // console.log("Session:"+xhr.responseText)
        } else { //其它
            alert(xhr.status);
        }
    }
    //設定好所要連結的程式
    xhr.open("get", "php/components/_JudgeLogin.php", true);
    xhr.send(null);
})

//登入
function sendLogin() {
	//產生XMLHttpRequest物件
let xhr = new XMLHttpRequest();
//註冊callback function
xhr.onload = function () {
	if (xhr.status == 200) { //server端可以正確的執行
		if(xhr.responseText=="帳號密碼錯誤"){
			alert(xhr.responseText);
		}
		else if(xhr.responseText=="你的帳號已被凍結"){
			alert(xhr.responseText);
		}
		else{
			window.location.reload();
			// var price=document.getElementById(' test').value;
			
			$.ajax({
				url:'../carprice.php',
				data:{ price:price},                   
				type:'post',
				error:function(){                                                                 

					alert("失敗");

					},
				success:function(data){
					// x.innerHTML=data;
					console.log(data);
				   
				  }   
				})
		}
	} else { //其它
		alert(xhr.status);
	}
}
//設定好所要連結的程式
var url = "php/components/_login.php";
xhr.open("Post", url, true);
xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
var data_info = "memId=" + document.getElementById("memId").value + "&memPsw="+ document.getElementById("memPsw").value;
//送出資料
xhr.send(data_info);
}

/* 登入燈箱 JS*/
        // 點擊icon開啟登入燈箱----------------------------
		carEnd .addEventListener('click', function (e) {

            if( LoginState == "notFound"){
                // 顯示登入燈箱
                let loginBox = document.querySelector('.loginBox');
                let style = window.getComputedStyle(loginBox, null).getPropertyValue('display');
                if (style == "block") {
                    document.getElementById('lightWrap').style.setProperty('display', "none");
					loginBox.style.setProperty('display', "none");
					
                } else {
                    loginBox.style.setProperty('display', "block");
                    document.getElementById('lightWrap').style.setProperty('display', "block");
                }
            }else{
                window.location.href = "memberCenter.php";
            }
            
        })
        // 點擊關閉----------------------------
        document.querySelector('.loginBox .fa-times').addEventListener('click', function () {
            let loginBox = document.querySelector('.loginBox');
            let style = window.getComputedStyle(loginBox, null).getPropertyValue('display');
            if (style == "block") {
                loginBox.style.setProperty('display', "none");
                document.getElementById('lightWrap').style.setProperty('display', "none");
            }
        })
        // 點擊註冊------------------------------
        document.querySelector('.loginBox .showRegistered').addEventListener('click', function () {
            // 隱藏登入燈箱
            let loginBox = document.querySelector('.loginBox');
            loginBox.style.setProperty('display', "none");
            // 顯示註冊燈箱
            let registeredBox = document.querySelector('.registeredBox');
            let style = window.getComputedStyle(registeredBox, null).getPropertyValue('display');
            if (style == "none") {
                registeredBox.style.setProperty('display', "block");
            }
        })
        // 點擊忘記密碼------------------------------
        document.querySelector('.loginBox .showForgotPSW').addEventListener('click', function () {
            // 隱藏登入燈箱
            let loginBox = document.querySelector('.loginBox');
            loginBox.style.setProperty('display', "none");
            // 顯示忘記密碼燈箱
            let forgotBox = document.querySelector('.forgotBox');
            let style = window.getComputedStyle(forgotBox, null).getPropertyValue('display');
            if (style == "none") {
                forgotBox.style.setProperty('display', "block");
            }
        })

        /* 註冊燈箱 JS*/
        // 點擊關閉----------------------------
        document.querySelector('.registeredBox .fa-times').addEventListener('click', function () {
            let registeredBox = document.querySelector('.registeredBox');
            let style = window.getComputedStyle(registeredBox, null).getPropertyValue('display');
            if (style == "block") {
                registeredBox.style.setProperty('display', "none");
                document.getElementById('lightWrap').style.setProperty('display', "none");
            }
        })
        // 點擊回到登入----------------------------
        document.querySelector('.registeredBox .backLogin').addEventListener('click', function () {
            // 隱藏註冊燈箱
            let registeredBox = document.querySelector('.registeredBox');
            registeredBox.style.setProperty('display', "none");
            // 顯示登入燈箱
            let loginBox = document.querySelector('.loginBox');
            let style = window.getComputedStyle(loginBox, null).getPropertyValue('display');
            if (style == "none") {
                loginBox.style.setProperty('display', "block");
            }
        })

        /* 忘記密碼燈箱 JS*/
        // 點擊關閉----------------------------
        document.querySelector('.forgotBox .fa-times').addEventListener('click', function () {
            let forgotBox = document.querySelector('.forgotBox');
            let style = window.getComputedStyle(forgotBox, null).getPropertyValue('display');
            if (style == "block") {
                forgotBox.style.setProperty('display', "none");
                document.getElementById('lightWrap').style.setProperty('display', "none");
            }
        })
        // 點擊回到登入----------------------------
        document.querySelector('.forgotBox .backLogin').addEventListener('click', function () {
            // 隱藏忘記密碼燈箱
            let forgotBox = document.querySelector('.forgotBox');
            forgotBox.style.setProperty('display', "none");
            // 顯示登入燈箱
            let loginBox = document.querySelector('.loginBox');
            let style = window.getComputedStyle(loginBox, null).getPropertyValue('display');
            if (style == "none") {
                loginBox.style.setProperty('display', "block");
            }
        })