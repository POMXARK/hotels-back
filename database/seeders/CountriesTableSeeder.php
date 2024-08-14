<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('countries')->insert([
            ['id' => 1, 'name' => 'Россия'],
            ['id' => 2, 'name' => 'Беларусь'],
            ['id' => 3, 'name' => 'Казахстан'],
        ]);
    }
}
