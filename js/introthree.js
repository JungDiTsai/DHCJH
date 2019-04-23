var renderer;
var widthw = window.innerWidth;
var widthd = document.body.clientWidth;
var widthwh = document.documentElement.scrollWidth;
console.log(widthw);
console.log(widthd);
console.log(widthwh);
function initRender() {
    
    renderer = new THREE.WebGLRenderer({ antialias: true ,alpha: true } );
    renderer.setSize(window.innerWidth, window.innerHeight);
    //告诉渲染器需要阴影效果
    renderer.setClearColor(0x000000,0.9);
    document.getElementById('canvasScene').appendChild(renderer.domElement);
}

var camera;
function initCamera() {
    camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 0.1, 1000);
    camera.position.set(10, 10, 100);
    camera.lookAt(new THREE.Vector3(0, 0, 0));
}

var scene;
function initScene() {
   scene = new THREE.Scene();
   scene.fog=new THREE.Fog(0xffffff,0.1,600 );
//    scene.fog=new THREE.FogExp2(0xffffff,0.002 );
}




//初始化dat.GUI简化试验流程

var gui;
function initGui() {
    //声明一个保存需求修改的相关数据的对象
    gui = {
    };
    var datGui = new dat.GUI();
    //将设置属性添加到gui当中，gui.add(对象，属性，最小值，最大值）
}



var light;
function initLight() {
    scene.add(new THREE.AmbientLight(0xffffff));
    light = new THREE.PointLight(0xffffff,3,0);
    light.position.set(-900,500,60);
    //告诉平行光需要开启阴影投射
    light.castShadow = true;
    scene.add(light);
}

//地球模型
var modelearth;
var modelcar;
function initModel() {
    //辅助工具
    var helper = new THREE.AxesHelper(50);
    scene.add(helper);
    var mtlLoader = new THREE.MTLLoader();
    mtlLoader.setPath('three/car/02/');
    //加载mtl文件
    mtlLoader.load('truck_daf.mtl', function (material) {
        var objLoader = new THREE.OBJLoader();
        //设置当前加载的纹理
        objLoader.setMaterials(material);
        objLoader.setPath('three/car/02/');
        objLoader.load('truck_daf.obj', function (object) {
            //将模型缩放并添加到场景当中
            object.scale.set(1.2 , 1.2 , 1.2 );
            object.position.x=15;
            object.position.y= -8;
            object.position.z= -30;
            object.rotation.set(-0.07*Math.PI,-0.1*Math.PI,0);
            modelcar = object;
            tween.start();
            scene.add(object);
        })
    });
    var mtlLoader = new THREE.MTLLoader();
    mtlLoader.setPath('three/car/earth/earth2k/');
    //加载mtl文件
    mtlLoader.load('Earth2K.mtl', function (material) {
        var objLoader = new THREE.OBJLoader();
        //设置当前加载的纹理
        objLoader.setMaterials(material);
        objLoader.setPath('three/car/earth/earth2k/');
        objLoader.load('Earth2K.obj', function (object) {
            //将模型缩放并添加到场景当中
            object.scale.set(22, 22, 22);
            object.position.x=0;
            object.position.y=-80;
            object.position.z=15;
            modelearth = object;
            scene.add(object);
        })
    });
}

// 創建粒子
function createParticles(size,transparent,opacity,vertexColors,sizeAttenuation,color,fog){
    var geom = new THREE.Geometry();
    var material = new THREE.PointCloudMaterial({size: 0.2,transparent: transparent,opacity:opacity ,vertexColors: vertexColors,sizeAttenuation: sizeAttenuation,color: color,fog:true});
    var range = 500 ;
    for(var i = 0;i < 15000 ;i++){
         var particle = new THREE.Vector3(Math.random()*range - range/2,Math.random()*range - range/2,Math.random()*range - range/2);
         geom.vertices.push(particle);
         var color = new THREE.Color(0x00ff00);
         color.setHSL(color.getHSL().h,color.getHSL().s,Math.random()*color.getHSL().l);
         geom.colors.push(color);
    }
    cloud = new THREE.PointCloud(geom,material);
    scene.add(cloud);
}

    
//初始化性能插件
var stats;
function initStats() {
    stats = new Stats();
    // document.body.appendChild(stats.dom);
    document.getElementById('canvasScene').appendChild(stats.dom);
}



//用户交互插件 鼠标左键按住旋转，右键按住平移，滚轮缩放
var controls;
function initControls() {
    controls = new THREE.OrbitControls(camera, renderer.domElement);
    // 如果使用animate方法时，将此函数删除
    // controls.addEventListener( 'change', render );
    // 使动画循环使用时阻尼或自转 意思是否有惯性
    controls.enableDamping = true;
    //动态阻尼系数 就是鼠标拖拽旋转灵敏度
    //controls.dampingFactor = 0.25;
    //是否可以缩放
    controls.enableZoom = false;
    //是否自动旋转
    controls.enableRotate = false;
    //關閉旋轉功能
    controls.autoRotate = false;
    //设置相机距离原点的最远距离
    controls.minDistance = 1;
    //设置相机距离原点的最远距离
    controls.maxDistance = 200;
    //是否开启右键拖拽
    controls.enablePan = true;
}
function render() {
    renderer.render(scene, camera);

}

//窗口变动触发的函数
function onWindowResize() {
    camera.aspect = window.innerWidth / window.innertHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);
    render();
}


//偵測頁面位置
var scrollTop = document.documentElement.scrollTop ;
 console.log(scrollTop);

// window.addEventListener('wheel')
window.addEventListener("wheel", event => console.info(event.deltaY));
window.addEventListener("wheel", event => {
const delta = Math.sign(event.deltaY);
console.info(delta);
});


function animate() {
    //更新控制器
    render();
    //更新性能插件
    stats.update();
    controls.update();
    requestAnimationFrame(animate);
    TWEEN.update();
    modelearth.rotation.x -=0.01*(0.25*Math.PI);
    // modelearth.rotation.y+=0.01*(0.25*Math.PI);
    // modelearth.rotation.y -=0.004;
    cloud.rotation.y += 0.001;
    cloud.rotation.x += -0.001;
    cloud.rotation.z += 0.001;
    // modelearth.rotation.y +=0.01;
    // modelearth.rotation.z +=0.01;
}

//create tween
var posSrc= {x: 15, y: -8,z:-30};
var tween = new TWEEN.Tween(posSrc).to({x: 25, y: -8,z:-10}, 5000);
tween.easing(TWEEN.Easing.Sinusoidal.InOut);

var tweenBack = new TWEEN.Tween(posSrc).to({x: 15, y: -8,z:-30}, 5000);
tweenBack.easing(TWEEN.Easing.Sinusoidal.InOut);

tween.chain(tweenBack);
tweenBack.chain(tween);


var onUpdate = function () {
    modelcar.position.x =posSrc.x;
    modelcar.position.y =posSrc.y;
    modelcar.position.z =posSrc.z;
};

tween.onUpdate(onUpdate);
tweenBack.onUpdate(onUpdate);


function draw() {
    initGui();
    initRender();
    initScene();
    initCamera();
    initLight();
    initModel();
    // createSprites();
    createParticles();
    initControls();
    initStats();
    animate();
    onDocumentMouseDown(event);
    window.onresize = onWindowResize;
}



        // //滑鼠選擇對象
    // document.addEventListener('mousedown', onDocumentMouseDown, false);
    // var projector =new THREE.Projector();
    // function onDocumentMouseDown(event) {

    //     var vector = new THREE.Vector3(( event.clientX / window.innerWidth ) * 2 - 1, -( event.clientY / window.innerHeight ) * 2 + 1, 0.5);
    //     vector = vector.unproject(camera);

    //     var raycaster = new THREE.Raycaster(camera.position, vector.sub(camera.position).normalize());

    //     var intersects = raycaster.intersectObjects([modelearth, modelcar]);

    //     if (intersects.length > 0) {

    //     console.log(intersects[0]);

    //     intersects[0].object.material.transparent = true;
    //     intersects[0].object.material.opacity = 0.1;
    //     }
    // }
     //以下尚未研究 
    // function manualCameraMove(e){
    //     // console.log('now it is manual mode ~');
    //     // console.log(signal);
    //     console.log('positionZ i got here is...' + positionZ);
    //     if(document.body.scrollTop < 000){
    //         if(e.deltaY > 0){
    //             esignal = true;
    //             positionZ -= 60;
    //             camera.position.z = positionZ;
    //             if(positionZ < 0){
    //                 positionZ = 0;
    //             } 
    //         }else if(e.deltaY < 0){
    //             esignal = false;
    //             // console.log('i am running..........................');
    //             positionZ += 60;
    //             camera.position.z = positionZ;
    //             // console.log(parseInt(window.getComputedStyle(bigdot).getPropertyValue('top')));
    //             if(parseInt(window.getComputedStyle(bigdot).getPropertyValue('top')) == 175){
    //                 dotManualMove(esignal);
    //             }
    //         } 
    //         return ImgDriver(esignal);
    //     }else if(positionZ == 9000){
    //         if(e.deltaY > 0){
    //             esignal = true;
    //             positionZ -= 60;
    //             camera.position.z = positionZ;
    //         }else if(e.deltaY < 0){
    //             esignal = false;
    //             window.removeEventListener('mousewheel',manualCameraMove);
    //             window.addEventListener('mousewheel',driver);
    //         }
    //     }
    // }
