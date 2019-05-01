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
                // console.log("LoginState:已輸入值");
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
                LoginState =  JSON.parse(xhr.responseText);
                // window.location.reload();
                let loginBox = document.querySelector('.loginBox');
                loginBox.style.setProperty('display', "none");
                let lightWrap = document.querySelector('#lightWrap');
                lightWrap.style.setProperty('display', "none");
                // $('.checkoutBg').removeClass('disN');
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



//登出
function LoginOut() {
    //產生XMLHttpRequest物件
    let xhr = new XMLHttpRequest();
    //註冊callback function
    xhr.onload = function () {
        if (xhr.status == 200) { //server端可以正確的執行
            alert('已成功登出');
            window.location.reload();
        } else { //其它
            alert(xhr.status);
        }
    }
    //設定好所要連結的程式
    xhr.open("get", "php/components/_logout.php", true);
    xhr.send(null);
}



//註冊帳號
function registered(){
    //產生XMLHttpRequest物件
    let xhr = new XMLHttpRequest();
    //註冊callback function
    xhr.onload = function () {
        if (xhr.status == 200) { //server端可以正確的執行
            alert(xhr.responseText);
            window.location.reload();
        } else { //其它
            alert(xhr.status);
        }
    }
    //設定好所要連結的程式
    var url = "php/components/_addMember.php";
    xhr.open("Post", url, true);
    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
    let addMemID = document.getElementById('addMemID').value;
    let addMemPsw = document.getElementById('addMemPsw').value;
    let addMemMail = document.getElementById('addMemMail').value;
    let addMemTel = document.getElementById('addMemTel').value;
    let addMemName = document.getElementById('addMemName').value;
    let addMemSex = document.querySelector('.addMemSex:checked').value;
    let addMem = [addMemID,addMemPsw,addMemName,addMemTel,addMemMail,addMemSex];
    var data_info = "addMember=" + JSON.stringify(addMem);
    //送出資料
    xhr.send(data_info);

}

//檢查帳號
    document.getElementById('addMemID').addEventListener('change',function(e){
        console.log(e.target.value);
    //產生XMLHttpRequest物件
    let xhr = new XMLHttpRequest();
    //註冊callback function
    xhr.onload = function () {
        if (xhr.status == 200) { //server端可以正確的執行
            if(xhr.responseText == "已有此帳號"){
                document.getElementById('IdStatus2').style.display="table-row";
                console.log(xhr.responseText);
                document.getElementById('registeredButton').disabled=true;
            }else{
                document.getElementById('IdStatus2').style.display="none" ;
                document.getElementById('registeredButton').disabled=false;
                console.log(xhr.responseText);
            }
        } else { //其它
            alert(xhr.status);
        }
    }
    //設定好所要連結的程式
    xhr.open("get", "php/components/_checkId.php?memId="+e.target.value, true);
    xhr.send(null);
    })
    //忘記密碼
    document.getElementById('forgotPSWBtn').addEventListener('click',function(){
        console.log(document.getElementById('forgotPSW').value);
        let forgotPSW = document.getElementById('forgotPSW').value;
          //產生XMLHttpRequest物件
          var xhr = new XMLHttpRequest();
          //註冊callback function
          xhr.onreadystatechange = function(){
            if( xhr.readyState == XMLHttpRequest.DONE ){ //server端執行完畢
              if( xhr.status == 200){ //server端可以正確的執行
                   if(xhr.responseText=='Success!'){
                        alert('您的密碼已成功送出');
                   }else if(xhr.responseText=='沒有找到此信箱'){
                        alert('沒有找到此信箱');
                   }else{
                        alert('寄信失敗');
                   }
              }else{ //其它
                  alert( xhr.status );
              }
            }
          } 
          //設定好所要連結的程式
          var url = "php/components/_testMail.php?memMail=" + forgotPSW;
          xhr.open("get", url, true);
          //送出資料
          xhr.send(null);
        
    })