{!! Html::link(route($request->route()->getName(), $request->except('sort')), Html::tag('i', '', ['class' => 'fa fa-remove']),
    ['class' => 'btn btn-sm text-danger btn-neutral'],
    null,
    false) !!}
