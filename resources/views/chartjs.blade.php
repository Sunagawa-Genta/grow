<x-app-layout>
 <html>
  <head>
    <meta charset="UTF-8" />
    <title>記録</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1"></script>
    <script>
      window.onload = function () {
        var context = document.querySelector("#chart").getContext('2d')
        new Chart(context, {
          type: 'line',
          data: {
            labels: ['1月', '2月', '3月', '4月', '5月', '6月','7月', '8月', '9月', '10月', '11月', '12月'],
            datasets: [{
              label: "目標に対する行動数",
              data: [1,2,3,3,3,3,3,4,3,6,3,4],
              borderColor: 'rgba(255, 100, 100, 1)'
            }],
          },
          options: {
            responsive: false
          }
        })
      }
    </script>
  </head>
  <body>
    <h1 class="my-4 ml-4 text-3xl font-bold">行動記録グラフ</h1>
    <canvas id="chart" width="300" height="300"></canvas>
  </body>
 </html>
</x-app-layout>