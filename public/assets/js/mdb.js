//line
var ctxL = document.getElementById("lineChart").getContext('2d');
var myLineChart = new Chart(ctxL, {
  type: 'line',
  data: {
    labels: ["15 Aug", "16 Aug","17 Aug","18 Aug","19 Aug",],
    datasets: [{
      label: "Expenses",
      data: [65, 59, 80, 81, 56],
      backgroundColor: [
        'rgb(220,53,69, .2)',
      ],
      borderColor: [
        'rgba(200, 99, 132, .7)',
      ],
      borderWidth: 2
    },
    {
      label: "Income",
      data: [28, 48, 40, 19, 86],
      backgroundColor: [
        'rgba(0, 137, 132, .2)',
      ],
      borderColor: [
        'rgba(0, 10, 130, .7)',
      ],
      borderWidth: 2
    },
    {
        label: "Failures",
        data: [27, 23, 45, 29, 56],
        backgroundColor: [
          'rgba(255,255,0, .2)',
        ],
        borderColor: [
          'rgba(0, 10, 130, .7)',
        ],
        borderWidth: 2
      }
    ]
  },
  options: {
    responsive: true
  }
});