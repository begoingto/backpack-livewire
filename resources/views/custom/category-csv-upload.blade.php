@extends(backpack_view('blank'))

@section('content')
    <livewire:csv-file-upload />
@endsection

@push('after_styles')
    <style>
        .drag-drop {
            border: 2px dashed gray;
        }

        .drag-drop label:hover {
            cursor: pointer;
        }
    </style>
    @livewireStyles
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush

@push('after_scripts')
    @livewireScripts
@endpush
