new Vue({
   el:'#app',
   data: {
        message: 'Hello, VueJS!',
        place:"",
        setting: ["url", 1, 0, "date", 1, 0, 255, 255, 255,"place",""],
   },
   methods: {
       
       //點擊下一步看setting
       clickOK(){
            console.log(setting);
       },
       //內文更換寫入setting
       settingContent(){
        setting[10] = document.querySelector('#textWord textarea').value;
       },
       //textPlace寫入setting
       settingPlace(){
        setting[9] = document.querySelector('#textPlace input').value;      
       },
       //對A4的每個工具設定
        //垃圾桶-----------------------------------------
        clickTrash:function(){
            document.getElementById('A4page').innerHTML = '<img src="" alt=""><h5></h5>';
            setting = ["url", 1, 0, '', 1, 0, 255, 255, 255];
        },
        //放大-----------------------------------------
        clickPlus(){
            switch (stepIndex) {
                case 0:
                    setting[1] += 0.05;
                    let A4img = document.querySelector('#A4page img');
                    A4img.style.setProperty('transform', `scale(${setting[1]}) rotateZ(${setting[2]}deg)`)
                    break;
                case 1:
                    setting[4] += 0.05;
                    let A4h5 = document.querySelector('#A4page h5');
                    A4h5.style.setProperty('transform', `scale(${setting[4]}) rotateZ(${setting[5]}deg)`)
                    break;
                default:
                    break;
            }
            console.log(setting);
        },
        //縮小-----------------------------------------
        clickMinus(){
            switch (stepIndex) {
                case 0:
                    setting[1] -= 0.05;
                    let A4img = document.querySelector('#A4page img');
                    A4img.style.setProperty('transform', `scale(${setting[1]}) rotateZ(${setting[2]}deg)`)
                    break;
                case 1:
                    setting[4] -= 0.05;
                    let A4h5 = document.querySelector('#A4page h5');
                    A4h5.style.setProperty('transform', `scale(${setting[4]}) rotateZ(${setting[5]}deg)`)
                    break;
                default:
                    break;
            }
        },
        //右轉-----------------------------------------
        clickRedo(){
            switch (stepIndex) {
                case 0:
                    setting[2] += 5;
                    let A4img = document.querySelector('#A4page img');
                    A4img.style.setProperty('transform', `scale(${setting[1]}) rotateZ(${setting[2]}deg)`)
                    break;
                case 1:
                    setting[5] += 5;
                    let A4h5 = document.querySelector('#A4page h5');
                    A4h5.style.setProperty('transform', `scale(${setting[4]}) rotateZ(${setting[5]}deg)`)
                    break;
                default:
                    break;
            }
        },
        //左轉-----------------------------------------
        clickUndo(){
            switch (stepIndex) {
                case 0:
                    setting[2] -= 5;
                    let A4img = document.querySelector('#A4page img');
                    A4img.style.setProperty('transform', `scale(${setting[1]}) rotateZ(${setting[2]}deg)`)
                    break;
                case 1:
                    setting[5] -= 5;
                    let A4h5 = document.querySelector('#A4page h5');
                    A4h5.style.setProperty('transform', `scale(${setting[4]}) rotateZ(${setting[5]}deg)`)
                    break;
                default:
                    break;
            }
        },
        //色盤-----------------------------------------
        clickColorPicker(){},
   }, 
   computed: {},
});
