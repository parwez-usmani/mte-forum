<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role_list',
            'role_create',
            'role_edit',
            'role_delete',
            'user_list',
            'user_create',
            'user_edit',
            'user_delete'
         ];
         
         foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
                'slug' => $permission,
            ]);
       }
    }
}
