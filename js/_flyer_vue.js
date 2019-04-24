new Vue({
   el:'#app',
   data: {
        message: 'Hello, VueJS!',
        place:"",
        setting: ["url", 1, 0,'', 16, 0, "rgb(0,0,0)","place","content",'停用','停用'],
        stepIndex:0,
        moveSetting:[0,0,5,5,5,5],
        screenWidth: document.body.clientWidth
   },
   methods: {
       //往上移動
          moveBottom(){
           switch (this.stepIndex) {
               case 1:

                   this.moveSetting[3]+= 5;
                   let A4h5 = document.querySelector('#A4page h5');
                   A4h5.style.setProperty('top', `${this.moveSetting[3]}px`)
                   break;
               case 2:

                   this.moveSetting[5]-= 5;
                   let A4div = document.querySelector('#A4page div');
                   A4div.style.setProperty('bottom', `${this.moveSetting[5]}px`)
                   break;
               default:
                   break;
           }
       },
       //往上移動
          moveTop(){
           switch (this.stepIndex) {
               case 1:

                   this.moveSetting[3]-= 5;
                   let A4h5 = document.querySelector('#A4page h5');
                   A4h5.style.setProperty('top', `${this.moveSetting[3]}px`)
                   break;
               case 2:

                   this.moveSetting[5]+= 5;
                   let A4div = document.querySelector('#A4page div');
                   A4div.style.setProperty('bottom', `${this.moveSetting[5]}px`)
                   break;
               default:
                   break;
           }
       },
       //往右移動
       moveRight(){
           switch (this.stepIndex) {
               case 1:

                   this.moveSetting[2]+= 5;
                   let A4h5 = document.querySelector('#A4page h5');
                   A4h5.style.setProperty('left', `${this.moveSetting[2]}px`)
                   break;
               case 2:
  
                   this.moveSetting[4]-= 5;
                   let A4div = document.querySelector('#A4page div');
                   A4div.style.setProperty('right', `${this.moveSetting[4]}px`)
                   break;
               default:
                   break;
           }
       },
        //往左移動
        moveLeft(){
            switch (this.stepIndex) {
                case 1:

                    this.moveSetting[2]-= 5;
                    let A4h5 = document.querySelector('#A4page h5');
                    A4h5.style.setProperty('left', `${this.moveSetting[2]}px`)
                    break;
                case 2:

                    this.moveSetting[4]+= 5;
                    let A4div = document.querySelector('#A4page div');
                    A4div.style.setProperty('right', `${this.moveSetting[4]}px`)
                    break;
                default:
                    break;
            }
        },
        // 檔案上傳
        updateInput(e){
            let file = e.target.files[0];
            let readFile = new FileReader();
            readFile.readAsDataURL(file);
            readFile.addEventListener('load', function () {
                let img = document.createElement('img')
                img.src = readFile.result;
                img.addEventListener('dragstart', function (e) {
                    let aa = e.target.src;
                    e.dataTransfer.setData('image/jpeg', aa)
                })
                img.addEventListener('click', function (e) {
                    let aa = e.target.src;
                    document.querySelector('#A4page img').src = aa;
                })
                document.getElementById('toolinnerBox').appendChild(img);
            })
        },
        settingPeople(e){
            console.log(e.target.value);
            if(e.target.value=="open"){
                this.setting[9] = '啟用';
            }
        },
        settingJoin(e){
            console.log(e.target.value);
            if(e.target.value=="open"){
                this.setting[10] = '啟用';
            }
        },
       clickSelectBox(){
                //(1)---------------------------------------將設定寫到資料庫
                this.setting[0]=document.getElementById('A4page').value;
                console.log(this.setting);
                //比對Order 對照訂單
                let number = 0;
                for (let i = 0; i < LoginState.length; i++) {
                    if(LoginState[i][16].search(OrderNo)!= -1){
                        number = i;
                    }
                }
                console.log("第"+number+"筆訂單");

                  //產生XMLHttpRequest物件
                  var xhr = new XMLHttpRequest();
                  //註冊callback function
                  xhr.onreadystatechange = function(){
                    if( xhr.readyState == XMLHttpRequest.DONE ){ //server端執行完畢
                      if( xhr.status == 200){ //server端可以正確的執行
                           console.log(xhr.responseText);
                      }else{ //其它
                          alert( xhr.status );
                      }
                    }
                  } 
                  //設定好所要連結的程式
                  
                  var url = "php/components/_upoadSetting.php?flyerSetting=" + JSON.stringify(this.setting) + "&member= " + JSON.stringify(LoginState[number]);

                  xhr.open("get", url, true);
                  //送出資料
                  xhr.send(null);
                  $.ajax({
                      url: '.php',
                      type: 'GET',
                      data: {
                        flyerSetting: $('#id').val(),
                        member:$('#id').val()
                      },
                      success: function(response) {
                          console.log(response);
                      },
                      error: function(xhr) {
                        alert('Ajax request 發生錯誤');
                      }
                    });
                
                // (2)---------------------------------------上傳檔案--(儲存預備圖)
                //產生XMLHttpRequest物件
                // var xhr = new XMLHttpRequest();
                // //註冊callback function
                // xhr.onreadystatechange = function(){
                //   if( xhr.readyState == XMLHttpRequest.DONE ){ //server端執行完畢
                //     if( xhr.status == 200){ //server端可以正確的執行
                //          console.log(xhr.responseText);
                //     }else{ //其它
                //         alert( xhr.status );
                //     }
                //   }
                // } 
                // //設定好所要連結的程式
                // var url = "php/components/_fileUpdate.php";
                // xhr.open("POST", url, true);
                
                // let data_info = new FormData( document.getElementById('updateInput') );
                // //送出資料
                // xhr.send(data_info);

                
            
            document.getElementById('selectOpen').style.display="none";
       },
        //點擊步驟
        clickStep(e){
            switch (e.currentTarget.getAttribute("value")) {
                case "0":
                    document.querySelectorAll('.circle')[1].classList.remove("step");
                    document.querySelectorAll('.circle')[2].classList.remove("step");
                    document.querySelectorAll('.circle')[3].classList.remove("step");
                    document.querySelectorAll('.circle')[0].classList.add("step");
                    document.querySelectorAll('.whiteBlock h4')[1].classList.remove("doNow");
                    document.querySelectorAll('.whiteBlock h4')[2].classList.remove("doNow");
                    document.querySelectorAll('.whiteBlock h4')[3].classList.remove("doNow");
                    document.querySelectorAll('.whiteBlock h4')[0].classList.add("doNow");
                    document.getElementById('selectDay').style.display="none";
                    document.getElementById('textPlace').style.display="none";
                    document.getElementById('textWord').style.display="none";
                    if(this.screenWidth>=768){
                        document.getElementById('toolinnerBox').style.display="flex";
                        document.getElementById('next').innerText = "下一步";
                    }else{
                        document.getElementById('toolinnerBox').style.display="flex";
                        document.getElementById('next').innerText = "下一步";
                    }
                    this.setting[3]=document.querySelector('#A4page h5').innerText;
                    this.stepIndex = parseInt(e.currentTarget.getAttribute("value"));
                    break;

                case "1":
                    document.querySelectorAll('.circle')[0].classList.remove("step");
                    document.querySelectorAll('.circle')[2].classList.remove("step");
                    document.querySelectorAll('.circle')[3].classList.remove("step");
                    document.querySelectorAll('.circle')[1].classList.add("step");
                    document.querySelectorAll('.whiteBlock h4')[0].classList.remove("doNow");
                    document.querySelectorAll('.whiteBlock h4')[2].classList.remove("doNow");
                    document.querySelectorAll('.whiteBlock h4')[3].classList.remove("doNow");
                    document.querySelectorAll('.whiteBlock h4')[1].classList.add("doNow");
                    document.getElementById('toolinnerBox').style.display="none";
                    document.getElementById('textPlace').style.display="none";
                    document.getElementById('textWord').style.display="none"; 
                    if(this.screenWidth>=768){
                        document.getElementById('selectDay').style.display="flex";
                        document.getElementById('next').innerText = "下一步";
                    }else{
                        document.getElementById('selectDay').style.display="flex";
                        document.getElementById('next').innerText = "下一步";
                    }
                    this.setting[0]=document.querySelector('#A4page img').src;
                    this.stepIndex = parseInt(e.currentTarget.getAttribute("value"));
                    break;

                case "2":
                    document.querySelectorAll('.circle')[0].classList.remove("step");
                    document.querySelectorAll('.circle')[1].classList.remove("step");
                    document.querySelectorAll('.circle')[3].classList.remove("step");
                    document.querySelectorAll('.circle')[2].classList.add("step");
                    document.querySelectorAll('.whiteBlock h4')[0].classList.remove("doNow");
                    document.querySelectorAll('.whiteBlock h4')[1].classList.remove("doNow");
                    document.querySelectorAll('.whiteBlock h4')[3].classList.remove("doNow");
                    document.querySelectorAll('.whiteBlock h4')[2].classList.add("doNow");
                    document.getElementById('toolinnerBox').style.display="none";
                    document.getElementById('selectDay').style.display="none";
                    document.getElementById('textWord').style.display="none"; 
                    if(this.screenWidth>=768){
                        document.getElementById('textPlace').style.display="block";
                        document.getElementById('next').innerText = "下一步";
                    }else{
                        document.getElementById('textPlace').style.display="flex";
                        document.getElementById('next').innerText = "下一步";
                    }
                    this.setting[0]=document.querySelector('#A4page img').src;
                    this.setting[3]=document.querySelector('#A4page h5').innerText;
                    this.stepIndex = parseInt(e.currentTarget.getAttribute("value"));
                    break;

                case "3":
                    document.querySelectorAll('.circle')[0].classList.remove("step");
                    document.querySelectorAll('.circle')[1].classList.remove("step");
                    document.querySelectorAll('.circle')[2].classList.remove("step");
                    document.querySelectorAll('.circle')[3].classList.add("step");
                    document.querySelectorAll('.whiteBlock h4')[0].classList.remove("doNow");
                    document.querySelectorAll('.whiteBlock h4')[1].classList.remove("doNow");
                    document.querySelectorAll('.whiteBlock h4')[2].classList.remove("doNow");
                    document.querySelectorAll('.whiteBlock h4')[3].classList.add("doNow");
                    document.getElementById('toolinnerBox').style.display="none";
                    document.getElementById('selectDay').style.display="none";
                    document.getElementById('textPlace').style.display="none"; 
                    if(this.screenWidth>=768){
                        document.getElementById('textWord').style.display="flex";
                        document.getElementById('next').innerText = "完成";
                    }else{
                        document.getElementById('textWord').style.display="flex";
                        document.getElementById('next').innerText = "完成";
                    }
                    this.setting[0]=document.querySelector('#A4page img').src;
                    this.setting[3]=document.querySelector('#A4page h5').innerText;
                    this.stepIndex = parseInt(e.currentTarget.getAttribute("value"));
                    break;

            }
        },
        //點擊上一步看
        clickNO(){
            switch (this.stepIndex) {
                case 1:
                    document.querySelectorAll('.circle')[1].classList.remove("step");
                    document.querySelectorAll('.circle')[0].classList.add("step");
                    document.querySelectorAll('.whiteBlock h4')[1].classList.remove("doNow");
                    document.querySelectorAll('.whiteBlock h4')[0].classList.add("doNow");
                    document.getElementById('selectDay').style.display="none";
                    if(this.screenWidth>=768){
                        document.getElementById('toolinnerBox').style.display="flex";
                    }else{
                        document.getElementById('toolinnerBox').style.display="flex";
                    }
                    this.setting[3]=document.querySelector('#A4page h5').innerText;
                    this.stepIndex=0;
                    break;
                case 2:
                    document.querySelectorAll('.circle')[2].classList.remove("step");
                    document.querySelectorAll('.circle')[1].classList.add("step");
                    document.querySelectorAll('.whiteBlock h4')[2].classList.remove("doNow");
                    document.querySelectorAll('.whiteBlock h4')[1].classList.add("doNow");
                    document.getElementById('textPlace').style.display="none";
                    if(this.screenWidth>=768){
                        document.getElementById('selectDay').style.display="flex";
                    }else{
                        document.getElementById('selectDay').style.display="flex";
                    }
                    this.stepIndex=1;
                    break;
                case 3:
                    document.querySelectorAll('.circle')[3].classList.remove("step");
                    document.querySelectorAll('.circle')[2].classList.add("step");
                    document.querySelectorAll('.whiteBlock h4')[3].classList.remove("doNow");
                    document.querySelectorAll('.whiteBlock h4')[2].classList.add("doNow");
                    document.getElementById('next').innerText = "下一步";
                    document.getElementById('textWord').style.display="none";
                    if(this.screenWidth>=768){
                        document.getElementById('textPlace').style.display="block";
                    }else{
                        document.getElementById('textPlace').style.display="flex";
                    }
                    this.stepIndex=2;
                    break;
                default:
                    break;
            }
            console.log("現在的步驟:"+this.stepIndex);
        },
        //點擊下一步看
        clickOK(){
            switch (this.stepIndex) {
                case 0:
                    document.querySelectorAll('.circle')[0].classList.remove("step");
                    document.querySelectorAll('.circle')[1].classList.add("step");
                    document.querySelectorAll('.whiteBlock h4')[0].classList.remove("doNow");
                    document.querySelectorAll('.whiteBlock h4')[1].classList.add("doNow");
                    document.getElementById('toolinnerBox').style.display="none";
                    if(this.screenWidth>=768){
                        document.getElementById('selectDay').style.display="flex";
                    }else{
                        document.getElementById('selectDay').style.display="flex";
                    }
                    this.stepIndex=1;
                    this.setting[0]=document.querySelector('#A4page img').src;
                    break;
                case 1:
                    document.querySelectorAll('.circle')[1].classList.remove("step");
                    document.querySelectorAll('.circle')[2].classList.add("step");
                    document.querySelectorAll('.whiteBlock h4')[1].classList.remove("doNow");
                    document.querySelectorAll('.whiteBlock h4')[2].classList.add("doNow");
                    document.getElementById('selectDay').style.display="none";
                    if(this.screenWidth>=768){
                        document.getElementById('textPlace').style.display="block";
                    }else{
                        document.getElementById('textPlace').style.display="flex";
                    }
                    this.stepIndex=2;
                    this.setting[3]=document.querySelector('#A4page h5').innerText;
                    break;
                case 2:
                    document.querySelectorAll('.circle')[2].classList.remove("step");
                    document.querySelectorAll('.circle')[3].classList.add("step");
                    document.querySelectorAll('.whiteBlock h4')[2].classList.remove("doNow");
                    document.querySelectorAll('.whiteBlock h4')[3].classList.add("doNow");
                    document.getElementById('next').innerText = "完成";
                    document.getElementById('textPlace').style.display="none";
                    if(this.screenWidth>=768){
                        document.getElementById('textWord').style.display="block";
                    }else{
                        document.getElementById('textWord').style.display="block";
                    }
                    this.stepIndex=3;
                    break;
                case 3:
                    if(OrderNo!="notFound"){
                        //會員----------------------------------------------------------------
                        document.getElementById('selectOpen').style.display="block";
                        html2canvas(document.getElementById('A4page')).then(function (canvas) {
                            
                            document.getElementById('A4page').appendChild(canvas); //將A4page的物件轉為canvas
                            let img = document.getElementsByTagName('canvas')[0].toDataURL(); //將canvas轉為base64編碼               
                            //產生XMLHttpRequest物件
                            let xhr = new XMLHttpRequest();
                            //讀取檔案----------------------
                            xhr.onload = function () {
                                if (xhr.status == 200) {
                                    console.log("回傳圖片的位置: "+xhr.responseText);
                            document.getElementById('A4page').value = xhr.responseText;
                                } else{
                                    alert();
                                }
                            }
                            
                            // -----------------------------
                
                            //設定好所要連結的程式
                            var url = "./php/components/_memberImgSaveAPI.php";
                            xhr.open("Post", url, true);
                            xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
                            //送出資料
                            var data_info = "imgURL=" + img;
                            xhr.send(data_info);


                        });
                    }else{
                        //24小時----------------------------------------------------------------
                        html2canvas(document.getElementById('A4page')).then(function (canvas) {
                            document.getElementById('A4page').appendChild(canvas); //將A4page的物件轉為canvas
                            let img = document.getElementsByTagName('canvas')[0].toDataURL(); //將canvas轉為base64編碼               
                            //產生XMLHttpRequest物件
                            let xhr = new XMLHttpRequest();
                            //讀取檔案----------------------
                            xhr.onload = function () {
                                if (xhr.status == 200) {
                                   let dataLength = JSON.parse(xhr.responseText).length-1;
                                   let imgSrc = JSON.parse(xhr.responseText)[dataLength].src;

                                   //新增到小試身手
                                    let li = document.createElement('li');
                                    li.innerHTML = `<img src="${imgSrc}"></img>`;
                                    document.getElementById('showflyer2').appendChild(li);
                                } else{
                                    alert(xhr.status);
                                }
                            }
                            
                            // -----------------------------
                
                            //設定好所要連結的程式
                            var url = "./php/components/_ImgSaveAPI.php";
                            xhr.open("Post", url, true);
                            xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
                            //送出資料
                            var data_info = "imgURL=" + img;
                            xhr.send(data_info);


                        });

                        window.location.hash="#showflyer2";

                    }
                    
                    break;
                default:
                    break;
            }
            console.log("現在的步驟:"+this.stepIndex);
       },
       //內文更換寫入setting
       settingContent(){
        this.setting[8] = document.querySelector('#textWord textarea').value;
       },
       //textPlace寫入setting
       settingPlace(){
        this.setting[7] = document.querySelector('#textPlace input').value;      
       },
       //對A4的每個工具設定
        //垃圾桶-----------------------------------------
        clickTrash:function(){
            document.getElementById('A4page').innerHTML = '<img src="" alt=""><h5></h5>';
            setting = ["url", 1, 0, '', 16, 0,"rgb(0,0,0)","place","content",'停用','停用'];
        },
        //放大-----------------------------------------
        clickPlus(){
            switch (this.stepIndex) {
                case 0:
                    this.setting[1] += 0.05;
                    let A4img = document.querySelector('#A4page img');
                    A4img.style.setProperty('transform', `scale(${this.setting[1]}) rotateZ(${this.setting[2]}deg)`)
                    break;
                case 1:
                    this.setting[4] += 1;
                    let A4h5 = document.querySelector('#A4page h5');
                    A4h5.style.setProperty('font-size', `${this.setting[4]}px`)
                    break;
                default:
                    break;
            }
            console.log(this.setting);
        },
        //縮小-----------------------------------------
        clickMinus(){
            switch (this.stepIndex) {
                case 0:
                    this.setting[1] -= 0.05;
                    let A4img = document.querySelector('#A4page img');
                    A4img.style.setProperty('transform', `scale(${this.setting[1]}) rotateZ(${this.setting[2]}deg)`)
                    break;
                case 1:
                    this.setting[4] -= 1;
                    let A4h5 = document.querySelector('#A4page h5');
                    A4h5.style.setProperty('font-size', `${this.setting[4]}px`)
                    break;
                default:
                    break;
            }
        },
        //右轉-----------------------------------------
        clickRedo(){
            switch (this.stepIndex) {
                case 0:
                    this.setting[2] += 5;
                    let A4img = document.querySelector('#A4page img');
                    A4img.style.setProperty('transform', `scale(${this.setting[1]}) rotateZ(${this.setting[2]}deg)`)
                    break;
                case 1:
                    this.setting[5] += 5;
                    let A4h5 = document.querySelector('#A4page h5');
                    A4h5.style.setProperty('transform', `rotateZ(${this.setting[5]}deg)`)
                    break;
                default:
                    break;
            }
        },
        //左轉-----------------------------------------
        clickUndo(){
            switch (this.stepIndex) {
                case 0:
                    this.setting[2] -= 5;
                    let A4img = document.querySelector('#A4page img');
                    A4img.style.setProperty('transform', `scale(${this.setting[1]}) rotateZ(${this.setting[2]}deg)`)
                    break;
                case 1:
                    this.setting[5] -= 5;
                    let A4h5 = document.querySelector('#A4page h5');
                    A4h5.style.setProperty('transform', `rotateZ(${this.setting[5]}deg)`)
                    break;
                default:
                    break;
            }
        },
        //色盤-----------------------------------------
        clickColorPicker(){
                let colorPicker = document.getElementById('colorPicker');
                let display = window.getComputedStyle(colorPicker).getPropertyValue('display');
                console.log(display);
                if(display=="none"){
                    colorPicker.style.display = "block";
                }else{
                    colorPicker.style.display = "none";
                }
        },
        bindColor(){
            let A4h5 = document.querySelector('#A4page h5');
            A4h5.style.setProperty('color', this.setting[6]);
            console.log(this.setting[6]);
        },
        clickColor(e){
            let A4h5 = document.querySelector('#A4page h5');
            this.setting[6] = e.target.style.background;
            A4h5.style.setProperty('color', this.setting[6]);
            console.log(this.setting[6]);
        }
   }, 
   computed: {},
});
