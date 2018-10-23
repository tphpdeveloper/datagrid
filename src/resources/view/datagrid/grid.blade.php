<div class="table-responsive">
    <table {!! $builder->getStringAttributes() != "" ? $builder->getStringAttributes() : 'class="table"' !!}>
        <thead class="text-primary">

        {{--{{ dd()}}--}}
        <tr>
            @foreach($columns as $column)
                <th>
                    @if($column->hasSort())
                    @php
                        $fa_sort = 'fa-sort';
                        $url_except = $request->except('sort.'.$column->getName());
                        if($request->has('sort.'.$column->getName())){
                            $key = $request->input('sort.'.$column->getName());
                            if($key == 'ASC'){
                                $url_except['sort'][$column->getName()] = 'DESC';
                                $fa_sort = 'fa-sort-asc';
                            }
                            else{
                                $url_except['sort'][$column->getName()] = 'ASC';
                                $fa_sort = 'fa-sort-desc';
                            }
                        }
                        else{
                            $url_except['sort'][$column->getName()] = 'ASC';
                        }

                        $url = route($request->route()->getName(), $url_except);
                    @endphp
                    <a href="{{ $url }}">
                        {{ $column->getAlias() }}
                        {!! Html::tag('i', '', ['class' => 'fa '.$fa_sort]) !!}
                    </a>
                    @else
                        {{ $column->getAlias() }}
                    @endif
                </th>
            @endforeach

            @if($builder->getRow()->hasSort())
                <th class="text-right">
                    @php
                        $without_sort = $request->except('sort');
                    @endphp
                    {!! Html::link(route($request->route()->getName(), $without_sort), Html::tag('i', '', ['class' => 'fa fa-remove']),
                        ['class' => 'btn text-danger'],
                        null,
                        false) !!}
                </th>
            @endif

        </tr>
        @if($builder->getRow()->hasFilter())
            <tr>
                {{--filter field for search  --}}
                @foreach($columns as $column)
                    @if($column->hasFilter())
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
                <th class="text-right">
                    {{--button form for search by filter data--}}
                    {!! Form::open(['url' => $request->url(), 'method' => 'GET', 'id' => 'filter_search']) !!}

                        {!! Form::button(
                                Html::tag('i', '', ['class' => 'fa fa-search']),
                                [
                                'type' => 'submit',
                                'class' => 'btn text-success'
                                ]
                        ) !!}

                        {!! Html::link(route($request->route()->getName(), $request->except('filter')), Html::tag('i', '', ['class' => 'fa fa-remove']),
                                [
                                'class' => 'btn text-danger'
                                ],
                                null,
                                false) !!}
                    {!! Form::close() !!}

                </th>
            </tr>
        @endif
        </thead>
        <tbody>
        {{--<tr>--}}
        {{--<td>--}}
        {{--Dakota Rice--}}
        {{--</td>--}}
        {{--<td>--}}
        {{--Niger--}}
        {{--</td>--}}
        {{--<td>--}}
        {{--Oud-Turnhout--}}
        {{--</td>--}}
        {{--<td class="text-right">--}}
        {{--$36,738--}}
        {{--</td>--}}
        {{--</tr>--}}

        </tbody>
    </table>
</div>
