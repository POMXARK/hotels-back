<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('hotels')->insert([
            ['id' => 1, 'name' => 'Балчуг Кемпински Москва', 'city_id' => 1, 'stars' => 5],
            ['id' => 2, 'name' => 'Измайлово Альфа', 'city_id' => 1, 'stars' => 4],
            ['id' => 3, 'name' => 'Золотое кольцо', 'city_id' => 1, 'stars' => 5],
            ['id' => 4, 'name' => 'Плаза Гарден Москва Центр Международной Торговли', 'city_id' => 1, 'stars' => 5],
            ['id' => 5, 'name' => 'Измайлово Гамма', 'city_id' => 1, 'stars' => 3],
            ['id' => 6, 'name' => 'Нептун', 'city_id' => 2, 'stars' => 4],
            ['id' => 7, 'name' => 'Ладога-отель', 'city_id' => 2, 'stars' => 3],
            ['id' => 8, 'name' => 'Питер Академия', 'city_id' => 2, 'stars' => 3],
            ['id' => 9, 'name' => 'Марко Поло', 'city_id' => 2, 'stars' => 4],
            ['id' => 10, 'name' => 'Герцен-Хаус', 'city_id' => 2, 'stars' => 1],
        ]);
    }
}
