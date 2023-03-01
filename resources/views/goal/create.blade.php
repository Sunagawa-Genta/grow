<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('目標設定') }}
    </h2>
  </x-slot>
<div class="">
  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 ">
            <h2>GROWモデルについて</h2>
            <h3>G:Goal(目標・ほしい結果)</h3>
            <p>達成したい目標やほしい結果を明確にする</p>
            <h3>R:Reality Check(現実の確認)</h3>
            <p>客観的なスタート地点を特定する</p>
            <h3>O:Options(選択肢)</h3>
            <p>達成するためにどのような選択肢があるか</p>
            <h3>W:Will(意志)</h3>
            <p>アクションプランを作成する</p>
          </div>
        </div>
      </div>
    </div>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 ">
            @include('common.errors')
            <form class="mb-6" action="{{ route('goal.store') }}" method="POST">
              @csrf
              <div class="flex flex-col mb-4">
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
                <x-input-label for="option" :value="__('Options:選択肢の検討')" />
                <x-text-input id="option" class="block mt-1 w-full" type="text" name="option" :value="old('option')" required autofocus />
                <x-input-error :messages="$errors->get('option')" class="mt-2" />
              </div>
               <div class="flex flex-col mb-4">
                <x-input-label for="will" :value="__('Will:意思確認')" />
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