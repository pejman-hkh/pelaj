<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Config ') }} {{ @$config->id?__('Edit ').$config->title:__('New')}}
        </h2>
    </x-slot>


    <x-card>
        
        <x-primary-button class="my-4"><a href="{{ route('config.index') }}"> Config list </a></x-primary-button>

        <form method="POST" action="{{ @$config->id?route('config.update', $config->id ):route('config.store') }}">
            @csrf
            @if( @$config->id )
             @method('PUT')
            @endif
            <div>
                <x-input-label for="key" :value="__('Key')" />
                <x-text-input id="key" class="block mt-1 w-full" type="text" name="key" value="{{ @$config->key }}" required autofocus autocomplete="" />
                <x-input-error :messages="$errors->get('key')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="val" :value="__('Value')" />
                <x-textarea id="val" class="block mt-1 w-full" type="text" name="val" value="{{ @$config->val }}" autofocus autocomplete="" />
                <x-input-error :messages="$errors->get('val')" class="mt-2" />
            </div>

 
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ @$config->id?__('Edit'):__('Send') }}
                </x-primary-button>
            </div>
        </form>                
    </x-card>

 
</x-app-layout>
