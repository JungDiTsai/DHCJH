// 先選到月份日期 
window.addEventListener("load", function(){
    // getInfo();
    calendarA();
   
})
function $id(id){
    return document.getElementById(id);
} 
dateObj=new Date();
var todaymon=dateObj.getMonth()+1;

var next=todaymon;
console.log('現在月份',todaymon);

var nextmon= document.getElementById('nextMon');
nextmon.addEventListener('click',function(){
    next+=1;
    console.log('next',next);
    // calendarA();
});

var prevmon= document.getElementById('prevMon');
prevmon.addEventListener('click',function(){
    next-=1  ;
    console.log('pre',next);
    // calendarA();
});

// todaymon=dateObj.getMonth()+1;
function calendarA(){
    custmonth= document.querySelector('#calendarTitle').innerText;//月份 
    console.log(custmonth);
    

    var custday = document.querySelectorAll('#caleBody td');  //日期 
    var custdayLen = custday.length;
    console.log(custdayLen);

    
    dateObj=new Date();
    todaydata=dateObj.getDate();
    otherdata = todaydata;
    console.log('todaydata',todaydata);
    for(var i =0; i<custdayLen; i++){
        custday[i].addEventListener('click',function(e){
     
            // //點擊的那一天
            var dateLi =e.target.innerText; 
             dateNum = parseInt(dateLi);//num
            //  console.log(dateNum);
            console.log('點擊',dateNum);
            console.log('原本',todaydata);

            // //點日期給天氣
            // if(dateNum ==todaydata+1){
            //     // console.log('1');
            //     otherdata=todaydata+1;
            //     getInfo();
            // }
            // else if(dateNum ==todaydata+2){
            //     otherdata=todaydata+2;
            //     getInfo();

            // }else if(dateNum ==todaydata+3){
            //     otherdata=todaydata+3;
            //     getInfo();

            // }else if(dateNum ==todaydata+4){
            //     otherdata=todaydata+4;
            //     getInfo();

            // }else if(dateNum ==todaydata){
            //     otherdata=todaydata;
            //     getInfo();
            // }else {
            //    console.log('othersday');
            //    otherdata=todaydata+5;
             
            //    getInfo();
            // }
        });
    }
};
// 天氣
function getInfo(){
	var xhr = new XMLHttpRequest();
	var url = "http://api.openweathermap.org/data/2.5/forecast?q=Taipei,TW&units=metric&appid=2dac4978aa2278e716f6f7895b632224&lang=zh_TW"
	xhr.onload = function(){
    // console.log(todaydata);
        
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
    dateObj=new Date();
  
   
    if(todaymon==next){
        console.log('同月份1');
        if(todaydata==otherdata){
            var weathertext=today.list[0].weather[0].main;
            if(weathertext=='Clouds'){
                 weathertext = '<img src="./images/api/cloud.png" alt="cloud">';
            }else if(weathertext=='Clear'){
                weathertext = '<img src="./images/api/sun.png" alt="sun">';
            }else if(weathertext=='Rain'){
                weathertext = '<img src="./images/api/rain.png" alt="rain">';
            }
           $id("weather").innerHTML = weathertext;
       }else if(otherdata == (todaydata+1)){
           var weathertext = today.list[8].weather[0].main;
           if(weathertext=='Clouds'){
               weathertext = '<img src="./images/api/cloud.png" alt="cloud">';
          }else if(weathertext=='Clear'){
              weathertext = '<img src="./images/api/sun.png" alt="sun">';
          }else if(weathertext=='Rain'){
              weathertext = '<img src="./images/api/rain.png" alt="rain">';
          }
            $id("weather").innerHTML = weathertext;
       }else if(otherdata==(todaydata+2)){
           var weathertext= today.list[16].weather[0].main;
          
               if(weathertext=='Clouds'){
                       weathertext = '<img src="./images/api/cloud.png" alt="cloud">';
               }else if(weathertext=='Clear'){
                   weathertext = '<img src="./images/api/sun.png" alt="sun">';
               }else if(weathertext=='Rain'){
                   weathertext = '<img src="./images/api/rain.png" alt="rain">';
               }
            $id("weather").innerHTML = weathertext;
       }else if(otherdata==(todaydata+3)){
           var weathertext = today.list[24].weather[0].main;
           
               if(weathertext=='Clouds'){
                       weathertext = '<img src="./images/api/cloud.png" alt="cloud">';
               }else if(weathertext=='Clear'){
                   weathertext = '<img src="./images/api/sun.png" alt="sun">';
               }else if(weathertext=='Rain'){
                   weathertext = '<img src="./images/api/rain.png" alt="rain">';
               }
            $id("weather").innerHTML = weathertext;
       }else if(otherdata==(todaydata+4)){
           var weathertext = today.list[32].weather[0].main;
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
        console.log('不同月份');
        $id("weather").innerHTML = '暫時不提供此天氣';
    }
   

//     // console.log('get',todaydata ,otherdata );
    
};



