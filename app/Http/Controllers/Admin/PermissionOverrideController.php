<?php
namespace App\Http\Controllers\Admin;

use Backpack\PermissionManager\app\Http\Controllers\PermissionCrudController;

class PermissionOverrideController extends PermissionCrudController
{
    public function setup()
    {
        $this->role_model = $role_model = config('backpack.permissionmanager.models.role');
        $this->permission_model = $permission_model = config('backpack.permissionmanager.models.permission');

        $this->crud->setModel($permission_model);
        $this->crud->setEntityNameStrings(trans('backpack::permissionmanager.permission_singular'), trans('backpack::permissionmanager.permission_plural'));
        $this->crud->setRoute(backpack_url('permission'));

        // deny access according to configuration file
        if (backpack_user()->hasRole('administrator') == false) {
            $this->crud->denyAccess('list');
            $this->crud->denyAccess('create');
            $this->crud->denyAccess('update');
            $this->crud->denyAccess('delete');
        }
    }
}
