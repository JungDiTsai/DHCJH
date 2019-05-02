<?php session_start(); 
    if(!isset($_SESSION['member'])){
        header('Location: flyer.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>台灣大舞台-會員中心</title>
    <link rel="Shortcut Icon" type="image/x-icon" href="images/logo.ico">
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
                    <img src="<?php echo $_SESSION["member"][0][6]?>" alt="">
                    <i class="fas fa-camera-retro fa-2x"></i>
                </label>
            </div>
            <form id="myform">
                <input type="file" name="memberImg" id="memberImgFile">
                <input type="hidden" name="memberNo" value="<?php echo $_SESSION["member"][0][0]?>">
            </form>
            <h3 class="min_view"><?php echo $_SESSION["member"][0][3]?></h3>
            <form>
                <fieldset>
                    <h3>帳號管理</h3>
                    <table id="memberData">
                        <tr>
                            <th>會員帳號</th>
                            <td><input type="text" value="<?php echo $_SESSION["member"][0][1]?>" disabled></td>
                        </tr>
                        <tr>
                            <th>會員密碼</th>
                            <td class="memPswInfo">
                                <p><i class="fas fa-key"></i></p>
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
                            <td><input type="email" value="<?php echo $_SESSION["member"][0][5]?>"></td>
                        </tr>
                        <tr>
                            <th>會員電話</th>
                            <td><input type="tel" value="<?php echo $_SESSION["member"][0][4]?>"></td>
                        </tr>
                        <tr>
                            <th>會員姓名</th>
                            <td><input type="text" value="<?php echo $_SESSION["member"][0][3]?>"></td>
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

        

        // 上傳會員照片
            //產生XMLHttpRequest物件
            document.getElementById('memberImgFile').addEventListener('change',function(){
                var xhr = new XMLHttpRequest();
            //註冊callback function
            xhr.onreadystatechange = function(){
              if( xhr.readyState == XMLHttpRequest.DONE ){ //server端執行完畢
                if( xhr.status == 200){ //server端可以正確的執行
                     console.log('上傳會員圖片路徑 :'+xhr.responseText);
                     window.location.reload(true);
                }else{ //其它
                    alert( xhr.status );
                }
              }
            } 
            //設定好所要連結的程式
            var url = "php/components/_fileUpdate.php";
            xhr.open("POST", url, true);
            
            let data_info = new FormData( document.getElementById('myform') );
            //送出資料
            xhr.send(data_info);
            })

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
                
                
                if(changePSW[0].querySelector('input').value==LoginState[0][2]&&changePSW[1].querySelector('input').value==changePSW[2].querySelector('input').value){
                    let data =new Array();

                    data[0] = document.querySelectorAll('#memberData tr')[0].getElementsByTagName('input')[0].value;

                    data[1] = changePSW[2].querySelector('input').value;

                    data[2] = document.querySelectorAll('#memberData tr')[5].getElementsByTagName('input')[0].value;

                    data[3] = document.querySelectorAll('#memberData tr')[6].getElementsByTagName('input')[0].value;

                    data[4] = document.querySelectorAll('#memberData tr')[7].getElementsByTagName('input')[0].value;

                    data[5] = LoginState[0][0];
                    
                    //產生XMLHttpRequest物件
                    let xhr = new XMLHttpRequest();
                    //註冊callback function
                    xhr.onload = function(){
                        if( xhr.status == 200){ //server端可以正確的行
                            alert("修改成功");
                            window.location.reload(true);
                        }else{ //其它
                            alert( xhr.status );
                        }
                    }  
                    //設定好所要連結的程式
                    var url = "php/components/_memberUpdate.php";
                    xhr.open("POST", url, true);
                    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
                    //送出資料
                    var data_info = "member="+JSON.stringify(data);
                    xhr.send( data_info );
                    

                }else if(changePSW[0].querySelector('input').value==LoginState[0]['2']&&changePSW[1].querySelector('input').value!=changePSW[2].querySelector('input').value){
                    alert("輸入的新密碼不同");
                }else{
                    alert("密碼錯誤");
                }
                
            }else{
                let data =new Array();

                    data[0] = document.querySelectorAll('#memberData tr')[0].getElementsByTagName('input')[0].value;

                    data[1] = document.querySelectorAll('#memberData tr')[5].getElementsByTagName('input')[0].value;

                    data[2] = document.querySelectorAll('#memberData tr')[6].getElementsByTagName('input')[0].value;

                    data[3] = document.querySelectorAll('#memberData tr')[7].getElementsByTagName('input')[0].value;

                    data[4] = LoginState[0][0];
                    
                    //產生XMLHttpRequest物件
                    let xhr = new XMLHttpRequest();
                    //註冊callback function
                    xhr.onload = function(){
                        if( xhr.status == 200){ //server端可以正確的行
                            window.location.reload();
                            alert("修改成功");
                        }else{ //其它
                            alert( xhr.status );
                        }
                    }  
                    //設定好所要連結的程式
                    var url = "php/components/_memberUpdate1.php";
                    xhr.open("POST", url, true);
                    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
                    //送出資料
                    var data_info = "member="+JSON.stringify(data);
                    xhr.send( data_info );
            }
            return false;
        };
    </script>
</body>
</html>