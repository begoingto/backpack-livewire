<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CustomController extends Controller
{
    public function category()
    {
        abort_if(!backpack_user()->hasPermissionTo('category_manager'), 403);
        return view('custom.category-costom');
    }
}
