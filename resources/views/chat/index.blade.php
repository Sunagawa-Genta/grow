<x-app-layout>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>行動ログ</title>
        <style>
            .other::before {
                content: "";
                position: absolute;
                top: 90%;
                left: -15px;
                margin-top: -30px;
                border: 5px solid transparent;
                border-right: 15px solid #c7deff;
            }
            .self::after {
                content: "";
                position: absolute;
                top: 50%;
                left: 100%;
                margin-top: -15px;
                border: 3px solid transparent;
                border-left: 9px solid #c7deff;
            }
        </style>
        <!--<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1"></script>-->
        <!--<script>-->
        <!--  window.onload = function () {-->
        <!--    var context = document.querySelector("#chart").getContext('2d')-->
        <!--    new Chart(context, {-->
        <!--      type: 'line',-->
        <!--      data: {-->
        <!--        labels: ['1月', '2月', '3月', '4月', '5月', '6月','7月', '8月', '9月', '10月', '11月', '12月'],-->
        <!--        datasets: [{-->
        <!--          label: "目標に対する行動数",-->
        <!--          data: [1,'num2',3,3,3,3,3,4,3,6,3,4],-->
        <!--          borderColor: 'rgba(255, 100, 100, 1)'-->
        <!--        }],-->
        <!--      },-->
        <!--      options: {-->
        <!--        responsive: false-->
        <!--      }-->
        <!--    })-->
        <!--  }-->
        <!--</script>-->
    </head>
    <body class="w-4/5 md:w-3/5 lg:w-2/5 m-auto">
        <h1 class="my-4 ml-4 text-3xl font-bold">行動ログ</h1>
            <ul>
            @foreach ($chats as $chat)
               <p class="text-xs @if($chat->user_identifier == session('user_identifier')) text-right @endif">{{$chat->created_at}} ＠{{$chat->user_name}}</p>
               <li class="w-max mb-3 p-2 rounded-lg bg-blue-200 relative @if($chat->user_identifier == session('user_identifier')) self ml-auto @else other @endif">
                   {{$chat->message}}
                <!-- favorite 状態で条件分岐 -->
                @if($chat->users()->where('user_id', Auth::id())->exists())
                <!-- unfavorite ボタン -->
                <form action="{{ route('unfavorites',$chat) }}" method="POST" class="text-left">
                  @csrf
                  <x-primary-button class="ml-3">
                    <svg class="h-4 w-4 text-red-500" fill="red" viewBox="0 0 24 24" stroke="red">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    {{ $chat->users()->count() }}
                  </x-primary-button>
                </form>
                @else
                <!-- favorite ボタン -->
                <form action="{{ route('favorites',$chat) }}" method="POST" class="text-left">
                  @csrf
                  <x-primary-button class="ml-3">
                    <svg class="h-4 w-4 text-red-500" fill="none" viewBox="0 0 24 24" stroke="gray">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    {{ $chat->users()->count() }}
                  </x-primary-button>
                </form>
                @endif
                </li>
            @endforeach
            </ul>
        <form class="my-4 py-2 px-4 rounded-lg bg-gray-300 text-sm flex flex-col md:flex-row flex-grow" action="/chat" method="POST" enctype="multipart/form-data"> 
            @csrf
            <input type="hidden" name="user_identifier" value={{session('user_identifier')}}>
            <input class="py-1 px-2 rounded text-center flex-initial" type="text" name="user_name" placeholder="UserName" maxlength="20" value="{{session('user_name')}}" required>
            <input class="mt-2 md:mt-0 md:ml-2 py-1 px-2 rounded flex-auto" type="text" name="message" placeholder="Input message." maxlength="200" autofocus required>
            <button class="mt-2 md:mt-0 md:ml-2 py-1 px-2 rounded text-center bg-gray-500 text-white" type="submit">Send</button>
        </form>
        <!--<canvas id="chart" width="300" height="300"></canvas>-->
    </body>
</html>
</x-app-layout>

