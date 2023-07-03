<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::insert([
            [  'id'=> 1,
                'role_name'=>'superadmin',
               'role_slug'=> 'superadmin',
               'permission_id'=> '1,2,3,4,5,6,7,8',
               'created_at'=> '2023-07-02 09:15:43',
               'updated_at'=> '2023-07-02 09:15:43'],
            [  'id'=> 2,
                'role_name'=>'manager',
                'role_slug'=> 'manager',
                'permission_id'=> '5,6,7,8',
                'created_at'=> '2023-07-02 09:15:43',
                'updated_at'=> '2023-07-02 09:15:43'],
        ]);
    }
}
