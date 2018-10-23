<div class="table-responsive">
    <table class="table">
        <thead class="text-primary">

            {{--{{ dd()}}--}}
            <tr>
                @foreach($columns as $co => $column)
                    @continue(($co + 1) == count($columns) && $column->getName() === \Tphpdeveloper\Gridview\Datagrid\Column::COLUMN_CALLBACK)
                    <th>
                        @if($column->hasSort() && $column->getName() !== \Tphpdeveloper\Gridview\Datagrid\Column::COLUMN_CALLBACK)
                            @include('datagrid.sort.sort')
                        @else
                            {{ $column->getAlias() }}
                        @endif
                    </th>
                @endforeach

                @include('datagrid.sort.button')

            </tr>
            @include('datagrid.filter.filter')
        </thead>
        <tbody>
            @if($models)
                @php
                    $page = ($request->page ?? 0);
                    $count_on_first_page = 0;
                    if($models instanceof \Illuminate\Pagination\LengthAwarePaginator){
                        $total_page = $models->lastPage();
                        $total_product = $models->total();
                        $count_on_first_page = ceil($total_product / $total_page);
                    }
                //dd($columns);
                @endphp
                @foreach($models as $co => $model)
                    <tr>
                        @foreach($columns as $co_column => $column)
                            <td {!! $column->getStringAttributes() !!} >
                                @if($column->getName() === \Tphpdeveloper\Gridview\Datagrid\Column::COLUMN_COUNTER)
                                    {{ (!$page ? $co + 1 : ( $co + 1 + ( ( $page * $count_on_first_page ) - $count_on_first_page ) ) ) }}
                                @elseif($column->getName() === \Tphpdeveloper\Gridview\Datagrid\Column::COLUMN_CALLBACK)
                                    {!! $column->getCollback($model) !!}
                                @else
                                    {!! $model->{$column->getName()} !!}
                                @endif
                            </td>
                        @endforeach
                        @if(($co_column + 1) == count($columns) && $column->getName() !== \Tphpdeveloper\Gridview\Datagrid\Column::COLUMN_CALLBACK)
                            <td></td>
                        @endif
                    </tr>
                @endforeach
            @endif

        </tbody>
    </table>
    @if($models instanceof \Illuminate\Pagination\LengthAwarePaginator)
        {!! $models->links('vendor.pagination.bootstrap-4') !!}
    @endif
</div>
