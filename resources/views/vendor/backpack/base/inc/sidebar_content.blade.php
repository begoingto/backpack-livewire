<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
@hasrole('administrator')
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
    </ul>
</li>
<li class='nav-item'><a class='nav-link' href='{{ route('custom.category') }}'><i class='nav-icon la la-table'></i>Custom Categories</a></li>
<li class='nav-item'><a class='nav-link' href='{{ route('category-csv-upload.csv-upload') }}'><i class='nav-icon la la-table'></i>Upload Categories</a></li>
<li class='nav-item'><a class='nav-link' href='{{ route('aws-file-upload') }}'><i class='nav-icon la la-table'></i>AWS File Upload</a></li>
<li class='nav-item'><a class='nav-link' href='{{ route('custom.map') }}'><i class='nav-icon la la-table'></i>Google Maps</a></li>
<li class='nav-item'><a class='nav-link' href='{{ route('custom.loan') }}'><i class='nav-icon la la-table'></i>Loan</a></li>
<li class='nav-item'><a class='nav-link' href='{{ route('file') }}'><i class='nav-icon la la-file'></i>File Management</a></li>
@endhasrole
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('category') }}'><i class='nav-icon la la-table'></i> Categories</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('elfinder') }}"><i class="nav-icon la la-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('tag') }}'><i class='nav-icon la la-question'></i> Tags</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('article') }}'><i class='nav-icon la la-question'></i> Articles</a></li>