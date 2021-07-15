<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            ['name'=>'Роман','code'=>'novel'],
            ['name'=>'Биография','code'=>'biography'],
            ['name'=>'Драма','code'=>'drama'],
            ['name'=>'Военная проза','code'=>'military_prose'],
            ['name'=>'Комедия','code'=>'comedy'],
            ['name'=>'Художественный вымысел','code'=>'fiction'],
        ]);
    }
}
