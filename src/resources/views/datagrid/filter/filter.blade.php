@if($builder->getRow()->hasFilter())
    <tr>
        {{--filter field for search  --}}
        @foreach($columns as $co => $column)
            <th {!! $column->getStringAttributes() !!}>
            @if(($co + 1) == count($columns))
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
            @elseif($column->hasFilter())
                    {!! Form::text('filter['.$column->getName().']',
                        ($request->input('filter.'.$column->getName()) ?? ''),
                        [
                            'class' => 'form-control',
                            'form' => 'filter_search'
                        ]) !!}
            @endif
            </th>
        @endforeach
    </tr>
@endif
