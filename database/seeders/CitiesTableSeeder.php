<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('cities')->insert([
            ['id' => 1, 'name' => 'Москва', 'country_id' => 1],
            ['id' => 2, 'name' => 'Санкт Петербург', 'country_id' => 1],
        ]);
    }
}
