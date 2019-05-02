<!DOCTYPE html>
<!-- <html lang="en" xmlns="http://www.w3.org/1999/xhtml"> -->
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>台灣大舞台-後台使用者登入</title>
<link rel="stylesheet" href="css/backlogin.css">
<link rel="Shortcut Icon" type="image/x-icon" href="images/logo.ico">


<style>
body{
	background: rgb(58, 57, 57);
}
#loginBox{
	position:relative;
	margin:auto;
	width:210px;
	height:130px;
	background-color:rgb(0, 0, 0);
	padding:30px;
	text-align:center;
	border-radius:10px;
	top:50px;
	/* box-shadow:0px 5px 50px 2px #B6B6B6; */
	border:8px solid #51f3f0;
	}
#loginBox h4{
	color:#51f3f0;
}
#loginBox p{
	color:#51f3f0;
}
#login{
	color:white;
	border:1px solid white;
	background-color: #fff0;
}
div, h1, h2, h3, h4, h5, h6, p, span {
  font-family: '微軟正黑體';
  letter-spacing: 1.5;
}
input{
  border-radius: 10px; 
}
</style>
</head>

<body>
<div id="loginBox">
<!-- <form action="" method="post"> -->
<!-- <h4>後台使用者</h4> -->
<p>帳號: <input type="text" id="id"></p>
<p>密碼: <input type="password" id="psw"></p>
<button id="login" class="commonBtnSmall">登入</button>
<!-- </form> -->
</div>
<script src="js/jquery-3.3.1.min.js"></script>
<script>
     
    $('#login').on('click',function(){
      
        id = document.querySelector('#id').value;
        console.log(id);
        psw = document.querySelector('#psw').value;
        console.log(psw);
        $.ajax({
                    url:'login.php',
                    data:{id:id , psw:psw},                   
                    type:'post',
                    error:function(){                                                                 

                        alert("失敗");

                        },
                    success:function(data){
                        // alert(data);
                        if(data=='成功'){
                            window.location = 'back2.php';
                        }else{
                          alert(data);
                        }
                        
                       
                      }   
               })
    });
        
  
 
</script>
</body>
</html>