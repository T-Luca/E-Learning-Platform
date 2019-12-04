<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([[
            'name' => 'Cuvinte de Baza',
            'description' => 'Nivel 1'
        ],[
            'name' => 'Cuvinte de Baza',
            'description' => 'Nivel 2'
        ],[
            'name' => 'Expresii',
            'description' => 'Nivel 1'
        ],[
            'name' => 'Plural',
            'description' => 'Nivel 1'
        ]]);
    }
}
