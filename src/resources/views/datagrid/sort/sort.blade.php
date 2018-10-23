@php
    $fa_sort = 'fa-sort';
    $url_except = $request->except('sort.'.$column->getName());
    if($request->has('sort.'.$column->getName())){
        $key = $request->input('sort.'.$column->getName());
        if($key == 'ASC'){
            $url_except['sort'][$column->getName()] = 'DESC';
            $fa_sort = 'fa-sort-desc';
        }
        else{
            $url_except['sort'][$column->getName()] = 'ASC';
            $fa_sort = 'fa-sort-asc';
        }
    }
    else{
        $url_except['sort'][$column->getName()] = 'ASC';
    }

    $url = route($request->route()->getName(), $url_except);
@endphp

<a href="{{ $url }}" class="d-flex flex-nowrap align-items-center ">
    {{ $column->getAlias() }}{!! Html::nbsp() !!}
    {!! Html::tag('i', '', ['class' => 'fa '.$fa_sort]) !!}
</a>
