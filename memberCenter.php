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
    <?php require_once("php/loginLightBox.php");?>
    <?php require_once("php/components/_connectDHC.php"); ?>
    

    <!-- 並排 -->
    <div class="wrap">
        
        <?php require_once("php/memberTopNav.php");?>

        <!-- 會員中心帳號管理內容開始 -->
        <div id="memberData" class="col-md-10">
            <div class="memberImg min_view">
                <label for="memberImgFile">
                    <img src="images/member2.jpg" alt="">
                </label>
            </div>
            <input type="file" name="memberImg" id="memberImgFile">
            <h3 class="min_view">李三十四</h3>
            <form>
                <fieldset>
                    <h3>帳號管理</h3>
                    <table id="memberData">
                        <tr>
                            <th>會員帳號</th>
                            <td><input type="text" value=""></td>
                        </tr>
                        <tr>
                            <th>會員密碼</th>
                            <td class="memPswInfo">
                                <p></p>
                                <i class="fas fa-pen"></i>
                            </td>
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
                            <td><input type="email" value=""></td>
                        </tr>
                        <tr>
                            <th>會員電話</th>
                            <td><input type="tel" value=""></td>
                        </tr>
                        <tr>
                            <th>會員姓名</th>
                            <td><input type="text" value=""></td>
                        </tr>
                        <tr>
                            <th colspan="2"><button class="commonBtnSmall" onclick="return updateMember()" >確定修改</button></th>
                        </tr>
                    </table>
                </fieldset>
            </form>
        </div>
    </div>




    <script src="js/_font_loginLightBox.js"></script>
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

        //點擊送出
        function updateMember(){
            let changePSW = document.querySelectorAll('.changePSW');
            if(changePSW[0].style.opacity==1){
                
                
                if(changePSW[0].querySelector('input').value==LoginState[0]['memId']&&changePSW[1].querySelector('input').value==changePSW[2].querySelector('input').value){
                    let data =new Array();

                    data[1] = document.querySelectorAll('#memberData tr')[0].getElementsByTagName('input')[0].value;

                    data[2] = changePSW[2].querySelector('input').value;

                    data[3] = document.querySelectorAll('#memberData tr')[5].getElementsByTagName('input')[0].value;

                    data[4] = document.querySelectorAll('#memberData tr')[6].getElementsByTagName('input')[0].value;

                    data[5] = document.querySelectorAll('#memberData tr')[7].getElementsByTagName('input')[0].value;
                    
                    //產生XMLHttpRequest物件
                    let xhr = new XMLHttpRequest();
                    //註冊callback function
                    xhr.onload = function(){
                        if( xhr.status == 200){ //server端可以正確的行
                            console.log(xhr.responseText);
                        }else{ //其它
                            alert( xhr.status );
                        }
                    }  
                    //設定好所要連結的程式
                    var url = "php/components/_memberUpdate.php";
                    xhr.open("Post", url, true);
                    xhr.setRequestHeader("content-type","applicationx-www-text-urlencoded");
                    //送出資料
                    var data_info = "member=" + JSON.stringify(data);
                    xhr.send( data_info );
                    

                }else if(changePSW[0].querySelector('input').value==LoginState[0]['memId']&&changePSW[1].querySelector('input').value!=changePSW[2].querySelector('input').value){
                    alert("輸入的新密碼不同");
                }else{
                    alert("密碼錯誤");
                }
                
            }else{
                alert("關閉")
            }
            return false;
        };
    </script>
</body>
</html>