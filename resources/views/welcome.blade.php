<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <style>
    h1 {
        color:black;
        font-size:100px;
        display:flex;
        justify-content: center;
        align-items: center;
    }
    
    body{
        background-size: 100% 100%;
        background-repeat: no-repeat;
        width: 100%;
 　　　 　 height: 100vh;
        background-image: url(https://images.pexels.com/photos/3951881/pexels-photo-3951881.jpeg);
    }
    
    a{
        color:black;
        font-size:40px;
        display:flex;
        justify-content: center;
        align-items: center;
    }
    </style>
　　<body>
　　    <h1>GROW</h1><br>
            @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
    　</body>
</html>

