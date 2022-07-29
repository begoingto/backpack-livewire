<?php
namespace Database\Seeders;

use Backpack\PermissionManager\app\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'administrator',
            'admin',
            'publisher'
        ];

        foreach ($roles as $value) {
            Role::create([
                'name' => $value,
            ]);
        }
    }
}
