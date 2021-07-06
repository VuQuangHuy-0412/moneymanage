// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

var ctx2 = document.getElementById("myAreaChart2");
console.log($("#month1").val());
var myLineChart2 = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: [$("#month1").val(), $("#month2").val(), $("#month3").val(), $("#month4").val(), $("#month5").val(), $("#month6").val()],
        datasets: [{
            label: "Sessions",
            lineTension: 0.3,
            backgroundColor: "rgba(2,117,216,0.2)",
            borderColor: "rgba(2,117,216,1)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(2,117,216,1)",
            pointBorderColor: "rgba(255,255,255,0.8)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: [$("#tien_thu_11").val(), $("#tien_thu_21").val(), $("#tien_thu_31").val(), $("#tien_thu_41").val(), $("#tien_thu_51").val(), $("#tien_thu_61").val()],
        }],
    },
    options: {
        scales: {
            xAxes: [{
                time: {
                    unit: 'date'
                },
                gridLines: {
                    display: false
                },
                ticks: {
                    maxTicksLimit: 7
                }
            }],
            yAxes: [{
                ticks: {
                    min: 0,
                    maxTicksLimit: 10
                },
                gridLines: {
                    color: "rgba(0, 0, 0, .125)",
                }
            }],
        },
        legend: {
            display: false
        }
    }
});

var ctx3 = document.getElementById("myAreaChart3");
var myLineChart3 = new Chart(ctx3, {
    type: 'line',
    data: {
        labels: [$("#month1").val(), $("#month2").val(), $("#month3").val(), $("#month4").val(), $("#month5").val(), $("#month6").val()],
        datasets: [{
            label: "Sessions",
            lineTension: 0.3,
            backgroundColor: "rgba(2,117,216,0.2)",
            borderColor: "rgba(2,117,216,1)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(2,117,216,1)",
            pointBorderColor: "rgba(255,255,255,0.8)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: [$("#tien_chi_11").val(), $("#tien_chi_21").val(), $("#tien_chi_31").val(), $("#tien_chi_41").val(), $("#tien_chi_51").val(), $("#tien_chi_61").val()],
        }],
    },
    options: {
        scales: {
            xAxes: [{
                time: {
                    unit: 'date'
                },
                gridLines: {
                    display: false
                },
                ticks: {
                    maxTicksLimit: 7
                }
            }],
            yAxes: [{
                ticks: {
                    min: 0,
                    maxTicksLimit: 10
                },
                gridLines: {
                    color: "rgba(0, 0, 0, .125)",
                }
            }],
        },
        legend: {
            display: false
        }
    }
});
