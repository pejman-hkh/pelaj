<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(':model lists', ['model' => __( $modelName ) ]) }}
        </h2>
    </x-slot>

    <x-card :title="__('Search')" :bodyClass="'hidden'" class="search">
        <form>
            @include('manager.partials/form')

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('Search') }}
                </x-primary-button>
            </div>            

        </form>
 
    </x-card>

    <x-card>
           <a href="{{ url('/').'/manager/create/'.($modelName) }}">  <x-primary-button class="my-4">{{ __('New :model', ['model' => __( $modelName ) ]) }} </x-primary-button></a>

            @foreach( $listTasks as $task )
               <a href="{{ url('/').'/manager/index/'.($modelName).'?task='.$task[1] }}">  <x-primary-button class="my-4">{{ $task[0] }} </x-primary-button></a>
            @endforeach

            <x-table>
                <x-thead>
                    @foreach( $columns as $column )
                    <x-th>{{ __( ucfirst($column[0]) ) }}</x-th>
                    @endforeach
                    <x-th>
                        {{ __('Edit') }}
                    </x-th>
                </x-thead>

            <x-tbody>
           @foreach ( $lists as $list )
            <tr>
                @foreach( $columns as $mcolumn )
                    @php
                        $column = $mcolumn[0];
                        $ct = $column.'Title';
                        $cl = substr( $column, 0, -3 )
                    @endphp
    
                <x-td>
         
                    @if ( substr( $column, -3 ) == '_id' )
                        <a href="{{ @$list->$cl->listLink?:(url('/').'/manager/index/'.ucfirst($cl).'?id='.@$list->$cl->id) }}">{{ @$list->$cl->listTitle?:@$list->$cl->title }}</a>
                    @elseif( $list->$ct )
                        @if( is_array( $list->$ct ) )
                        {!! implode('', $list->$ct) !!}
                        @else
                        {{ $list->$ct }}
                        @endif
                    @else
                        {{ $list->$column }}    
                    @endif
                </x-td>

                @endforeach

                <x-td>
                    @if( ! @$list->listDisableEdit )
                    <a href="{{ url('/').'/manager/edit/'.$modelName.'/'.$list->id }}"> {{ __('Edit') }}</a> / 
                    @endif
                    <form method="POST" class="delete" action="{{ url('/').'/manager/destroy/'.$modelName.'/'.$list->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">{{ __('Delete') }}</button></form>
                </x-td>
            </tr>
           @endforeach
            </x-tbody>
            </x-table>
            {{ $lists->onEachSide(5)->links() }}
      
   </x-card>
  
</x-app-layout>
