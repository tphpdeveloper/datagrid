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
