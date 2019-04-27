<!-- 會員中心側邊攔 -->
<div id="memberNav" class="col-md-2">
    <div class="memberImg max_view">
        <label for="memberImgFile">
            <img src="images/member2.jpg" alt="">
        </label>
    </div>
    <h3 class="max_view">李三十四</h3>
    <ul>
        <li class="here"><a href="memberCenter.html">帳號管理</a></li>
        <li><a href="memberOrder.html">訂單管理</a></li>
        <li><a href="memberBeauty.html">我的發表</a></li>
        <li><a href="memberCollection.html">我的收藏</a></li>
        <li><a href="memberFlyer.html">宣傳單管理</a></li>
        <li><a href="memberCoupons.html">我的優惠券</a></li>
        <li><a href="index.html">登出</a></li>
    </ul>
</div>





<script>
   
    //判斷登入
    let LoginState = "notFound";
    let OrderNo = "notFound";
    window.addEventListener("load", function () {
        //產生XMLHttpRequest物件
        let xhr = new XMLHttpRequest();
        //註冊callback function
        xhr.onload = function () {
            if (xhr.status == 200) { //server端可以正確的執行
                if (xhr.responseText != "notFound") {
                    LoginState = JSON.parse(xhr.responseText);
                    document.querySelector('.fa-user').src = LoginState[0]['memImgUrl'];
                    document.querySelector('.fa-user').setAttribute("id", "bigMember");
                    console.log("LoginState:已輸入值");
                    console.log("Session:" + xhr.responseText)

                    //塞值----------------------------
                    //會員ID
                    document.querySelectorAll('#memberData tr')[0].getElementsByTagName('input')[0].value =
                        LoginState[0][1];

                    //會員PSW
                    let pswdata = LoginState[0][2].split("").length;
                    let str = '';
                    for (let i = 0; i < pswdata; i++) {
                        str += "*";
                    }
                    document.querySelectorAll('#memberData tr')[1].getElementsByTagName('p')[0].innerHTML =
                        str;

                    //會員Mail
                    document.querySelectorAll('#memberData tr')[5].getElementsByTagName('input')[0].value =
                        LoginState[0][5];

                    //Tel
                    document.querySelectorAll('#memberData tr')[6].getElementsByTagName('input')[0].value =
                        LoginState[0][4];

                    //會員Name
                    document.querySelectorAll('#memberData tr')[7].getElementsByTagName('input')[0].value =
                        LoginState[0][3];

                }
            } else { //其它
                alert(xhr.status);
            }
        }
        //設定好所要連結的程式
        xhr.open("get", "php/components/_JudgeLogin.php", true);
        xhr.send(null);
    })


    //登出
    function LoginOut() {
        //產生XMLHttpRequest物件
        let xhr = new XMLHttpRequest();
        //註冊callback function
        xhr.onload = function () {
            if (xhr.status == 200) { //server端可以正確的執行
                alert('已成功登出');
                window.location.href = "flyer.php";
            } else { //其它
                alert(xhr.status);
            }
        }
        //設定好所要連結的程式
        xhr.open("get", "php/components/_logout.php", true);
        xhr.send(null);
    }


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
</script>