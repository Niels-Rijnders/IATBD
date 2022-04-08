<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class DogAnimalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animal')->insert([
            'name' => "Aunn",
            'species' => "Hond",
            'breed' => "Oni",
            'age' => "12 jaar",
            'owner' => "4",
            'image' => "/img/hond1.jpeg", /*deze moet nog vervangen worden*/ 
            'description' => "Is erg protective voor haar baasje"
        ]);

        DB::table('animal')->insert([
            'name' => "Momiji",
            'species' => "Hond",
            'breed' => "Wolf",
            'age' => "7 jaar",
            'owner' => "4",
            'image' => "/img/hond2.jpeg", /*deze moet nog vervangen worden*/ 
            'description' => "Wolf met witte haar, is geïnteresseerd in zwaarden."
        ]);
    }
}
