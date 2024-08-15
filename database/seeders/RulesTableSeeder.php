<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rules = [
            [
                'id' => 1,
                'agency_id' => 1,
                'name' => 'Правило',
                'text_for_manager' => 'Текст для менеджера',
                'is_active' => 1,
            ],
        ];

        foreach ($rules as $rule) {
            DB::table('rules')->insert($rule);
        }
    }
}
