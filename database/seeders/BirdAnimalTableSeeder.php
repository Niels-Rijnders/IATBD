<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class BirdAnimalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animal')->insert([
            'name' => "Utsuho",
            'species' => "Vogel",
            'breed' => "Raaf",
            'age' => "4 jaar",
            'owner' => "2",
            'image' => "/img/vogel1.jpeg", /*deze moet nog aangepast worden*/
            'description' => "Tamme raaf in bezit van een rode steen"
        ]);

        DB::table('animal')->insert([
            'name' => "Yatagarasu",
            'species' => "Vogel",
            'breed' => "Raaf",
            'age' => "onbekend",
            'owner' => "2",
            'image' => "/img/vogel2.jpeg", /*deze moet nog aangepast worden*/
            'description' => "Heeft 3 poten maar verder een aardige vogel",
            'word_opgepast' => True,
        ]);
    }
}
