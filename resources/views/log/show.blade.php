<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('詳細') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800">
          <div class="mb-6">
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">Log</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="log">
                {{$log->log}}
              </p>
            </div>
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">Description</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="description">
                {{$log->description}}
              </p>
            </div>
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">いつ</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="description">
                {{$log->created_at}}
              </p>
            </div>
             <section class="bg-gray-100 py-2 px-4">
             <form action="{{ route('replies.store', $log) }}" method="post" class="mt-8">
              @csrf
              <textarea name="content" id="content" rows="1" class="w-full p-2 rounded-lg focus:outline-none focus:border-blue-500" style="border: 1px solid rgb(209, 213, 219);" placeholder="feedbackを入力">{{ old('content') }}</textarea>
              <div class="button-container">
                <button type="submit" class="custom-button text-gray px-4 py-2 rounded-lg">送信</button>
              </div>
            </form>
            <h2 class="text-xl font-bold mb-4 text-center">feedback</h2>
            @forelse($replies as $reply)
            <div class="bg-white rounded-lg shadow mb-4 p-4">
              <div class="text-sm">{{ $reply->content }}</div>
              <div class="text-sm">{{ $reply->user->name}}</div>
              <div class="text-sm">{{ $reply->created_at }}</div>
            </div>
            @empty
            <p class="text-center">まだfeedbackはありません。</p>
            @endforelse
          </section>
            <div class="flex items-center justify-end mt-4">
            <a href="{{ url()->previous() }}">
              <x-secondary-button class="ml-3">
                {{ __('Back') }}
              </x-primary-button>
            </a>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>