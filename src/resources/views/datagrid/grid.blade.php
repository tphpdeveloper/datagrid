<div class="table-responsive">
    <table class="table">
        <thead class="text-primary">

            {{--{{ dd()}}--}}
			<tr>
                @foreach($columns as $co => $column)
                    <th {!! $column->getStringAttributes() !!}>
                        @if($column->hasSort())
                            @include('datagrid::sort.sort')
                        @elseif($builder->getRow()->hasSort() && ($co + 1) == count($columns))
                            {{--button for sort --}}
                            @include('datagrid::sort.button')
                        @else
                            {{ $column->getAlias() }}
                        @endif
                    </th>
                @endforeach
            </tr>
            {{--row with field and button for a filtering data--}}
            @include('datagrid::filter.filter')
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
                            <td {!! $column->getStringAttributes() !!}>
                                @if($column->isCounter())
                                    {{ (!$page ? $co + 1 : ( $co + 1 + ( ( $page * $count_on_first_page ) - $count_on_first_page ) ) ) }}
                                @elseif($column->isCallable())
                                    {!! $column->getCallback($model) !!}
                                @else
                                    {!! $model->{$column->getName()} !!}
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            @endif

        </tbody>
    </table>

    @if($models instanceof \Illuminate\Pagination\LengthAwarePaginator)
        {!! $models->appends($request->only('sort','filter'))->links('vendor.pagination.bootstrap-4') !!}
    @endif
</div>
