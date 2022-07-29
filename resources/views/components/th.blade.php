@isset($columnSort)
    <th {{$attributes}}>
        <span @class([
            'c-sorting',
            'text-primary'=> $sortBy==$columnSort
        ])>
            <span class="text-capitalize">{{$title}}</span> <i
                class="la la-sort-alpha-{{ $desc==true&&$sortBy==$columnSort ? 'desc' : 'asc' }}"></i>
        </span>
    </th>
@else
<th {{$attributes}}>
    {{$slot}}
</th>
@endisset
