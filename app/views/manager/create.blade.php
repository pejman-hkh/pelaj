<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ @$model->id?__(':model Edit ', ['model' => __( ucfirst( $modelName ) ) ]).$model->title:__(':model New', ['model' => __( ucfirst( $modelName ) ) ])}}


        </h2>
    </x-slot>


    <x-card>
        
       <a href="{{ url('/').'/manager/index/'.$modelName }}">  <x-primary-button class="my-4">{{ __(':model List', ['model' => __( ucfirst( $modelName ) ) ]) }}</x-primary-button> </a>
        
        @if( @$model->id )
        <a href="{{ url('/').'/manager/create/'.$modelName }}"><x-primary-button class="my-4"> {{ __('New') }} {{ __( ucfirst($modelName) ) }} </x-primary-button></a>
        @endif

        <form method="POST" action="{{ @$model->id?(url('/').'/manager/edit/'.$modelName.'/'.$model->id):(url('/').'/manager/create/'.$modelName) }}"  enctype="multipart/form-data">
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