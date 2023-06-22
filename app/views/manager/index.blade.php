<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $modelName.__(' lists') }}
        </h2>
    </x-slot>

    <x-card>
            <x-primary-button class="my-4"><a href="{{ url('/').'/manager/create/'.($modelName) }}"> New {{ $modelName }}</a></x-primary-button>
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
                        <a href="{{ @$list->$cl->listLink?:(url('/').'/manager/index/'.ucfirst($cl).'?id='.@$list->$cl->id) }}">{{ @$list->$cl->listTitle }}</a>
                    @elseif( $list->$ct )
                        {{ $list->$ct }}
                    @else
                        {{ $list->$column }}    
                    @endif
                </x-td>
                @endforeach

                <x-td>
                    <a href="{{ url('/').'/manager/edit/'.$modelName.'/'.$list->id }}"> {{ __('Edit') }}</a> / 
                    <form method="POST" action="{{ url('/').'/manager/destroy/'.$modelName.'/'.$list->id }}">
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