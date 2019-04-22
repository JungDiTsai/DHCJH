
    // declare

    var canvasEnv = document.getElementById('three_canvas');
    var renderer, camera, scene, light, object;
    var width, height;
    positionZ = 17000;
    lineZPosi = 16800;

    var progressBar = document.querySelector('.wrap_progressbar');
    var bigDot = document.getElementById('bigdot');

    // Resizing render when the window was resized

    function resizeCanvas(canvas){
        canvas.style.width = window.innerWidth + 'px';
        canvas.style.height = window.innerHeight + 'px';
        var w = parseInt(getComputedStyle(canvasEnv,null).width);
        var h = parseInt(getComputedStyle(canvasEnv,null).height);
        // console.log(w,h);
        return initRenderer(w,h);
    }

    // Initialize renderer
    
    function initRenderer(w,h) {
        renderer = new THREE.WebGLRenderer({
            canvas: document.getElementById('three_canvas'),
            alpha:true,
        });
        renderer.setSize(w,h);
        return initCamera(w,h);
    }

    // Initialize camera

    function initCamera(w,h) {
        camera = new THREE.PerspectiveCamera(45, w / h, 1, 2300);
        camera.position.x = 0;
        camera.position.y = 200;
        camera.position.z = positionZ;
        camera.up.x = 0;
        camera.up.y = 1;
        camera.up.z = 0;
    }

    // Initialize scene

    function initScene() {
        scene = new THREE.Scene();
    }

    // Initialize object 

    function initObject() {

        var spline = new THREE.CatmullRomCurve3([
        new THREE.Vector3(0,0,lineZPosi),
        new THREE.Vector3(-100,0,lineZPosi -= 300), 
        new THREE.Vector3(120,0,lineZPosi -= 300),
        new THREE.Vector3(200,0,lineZPosi -= 300),
        new THREE.Vector3(100,0,lineZPosi -= 300),
        new THREE.Vector3(0,0,lineZPosi -= 300),
        new THREE.Vector3(-80,0,lineZPosi -= 300),
        new THREE.Vector3(-200,0,lineZPosi -= 300),
        new THREE.Vector3(-70,0,lineZPosi -= 300),
        new THREE.Vector3(-120,0,lineZPosi -= 300),
        new THREE.Vector3(-30,0,lineZPosi -= 300),
        new THREE.Vector3(80,0,lineZPosi -= 300),
        new THREE.Vector3(140,0,lineZPosi -= 300),
        new THREE.Vector3(0,0,lineZPosi -= 300),
        new THREE.Vector3(-70,0,lineZPosi -= 300),
        new THREE.Vector3(50,0,lineZPosi -= 300),
        new THREE.Vector3(190,0,lineZPosi -= 300),
        new THREE.Vector3(200,0,lineZPosi -= 300),
        new THREE.Vector3(50,0,lineZPosi -= 300),
        new THREE.Vector3(0,0,lineZPosi -= 300),
        new THREE.Vector3(0,0,lineZPosi -= 300),
        new THREE.Vector3(-110,0,lineZPosi -= 300),
        new THREE.Vector3(-200,0,lineZPosi -= 300),
        new THREE.Vector3(-280,0,lineZPosi -= 300),
        new THREE.Vector3(-170,0,lineZPosi -= 300),
        new THREE.Vector3(-300,0,lineZPosi -= 300),
        new THREE.Vector3(-250,0,lineZPosi -= 300),
        new THREE.Vector3(-200,0,lineZPosi -= 300),
        //4800
        new THREE.Vector3(-60,0,lineZPosi -= 300),
        new THREE.Vector3(-120,0,lineZPosi -= 300),
        new THREE.Vector3(0,0,lineZPosi -= 300),
        new THREE.Vector3(-110,0,lineZPosi -= 300),
        new THREE.Vector3(-70,0,lineZPosi -= 300),
        new THREE.Vector3(-20,0,lineZPosi -= 300),
        new THREE.Vector3(110,0,lineZPosi -= 300),
        new THREE.Vector3(40,0,lineZPosi -= 300),
        new THREE.Vector3(0,0,lineZPosi -= 300),
        new THREE.Vector3(130,0,lineZPosi -= 300),
        //1800
        new THREE.Vector3(50,0,lineZPosi -= 300),
        new THREE.Vector3(-50,0,lineZPosi -= 300),
        new THREE.Vector3(0,0,lineZPosi -= 300),
        new THREE.Vector3(-115,0,lineZPosi -= 300),
        new THREE.Vector3(80,0,lineZPosi -= 300),
        new THREE.Vector3(0,0,lineZPosi -= 300),
        new THREE.Vector3(-90,0,lineZPosi -= 300),
        new THREE.Vector3(80,0,lineZPosi -= 300),
        new THREE.Vector3(80,0,lineZPosi -= 300),
        new THREE.Vector3(0,0,lineZPosi -= 300),
        new THREE.Vector3(-90,0,lineZPosi -= 300),
        new THREE.Vector3(80,0,lineZPosi -= 300),
        new THREE.Vector3(80,0,lineZPosi -= 300),
        new THREE.Vector3(80,0,lineZPosi -= 300),
        new THREE.Vector3(80,0,lineZPosi -= 300),
        new THREE.Vector3(80,0,lineZPosi -= 300),
        new THREE.Vector3(80,0,lineZPosi -= 300),
        new THREE.Vector3(80,0,lineZPosi -= 300),
        new THREE.Vector3(80,0,lineZPosi -= 2000),
        ]);
        // console.log('Line length:' + lineZPosi);

        // add line
        points = spline.getPoints(50);
        var geometry = new THREE.BufferGeometry().setFromPoints(points);
        // geometry.vertices = points;
        var material=new THREE.LineBasicMaterial({ 
            color:0xeeeeee,
        });
        var line = new THREE.Line(geometry,material);
        scene.add(line);

        // add star
        var starsGeometry = new THREE.Geometry();
        function generateStar(num, cencentrate = 15000 ) {
            for ( var i = 0; i < 500; i ++ ) {
                var star = new THREE.Vector3();
                star.x = THREE.Math.randFloatSpread( cencentrate );
                star.y = THREE.Math.randFloatSpread( cencentrate );
                star.z = THREE.Math.randFloatSpread( cencentrate );
                starsGeometry.vertices.push(star);     
            }
            var starsMaterial = new THREE.PointsMaterial( { size: num, color: 0xffffff } )
            var starField = new THREE.Points( starsGeometry, starsMaterial );
            scene.add( starField );
        }
        generateStar(3, 10000);
        generateStar(7, 10000);
        generateStar(10, 10000);

        // add spot ----------------------------
    
        circleZPos = 18800;
        circleXPos = [-160, 0, 40, 80]; 
        
        var circleGeometry = new THREE.CircleBufferGeometry( 30 , 30 );
        //(innerRadius, outerRadius, thetaSegments, phiSegments, thetaStart, thetaLength)
        var ringGeometry = new THREE.RingBufferGeometry( 45,40,30,20,0,6.3);
        var spotMaterial = new THREE.MeshBasicMaterial({ 
            color: 0xffffff, 
            side: THREE.DoubleSide, 
        });

        for ( let i = 0 ; i <= 3 ; i++ ){

            if(i == 3){
                circleZPos = -1700;
            }else{
                circleZPos -= 4000;
            }

            // Create inner circle
            var circle = new THREE.Mesh(circleGeometry, spotMaterial);
            circle.position.z = circleZPos;
            circle.position.x = circleXPos[i];
            circle.material.opacity = 0.25;
            circle.rotation.x = Math.PI / -5;
            scene.add( circle );

            // Create outer ring
            var ring = new THREE.Mesh( ringGeometry, spotMaterial);
            ring.position.z = circleZPos;
            ring.position.x = circleXPos[i];
            ring.rotation.x = Math.PI / -5;
            scene.add( ring );
        } 
    }

    // Start render

    var renderId;

    function render() {
        renderId = requestAnimationFrame(render);
        renderer.render(scene, camera);
    }

    // Driver

    function driver(e){      
        var signal;
        // console.log(e.deltaY);
        window.removeEventListener('mousewheel', driver);
        console.log(positionZ);
        console.log('!!!!!!!!!!!!!!'+parseInt(window.getComputedStyle(bigdot).getPropertyValue('top')));
        if(e.deltaY > 0){
            console.log('uppppppppppppppppppp('+ e.deltaY +')');
            signal = true;
            if(positionZ == 17000 || positionZ == 13000){
                cameraTimer = setInterval(function(){cameraMove(signal);},10);
            }else if(positionZ == 9000){
                window.addEventListener('mousewheel',manualCameraMove);
                // console.log(signal);
            }
            dotTimer = setInterval(function(){moveDot(signal);},10);
        }else if(e.deltaY < 0){
            console.log('downnnnnnnnnnnnnnnnn('+ e.deltaY +')');
            signal = false;
            // console.log(positionZ);
            if(positionZ == 13000 || positionZ == 9000){
                cameraTimer = setInterval(function(){cameraMove(signal);},10);
                dotTimer = setInterval(function(){moveDot(signal);},10);  
            }else if(positionZ == 17000){  
                // console.log('nowwwwwwwwwwwwww is'+positionZ);
                window.addEventListener('mousewheel',driver); 
            }  
        }
    }

    // Camera and dots movement (manual mode)

    var esignal;

    function manualCameraMove(e){
        // console.log('now it is manual mode ~');
        // console.log(signal);
        console.log('positionZ i got here is...' + positionZ);
        if(positionZ < 9000){
            if(e.deltaY > 0){
                esignal = true;
                positionZ -= 60;
                camera.position.z = positionZ;
                if(positionZ < 0){
                    positionZ = 0;
                } 
            }else if(e.deltaY < 0){
                esignal = false;
                // console.log('i am running..........................');
                positionZ += 60;
                camera.position.z = positionZ;
                // console.log(parseInt(window.getComputedStyle(bigdot).getPropertyValue('top')));
                if(parseInt(window.getComputedStyle(bigdot).getPropertyValue('top')) == 175){
                    dotManualMove(esignal);
                }
            } 
            return ImgDriver(esignal);
        }else if(positionZ == 9000){
            if(e.deltaY > 0){
                esignal = true;
                positionZ -= 60;
                camera.position.z = positionZ;
            }else if(e.deltaY < 0){
                esignal = false;
                window.removeEventListener('mousewheel',manualCameraMove);
                window.addEventListener('mousewheel',driver);
            }
        }
    }

    function dotManualMove(esignal){
        var bigDotStyle = window.getComputedStyle(bigdot);
        var bigDotCurTop = parseInt(bigDotStyle.getPropertyValue('top'));
        dotTimer = setInterval(function(){moveDot(esignal);},10);
    }

    // Camera movement (auto mode)

    function cameraMove(signal){
        // console.log(positionZ);
        // console.log('now it is auto mode');
        // console.log('cameraAutoMove : '+signal); 
        if(signal === true){
            positionZ -= 20;
        }else{
            positionZ += 20;
            if(positionZ > 17000){
                positionZ = 17000;
            } 
        }
        cameraStop(positionZ); 
        camera.position.z = positionZ;  
        return ImgDriver(signal);  
    }

    function cameraStop(positionZ){
        if (positionZ == 17000 || positionZ == 13000 || positionZ == 9000){ 
            clearInterval(cameraTimer);
            window.addEventListener('mousewheel', driver);
        }
    }

    // Dot movement (auto mode)

    function moveDot(Signal){
        // console.log(bigDotCurTop);
        // console.log('PositionZ: '+positionZ);
        var bigDotStyle = window.getComputedStyle(bigdot);
        var bigDotCurTop = parseInt(bigDotStyle.getPropertyValue('top'));
        if(Signal === true){
            if(bigDotCurTop > 175){
                bigDotCurTop = 175;
            }else{
                bigDotCurTop += 1;
            }
        }else{
            if(bigDotCurTop < -5){
                bigDotCurTop = -5;
            }else{
                bigDotCurTop -= 1;
            }
        }
        bigDot.style.top = bigDotCurTop + 'px';
        stopDot(bigDotCurTop);
    }

    function stopDot(bigDotCurTop){
        // console.log('PositionZ: '+positionZ);
        // console.log('From stopDot: '+ parseInt(window.getComputedStyle(bigdot).getPropertyValue('top')));
        if(bigDotCurTop == -5 || bigDotCurTop == 55 || bigDotCurTop == 115 || bigDotCurTop == 175){
            clearInterval(dotTimer);
            // console.log('stop at: '+positionZ);  
        }
    }

    // Mobile compatibility

    // $(window).on('touchstart', function(e) {

    //     var swipe = e.originalEvent.touches,
    //         start = swipe[0].pageY;


    //     $(this).one('touchmove',driverForMob);

    //     function driverForMob(e){

    //         var contact = e.originalEvent.touches,
    //         end = contact[0].pageY,
    //         distance = end-start;

    //         var signal;

    //         if (distance < -10){
    //             signal = false;
    //             if(positionZ == 13000 || positionZ == 9000){
    //                 cameraTimer = setInterval(function(){cameraMove(signal);},10);
    //                 dotTimer = setInterval(function(){moveDot(signal);},10);  
    //             }else if(positionZ == 17000){
    //                 $(window).bind('touchmove',driverForMob); // mob
    //             }else if(positionZ >= 0 && positionZ < 9000){
    //                 $(this).unbind('touchmove',driverForMob);
    //                 $(this).bind('touchmove',manualCameraMoveForMob);
    //             }
    //             return ImgDriver(signal);
    //         }else if(distance > 10){
    //             signal = true;
    //             if(positionZ == 17000 || positionZ == 13000){
    //                 cameraTimer = setInterval(function(){cameraMove(signal);},10);
    //             }else if(positionZ <= 9000){
    //                 $(this).unbind('touchmove',driverForMob);
    //                 $(this).bind('touchmove',manualCameraMoveForMob);
    //             }
    //             dotTimer = setInterval(function(){moveDot(signal);},10);
    //             return ImgDriver(signal);
    //         }
    //     }


    //     function manualCameraMoveForMob(e){
    //         var esignal;
    //         var contact = e.originalEvent.touches,
    //         end = contact[0].pageY,
    //         distance = end-start;
    //         // console.log(distance);
    //         // console.log(positionZ);
    //         // console.log('dot: ' + window.getComputedStyle(bigdot).getPropertyValue('top'));
    //         if(positionZ < 9000){
    //             if(distance > 1){
    //                 esignal = true;
    //                 positionZ -= 20;
    //                 camera.position.z = positionZ;
    //                 if(positionZ < 0){
    //                     positionZ = 0;
    //                 } 
    //             }else if(distance < -1){
    //                 esignal = false;
    //                 positionZ += 20;
    //                 camera.position.z = positionZ;
    //                 // console.log('i am working back');
    //                 if(parseInt(window.getComputedStyle(bigdot).getPropertyValue('top')) == 175){
    //                     dotManualMove(esignal);
    //                 }
    //             }
    //             return ImgDriver(esignal);
    //         }else if(positionZ == 9000){
    //             if(distance > 10){
    //                 positionZ -= 20;
    //                 camera.position.z = positionZ;
    //             }else if(distance < -10){
    //                 $(this).unbind('touchmove',manualCameraMoveForMob); // mob
    //                 $(this).bind('touchmove',driverForMob); // mob
    //             }
    //         }
    //     }

    //     $(window).one('touchend', function() {
    //         $(this).off('touchmove touchend');
    //     });

    // });


    // Parallax

    function initParallax(){
        var scene = document.getElementById('scene');
        var parallaxInstance = new Parallax(scene,{
            relativeInput: true,
        });
    }
   
    // Call images

    var galleryBox = document.querySelectorAll('.gallery_box');

    function ImgDriver(esignal){
        // console.log('The positionZ from ImgDriver: '+positionZ);
        if(esignal === true){
            if(screen.width >= 768){
                switch(positionZ){
                    case 15000:
                        $('#intro').animate({opacity:'0'},800);
                        break;
                    case 14000:
                        $('#intro').animate({display:'none'},800);
                        $('.layerBg').animate({bottom:'-300%'},800);
                        break;
                    case 13100:
                        $('.act_sec').css('z-index',5);
                        $('.wrap_filter_and_showevent').animate({right:'0'},800);
                        $('.wrap_calendar_filter_content').animate({left:'0'},800);
                        break;
                    case 12980:
                        $('.act_sec').css('z-index',0);
                        $('.wrap_calendar_filter_content').animate({left:'-3999px'},800);
                        $('.wrap_filter_and_showevent').animate({right:'-3999px'},800);
                        break;
                    case 10000:
                        $('.gallery_sec').css('z-index',5);
                        screen.width < 1440 ? $('.gb1').animate({left:'-3%'},800):$('.gb1').animate({left:'-5%'},800);
                        $('.gb2').animate({left:'5%'},800);
                        $('.gb3').animate({left:'15%'},800);
                        screen.width < 1440 ? $('.gb4').animate({right:'-3%'},800):$('.gb4').animate({right:'-5%'},800);
                        $('.gb5').animate({right:'5%'},800);
                        $('.gb6').animate({right:'15%'},800);
                        break;
                    case 7200:
                        $('.gb3').animate({left:'-100%'},800);
                        $('.gb6').animate({right:'-100%'},800);
                        break;
                    case 6000:
                        $('.gb2').animate({left:'-100%'},800);
                        $('.gb5').animate({right:'-100%'},800);
                        break;
                    case 1800:
                        $('.gb1').animate({left:'-100%'},800);
                        $('.gb4').animate({right:'-100%'},800);
                        $('.gallery_sec').css('z-index',0);
                        break;
                    case 1200:
                        $('.zodiac_sec').css('z-index',5);
                        screen.width < 1440 ? $('.zodiac_sec').animate({bottom:'40%'},800):$('.zodiac_sec').animate({bottom:'50%'},800);
                        break;
                }
            }
        }else{
            if(screen.width >= 768){
                switch(positionZ){
                    case 15000:
                        $('#intro').animate({opacity:'1'},800);
                        break;
                    case 14000:
                        $('#intro').animate({display:'block'},800);
                        $('.layerBg').animate({bottom:'-100%'},800);
                        break;
                    case 13100:
                        $('.wrap_calendar_filter_content').animate({left:'-3999px'},800);
                        $('.wrap_filter_and_showevent').animate({right:'-3999px'},800);
                        $('.act_sec').css('z-index',0);;
                        break;
                    case 12980:
                        $('.wrap_filter_and_showevent').animate({right:'0'},800);
                        $('.wrap_calendar_filter_content').animate({left:'0'},800);
                        $('.act_sec').css('z-index',5);
                        break;
                    case 10000:
                        $('.gallery_sec').css('z-index',0);
                        $('.gb1').animate({left:'-100%'},800);
                        $('.gb4').animate({right:'-100%'},800);
                        $('.gb2').animate({left:'-100%'},800);
                        $('.gb5').animate({right:'-100%'},800);
                        $('.gb3').animate({left:'-100%'},800);
                        $('.gb6').animate({right:'-100%'},800);
                        break;
                    case 7800:
                        $('.gb3').animate({left:'15%'},800);
                        $('.gb6').animate({right:'15%'},800);
                        break;
                    case 6600:
                        $('.gb2').animate({left:'5%'},800);
                        $('.gb5').animate({right:'5%'},800);
                        break;
                    case 4800:
                        $('.gallery_sec').css('z-index',5);
                        screen.width < 1440 ? $('.gb1').animate({left:'-3%'},800):$('.gb1').animate({left:'-5%'},800);
                        screen.width < 1440 ? $('.gb4').animate({right:'-3%'},800):$('.gb4').animate({right:'-5%'},800);
                        break;
                    case 2400:
                        $('.zodiac_sec').css('z-index',0);
                        $('.zodiac_sec').animate({bottom:'-50%'},800);
                        break;
                }
            }
        }
    }

    // gallery for mob device

    var galleryShells = document.querySelectorAll('.album_box');

    // initialization

    function threeStart() {
        initScene();
        initObject();
        initRenderer();
        initCamera();
        render();
        initParallax();
        ImgDriver();
        resizeCanvas(canvasEnv);
        window.addEventListener('mousewheel', driver);
        progressBar.style.display = 'block';
        // window.addEventListener('resize',screenVarier);
    }

    function init(){
        renderer = '';
        camera = '';
        scene = '';
        light = '';
        object = '';
        progressBar.style.display = 'none';
        // window.removeEventListener('mousewheel', driver);
    }

    function switchDisplayMode(){
        getLatestAlbums();
        if(screen.width >= 768){
            threeStart();
        }else{
            init();
            cancelAnimationFrame(renderId);
            
            // galleryMob();
        }
    }

    switchDisplayMode();

    window.onresize = function(){
        resizeCanvas(canvasEnv);
        console.log(screen.width);
        return switchDisplayMode();
    };

    // loadLatestEvent

    var getEventBtnsGroup = document.querySelector('.event_all_disc');
    var getEventTextInput = document.querySelector('.event_text');
    var getEventImgInput = document.querySelector('.event_img img');
    var getDateValue = document.querySelector('#date-value');

    function getLatestEvents(){
        // console.log(albPk);
        var xhr = new XMLHttpRequest();
        xhr.onload = function(){
            if(xhr.status == 200){
                var eventData = xhr.responseText;
                loadEvent(eventData);
                // console.log(eventData);
            }else{
                console.log('Ajax status: ' + xhr.status);
            }
        }
        xhr.open('post','php/index-getLatestEvent.php',true);
        xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
        // let lightboxInfo = 'albPk=' + albPk;
        xhr.send(); 
    }

    //  Event filter

    var getSearchBtn = document.querySelectorAll('.filter_search_btn');
    var getLocInputHolder = document.querySelector('#loc-value');
    var getMapPaths = document.querySelectorAll('.path_loc');

    var eventBtnSecNode = ['h3','p'];
    var eventBtnThirdNode = ['span/event_Loc','span/event_date'];

    // console.log(getMapPaths.length);
    
    var filterLoc = {['cls-2'] : '北部', ['cls-1'] : '東部', ['cls-3'] : '南部', ['cls-4'] : '中部'};

    for(let i=0; i<getMapPaths.length; i++){
        getMapPaths[i].onclick = function(){
            // console.log(this);
            for(let j=0; j<getMapPaths.length; j++){
                getMapPaths[j].style.fill = "#000";  
            }
            // console.log(filterLoc[this.id]);
            this.style.fill = "#fff";
            this.transition = "all 1s";
            getLocInputHolder.value = filterLoc[this.id];
            console.log(getLocInputHolder.value);
        }
    }

    for(let i=0; i<getSearchBtn.length; i++){
        getSearchBtn[i].onclick = eventFilter;

    }

    function eventFilter(){

        // get time interval
        let selectedDate = getDateValue.value;
        console.log('selectedDate: ' + selectedDate);

        // get location
        let pathLoc = getLocInputHolder.value;
        console.log(getLocInputHolder.value);

        // send value 
        var xhr = new XMLHttpRequest();
        xhr.onload = function(){
            if(xhr.status == 200){
                var eventData = xhr.responseText;
                console.log(eventData);
                loadEvent(eventData);
                getLocInputHolder.value = '';
                for(let j=0; j<getMapPaths.length; j++){
                    getMapPaths[j].style.fill = "#000";  
                }
            }else{
                console.log('Ajax status: ' + xhr.status);
            }
        }
        xhr.open('post','php/index-getSelectedEvent.php',true);
        xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
        let data = 'date=' + selectedDate + '&loc=' + pathLoc;
        xhr.send(data); 
    }

    function loadEvent(eventData){

        getEventBtnsGroup.innerHTML = '';

        let obj = JSON.parse(eventData);

        for(let i=0; i<obj.length; i++){
            
            let eventInputForSec = [
                    obj[i].event_loc.length > 3? obj[i].event_loc.slice(0,3) + '..' : obj[i].event_loc,
                    obj[i].event_date.split(' ')[0].replace(/(-+)/g,'.')
                ];

            let firstNode = document.createElement('div');
            firstNode.classList.add('event_disc');
            firstNode.onclick = function(){
                getEventTextInput.innerText = obj[i].event_info;
                getEventImgInput.src = obj[i].event_img;              
            }

            getEventBtnsGroup.appendChild(firstNode);
            getEventBtnsGroup.appendChild(firstNode);

            for(let j=0;j<eventBtnSecNode.length;j++){
                let secNode = document.createElement(eventBtnSecNode[j]);
                firstNode.appendChild(secNode);
                if(j==1){
                    for(let k=0; k<eventBtnThirdNode.length; k++){
                        let thirdNode = document.createElement(eventBtnThirdNode[k].split('/')[0]);
                        thirdNode.classList.add(eventBtnThirdNode[k].split('/')[1]);
                        thirdNode.innerText = eventInputForSec[k];
                        secNode.appendChild(thirdNode);
                    } 
                }else{
                    secNode.innerText = obj[i].event_name.length > 4? obj[i].event_name.slice(0,4) + '...' : obj[i].event_name;
                }
            }   
        }
        if(obj.length == 0){
            getEventBtnsGroup.innerHTML = '';
            getEventTextInput.innerText = '本日無任何活動喔！';
            getEventImgInput.src = 'img/default_event_img.jpg';
        }else{
            getEventTextInput.innerText = obj[0].event_info;
            getEventImgInput.src = obj[0].event_img;
        }
    }
    
    function getLatestAlbums(){
        // console.log(albPk);
        var xhr = new XMLHttpRequest();
        xhr.onload = function(){
            if(xhr.status == 200){
                var albumData = xhr.responseText;
                loadAlbums(albumData);
                // console.log(albumData);
            }else{
                console.log('Ajax status: ' + xhr.status);
            }
        }
        xhr.open('post','php/index-getLatestAlbums.php',true);
        xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
        // let lightboxInfo = 'albPk=' + albPk;
        xhr.send(); 
    }

    // console.log('gallery_box qty: ' + galleryBox.length);

    function loadAlbums(albumData){

        var obj = JSON.parse(albumData);

        console.log(obj);

        for(let i=0; i<galleryBox.length; i++){
            galleryBox[i].id = 'albKey_'+obj[i].alb_no;
            galleryBox[i].onclick = conveyer;
        }

        if(screen.width >= 768){
            for(let i=0; i<galleryBox.length; i++){
                for(let j=0; j<galleryBox[i].children.length; j++){
                    galleryBox[i].children[j].style.display = 'block';
                    galleryBox[i].id = 'albKey_'+obj[i].alb_no;
                    galleryBox[i].onclick = conveyer;
                }
            }
            for(let i=0; i<6; i++){
                let getAlbumUserNameHolder = document.querySelectorAll('.album_username a')[i];
                let getAlbumLocHolder = document.querySelectorAll('.album_loc')[i];
                let getAlbumDateHolder = document.querySelectorAll('.album_date')[i];
                let getAlbumCoverHolder = document.querySelectorAll('.album_img img')[i];
                let getAlbumViewNumHolder = document.querySelectorAll('.album_view_num')[i];
                let getAlbumCountNumHolder = document.querySelectorAll('.album_comment_num')[i];
                let getAlbumUserPicHolder = document.querySelectorAll('.album_userpic img')[i];
                let albumMulSign = document.querySelectorAll('.album_mul_icon')[i];
                
                getAlbumUserNameHolder.innerText = obj[i].mem_nickName;
                getAlbumLocHolder.innerText = obj[i].alb_loc;
                getAlbumDateHolder.innerText = obj[i].alb_time.split(' ')[0].replace(/(-+)/g,'.');
                getAlbumCoverHolder.src = 'php/' + obj[i].alb_img.split('+')[0];
                getAlbumViewNumHolder.innerText = obj[i].alb_viewCount;
                getAlbumCountNumHolder.innerText = obj[i].alb_msgCount;
                getAlbumUserPicHolder.src = 'php/member_center/' + obj[i].mem_img;

                albumMulSign.style.display = obj[i].alb_img.split('+').length == 1? 'none':'block';

            }
        }else{
            for(let i=0; i<galleryBox.length; i++){
                galleryBox[i].style.backgroundImage = "url('php/"+ obj[i].alb_img.split('+')[0]+"')";
                for(let j=0; j<galleryBox[i].children.length; j++){
                    galleryBox[i].children[j].style.display = 'none';
                }
            }
        }
    }

    function conveyer(){
        let sign = 'open_'+this.id;
        console.log(sign);
        localStorage.setItem('sign',sign);
        location.href = "album_surfing.php";
    }

    // function fetchMemImg(){

    //     if(document.querySelector('.mem_info') == undefined){
    //         console.log('status: log out');
    //     }else{
    //         console.log('status: log in');
    //         let loginArea = document.querySelector('.mem_info');
    //         let memImgHolder = document.querySelector('.mem_img img');
    //         console.log(loginArea.id);
    //         let memImgKey = loginArea.id.split('_')[1];

    //         var xhr = new XMLHttpRequest();
    //         xhr.onload = function(){
    //             if(xhr.status == 200){
    //                 var curMemData = xhr.responseText;
    //                 // console.log(curMemData);
    //                 let obj = JSON.parse(curMemData);
    //                 // console.log(obj);
    //                 let imgPath = 'php/' + obj[0].mem_img;
    //                 memImgHolder.src = imgPath;
    //             }else{
    //                 console.log('Ajax status: ' + xhr.status);
    //             }
    //         }
    //         xhr.open('post','php/all-getMemInfo.php',true);
    //         xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
    //         let data = 'mem_no=' + memImgKey;
    //         xhr.send(data); 
    //     }
    // }
    // fetchMemImg();
    getLatestEvents();
    getLatestAlbums();
    



    


    

    
