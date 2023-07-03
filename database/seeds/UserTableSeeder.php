<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \App\Models\User::create([
           'name'=>'superadmin',
           'email'=>'superadmin@gmail.com',
           'usernames'=>'superadmin',
           'password'=>bcrypt('123456'),
           'role_id'=>1,
           'terms'=>1
       ]);
    }
}
