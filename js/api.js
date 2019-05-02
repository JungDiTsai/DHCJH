// 先選到月份日期 
window.addEventListener("load", function(){
    // getInfo();
    calendarA();
   
})
function $id(id){
    return document.getElementById(id);
} 
newdata=new Date();
var thismon=newdata.getMonth()+1;
var nowmon=thismon;

var todaydata1=newdata.getDate();
var otherdata = todaydata1;
var  dateNum1;
// console.log('現在月份',thismon);
// console.log('現在月份',nowmon);
// console.log('todaydata1',todaydata1);

var nextmonth= document.getElementById('nextMon');
nextmonth.addEventListener('click',function(){
    nowmon+=1;
    // console.log('next',nowmon);
    calendarA();
});

var prevmonth= document.getElementById('prevMon');
prevmonth.addEventListener('click',function(){
    nowmon-=1  ;
    // console.log('pre',nowmon);
    calendarA();
});

// todaymon=dateObj.getMonth()+1;
function calendarA(){
    // custmonth= document.querySelector('#calendarTitle').innerText;//月份 
    // console.log(custmonth);
    

    var custday = document.querySelectorAll('#caleBody td');  //日期 
    var custdayLen = custday.length;

    // dateObj=new Date();
   
    for(var i =0; i<custdayLen; i++){
        custday[i].addEventListener('click',function(e){
     
            // //點擊的那一天
            var dateLi =e.target.innerText; 
             dateNum1 = parseInt(dateLi);//num
            //  console.log(dateNum1);
            // console.log('點擊',dateNum1);
            // console.log('原本',todaydata1);
           
            // // //點日期給天氣
            if(dateNum1 ==todaydata1){
                // console.log('明天',dateNum1);
                // otherdata=todaydata1;
                
                getInfo1();
            }
            else if(dateNum1 ==todaydata1+2){
                // otherdata=todaydata1+2;
                getInfo1();

            }else if(dateNum1 ==todaydata1+3){
                // otherdata=todaydata1+3;
                getInfo1();

            }else if(dateNum1 ==todaydata1+4){
                // otherdata=todaydata1+4;
                getInfo1();

            }else if(dateNum1 ==todaydata1+1){
                // otherdata=todaydata1+1;
                getInfo1();
            }else {
            //    console.log('othersday');
            //    otherdata=todaydata1+5;
             
               getInfo1();
            }
        });
    }
};
// 天氣
function getInfo1(){
	var xhr = new XMLHttpRequest();
	var url = "http://api.openweathermap.org/data/2.5/forecast?q=Taipei,TW&units=metric&appid=2dac4978aa2278e716f6f7895b632224&lang=zh_TW"
	xhr.onload = function(){
    
        
        //todaydata傳日期
		if( xhr.status == 200){
			showWeather( xhr.responseText);
		}else{
			alert(xhr.status);
		}
	}
	xhr.open("get", url, true);
	xhr.send(null)
}

function showWeather(jsonStr){
    today2 = JSON.parse(jsonStr);
//     dateObj=new Date();
  
//    console.log('succ',todaydata1,otherdata);
    if(thismon==nowmon){
        // console.log('同月份1');
      
        if(dateNum1 ==todaydata1){
            var weathertext=today2.list[0].weather[0].main;
            if(weathertext=='Clouds'){
                 weathertext = '<img src="./images/api/cloud.png" alt="cloud">';
            }else if(weathertext=='Clear'){
                weathertext = '<img src="./images/api/sun.png" alt="sun">';
            }else if(weathertext=='Rain'){
                weathertext = '<img src="./images/api/rain.png" alt="rain">';
            }
           $id("weather").innerHTML = weathertext;
         }else if(dateNum1 ==todaydata1+1){
                var weathertext = today2.list[8].weather[0].main;
                if(weathertext=='Clouds'){
                    weathertext = '<img src="./images/api/cloud.png" alt="cloud">';
                }else if(weathertext=='Clear'){
                    weathertext = '<img src="./images/api/sun.png" alt="sun">';
                }else if(weathertext=='Rain'){
                    weathertext = '<img src="./images/api/rain.png" alt="rain">';
                }
                $id("weather").innerHTML = weathertext;
          }else if(dateNum1 ==todaydata1+2){
                var weathertext= today2.list[16].weather[0].main;
          
               if(weathertext=='Clouds'){
                       weathertext = '<img src="./images/api/cloud.png" alt="cloud">';
               }else if(weathertext=='Clear'){
                   weathertext = '<img src="./images/api/sun.png" alt="sun">';
               }else if(weathertext=='Rain'){
                   weathertext = '<img src="./images/api/rain.png" alt="rain">';
               }
                 $id("weather").innerHTML = weathertext;
            }else if(dateNum1 ==todaydata1+3){
                 var weathertext = today2.list[24].weather[0].main;
           
                if(weathertext=='Clouds'){
                        weathertext = '<img src="./images/api/cloud.png" alt="cloud">';
                }else if(weathertext=='Clear'){
                    weathertext = '<img src="./images/api/sun.png" alt="sun">';
                }else if(weathertext=='Rain'){
                    weathertext = '<img src="./images/api/rain.png" alt="rain">';
                }
                $id("weather").innerHTML = weathertext;

              }else if(dateNum1 ==todaydata1+4){
                    var weathertext = today2.list[32].weather[0].main;
                    if(weathertext=='Clouds'){
                    weathertext = '<img src="./images/api/cloud.png" alt="cloud">';
                    }else if(weathertext=='Clear'){
                        weathertext = '<img src="./images/api/sun.png" alt="sun">';
                    }else if(weathertext=='Rain'){
                        weathertext = '<img src="./images/api/rain.png" alt="rain">';
                    }
                    $id("weather").innerHTML = weathertext;
            }else {
            
                $id("weather").innerHTML = '暫時不提供此天氣';
                }
       
    }else {
        // console.log('不同月份');
        $id("weather").innerHTML = '暫時不提供此天氣';
    }
   

 
  
};



