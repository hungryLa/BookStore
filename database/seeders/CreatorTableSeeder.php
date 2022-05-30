<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreatorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('creators')->insert([
            ['SName'=>'Эрих Мария', 'FName'=>'Ремарк'],
            ['SName'=>'Брэдбэри', 'FName'=>'Рэй'],
            ['SName'=>'Чехов', 'FName'=>'Антон'],
            ['SName'=>'Булгаков', 'FName'=>'Михаил'],
            ['SName'=>'Дэниел', 'FName'=>'Киз'],
        ]);
    }
}
