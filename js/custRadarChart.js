var exp=0;
var bilingual = 0;
var timeCtrl = 0;
var cooperation = 0;
var atmosphere = 0;
var reaction = 0;
var host;

function getHostJSON(){
    var xhr = new XMLHttpRequest();
    xhr.onload=function (){
        if( xhr.status == 200 ){
          test(xhr.responseText);
          
          console.log(host);
        }else{
          alert( xhr.status );
        }
    }
    var url = "php/components/_getHostRadar.php";
    xhr.open("Get", url, true);
    xhr.send( null );
}

  getHostJSON();
  function test(jsonStr){
    host = JSON.parse(jsonStr);
  
  let chartRadar = document.getElementsByClassName("chartRadar");
  
  for ( let i=0; i<chartRadar.length; i++){
    exp = host[i].hostA;
    bilingual = host[i].hostB;
    timeCtrl = host[i].hostC;
    cooperation = host[i].hostD;
    atmosphere = host[i].hostE;
    reaction = host[i].hostF;

    
    var gradientRed = chartRadar[i].getContext('2d').createLinearGradient(0, 0, 0, 150);
    gradientRed.addColorStop(0, 'rgba(255, 85, 184, 0.9)');
    gradientRed.addColorStop(1, 'rgba(255, 135, 135, 0.8)');
    
    
    var redArea = null;
    
    Chart.plugins.register({
      afterEvent: function(chart, e) {
        
        if (chart.ctx.isPointInPath(e.x, e.y)) {
          var dataset = window.chart.data.datasets[0];
          // dataset.backgroundColor = gradientHoverRed;
          window.chart.update();
          // chartRadar.style.cursor = 'pointer';
        } else {
          var dataset = window.chart.data.datasets[0];
          dataset.backgroundColor = gradientRed;
          window.chart.update();
          // chartRadar.style.cursor = 'default';
        }
      }
    });
    

    window.chart = new Chart(document.getElementsByClassName("chartRadar")[i], {
        type: "radar",
        data: {
            labels: ["主持經驗", "雙語能力", "時間掌握", "配合程度", "現場氣氛", "臨場反應"],
            datasets: [
              {
                label: "skill",
                data: [exp, bilingual, timeCtrl, cooperation, atmosphere, reaction],
                fill: true,
                backgroundColor: gradientRed,
                borderColor: 'transparent',
                pointBackgroundColor: "transparent",
                pointBorderColor: "transparent",
                pointHoverBackgroundColor: "transparent",
                pointHoverBorderColor: "transparent",
                pointHitRadius: 50,
            },
          ]
        },
        options: {
          legend: {
            display: false,
          },
          scale: {
            ticks: {
                maxTicksLimit: 1,
                display: false,
            }
          }
        },
    });
  }
}