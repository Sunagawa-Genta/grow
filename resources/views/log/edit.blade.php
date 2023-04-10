<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('ログ修正') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 ">
          @include('common.errors')
          <form class="mb-6" action="{{ route('log.update',$log->id) }}" method="POST">
            @method('put')
            @csrf
            <div class="flex flex-col mb-4">
              <x-input-label for="log" :value="__('Log')" />
              <x-text-input id="log" class="block mt-1 w-full" type="text" name="log" value="{{$log->log}}" required autofocus />
              <x-input-error :messages="$errors->get('log')" class="mt-2" />
            </div>
            <div class="flex flex-col mb-4">
              <x-input-label for="description" :value="__('Description')" />
              <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" value="{{$log->description}}" autofocus />
              <x-input-error :messages="$errors->get('description')" class="mt-2" />
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