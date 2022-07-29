@extends(backpack_view('blank'))

@section('header')
  <div class="container-fluid">
    <h2 class="d-flex justify-content-between">
      <span class="text-capitalize">File Manger</span>
      <a href="#" id="datatable_info_stack"><small>admin/filemanager</small></a>
    </h2>
  </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <iframe src="/filemanager" style="width: 100%; height: 600px; overflow: hidden; border: none;"></iframe>
        </div>
    </div>
@endsection
