<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([[
            'id' => 1,
            'name' => 'utilizator',
            'description' => 'persoana fizica'
        ],[
            'id' => 2,
            'name' => 'redactor',
            'description' => 'Mai multe opțiuni'
        ],[
            'id' => 10,
            'name' => 'administrator',
            'description' => 'admin'
        ]]);
    }
}
