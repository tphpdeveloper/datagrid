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
