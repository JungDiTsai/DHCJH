//////先選到月份日期 
<<<<<<< HEAD
window.addEventListener("load", function(){
    // getInfo();
    calendar();
})
var nextmon= document.getElementById('nextMon');
nextmon.addEventListener('click',function(){
    // calendar();
    alert();
});
function calendar(){
    var custmonth= document.querySelector('#calendarTitle').innerText;
    console.log(custmonth);

    var custday = document.querySelectorAll('#caleBody td');   
    var custdayLen = custday.length;
    console.log(custdayLen);
=======
var nextmon= document.getElementById('nextMon');
nextmon.addEventListener('click',function(){
    calendar();
});
function calendar(){
    var custmonth= document.querySelector('#calendarTitle').innerText;
    // console.log(custmonth);

    var custday = document.querySelectorAll('#days li');
    var custdayLen = custday.length;
>>>>>>> 2170ebda4f360dc7b905c65271eb6d0b0bbaf07a

    ////今天日期
    dateObj=new Date();
    todaydata=dateObj.getDate();
    otherdata = todaydata;
    for(var i =0; i<custdayLen; i++){
        custday[i].addEventListener('click',function(e){
            //點擊的那一天
            var dateLi =e.target.innerText; 
             dateNum = parseInt(dateLi);//num
            console.log('點擊',dateNum);
            console.log('原本',todaydata);

<<<<<<< HEAD
//             //點日期給天氣
=======
            //點日期給天氣
>>>>>>> 2170ebda4f360dc7b905c65271eb6d0b0bbaf07a
            if(dateNum ==todaydata+1){
                console.log('1');
                otherdata=todaydata+1;
                getInfo();
            }else if(dateNum ==todaydata+2){
                otherdata=todaydata+2;
                getInfo();

            }else if(dateNum ==todaydata+3){
                otherdata=todaydata+3;
                getInfo();

            }else if(dateNum ==todaydata+4){
                otherdata=todaydata+4;
                getInfo();

            }else if(dateNum ==todaydata){
                otherdata=todaydata;
                getInfo();
<<<<<<< HEAD
            }
        //    console.log('send',otherdata ,todaydata)
        });
        
    }
};
// //////天氣
function $id(id){
    return document.getElementById(id);
} 


function getInfo(){
	var xhr = new XMLHttpRequest();
	var url = "http://api.openweathermap.org/data/2.5/forecast?q=Taipei,TW&units=metric&appid=2dac4978aa2278e716f6f7895b632224&lang=zh_TW"
	xhr.onload = function(){
    //    console.log(todaydata);
        
        //todaydata傳日期
		if( xhr.status == 200){
			showWeather( xhr.responseText ,todaydata,otherdata);
		}else{
			alert(xhr.status);
		}
	}
	xhr.open("get", url, true);
	xhr.send(null)
}
function showWeather(jsonStr ,todaydata,otherdata){
    today = JSON.parse(jsonStr);
    console.log('get',todaydata ,otherdata );
    if(todaydata==otherdata){
         var weathertext=today.list[0].weather[0].main;
         if(weathertext=='Clouds'){
              weathertext = '<img src="./images/api/2.png" alt="pic">';
         }else if(weathertext=='Clear'){
             weathertext = '<img src="./images/api/sun.png" alt="pic">';
         }else if(weathertext=='Rain'){
             weathertext = '<img src="./images/api/3.png" alt="pic">';
         }
        $id("weather").innerHTML = weathertext;
    }else if(otherdata== (todaydata+1)){
        var weathertext = today.list[8].weather[0].main;
        if(weathertext=='Clouds'){
            weathertext = '<img src="./images/api/2.png" alt="pic">';
       }else if(weathertext=='Clear'){
           weathertext = '<img src="./images/api/sun.png" alt="pic">';
       }else if(weathertext=='Rain'){
           weathertext = '<img src="./images/api/3.png" alt="pic">';
       }
         $id("weather").innerHTML = weathertext;
    }else if(otherdata==(todaydata+2)){
        var weathertext= today.list[16].weather[0].main;
       
            if(weathertext=='Clouds'){
                    weathertext = '<img src="./images/api/2.png" alt="pic">';
            }else if(weathertext=='Clear'){
                weathertext = '<img src="./images/api/sun.png" alt="pic">';
            }else if(weathertext=='Rain'){
                weathertext = '<img src="./images/api/3.png" alt="pic">';
            }
         $id("weather").innerHTML = weathertext;
    }else if(otherdata==(todaydata+3)){
        var weathertext = today.list[24].weather[0].main;
        
            if(weathertext=='Clouds'){
                    weathertext = '<img src="./images/api/2.png" alt="pic">';
            }else if(weathertext=='Clear'){
                weathertext = '<img src="./images/api/sun.png" alt="pic">';
            }else if(weathertext=='Rain'){
                weathertext = '<img src="./images/api/3.png" alt="pic">';
            }
<<<<<<< HEAD
         $id("weather").innerHTML = weathertext;
    }else if(otherdata==(todaydata+4)){
        var weathertext = today.list[32].weather[0].main;
            if(weathertext=='Clouds'){
            weathertext = '<img src="./images/api/2.png" alt="pic">';
            }else if(weathertext=='Clear'){
                weathertext = '<img src="./images/api/sun.png" alt="pic">';
            }else if(weathertext=='Rain'){
                weathertext = '<img src="./images/api/3.png" alt="pic">';
            }
            $id("weather").innerHTML = weathertext;
    }
     
    
=======
        }
   
 var myPix = new Array("images/api/sun.png","images/api/cloud.jpg","images/api/rain.jpg");
 var randomNum = Math.floor((Math.random() * myPix.length ));
 var x = myPix[randomNum];
 document.getElementById("myPicture").innerHTML = '<img class="myPictureImg"src= " '+ x +' ">';
>>>>>>> ee1f6061ae65be512238b8b9aa6e483557bd014f
    
=======
            }
        //    console.log('send',otherdata ,todaydata)
        });
        
    }
};
//天氣
function $id(id){
    return document.getElementById(id);
} 
window.addEventListener("load", function(){
    getInfo();
    calendar();
})

function getInfo(){
	var xhr = new XMLHttpRequest();
	var url = "http://api.openweathermap.org/data/2.5/forecast?q=Taipei,TW&units=metric&appid=2dac4978aa2278e716f6f7895b632224&lang=zh_TW"
	xhr.onload = function(){
    //    console.log(todaydata);
        
        //todaydata傳日期
		if( xhr.status == 200){
			showWeather( xhr.responseText ,todaydata,otherdata);
		}else{
			alert(xhr.status);
		}
	}
	xhr.open("get", url, true);
	xhr.send(null)
}
function showWeather(jsonStr ,todaydata,otherdata){
    today = JSON.parse(jsonStr);
    console.log('get',todaydata ,otherdata );
    if(todaydata==otherdata){
        $id("weathertest").innerText = today.list[0].weather[0].main;
    }else if(otherdata== (todaydata+1)){
        $id("weathertest").innerText = today.list[8].weather[0].main;
    }else if(otherdata==(todaydata+2)){
        $id("weathertest").innerText = today.list[16].weather[0].main;
        console.log(today.list[16].weather[0].main)
    }else if(otherdata==(todaydata+3)){
        $id("weathertest").innerText = today.list[24].weather[0].main;
    }else if(otherdata==(todaydata+4)){
        $id("weathertest").innerText = today.list[32].weather[0].main;
    }
     
    
    
>>>>>>> 2170ebda4f360dc7b905c65271eb6d0b0bbaf07a
    // var dateString = today.list[0].dt_txt ;//撈出年月日
    //  weatherDay = dateString.substr(8,3) //撈出日期
    // console.log(weatherDay);
    // console.log(today.list[0].dt_txt);
    // console.log(dateString.substr(8,3));
    // console.log(today.list[16].weather[0].main);
  };




