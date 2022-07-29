<!-- This file is used to store topbar (left) items -->

 <li class="nav-item px-3"><a class="nav-link" href="{{ backpack_url('dashboard') }}">Dashboard</a></li>
@hasrole('administrator')
<li class="nav-item px-3"><a class="nav-link" href="{{ backpack_url('user') }}">Users</a></li>
@endhasrole
{{--<li class="nav-item px-3"><a class="nav-link" href="#">Settings</a></li> --}}
