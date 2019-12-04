<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            'role_id' => 1,
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user')
        ],[
            'role_id' => 2,
            'name' => 'Editor',
            'email' => 'editor@gmail.com',
            'password' => Hash::make('editor')
        ],[
            'role_id' => 10,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin')
        ]]);
    }
}
