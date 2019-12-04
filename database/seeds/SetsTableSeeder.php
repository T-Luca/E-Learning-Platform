<?php

use Illuminate\Database\Seeder;

class SetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sets')->insert([
            'user_id' => 2,
            'language1_id' => 1,
            'language2_id' => 2,
            'subcategory_id' => 1,
            'name' => 'Disciplina 1',
            'set' => 'zero;zero;unu;one;doi;two;trei;three;patru;four;cinci;five;sase;six;sapte;seven;opt;eight;noua;nine;zece;ten',
            'hidden' => 0
        ]);

        DB::table('sets')->insert([
            'user_id' => 3,
            'language1_id' => 1,
            'language2_id' => 2,
            'subcategory_id' => 1,
            'name' => 'Disciplina 2',
            'set' => 'bicicleta;bike;autobuz;bus;masina;car;rulota;caravan;autobuz;coach;tir;lorry',
            'hidden' => 0
        ]);
    }
}
