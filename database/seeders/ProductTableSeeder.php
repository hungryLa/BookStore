<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'На западном фронте без перемен',
                'creator_id' => 1,
                'image' => '0rpMMoDQcZxoKvozjUc59Ueye2X8T9eoMPwmClMV.jpg',
                'producer' => 'Эксклюзивная классика',
                'price' => 189,
                'visible' => 1,
                'in_stock' => 100,
            ],
            [
                'name' => 'Три товарища',
                'creator_id' => 1,
                'image' => 'Rm3V9Os0f0AxswA0h2VMkeLq72MJLhcz7zDxTXTL.jpg',
                'producer' => 'Эксклюзивная классика',
                'price' => 229,
                'visible' => 1,
                'in_stock' => 100,
            ],
            [
                'name' => 'Возлюби ближнего своего',
                'creator_id' => 1,
                'image' => 'NaxgSebUls0NBMFfFUJ5VZr8GUORIsmKKLp4oNi0.jpg',
                'producer' => 'Эксклюзивная классика',
                'price' => 250,
                'visible' => 1,
                'in_stock' => 90,
            ],
            [
                'name' => 'Ночь в Лиссабоне',
                'creator_id' => 1,
                'image' => 'vAuMUk2Gow0vczkaVNTeaFggWmAZiVA6Hc3efSt5.jpg',
                'producer' => 'Эксклюзивная классика',
                'price' => 219,
                'visible' => 1,
                'in_stock' => 80,
            ],
            [
                'name' => 'Жизнь взаймы',
                'creator_id' => 1,
                'image' => 'PYnw8zzk0GHA77I8TOvi25ZCeM4Uj8fJFqiJeMfA.jpg',
                'producer' => 'Эксклюзивная классика',
                'price' => 220,
                'visible' => 1,
                'in_stock' => 80,
            ],
            [
                'name' => 'Драма на охоте',
                'creator_id' => 3,
                'image' => '8cKEQmyoqzh0SDyHp0Ee92ESNevqOasAW9GMaAv7.jpg',
                'producer' => 'Всемирная литература',
                'price' => 125,
                'visible' => 1,
                'in_stock' => 50,
            ],
            [
                'name' => 'Вишневый сад',
                'creator_id' => 3,
                'image' => 'oSYDHlnbBF0UBc402M58wufzdyLpgoIDhAT6ftkz.jpg',
                'producer' => 'Всемирная литература',
                'price' => 100,
                'visible' => 1,
                'in_stock' => 50,
            ],
        ]);
    }
}
