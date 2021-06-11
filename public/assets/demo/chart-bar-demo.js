// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var tien_thu = $("#tien_thu").val();
var tien_chi = $("#tien_chi").val();

var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Tổng thu", "Tổng chi"],
    datasets: [{
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: [tien_thu, tien_chi],
    }],
  },
  options: {
      // tooltips: {
      //     enabled: true,
      //     callbacks: {
      //         label: function (tooltipItem, chartData) {
      //             return Sv.numberToString(chartData.datasets[tooltipItem.datasetIndex].data[tooltipItem.index]);
      //         }
      //     },
      //     show: {
      //         duration: 500
      //     }
      // },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          maxTicksLimit: 10
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
