function initRender() {
    renderer = new THREE.WebGLRenderer({ antialias: true ,alpha: true } );
    renderer.setSize(window.innerWidth, window.innerHeight);
    //告訴渲染器需要陰影效果
    renderer.setClearColor(0x000000,0.9);
    document.getElementById('canvasScene').appendChild(renderer.domElement);
}

var camera;
function initCamera() {
    camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 0.1, 1000);
    camera.position.set(20, 100, 1000);
    camera.lookAt(new THREE.Vector3(0, 0, 0));
}

var scene;
function initScene() {
   scene = new THREE.Scene();
   scene.fog=new THREE.Fog(0xffffff,0.1,600 );
//    scene.fog=new THREE.FogExp2(0xffffff,0.002 );
}

//初始化dat.GUI簡化試驗流程

// var gui;
// function initGui() {
//     //聲明一個保存需求修改的相關數據的對象
//     gui = {
//     };
//     var datGui = new dat.GUI();
//     //將設置屬性添加到gui當中，gui.add(對象，屬性，最小值，最大值）
// }

var light;
function initLight() {
    scene.add(new THREE.AmbientLight(0xffffff));
    light = new THREE.PointLight(0xffffff,3,0);
    light.position.set(-900,500,60);
    //告訴平行光需要開啟陰影投射
    light.castShadow = true;
    scene.add(light);
}

//卡車模型
var modelearth;
var modelcar;
function initModel() {
    //輔助工具
    var helper = new THREE.AxesHelper(50);
    scene.add(helper);
    var mtlLoader = new THREE.MTLLoader();
    mtlLoader.setPath('three/car/02/');
    //加載mtl文件
    mtlLoader.load('truck_daf.mtl', function (material) {
        var objLoader = new THREE.OBJLoader();    
    //設置當前加載的紋理
        objLoader.setMaterials(material);
        objLoader.setPath('three/car/02/');
        objLoader.load('truck_daf.obj', function (object) {
        //將模型縮放並添加到場景當中
            object.scale.set(1 , 1 , 1 );
            object.position.x=92;
            object.position.y= -58;
            object.position.z= -30;
            object.rotation.set(-0.07*Math.PI,-0.3*Math.PI,0);
            modelcar = object;
            tween.start();
            scene.add(object);
        })
    });
    //地球模型
    var mtlLoader = new THREE.MTLLoader();
    mtlLoader.setPath('three/car/earth/earth2k/');
    mtlLoader.load('Earth2K.mtl', function (material) {
        var objLoader = new THREE.OBJLoader();
        objLoader.setMaterials(material);
        objLoader.setPath('three/car/earth/earth2k/');
        objLoader.load('Earth2K.obj', function (object) {
            object.scale.set(22, 22, 22);
            object.position.x=65;
            object.position.y=-128;
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

//用戶交互插件 鼠標左鍵按住旋轉，右鍵按住平移，滾輪縮放
var controls;
function initControls() {
    controls = new THREE.OrbitControls(camera, renderer.domElement);
    // 如果使用animate方法時，將此函數刪除
    // controls.addEventListener( 'change', render );
    // 使動畫循環使用時阻尼或自轉 意思是否有慣性
    controls.enableDamping = true;
    //動態阻尼係數 就是鼠標拖拽旋轉靈敏度
    //controls.dampingFactor = 0.25;
    //是否可以縮放
    controls.enableZoom = false;   
    //是否自動旋轉
    controls.enableRotate = false;
    //關閉旋轉功能
    controls.autoRotate = false;   
    //設置相機距離原點的最近距離
    controls.minDistance = 1;   
    //設置相機距離原點的最遠距離
    controls.maxDistance = 200;
    //右鍵拖曳
    controls.enablePan = true;
}
function render() {
    renderer.render(scene, camera);

}

//windowresize
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
    modelearth.rotation.z -=0.007*(0.25*Math.PI);
    cloud.rotation.y += 0.001;
    cloud.rotation.x += -0.001;
    cloud.rotation.z += 0.001;
}

//create tween
var posSrc= {x: 84, y: -50,z:0,u: -0.07*Math.PI,v: -0.4*Math.PI,w:0};
//posSrc
var tween = new TWEEN.Tween(posSrc).to({x: 78, y: -50,z:0,u: -0.05*Math.PI,v: -0.35*Math.PI,w:0}, 3000);
tween.easing(TWEEN.Easing.Sinusoidal.InOut);
var tweenBack = new TWEEN.Tween(posSrc).to({x: 84, y: -50,z:0,u: -0.07*Math.PI,v: -0.4*Math.PI,w:0}, 3000);
tweenBack.easing(TWEEN.Easing.Sinusoidal.InOut);




tween.chain(tweenBack);
tweenBack.chain(tween);



var onUpdate = function () {
    modelcar.position.x =posSrc.x;
    modelcar.position.y =posSrc.y;
    modelcar.position.z =posSrc.z;
    modelcar.rotation.x =posSrc.u;
    modelcar.rotation.y =posSrc.v;
    modelcar.rotation.z =posSrc.w;
};

tween.onUpdate(onUpdate);
tweenBack.onUpdate(onUpdate);



function draw() {
    // initGui();
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



     
