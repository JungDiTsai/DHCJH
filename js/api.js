var pic = document.querySelector('#weather');
var el = document.querySelectorAll('#t .q');
var localdate = document.getElementById('date');
var y ;
// console.log(el[0].innerText);



var length = el.length;

for(var i=0 ; i<length; i++){
   el[i].onclick= test;
    
    vv= el[i];
    // console.log(vv);
    
};


var dd=[
    {
      "date": 1, //國曆？號
      "localdate": "二月廿六", //農曆
     
      "address_": "中正路三段與吉安高9",
      "UnitName_": "交通局",
      
    },
    {
        "date": 2, //國曆？號
        "localdate": "二月廿七", //農曆
    },
    {
        "date": 3, //國曆？號
        "localdate": "二月廿八", //農曆
    }
];
var aa = dd.length;

function test(e){
    // console.log(e.target.innerHTML);
    y = e.target.innerHTML;
    console.log(y);
    for(var i =0; i<aa; i++){
            if(y == dd[i].date){
                alert(y);
                localdate.innerHTML=dd[i].localdate;
            }
        }
   
 var myPix = new Array("images/api/sun.png","images/api/cloud.jpg","images/api/rain.jpg");
 var randomNum = Math.floor((Math.random() * myPix.length ));
 var x = myPix[randomNum];
<<<<<<< HEAD
 document.getElementById("myPicture").innerHTML = '<img class="myPictureImg"src= " '+ x +' ">';
=======
 document.getElementById("myPicture").innerHTML = '<img src= " '+ x +' ">';
>>>>>>> first
    
}