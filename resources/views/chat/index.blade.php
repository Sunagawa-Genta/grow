<x-app-layout>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>行動ログ</title>
    </head>
    <body class="w-4/5 md:w-3/5 lg:w-2/5">
            <div class="mt-8">
                <form class="w-10/12 mx-auto md:max-w-md" action="/chat" method="POST" enctype="multipart/form-data">
                     @csrf
                     <input type="hidden" name="user_identifier" value={{session('user_identifier')}}>
                    <div class="mb-2">
                        <label for="name" class="block font-bold">名前:nameと同じものを入れてね</label>
                        <input type="text" name="user_name" placeholder="UserName" maxlength="20" value="{{session('user_name')}}" required class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50 rounded-md">
                    </div>
                    <div class="mb-2">
                        <label for="log" class="font-bold">行動ログ:なにしましたか</label>
                        <input class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50 rounded-md" type="text" name="message" placeholder="Input log." maxlength="200" autofocus required>
                    </div>
                    <button class="mt-2 md:mt-0 md:ml-2 py-1 px-2 rounded text-center bg-gray-500 text-white" type="submit">Send</button>
                </form>
            </div>
            <div class="flex flex-col mt-3">
              <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                  <div class="border rounded-lg shadow overflow-hidden dark:border-gray-700 dark:shadow-gray-900">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 ">
                      <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                          <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase dark:text-gray-400">Name</th>
                          <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase dark:text-gray-400">Time</th>
                          <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase dark:text-gray-400">Detail</th>
                          <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase dark:text-gray-400">Feedback</th>
                        </tr>
                      </thead>
                      <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($chats as $chat)
                        <tr>
                          <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-800 dark:text-gray-200">{{$chat->user_name}}</td>
                          <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 dark:text-gray-200">{{$chat->created_at}}</td>
                          <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 dark:text-gray-200">{{$chat->message}}</td>
                          <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                            <div class="flex">
                             <!-- favorite 状態で条件分岐 -->
                            @if($chat->users()->where('user_id', Auth::id())->exists())
                            <!-- unfavorite ボタン -->
                            <form action="{{ route('unfavorites',$chat) }}" method="POST" class="text-left">
                              @csrf
                              <x-primary-button class="ml-3">
                                <svg class="h-6 w-6 text-red-500" fill="red" viewBox="0 0 24 24" stroke="red">
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
                                <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="gray">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                                {{ $chat->users()->count() }}
                              </x-primary-button>
                            </form>
                            @endif
                            <form action="{{ route('chat.edit',$chat->id) }}" method="GET" class="text-left">
                              @csrf
                              <x-primary-button class="ml-3">
                                <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="gray">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                              </x-primary-button>
                            </form>
                            <!-- 🔽 削除ボタン -->
                            <form action="{{ route('chat.destroy',$chat->id) }}" method="POST" class="text-left">
                              @method('delete')
                              @csrf
                              <x-primary-button class="ml-3">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="gray">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                              </x-primary-button>
                            </form>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
    </body>
</html>
</x-app-layout>

