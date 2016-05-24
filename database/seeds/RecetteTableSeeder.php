<?php

use Illuminate\Database\Seeder;

class RecetteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recettes')->insert([
            'title' => str_random(10),
            'username' => str_random(10),
            'description' => str_random(20),
            'recette' => str_random(40),
            'difficulte' => "facile",
            'category' => "gateau"
        ]);
    }
}
