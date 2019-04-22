new Vue({
   el:'#app',
   data: {
        message: 'Hello, VueJS!',
        place:"",
        setting: ["url", 1, 0, "date", 16, 0, "rgb(0,0,0)","place","content","people","join"],
        stepIndex:0,
        screenWidth: document.body.clientWidth
   },
   methods: {
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
                img.addEventListener('dragend', function (e) {
                    //拖拉圖片結束後，對圖片設定
                })
                document.getElementById('toolinnerBox').appendChild(img);
            })
        },
        settingPeople(e){
            console.log(e.target.value);
            this.setting[9] = e.target.value;
        },
        settingJoin(e){
            console.log(e.target.value);
            this.setting[10] = e.target.value;
        },
       clickSelectBox(){
                //(1)---------------------------------------上傳檔案
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
                var url = "php/components/_fileUpdate.php";
                xhr.open("POST", url, true);
                
                let data_info = new FormData( document.getElementById('updateInput') );
                //送出資料
                xhr.send(data_info);

                //(2)---------------------------------------寫入資料庫
                console.log(this.setting);
            
            document.getElementById('selectOpen').style.display="none";
       },
        dragA4Img(e){
            let dropImg =e.target.src;
            let pos1= 5, pos2 = 5, pos3 = 0, pos4 = 0;
            
            //對盒子做設定---------------------------
            document.getElementById('A4page').addEventListener('drop',function (theA4) {
                pos3 = e.clientX;
                pos4 = e.clientY;
                document.onmouseup = null;
                document.onmousemove = null;
            })
            //對移動的圖片做設定---------------------------
            e.target.addEventListener('drag',function () {    
                
                pos1 = pos3 - e.clientX;
                pos2 = pos4 - e.clientY;
                pos3 = e.clientX;
                pos4 = e.clientY;
                this.style.top = (e.target.offsetTop - pos2) + "px";
            })
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
                    document.getElementById('selectOpen').style.display="block";
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
            setting = ["url", 1, 0, 'date', 16, 0,"rgb(0,0,0)","place","content","people","join"];
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
        bindColor(e){
            let A4h5 = document.querySelector('#A4page h5');
            if(e.target.style.background!==""){
                this.setting[6] = e.target.style.background;
                A4h5.style.setProperty('color', e.target.style.background)
            }else{
                e.target.addEventListener('input',function(){
                    console.log(e.target.value)
                    this.setting[6] = e.target.style.value;
                    A4h5.style.setProperty('color',e.target.value)
                })
            }
        }
   }, 
   computed: {},
});
