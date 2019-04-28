//判斷登入
let LoginState="notFound";
let OrderNo="notFound";
console.log(LoginState)
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
            console.log("Session:"+xhr.responseText)
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
            console.log(xhr.responseText);
        } else { //其它
            alert(xhr.status);
        }
    }
    //設定好所要連結的程式
    xhr.open("get", "php/components/_logout.php", true);
    xhr.send(null);
}