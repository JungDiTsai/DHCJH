window.addEventListener('resize',function(){
    if(window.innerWidth < 1200){
        stagescale();
    }else{
        init();
        carArr[i].addEventListener('mouseover', stagescale);
        carArr[1].style.transform='scale(1.3)';
    }
})

carArr = document.getElementsByClassName("beautyRankingbg");
function stagescale(){
    for(i=0;i<carArr.length;i++){
        if(this == carArr[i]){
            carArr[i].style.transform = 'scale(1.3)';
        }else{
            carArr[i].style.transform = 'scale(1)';
        }
    }
}

function init(){
    for(i=0;i<carArr.length;i++){
        if( document.body.clientWidth < 1200){
            return ;
        }else{
            carArr[i].addEventListener('mouseover', stagescale);
            carArr[1].style.transform='scale(1.3)';
        }
    }
}
btnB = document.getElementById("beautyRankingimgsBtn");
btnM = document.getElementById("beautyRankingimgsMonthBtn");
btnM.onclick=function(){
    for(i=0;i<carArr.length;i++){
    carArr[i].style.transform = 'scale(1)';
    }
    carArr[4].style.transform='scale(1.3)';
}
btnB.onclick=function(){
    for(i=0;i<carArr.length;i++){
        carArr[i].style.transform = 'scale(1)';
        }
        carArr[1].style.transform='scale(1.3)';
}


    


window.onload=init();

// function stagescaleorign(){
//     this.style.transform='scale(1)';
// // }

