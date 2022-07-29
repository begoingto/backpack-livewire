@props([
    'hover' => false,
    'primary' => false,
    'center' => false,
    'title' => null,
    'id' => null,
])
@if ($title == 'check')
    <td>
        <input id="check{{ $id }}" {{ $attributes }} class="hover-pointer" type="checkbox"
            value="{{ $id }}">
    </td>
@else
    <td {{ $attributes }} @class([
        'text-center' => $center,
        'p-0' => $hover
    ])>
        @if ($hover)
            <label for="check{{ $id }}" @class([
                'w-100 mb-0',
                'hover-pointer' => $hover,
                'text-primary' => $primary,
            ]) style="padding:0.75rem">
                {{ $title }}
            </label>
        @else
            {{ $title }}
        @endif
    </td>
@endif
