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

            @if ( substr( $column[0], -3 ) == '_id' )
                <div class="mb-4">
                    {{ __('Search') }} {{ ucfirst($column[0]) }}
                    <div class="mt-4">
                        <select class="choicesjs"></select>
                    </div>
                </div>
            @endif

            @endforeach