<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            [
                'name' => 'На западном фронте без перемен',
                'author_id' => 1,
                'image' => '0rpMMoDQcZxoKvozjUc59Ueye2X8T9eoMPwmClMV.jpg',
                'pubHouse' => 'Эксклюзивная классика',
                'price' => 189,
                'visible' => 1,
            ],
            [
                'name' => 'Три товарища',
                'author_id' => 1,
                'image' => 'Rm3V9Os0f0AxswA0h2VMkeLq72MJLhcz7zDxTXTL.jpg',
                'pubHouse' => 'Эксклюзивная классика',
                'price' => 229,
                'visible' => 1,
            ],
            [
                'name' => 'Возлюби ближнего своего',
                'author_id' => 1,
                'image' => 'NaxgSebUls0NBMFfFUJ5VZr8GUORIsmKKLp4oNi0.jpg',
                'pubHouse' => 'Эксклюзивная классика',
                'price' => 250,
                'visible' => 1,
            ],
            [
                'name' => 'Ночь в Лиссабоне',
                'author_id' => 1,
                'image' => 'vAuMUk2Gow0vczkaVNTeaFggWmAZiVA6Hc3efSt5.jpg',
                'pubHouse' => 'Эксклюзивная классика',
                'price' => 219,
                'visible' => 1,
            ],
            [
                'name' => 'Жизнь взаймы',
                'author_id' => 1,
                'image' => 'PYnw8zzk0GHA77I8TOvi25ZCeM4Uj8fJFqiJeMfA.jpg',
                'pubHouse' => 'Эксклюзивная классика',
                'price' => 220,
                'visible' => 1,
            ],
            [
                'name' => 'Драма на охоте',
                'author_id' => 3,
                'image' => '8cKEQmyoqzh0SDyHp0Ee92ESNevqOasAW9GMaAv7.jpg',
                'pubHouse' => 'Всемирная литература',
                'price' => 125,
                'visible' => 1,
            ],
            [
                'name' => 'Вишневый сад',
                'author_id' => 3,
                'image' => 'oSYDHlnbBF0UBc402M58wufzdyLpgoIDhAT6ftkz.jpg',
                'pubHouse' => 'Всемирная литература',
                'price' => 100,
                'visible' => 1,
            ],
        ]);
    }
}
