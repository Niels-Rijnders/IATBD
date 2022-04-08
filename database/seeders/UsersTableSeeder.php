<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "niels rijnders",
            'email' => "s1122255@student.hsleiden.nl",
            'password' => bcrypt('12176'),
            'age' => 21,
            'role' => "Admin",
        ]);

        DB::table('users')->insert([
            'name' => "Satori Komeji",
            'email' => "e1@gmail.com",
            'password' => bcrypt('12176'),
            'age' => 17,
            'role' => "Eigenaar",
        ]);

        DB::table('users')->insert([
            'name' => "Yukari Yakumo",
            'email' => "e2@gmail.com",
            'password' => bcrypt('12176'),
            'age' => 17,
            'role' => "Eigenaar",
            'image' => "/img/sushi_2.jpg",
        ]);

        DB::table('users')->insert([
            'name' => "Reimu Hakurei",
            'email' => "e3@gmail.com",
            'password' => bcrypt('12176'),
            'age' => 17,
            'role' => "Eigenaar",
            'image' => "/img/sushi_3.jpg",
        ]);

        DB::table('users')->insert([
            'name' => "Remilia Scarlet",
            'email' => "o1@gmail.com",
            'password' => bcrypt('12176'),
            'age' => 17,
            'role' => "Oppasser",
            'image' => "/img/sushi_4.jpg",
        ]);
    }
    }
    

