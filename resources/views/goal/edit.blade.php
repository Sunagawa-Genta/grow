<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('目標更新') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 ">
          @include('common.errors')
          <form class="mb-6" action="{{ route('goal.update',$goal->id) }}" method="POST">
            @method('put')
            @csrf
            <div class="flex flex-col mb-4">
              <x-input-label for="goal" :value="__('Goal')" />
              <x-text-input id="goal" class="block mt-1 w-full" type="text" name="goal" value="{{$goal->goal}}" required autofocus />
              <x-input-error :messages="$errors->get('goal')" class="mt-2" />
            </div>
            <div class="flex flex-col mb-4">
              <x-input-label for="reality" :value="__('Reality')" />
              <x-text-input id="reality" class="block mt-1 w-full" type="text" name="reality" value="{{$goal->reality}}" autofocus />
              <x-input-error :messages="$errors->get('reality')" class="mt-2" />
            </div>
            <div class="flex flex-col mb-4">
              <x-input-label for="option" :value="__('Options')" />
              <x-text-input id="option" class="block mt-1 w-full" type="text" name="option" value="{{$goal->option}}" autofocus />
              <x-input-error :messages="$errors->get('option')" class="mt-2" />
            </div>
            <div class="flex flex-col mb-4">
              <x-input-label for="will" :value="__('Will')" />
              <x-text-input id="will" class="block mt-1 w-full" type="text" name="will" value="{{$goal->will}}" autofocus />
              <x-input-error :messages="$errors->get('will')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-4">
              <a href="{{ url()->previous() }}">
                <x-secondary-button class="ml-3">
                  {{ __('Back') }}
                </x-primary-button>
              </a>
              <x-primary-button class="ml-3">
                {{ __('Update') }}
              </x-primary-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>