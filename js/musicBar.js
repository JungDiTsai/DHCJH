window.onload = function() {
    var file = document.getElementById("thefile");
    var audio = document.getElementById("audioMusic");
    var files = this.files;
      audio.load();
      audio.play();
      var context = new AudioContext();
      var src = context.createMediaElementSource(audio);
      var analyser = context.createAnalyser();
      var canvas = document.getElementById("canvasMusic");
      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;
      var ctx = canvas.getContext("2d");
      src.connect(analyser);
      analyser.connect(context.destination);
      analyser.fftSize = 512;
      var bufferLength = analyser.frequencyBinCount;
      console.log(bufferLength);
      var dataArray = new Uint8Array(bufferLength);
      var WIDTH = canvas.width;
      var HEIGHT = canvas.height;
      var barWidth = (WIDTH / bufferLength) * 2.5;
      var barHeight;
      var x = 0;
      function renderFrame() {
        requestAnimationFrame(renderFrame);
        x = 0;
        analyser.getByteFrequencyData(dataArray);
        ctx.fillStyle = "#000";
        ctx.fillRect(0, 0, WIDTH, HEIGHT);
        for (var i = 0; i < bufferLength; i++) {
          barHeight = dataArray[i];
          var r = barHeight + (25 * (i/bufferLength));
          var g = 250 * (i/bufferLength);
          var b = 255;
          var a = 0.4;
          ctx.fillStyle = "rgba(" + r + "," + g + "," + b + ","+ a +")";
          ctx.fillRect(x, HEIGHT - barHeight*1.2, barWidth*.8, barHeight*2);
          x += barWidth + 1;
        }
      }
      audio.play();
      renderFrame();
  };