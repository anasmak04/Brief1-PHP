

var ctx = document.getElementById("chart_01").getContext("2d");
Chart.defaults.global.defaultFontColor = "#73879C";
var chart_01 = new Chart(ctx, {
  type: 'line',
        data: {
    labels: ["Enero","Febrero","Marzo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
    
    datasets: [{
        
        backgroundColor:'rgba(168, 227, 215, 0.6)',
        borderColor:'rgba(168, 227, 215, 1)',
        borderWidth: 1,
       
        data: [20, 30, 40, 20, 30, 30, 30, 50, 15, 30, 11, 56],

    }, {
        
        backgroundColor: "rgba(154, 188, 195, 0.6)",
        borderColor: "rgba(154, 188, 195, 1)",
        borderWidth: 1,
        data: [50, 12, 26, 50, 45, 45, 30, 45, 50, 20, 15, 50]
    }]

},
    options: { 
        responsive: false,
        legend: {
            display: false
         }
    },
    pointDotRadius: 10,
    bezierCurve: false,
    scaleShowVerticalLines: false,
    scaleShowGridLines: false,

});

var ctx1 = document.getElementById("chart_02").getContext("2d");
Chart.defaults.global.defaultFontColor = "#73879C";
var chart_02 = new Chart(ctx1, {
  type: 'line',
        data: {
    labels: ["Enero","Febrero","Marzo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
    
    datasets: [{
        
        backgroundColor:'rgba(168, 227, 215, 0.6)',
        borderColor:'rgba(168, 227, 215, 1)',
        borderWidth: 1,
       
        data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],

    }, {
        
        backgroundColor: "rgba(154, 188, 195, 0.6)",
        borderColor: "rgba(154, 188, 195, 1)",
        borderWidth: 1,
        data: [12, 11, 10, 9, 8, 7, 6, 5, 4, 3, 2, 1]
    }]

},
    options: { 
        responsive: false,
        legend: {
            display: false
         }
    },
    pointDotRadius: 10,
    bezierCurve: false,
    scaleShowVerticalLines: false,
    scaleShowGridLines: false,

});







const Details = document.getElementById('Details');
const popup = document.getElementById('popup');


Details.addEventListener('click', (e) => {
    e.preventDefault();
    popup.style.display = "block";
    popup.style.color="red";
})