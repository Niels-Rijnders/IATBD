<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class CatAnimalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animal')->insert([
            'name' => "Chen",
            'species' => "Kat",
            'breed' => "Brown Cat",
            'age' => "8 maanden",
            'owner' => "3",
            'image' => "/img/kat1.jpeg", /*deze moet nog aangepast worden*/
            'description' => "Speelse kat die vaak in problemen komt"
        ]);

        DB::table('animal')->insert([
            'name' => "Yakumo",
            'species' => "Kat",
            'breed' => "Ninetails",
            'age' => "8 jaar",
            'owner' => "3",
            'image' => "/img/kat2.jpeg", /*deze moet nog aangepast worden*/
            'description' => "Let vaak op chen als zij problemen maakt"
        ]);
    }
}
