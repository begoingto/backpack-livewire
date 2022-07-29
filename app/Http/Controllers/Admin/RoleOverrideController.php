<?php
namespace App\Http\Controllers\Admin;

use Backpack\PermissionManager\app\Http\Controllers\RoleCrudController;

class RoleOverrideController extends RoleCrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->role_model = $role_model = config('backpack.permissionmanager.models.role');
        $this->permission_model = $permission_model = config('backpack.permissionmanager.models.permission');

        $this->crud->setModel($role_model);
        $this->crud->setEntityNameStrings(trans('backpack::permissionmanager.role'), trans('backpack::permissionmanager.roles'));
        $this->crud->setRoute(backpack_url('role'));

        if (backpack_user()->hasRole('administrator') == false) {
            $this->crud->denyAccess('list');
            $this->crud->denyAccess('create');
            // $this->crud->denyAccess('update');
            $this->crud->denyAccess('delete');
        }
        if (config('backpack.permissionmanager.allow_role_update') == false) {
            $this->crud->denyAccess('update');
        }
    }
}
