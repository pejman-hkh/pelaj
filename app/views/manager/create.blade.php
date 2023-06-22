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

            @foreach( $columns as $column )
    
            @if( $column[1] == 'string')
                <div class="mb-4">
                    <x-input-label for="{{ $column[0] }}" :value="__( ucfirst($column[0]) )" />
                    <x-text-input id="{{ $column[0] }}" class="block mt-1 w-full" type="text" name="{{ $column[0] }}" />
                    <x-input-error :messages="$errors->get( $column[0] )" class="mt-2" />
                </div>
            @elseif ( $column[1] == 'text' )    
                <div class="mb-4">
                    <x-input-label for="{{ $column[0] }}" :value="__( ucfirst($column[0]) )" />
                    <x-textarea id="{{ $column[0] }}" class="quill block mt-1 w-full" name="{{ $column[0] }}" />
                    <x-input-error :messages="$errors->get( $column[0] )" class="mt-2" />
                </div>
            @elseif ( $column[1] == 'integer' || $column[2] == 'tinyint' )    
            <div class="mb-4">
                <x-input-label for="{{$column[0]}}" :value="__( ucfirst($column[0]) )" />
                @php
                $arr = $column[0].'Array';
                @endphp
                @if ( @$model->$arr )
                <x-select id="{{$column[0]}}" class="block mt-1 w-full" type="text" name="{{$column[0]}}">
                    <option value="">Select</option>
                    @foreach( (array)@$model->$arr as $key => $val )
                    <option value="{{ $key }}">{{ $key }} - {{ $val }}</option>
                    @endforeach
                </x-select>
                @else
              
   
                    <x-text-input id="{{ $column[0] }}" class="block mt-1 w-full" type="text" name="{{ $column[0] }}" />
                    <x-input-error :messages="$errors->get( $column[0] )" class="mt-2" />
                                    
                @endif
                <x-input-error :messages="$errors->get( $column[0] )" class="mt-2" />
            </div>                
            @endif

            @endforeach

 
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