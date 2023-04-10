<x-app-layout>
  <div class="bg-white py-6 sm:py-8 lg:py-12">
  <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
    <div class="grid grid-cols-2 gap-5 rounded-lg bg-indigo-100 p-6 sm:h-30 sm:content-evenly md:grid-cols-4">
      <div class="text-indigo-500">
        <h3 class="font-bold">G:Goal(目標)</h3>
        <p class="mt-6" >例:4か月で10kg痩せる</p>
      </div>
      <div class="text-indigo-500">
        <h3 class="font-bold">R:Reality Check(現状確認)</h3>
      　<p>例:今80kgだから70kgにする</p>
      </div>
      <div class="text-indigo-500">
        <h3 class="font-bold">O:Options(選択肢)</h3>
        <p class="mt-6">例:10時以降は食べない・週に2回はジム</p>
      </div>
      <div class="text-indigo-500">
        <h3 class="font-bold">W:Will(意志)</h3>
        <p class="mt-6">例:夜10時以降は食べない</p>
      </div>
    </div>
  </div>
</div>
    <div class="py-10">
      <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 ">
            @include('common.errors')
            <form class="mb-6" action="{{ route('goal.store') }}" method="POST">
              @csrf
              <div class="flex flex-col mb-4">
                <svg class="h-8 w-8 text-yellow-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="yellow" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="8" y1="21" x2="16" y2="21" />  <line x1="12" y1="17" x2="12" y2="21" />  <line x1="7" y1="4" x2="17" y2="4" />  <path d="M17 4v8a5 5 0 0 1 -10 0v-8" />  <circle cx="5" cy="9" r="2" />  <circle cx="19" cy="9" r="2" /></svg>
                <x-input-label for="goal" :value="__('Goal:目標')" />
                <x-text-input id="goal" class="block mt-1 w-full" type="text" name="goal" :value="old('goal')" required autofocus />
                <x-input-error :messages="$errors->get('goal')" class="mt-2" />
              </div>
              <div class="flex flex-col mb-4">
                <x-input-label for="reality" :value="__('Reality:現状把握')" />
                <x-text-input id="reality" class="block mt-1 w-full" type="text" name="reality" :value="old('reality')" required autofocus />
                <x-input-error :messages="$errors->get('reality')" class="mt-2" />
              </div>
               <div class="flex flex-col mb-4">
                <x-input-label for="option" :value="__('Options:選択肢')" />
                <x-text-input id="option" class="block mt-1 w-full" type="text" name="option" :value="old('option')" required autofocus />
                <x-input-error :messages="$errors->get('option')" class="mt-2" />
              </div>
               <div class="flex flex-col mb-4">
                <x-input-label for="will" :value="__('Will:意志')" />
                <x-text-input id="will" class="block mt-1 w-full" type="text" name="will" :value="old('will')" required autofocus />
                <x-input-error :messages="$errors->get('will')" class="mt-2" />
              </div>
              <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                  {{ __('確定') }}
                </x-primary-button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>