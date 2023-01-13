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
    <div class="drag-drop w-100 vh-75 d-flex flex-column justify-content-center p-4 align-items-center">
        <h1><i class="la la-cloud-upload la-lg mt-4"></i></h1>
        <h3>Drag and Drop</h3>
        <h3>Or <label for="upload" class="text-primary">Browse</label></h3>
    </div>
    <hr>
    <div class="card">
        <div class="card-body d-flex">
            <h1 class="text-primary">
                <i class="la la-cloud-upload la-lg mt-4"></i>
            </h1>
            <div class="ml-3 w-100">
                <p>Category_template.csv</p>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0"
                        aria-valuemax="100">80%</div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body d-flex">
            <h1 class="text-primary">
                <i class="la la-cloud-upload la-lg mt-4"></i>
            </h1>
            <div class="ml-3 w-100">
                <p>Category_template.csv</p>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0"
                        aria-valuemax="100">80%</div>
                </div>
            </div>
        </div>
    </div>
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
@endpush
