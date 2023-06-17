<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <x-card>
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
         

                <hr class="m-4" />

                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
          
                <hr class="m-4" />
     
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
           
     </x-card>
</x-app-layout>
