<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>會員中心</title>
    <link rel="stylesheet" href="css/memberCenter.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>

    <?php require_once("php/header.php");?>
    <?php require_once("php/components/_connectDHC.php"); ?>
    <script>
        //判斷登入
            let LoginState="notFound";
            let OrderNo="notFound";
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

        //登出
        function LoginOut() {
            //產生XMLHttpRequest物件
            let xhr = new XMLHttpRequest();
            //註冊callback function
            xhr.onload = function () {
                if (xhr.status == 200) { //server端可以正確的執行
                    alert('已成功登出');
                    window.location.href="index.php";
                } else { //其它
                    alert(xhr.status);
                }
            }
            //設定好所要連結的程式
            xhr.open("get", "php/components/_logout.php", true);
            xhr.send(null);
        }
    </script>

    <!-- 並排 -->
    <div class="wrap">
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
        <!-- 會員中心帳號管理內容開始 -->
        <div id="memberData" class="col-md-10">
            <div class="memberImg min_view">
                <label for="memberImgFile">
                    <img src="images/member2.jpg" alt="">
                </label>
            </div>
            <input type="file" name="memberImg" id="memberImgFile">
            <h3 class="min_view">李三十四</h3>
            <form action="">
                <fieldset>
                    <h3>帳號管理</h3>
                    <table>
                        <tr>
                            <th>會員帳號</th>
                            <td><input type="text" value="abcd1234"></td>
                        </tr>
                        <tr>
                            <th>會員密碼</th>
                            <td class="memPswInfo">**********<i class="fas fa-pen"></i></td>
                        </tr>
                        <tr class="changePSW" style="opacity: 0;position: absolute;">
                            <td>舊密碼</td>
                            <td><input type="text"></td>
                        </tr>
                        <tr class="changePSW" style="opacity: 0;position: absolute;">
                            <td>新密碼</td>
                            <td><input type="text"></td>
                        </tr>
                        <tr class="changePSW" style="opacity: 0;position: absolute;">
                            <td>確認新密碼</td>
                            <td><input type="text"></td>
                        </tr>
                        <tr>
                            <th>會員信箱</th>
                            <td><input type="email" value="abcd1234@gmail.com"></td>
                        </tr>
                        <tr>
                            <th>會員電話</th>
                            <td><input type="tel" value="0911111111"></td>
                        </tr>
                        <tr>
                            <th>會員姓名</th>
                            <td><input type="text" value="李三十四"></td>
                        </tr>
                        <tr>
                            <th colspan="2"><input type="submit" value="確定修改" class="commonBtn"></th>
                        </tr>
                    </table>
                </fieldset>
            </form>
        </div>
    </div>






    <script>
        // 點擊會員密碼修改筆----------------
        document.querySelector('.fa-pen').addEventListener('click', function () {
            let changePSWs = document.querySelectorAll('.changePSW')
            for (let key in changePSWs) {
                let style = changePSWs[key].style.opacity;
                if (style == "0") {
                    changePSWs[key].style.opacity = '1';
                    changePSWs[key].style.position = 'relative';
                } else {
                    changePSWs[key].style.opacity = '0';
                    changePSWs[key].style.position = 'absolute';
                }
            }
        })

        
        //螢幕寬度
        let screenWidth = document.body.clientWidth;
        if(screenWidth<=768){
            
        }
    </script>
</body>
</html>