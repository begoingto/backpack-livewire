@extends(backpack_view('blank'))

@section('header')
    <nav aria-label="breadcrumb" class="d-none d-lg-block">
        <ol class="breadcrumb bg-transparent p-0 justify-content-end">
            <li class="breadcrumb-item text-capitalize"><a href="http://backpack-livewire.test/admin/dashboard">Admin</a></li>
            <li class="breadcrumb-item text-capitalize"><a href="http://backpack-livewire.test/admin/category">categories</a>
            </li>
            <li class="breadcrumb-item text-capitalize active" aria-current="page">List</li>
        </ol>
    </nav>
@endsection


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
