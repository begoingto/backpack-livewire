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
<div class=" w-100 vh-75 d-flex justify-content-center align-items-center">
    <h1>File upload</h1>
</div>
@endsection
