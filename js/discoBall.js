// var scene, camera, controls, sphere, sun, textureCube, loader, stars, light, light1, light2, light3, light4, light5, light6, light7, cubeCamera, renderer;

// init();
// draw();
// animate();

// function init() {
//   //set up scene
//   scene = new THREE.Scene();
//   scene.fog = new THREE.FogExp2(0x000000, .0007);

//   var width = window.innerWidth;
//   var height = window.innerHeight;

//   renderer = new THREE.WebGLRenderer({
//     antialias: true
//   });

//   renderer.setSize(width, height);
//   renderer.setClearColor(0x000011, 1);
//   renderer.domElement.id = "context";
//   document.body.appendChild(renderer.domElement);

//   //set up camera
//   camera = new THREE.PerspectiveCamera(45, width / height, .1, 10000);
//   scene.add(camera);
//   camera.position.set(0, 90, -590);
//   camera.lookAt(scene.position);

//   //set up cube camera
//   cubeCamera = new THREE.CubeCamera(1, 100000, 1024);
//   scene.add(cubeCamera);

//   //set up fill lights
//   var ambientLight = new THREE.AmbientLight(0xffffff);
//   scene.add(ambientLight);

//   light = new THREE.PointLight(0xFFFBE3);
//   light.position.set(100, 0, -60);
//   scene.add(light);

//   light1 = new THREE.PointLight(0xFFFBE3);
//   light1.position.set(-50, 200, 50);
//   scene.add(light1);

//   //set up color lights

//   var intensity = 2.5;
//   var distance = 100;
//   var decay = 2.0;

//   var c1 = 0xff0040,
//     c2 = 0x0040ff,
//     c3 = 0x80ff80,
//     c4 = 0xffaa00,
//     c5 = 0x00ffaa,
//     c6 = 0xff1100;

//   var dot = new THREE.SphereGeometry(0.25, 16, 8);

//   light2 = new THREE.PointLight(c1, intensity, distance, decay);
//   light2.add(new THREE.Mesh(dot, new THREE.MeshBasicMaterial({
//     color: c1
//   })));
//   scene.add(light2);

//   light3 = new THREE.PointLight(c2, intensity, distance, decay);
//   light3.add(new THREE.Mesh(dot, new THREE.MeshBasicMaterial({
//     color: c2
//   })));
//   scene.add(light3);

//   light4 = new THREE.PointLight(c3, intensity, distance, decay);
//   light4.add(new THREE.Mesh(dot, new THREE.MeshBasicMaterial({
//     color: c3
//   })));
//   scene.add(light4);

//   light5 = new THREE.PointLight(c4, intensity, distance, decay);
//   light5.add(new THREE.Mesh(dot, new THREE.MeshBasicMaterial({
//     color: c4
//   })));
//   scene.add(light5);

//   light6 = new THREE.PointLight(c5, intensity, distance, decay);
//   light6.add(new THREE.Mesh(dot, new THREE.MeshBasicMaterial({
//     color: c5
//   })));
//   scene.add(light6);

//   light7 = new THREE.PointLight(c6, intensity, distance, decay);
//   light7.add(new THREE.Mesh(dot, new THREE.MeshBasicMaterial({
//     color: c6
//   })));
//   scene.add(light7);

//   //add orbital controls
//  controls = new THREE.OrbitControls(camera);
// }

// function draw() {
//   //draw disco ball
//   var geo = new THREE.SphereGeometry(55, 30, 20);
//   var mat = new THREE.MeshPhongMaterial({
//     emissive: '#222',
//     shininess: 50,
//     reflectivity: 3.5,
//     shading: THREE.FlatShading,
//     specular: 'white',
//     color: 'gray',
//     side: THREE.DoubleSide,
//     envMap: cubeCamera.renderTarget.texture,
//     combine: THREE.AddOperation
//   });
//   sphere = new THREE.Mesh(geo, mat);
//   scene.add(sphere);

//   //draw stars
//   var starAmt = 20;
//   var starGeo = new THREE.SphereGeometry(1000, 100, 50);
//   var starAmt = 0;
//   var starMat = {
//     size: 1.0,
//     opacity: 0.7
//   };
//   var starMesh = new THREE.PointsMaterial(starMat);

//   for (var i = 0; i < starAmt; i++) {
//     var starVertex = new THREE.Vector3();
//     starVertex.x = Math.random() * 1000 - 500;
//     starVertex.y = Math.random() * 1000 - 500;
//     starVertex.z = Math.random() * 1000 - 500;
//     starGeo.vertices.push(starVertex);
//   }
//   stars = new THREE.Points(starGeo, starMesh);
//   scene.add(stars);

// }

// function animate() {
//   //animation
//   requestAnimationFrame(animate);
//   sphere.rotation.y += 0.005;

//   //move color lights
//   var time = Date.now() * 0.0025;
//   var d = 100;
//   light2.position.x = Math.cos(time * 0.3) * d;
//   light2.position.y = Math.cos(time * 0.1) * d;
//   light2.position.z = Math.sin(time * 0.7) * d;

//   light3.position.x = Math.sin(time * 0.5) * d;
//   light3.position.y = Math.cos(time * 0.1) * d;
//   light3.position.z = Math.sin(time * 0.5) * d;

//   light4.position.x = Math.sin(time * 0.3) * d;
//   light4.position.y = Math.sin(time * 0.1) * d;
//   light4.position.z = Math.sin(time * 0.5) * d;

//   light5.position.x = Math.cos(time * 0.3) * d;
//   light5.position.y = Math.cos(time * 0.1) * d;
//   light5.position.z = Math.sin(time * 0.5) * d;

//   light6.position.x = Math.cos(time * 0.5) * d;
//   light6.position.y = Math.sin(time * 0.3) * d;
//   light6.position.z = Math.cos(time * 0.5) * d;
  
//   light7.position.x = Math.cos(time * 0.5) * d;
//   light7.position.y = Math.sin(time * 0.1) * d;
//   light7.position.z = Math.cos(time * 0.5) * d;

//   //Update the render target cube
//   sphere.visible = false;
//   cubeCamera.position.copy(sphere.position);
//   cubeCamera.updateCubeMap(renderer, scene);

//   //renderer
//   sphere.visible = true;
//   renderer.render(scene, camera);
// }


// discoball from https://codepen.io/msaetre/pen/fDuzC
var t = 1;
var radius = 50;
var squareSize = 6.5;
var prec = 19.55;
var fuzzy = 0.001;
var inc = (Math.PI-fuzzy)/prec;
var discoBall = document.getElementById("discoBall");

for(var t=fuzzy; t<Math.PI; t+=inc) {
  var z = radius * Math.cos(t);
  var currentRadius = Math.abs((radius * Math.cos(0) * Math.sin(t)) - (radius * Math.cos(Math.PI) * Math.sin(t))) / 2.5;
  var circumference = Math.abs(2 * Math.PI * currentRadius);
  var squaresThatFit = Math.floor(circumference / squareSize);
  var angleInc = (Math.PI*2-fuzzy) / squaresThatFit;
  for(var i=angleInc/2+fuzzy; i<(Math.PI*2); i+=angleInc) {
    var square = document.createElement("div");
    var squareTile = document.createElement("div");
    squareTile.style.width = squareSize + "px";
    squareTile.style.height = squareSize + "px";
    squareTile.style.transformOrigin = "0 0 0";
    squareTile.style.webkitTransformOrigin = "0 0 0";
    squareTile.style.webkitTransform = "rotate(" + i + "rad) rotateY(" + t + "rad)";
    squareTile.style.transform = "rotate(" + i + "rad) rotateY(" + t + "rad)";
    if((t>1.3 && t<1.9) || (t<-1.3 && t>-1.9)) {
      squareTile.style.backgroundColor = randomColor("bright");
    } else {
      squareTile.style.backgroundColor = randomColor("any");
    }
    square.appendChild(squareTile);
    square.className = "square";
    squareTile.style.webkitAnimation = "reflect 2s linear infinite";
    squareTile.style.webkitAnimationDelay = String(randomNumber(0,20)/10) + "s";
    squareTile.style.animation = "reflect 2s linear infinite";
    squareTile.style.animationDelay = String(randomNumber(0,20)/10) + "s";
    squareTile.style.backfaceVisibility = "hidden";
    var x = radius * Math.cos(i) * Math.sin(t);
    var y = radius * Math.sin(i) * Math.sin(t);
    square.style.webkitTransform = "translateX(" + Math.ceil(x) + "px) translateY(" + y + "px) translateZ(" + z + "px)";
    square.style.transform = "translateX(" + x + "px) translateY(" + y + "px) translateZ(" + z + "px)";
    discoBall.appendChild(square);
  }
}

function randomColor(type) {
  var c;
  if(type == "bright") {
    c = randomNumber(130, 255);
  } else {
    c = randomNumber(110, 190);
  }
  return "rgb(" + 255 + "," + 250 + "," + 200 + ")";
}

function randomNumber(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}