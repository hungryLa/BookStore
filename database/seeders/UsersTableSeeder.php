<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            ['name'=>'Admin', 'email'=>'admin@mail.ru', 'password' => bcrypt('admin123'), 'is_admin' => 1],
            ['name'=>'User', 'email'=>'user@mail.ru', 'password' => bcrypt('user1234'), 'is_admin' => 0]
        ]);
    }
}
