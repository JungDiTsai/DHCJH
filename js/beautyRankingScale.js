window.addEventListener('resize',function(){
    if(window.innerWidth < 1200){
        stagescale();
    }else{
        init();
        carArr[1].style.transform='scale(1.2)';
    }
})
carArr = document.getElementsByClassName("beautyRankingbg");
carArr[1].style.transform='scale(1.2)';
function stagescale(){
    for(i=0;i<carArr.length;i++){
        if(this == carArr[i]){
            carArr[i].style.transform = 'scale(1.2)';
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
        }
    }
}
window.onload=init;

// function stagescaleorign(){
//     this.style.transform='scale(1)';
// // }

