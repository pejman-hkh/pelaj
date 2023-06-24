<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __( ucfirst( $modelName ) ) }} {{ @$model->id?__('Edit ').$model->title:__('New')}}
        </h2>
    </x-slot>


    <x-card>
        
        <x-primary-button class="my-4"><a href="{{ url('/').'/manager/index/'.$modelName }}"> {{ ucfirst($modelName) }} {{ __('List') }} </a></x-primary-button>
        
        @if( @$model->id )
        <x-primary-button class="my-4"><a href="{{ url('/').'/manager/create/'.$modelName }}"> {{ __('New') }} {{ ucfirst($modelName) }} </a></x-primary-button>
        @endif

        <form method="POST" action="{{ @$model->id?(url('/').'/manager/edit/'.$modelName.'/'.$model->id):(url('/').'/manager/create/'.$modelName) }}">
            @csrf
            @if( @$model->id )
             @method('PUT')
            @endif

            @include('manager.partials/form')
 
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ @$model->id?__('Edit'):__('Send') }}
                </x-primary-button>
            </div>
        </form>                
    </x-card>

 
</x-app-layout>

@if (@$model->id)
<script>
    let formJsonData = @json( $model );
</script>
@endif