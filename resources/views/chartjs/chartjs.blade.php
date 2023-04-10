
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
              label: "行動数",
              data: [{{$num1}},{{$num2}},{{$num3}},{{$num4}},{{$num5}},{{$num6}},{{$num7}},{{$num8}},{{$num9}},{{$num10}},{{$num11}},{{$num12}}],
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
    
  <section>
    <div class="mx-auto max-w-screen-xl px-4 py-8 sm:py-12 sm:px-6 lg:py-16 lg:px-8">
      <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 lg:gap-16">
        <div class="relative h-64 overflow-hidden rounded-lg sm:h-80 lg:order-last lg:h-full">
          <canvas id="chart"class="absolute inset-0 h-full w-full object-cover"></canvas> 
        </div>
        <div class="lg:py-24">
          <h2 class="text-3xl font-bold sm:text-4xl">行動ログ数(月別)</h2>
          <p class="mt-4 text-gray-600">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aut qui hic
            atque tenetur quis eius quos ea neque sunt, accusantium soluta minus
            veniam tempora deserunt? Molestiae eius quidem quam repellat.
          </p>
        </div>
      </div>
    </div>
</section>
</body>
 </html>
</x-app-layout>