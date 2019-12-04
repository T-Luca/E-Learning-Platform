<?php

use Illuminate\Database\Seeder;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcategories')->insert([[
            'category_id' => 1,
            'name' => 'Disciplina',
            'description' => 'Discipline'
        ],[
            'category_id' => 1,
            'name' => 'Fotbal',
            'description' => 'Football'
        ],[
            'category_id' => 2,
            'name' => 'Animale',
            'description' => 'Animals'
        ],[
            'category_id' => 2,
            'name' => 'De bază',
            'description' => 'Basic'
        ],[
            'category_id' => 3,
            'name' => 'Mijloace de transport',
            'description' => 'Means of transport'
        ],[
            'category_id' => 3,
            'name' => 'Mașină',
            'description' => 'Car'
        ],[
            'category_id' => 4,
            'name' => 'Fructe',
            'description' => 'Fruits'
        ],[
            'category_id' => 4,
            'name' => 'Legume',
            'description' => 'Vegetables'
        ]]);
    }
}
