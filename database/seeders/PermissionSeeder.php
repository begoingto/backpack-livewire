<?php
namespace Database\Seeders;

use Backpack\PermissionManager\app\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public $permissions;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $action = [
            'show',
            'list',
            'create',
            'update',
            'delete',
        ];
        $permissions = [
            'category' => array_merge($action, ['manager']),
            'article' => $action,
            'tag' => $action,
        ];

        foreach ($permissions as $key => $value) {
            foreach ($value as $v) {
                $this->permissions = $key . '_' . $v;
                Permission::create([
                    'name' => $key . '_' . $v
                ]);
            }
        }
    }
}
