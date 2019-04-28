window.addEventListener('resize',function(){
    if(window.innerWidth < 1200){
        return;
    }else{
        init();
    }
})

carArr = document.getElementsByClassName("beautyRankingbg");
function stagescale(e){
    for(i=0;i<carArr.length;i++){
        carArr[i].style.opacity = .6;
    }
    e.target.parentNode.style.opacity = 1;
    console.log(e.target.parentNode.style.opacity);
}

function init(){
    for(i=0;i<carArr.length;i++){
        if( document.body.clientWidth < 1200){
            return ;
        }else{
            carArr[i].querySelector("img").addEventListener('mouseover', stagescale);
            carArr[i].style.opacity = .6;
            carArr[1].style.opacity = 1;
            carArr[1].style.transform='scale(1.2)';
        }
    }
}


//按鈕大小
btnB = document.getElementById("beautyRankingimgsBtn");
btnM = document.getElementById("beautyRankingimgsMonthBtn");
btnM.onclick=function(){
    for(i=0;i<carArr.length;i++){
    carArr[i].style.transform = 'scale(1)';
    }
    carArr[4].style.transform='scale(1.2)';
    carArr[4].style.opacity = 1;
}
btnB.onclick=function(){
    for(i=0;i<carArr.length;i++){
        carArr[i].style.transform = 'scale(1)';
        }
        carArr[1].style.transform='scale(1.2)';
        carArr[1].style.opacity = 1;
}


//jquery btn effect
$("#beautyRankingimgsBtn").click(function(){
    var bgcc = new Array();
    $('#beautyRankingimgs').css('display','flex');
    $('#beautyRankingimgsMonth').css('display','none');
    $('#beautyRankingimgsBtn').css('transform', 'scale(' + 1 + ')');
    $('#beautyRankingimgsMonthBtn').css('transform', 'scale(' + 1 + ')');
    $('#beautyRankingimgsMonthBtn').css('background-color','#ffffffe6'); 
    $('#beautyRankingimgsBtn').css('background-color','#F2EB50');    
    $('#beautyRankingimgsBtn').css('color','#000');   
    $('#beautyRankingimgsMonthBtn').css('color','#999');        
});
$("#beautyRankingimgsMonthBtn").click(function(){
    $('#beautyRankingimgsMonth').css('display','flex');
    $('#beautyRankingimgs').css('display','none'); 
    $('#beautyRankingimgsMonthBtn').css('transform', 'scale(' + 1 + ')');
    $('#beautyRankingimgsBtn').css('transform', 'scale(' + 1 + ')');
    $('#beautyRankingimgsMonthBtn').css('background-color','#F2EB50'); 
    $('#beautyRankingimgsBtn').css('background-color','#ffffffe6');
    $('#beautyRankingimgsBtn').css('color','#999');  
    $('#beautyRankingimgsMonthBtn').css('color','#000');         
});



window.onload=init();

//for scale
// window.addEventListener('resize',function(){
//     if(window.innerWidth < 1200){
//         stagescale();
//     }else{
//         init();
//         carArr[i].addEventListener('mouseover', stagescale);
//         carArr[1].style.transform='scale(1.3)';
//     }
// })

// carArr = document.getElementsByClassName("beautyRankingbg");
// function stagescale(){
//     for(i=0;i<carArr.length;i++){
//         if(this == carArr[i]){
//             carArr[i].style.transform = 'scale(1.3)';
//         }else{
//             carArr[i].style.transform = 'scale(1)';
//         }
//     }
// }

// function init(){
//     for(i=0;i<carArr.length;i++){
//         if( document.body.clientWidth < 1200){
//             return ;
//         }else{
//             carArr[i].addEventListener('mouseover', stagescale);
//             carArr[1].style.transform='scale(1.3)';
//         }
//     }
// }
// btnB = document.getElementById("beautyRankingimgsBtn");
// btnM = document.getElementById("beautyRankingimgsMonthBtn");
// btnM.onclick=function(){
//     for(i=0;i<carArr.length;i++){
//     carArr[i].style.transform = 'scale(1)';
//     }
//     carArr[4].style.transform='scale(1.3)';
// }
// btnB.onclick=function(){
//     for(i=0;i<carArr.length;i++){
//         carArr[i].style.transform = 'scale(1)';
//         }
//         carArr[1].style.transform='scale(1.3)';
// }


// function stagescaleorign(){
//     this.style.transform='scale(1)';
// // }

