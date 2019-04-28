function init(){
  // let chartRadar = document.getElementsByClassName("chartRadar");
  for ( let i=0; i<7; i++){
  var chartRadar = document.getElementsByClassName("chartRadar")[i];
    
    var gradientRed = chartRadar.getContext('2d').createLinearGradient(0, 0, 0, 150);
    gradientRed.addColorStop(0, 'rgba(255, 85, 184, 0.9)');
    gradientRed.addColorStop(1, 'rgba(255, 135, 135, 0.8)');
    
    
    var redArea = null;
    
    Chart.plugins.register({
      afterEvent: function(chart, e) {
        
        if (chart.ctx.isPointInPath(e.x, e.y)) {
          var dataset = window.chart.data.datasets[0];
          dataset.backgroundColor = gradientHoverRed;
          window.chart.update();
          chartRadar.style.cursor = 'pointer';
        } else {
          var dataset = window.chart.data.datasets[0];
          dataset.backgroundColor = gradientRed;
          window.chart.update();
          chartRadar.style.cursor = 'default';
        }
      }
    });
    
    exp = 20;
    bilingual = 90;
    timeCtrl = 60;
    cooperation = 60;
    atmosphere = 45;
    reaction = 85;

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
window.addEventListener("load", init);