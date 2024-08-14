<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgenciesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('agencies')->insert([
            ['id' => 1, 'name' => 'ООО "Рога и копыта"'],
            ['id' => 2, 'name' => 'ООО "Наследие"'],
        ]);
    }
}
