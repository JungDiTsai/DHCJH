
///////客服機器人區////
//打開客服小姐
$('#customerServiceGirl').click(function(){
    $('.chatrobot').fadeIn(400).css("display","block");    
    $('#gameAndService').fadeIn(400).addClass('popOutBgiBlack');
    $('#customerServiceGirl').fadeOut(300);
    //$('body').addClass('noscroll');
    //$('.chatrobot').addClass('scrollLightBox');
});
$('.closebtn').click(function(){
    $('.chatrobot').fadeOut(400).css("display","none");
    $('#gameAndService').removeClass('popOutBgiBlack');
    $('#customerServiceGirl').fadeIn(500);
    //$('body').removeClass('noscroll');
    //$('.chatrobot').removeClass('scrollLightBox');
});

//送出資料，滑鼠點擊送出
var chatbtn = document.querySelector('.chatbtn');
var message = document.querySelector(".messagebox");

chatbtn.addEventListener('click',say);
function say(e){
    if (message.value == "") {  //未輸入內容，無法發送
        e.preventDefault();
    }else {
        append("<div class='customMessage'>" + message.value + "</div>");
        answer(say);
    }
}
//當按下 enter 鍵時，會呼叫此函數進行回答
message.onkeydown = keyin;
function keyin(e) {
var keyCode = e.which; // 取出按下的鍵
    if (keyCode == 13 && !event.shiftKey == 1) { //shift+enter，換行
        e.returnValue = false;  //停止textarea本身enter換行功能
        if (message.value == "") {  //未輸入內容，無法發送
            e.preventDefault();
        } else {
            say();
        }
    }
}

// 回答問題 
function answer(say){     
// alert(message.value);
console.log(message.value);
    var xhr = new XMLHttpRequest();


    //xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function(){
        if(xhr.status == 200){
            if(xhr.responseText=='不知道怎麼回答ˊˋ'){
                var hardToReply = ['誒豆～這個偶不知道耶','哩勒供蝦咪？？', '這個偶不懂耶～偶腦袋不好拍謝','偶看不懂你在寫蝦咪？囧','拍謝啦！看不懂～哇阿餒母湯'];
                var replyNumber = Math.floor((Math.random()*5));
                alert(hardToReply[replyNumber]);  
            }else{
                //alert("hiihih"+xhr.responseText);
                append( "<div class='avatar'><p class='avatar__text'>" + xhr.responseText + "</p></div>")
            }
        }else{
            alert(xhr.status);
        }
    }
    var say = "robotAsk=" + message.value;
    xhr.open("get", "php/robot.php?"+say, true);
    xhr.send(null);
    message.value = '';
}


// chatbox 加入對話
function append(line){
    var messageContent = document.querySelector(".chatbox"); // 取出對話框
    messageContent.innerHTML += line;
    // document.querySelector(".messagebox").value = '';

    var scrollHeight = $('.chatbox').prop("scrollHeight"); //scrollbar自動在最下方
    $('.chatbox').scrollTop(scrollHeight);

}
