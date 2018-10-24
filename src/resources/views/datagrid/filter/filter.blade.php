@if($builder->getRow()->hasFilter())
    <tr>
        {{--filter field for search  --}}
        @foreach($columns as $co => $column)
            @continue(($co + 1) == count($columns) && $column->getName() === \Tphpdeveloper\Gridview\Datagrid\Column::COLUMN_CALLBACK)
            @if($column->hasFilter() && $column->getName() !== \Tphpdeveloper\Gridview\Datagrid\Column::COLUMN_CALLBACK)
                <th>
                    {!! Form::text('filter['.$column->getName().']',
                        ($request->input('filter.'.$column->getName()) ?? ''),
                        [
                            'class' => 'form-control',
                            'form' => 'filter_search'
                        ]) !!}
                </th>
            @else
                <th></th>
            @endif
        @endforeach
        <th class="d-flex flex-nowrap justify-content-end">
            {{--button form for search by filter data--}}
            {!! Form::open(['url' => $request->url(), 'method' => 'GET', 'id' => 'filter_search']) !!}

            {!! Form::button(
                    Html::tag('i', '', ['class' => 'fa fa-search']),
                    [
                    'type' => 'submit',
                    'class' => 'btn btn-sm text-success btn-neutral'
                    ]
            ) !!}
            {!! Form::close() !!}

            {!! Html::nbsp() !!}

            {!! Html::link(route($request->route()->getName(), $request->except('filter')), Html::tag('i', '', ['class' => 'fa fa-remove']),
                    [
                    'class' => 'btn btn-sm text-danger btn-neutral'
                    ],
                    null,
                    false) !!}

        </th>
    </tr>
@endif
